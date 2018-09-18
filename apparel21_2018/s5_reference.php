<?php
$start = microtime(true);
ini_set('max_execution_time', 500);
include "server.php";
$status_arr = array();
$time_elapsed_secs = 0;
foreach ($server_arr as $curr_server):
    echo "<hr><h2> On " . $curr_server["server_type"] . " Environment</h1>";
    generate_colour_reference_tb($curr_server);
    generate_reference_tb($curr_server);
    generate_colour_tb($curr_server);
    //exit;
endforeach;
echo "<hr> Total Time taken : " . (microtime(true) - $start) . " Seconds";
echo "<br> <a href='s6_price_stock_update.php'>Goto Next Process - Update barcode <a> ";

exit;

// To check If file exist
function is_url_exist($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (curl_exec($ch) !== FALSE) {
        return true;
    } else {
        return false;
    }
}

function update_image_exist($curr_server, $server_type) {
    $timer0 = microtime(true);
    echo "<hr><h2>Step 1 - Update Image Exists in prod_images </h2>";
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);

    $cnt = 1;
    $items = array();

    //Step 1: get all the folder names from prod_images
    //retrieve the folders
    $foldersJSON = file_get_contents('http://au.diesel.com/apparel21/list_img_folder.php'); //because our little API returns JSON data, we have to decode it first
    $items = json_decode($foldersJSON); // $items is now an array of folders
    //print_r $items;
    //Step 2: Check for distinct style if folder exists
    $sql = "SELECT distinct style, variation_code, image_path
		  FROM prod_images
		  WHERE `variation_code` !=  '' and image_exist_flag is NULL 
		  GROUP BY style";
    $result = $conn->query($sql);
    //echo $result->num_rows;
    //echo "<br>  $sql ";
    if ($result->num_rows == 0) {
        echo "Process Over";
    } else {
        $cnt = 1;
        while ($row = $result->fetch_assoc()) {
            $style = $row["style"];
            $color = $row["variation_code"];
            $image_path = $row["image_path"];
            //echo "<hr> $cnt. $style - $color - $image_path <br>";


            $img_path = explode('_', $image_path);
            $foldername = $img_path[0] . $img_path[1];
            if (in_array(trim($foldername), $items)) {

                $fileJSON = file_get_contents("http://au.diesel.com/apparel21/list_folder_detail.php?folder=$foldername&b=1");
                $image_files = json_decode($fileJSON);
                print_r($image_files);

                //echo "<br> $foldername exist ";
                $sql_image = "SELECT style, variation_code, image_path
					  FROM prod_images
					  WHERE style =  '$style'
					  AND  `variation_code` !=  ''";
                echo "<br> ---  $sql_image ";

                $result_image = $conn->query($sql_image);

                while ($row_img = $result_image->fetch_assoc()) {

                    $style1 = $row_img["style"];
                    $color1 = $row_img["variation_code"];
                    $image_path1 = $row_img["image_path"];

                    if (in_array(trim($image_path1), $image_files)) {
                        $upd_sql = "Update prod_images set image_exist_flag='Yes' where style='$style1' and image_path = '$image_path1'";
                    } else {

                        $upd_sql = "Update prod_images set image_exist_flag='No' where style='$style1' and image_path = '$image_path1'";
                    }
                    //echo "<br>$upd_sql";
                    $conn->query($upd_sql);
                }// end of while
            } else {
                $upd_sql = "Update prod_images set image_exist_flag='No' where style='$style'";
                $conn->query($upd_sql);
                //echo '<br>$foldername - Folder does not Exist : '.$upd_sql;
            }
            $cnt++;
            //exit;
        } // end of while($row = $result->fetch_assoc())
    }// end of main else $result->num_rows ==0		
    echo "<br> Time taken for step0 : " . (microtime(true) - $timer0) . " Seconds";
}

//end of missing_image 

function generate_colour_tb($curr_server) {
    echo "<h3> Step 3 - Generate ap21_color Table</h3>";
    echo "Data Source : api_data.xml ";
    $timer3 = microtime(true);
    libxml_use_internal_errors(true);

    $data = file_get_contents('api_data.xml');
    $products = simplexml_load_string($data);

    // Create connection
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Checking if products are available
    if ($products === false || !empty($products->ErrorCode)) {
        foreach (libxml_get_errors() as $error) {
            echo "\t", $products->ErrorCode . "<br />" . $products->Description;
        }
        exit;
    }

    if (count($products->Product) > 0):
        $query = "TRUNCATE TABLE ap21_colour";
        if ($conn->query($query) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $cnt = 1;
        $current_date = date('Y-m-d');
        foreach ($products->Product as $curr_product):
            $style_idx = $curr_product->Id;
            $style = $curr_product->Code;
            foreach ($curr_product->Clrs->Clr as $curr_color):
                $color_idx = $curr_color->Id;

                //ALGO - get release date
                $release_date = get_release_date($curr_server, $server_type, $color_idx);
                $sale_status = get_sale_status($curr_server, $server_type, $color_idx);

                if (isset($release_date) && $release_date != ""):
                    //insert record in product_colour					
                    //echo "<br>Release date: $release_date Colour idx : $color_idx ";
                    $sql = ("INSERT ignore INTO `ap21_colour` (`clridx`, `release_dt`,`sale_status`) VALUES 
					('" . $color_idx . "', '" . $release_date . "','" . $sale_status . "')");
                    if ($conn->query($sql) === FALSE):
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    endif;
                endif;

            endforeach;
            $cnt++;
        endforeach;
    endif;

    $conn->close();
    echo "<br> Time taken for step3 : " . (microtime(true) - $timer3) . " Seconds";
}

function generate_colour_reference_tb($curr_server) {
    global $app21_url, $country_code;
    echo "<h3> Step 2 - Generate Colour Reference Table</h3>";
    $timer2 = microtime(true);
    $file = $app21_url . "/productcolourreferences/?countryCode=" . $country_code;
    echo "Ap21 api :" . $file;
    $headers = array(
        "GET HTTP/1.1",
        "Content-type: text/xml",
        "Accept: Version_2.0"
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 180); // 3 minutes
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

    $data = curl_exec($ch);

    if (curl_errno($ch)) {
        $result = 'cURL ERROR -> ' . curl_errno($ch) . ': ' . curl_error($ch);
        $curl_errno = curl_errno($ch);
        echo "<br>";
        exit;
    } else {
        $returnCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //echo "<br> return code = $returnCode";
    }
    $ref = simplexml_load_string($data);

    // Create connection once again to avoid mysql server connection error
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Checking if references are available
    if ($ref === false || !empty($ref->ErrorCode)) {
        foreach (libxml_get_errors() as $error) {
            echo "\t", $ref->ErrorCode . "<br />" . $ref->Description;
        }
        exit;
    }
    // echo "Success - Parse the XML";

    $total_cnt = count($ref->ProductColourReference);
    //echo "<br>total_cnt - $total_cnt ";
    if ($total_cnt > 0):
        $query = "TRUNCATE TABLE ap21_colour_reference";
        if ($conn->query($query) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        foreach ($ref->ProductColourReference as $curr_colourref):
            $clrid = $curr_colourref->ClrId;
            $total_ref = count($curr_colourref->References);
            //echo "<hr> Clrid = $clrid | count_ref = $total_ref";
            foreach ($curr_colourref->References->Reference as $curr_ref):
                $curr_reftypeid = $curr_ref->ReferenceTypeId;
                $curr_ref_val = $curr_ref->Id;
                //echo "<br>  $clrid - $curr_reftypeid : $curr_id";
                if ($curr_ref_val != ''):
                    //Add Insert Query ap21_colour_reference ('Clridx','reftype_id','reftype_val')
                    $sql = " INSERT INTO ap21_colour_reference(clridx,reftype_id,reftype_val) 
								VALUES ('$clrid','$curr_reftypeid','$curr_ref_val')";
                    //echo "<br> $sql";
                    if ($conn->query($sql) === FALSE):
                        echo "<br>Error: " . $sql . "<br>" . $conn->error;
                        exit;
                    endif;
                endif;
            endforeach;

        endforeach;
    endif;
    echo "<br> Time taken for step 2 : " . (microtime(true) - $timer2) . " Seconds";
}

function generate_reference_tb($curr_server) {
    global $app21_url, $country_code;
    echo "<h3> Step 1 - Generate Reference Table</h3>";
    $timer1 = microtime(true);
    // Fetching Data from App21
    //$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);    


    $conn = mysqli_connect($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    $query = "TRUNCATE TABLE ap21_references";
    if ($conn->query($query) === FALSE) {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $sql = "Select distinct reftype_id from ap21_colour_reference";
    $result = mysqli_query($conn, $sql);
    if (mysqli_connect_errno()):
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    else:
        while ($row = mysqli_fetch_assoc($result)) {
            //echo "<br>".$row['reftype_id'];
            $reftype_id = $row['reftype_id'];
            call_ref_api($curr_server, $reftype_id);
        }
    endif;


    echo "<br> Time taken for step1 : " . (microtime(true) - $timer1) . " Seconds";
}

function call_ref_api($curr_server, $reftype_id) {
    global $app21_url, $country_code;
    $file = $app21_url . "/references/" . $reftype_id . "?countryCode=" . $country_code;
    echo "<br>AP21 Api : " . $file;

    $headers = array(
        "GET HTTP/1.1",
        "Content-type: text/xml",
        "Accept: Version_2.0"
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); // 1 minutes
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

    $data = curl_exec($ch);

    if (curl_errno($ch)) {
        $result = 'cURL ERROR -> ' . curl_errno($ch) . ': ' . curl_error($ch);
        $curl_errno = curl_errno($ch);
        //echo "<br>";
        exit;
    } else {
        $returnCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //echo "<br> return code = $returnCode";
    }
    $ref = simplexml_load_string($data);

    // Check connection
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Checking if references are available
    if ($ref === false || !empty($ref->ErrorCode)) {
        foreach (libxml_get_errors() as $error) {
            echo "\t", $ref->ErrorCode . "<br />" . $ref->Description;
        }
        exit;
    }
    //echo "Success - Parse the XML";
    //$total_cnt=count($references->ReferenceType);
    $total_cnt = count($ref->References->Reference);
    if (count($total_cnt) > 0):


        //echo "<br>total_cnt - $total_cnt ";
        $cnt = 1;
        $rcode = $ref->ReferenceTypeCode;
        $rname = $ref->ReferenceTypeName;
        foreach ($ref->References->Reference as $curr_ref):
            $reftype_id = $curr_ref->ReferenceTypeId;
            $ref_id = $curr_ref->Id;
            $ref_code = $curr_ref->Code;
            $ref_name = $curr_ref->Name;

            //if (preg_match("/20\d\d/", $ref_name, $output_array)):
            //echo "<br> $ref_idx - $ref_code - $ref_name";
            //$release_dt = date("Y/m/d", strtotime($ref_name));
            //Add Insert query ap21_references(reldt_id,reldt_code,release_dt)
            $sql = " INSERT INTO ap21_references (reftype_id,reftype_val,rcode,rname,ref_code,ref_name) 
						VALUES ('$reftype_id','$ref_id','$rcode','$rname','$ref_code','$ref_name')";
            //echo "<br> $sql";
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //endif;
        endforeach;
    endif;
    $conn->close();
}

function get_release_date($curr_server, $server_type, $color_idx = 0) {
    $release_date = "";
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    $sql = "SELECT ref_name as release_dt
				FROM ap21_colour_reference a, ap21_references b 
				WHERE a.reftype_id=b.reftype_id and a.reftype_val=b.reftype_val and a.reftype_id='1503' and a.clridx =" . $color_idx;
    // echo "<br>$sql";
    $result = $conn->query($sql);
    if (isset($result->num_rows) && $result->num_rows > 0):
        $result_arr = ($result->fetch_assoc());
        $release_dt = (isset($result_arr) && !empty($result_arr)) ? $result_arr['release_dt'] : "";
        $release_date = ($release_dt == null) ? "" : date('Y-m-d', strtotime($release_dt)); // to avoid 1970-01-01
    endif;
    return $release_date;
}

function get_sale_status($curr_server, $server_type, $color_idx = 0) {
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    $sql = "SELECT ref_code as sale_status
				FROM ap21_colour_reference a, ap21_references b 
				WHERE a.reftype_id=b.reftype_id and a.reftype_val=b.reftype_val and a.reftype_id='1761' and a.clridx =" . $color_idx;
    // echo "<br>$sql";
    $result = $conn->query($sql);
    if (isset($result->num_rows) && $result->num_rows > 0):
        $result_arr = ($result->fetch_assoc());
        $sale_status = (isset($result_arr) && !empty($result_arr)) ? $result_arr['sale_status'] : "";
    endif;
    return $sale_status;
}

?>