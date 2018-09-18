<?php

$start = microtime(true);
ini_set('max_execution_time', 500);
include "server.php";
$start = microtime(true);
$status_arr = array();
$time_elapsed_secs = 0;
foreach ($server_arr as $type => $curr_server):
    if ($type != 'sandbox'):
        //echo "<hr><h2> On " . $curr_server["server_type"] . " Environment</h1>";
        generate_product_tb($curr_server);
    endif;
endforeach;

function generate_product_tb($curr_server) {
    global $app21_url, $country_code;
    //echo "<h3> Step 1 - Generate ap21_product Table</h3>";
    $timer1 = microtime(true);
    $conn = mysqli_connect($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    $action = $_GET["action"];
//echo "<br> action = $action";
    $limit = 1000;
    if ($action == ""):
        echo "Typical Call to this script :
		<ul> 
		<li> First call : <a href='s3_import_notes.php?action=setup'>s3_import_notes.php?action=setup</a></li>
		<li> Insert call in loop: <a href='s3_import_notes.php?action=insert'>s3_import_notes.php?action=insert</a></li> 
		</ul>";
        exit;
    elseif ($action == "setup"):
        $start_num = 0;
        //$query = "delete from ap21_notes where note_type='color'"; 
        $query = "delete from ap21_notes_distinct";
        if ($conn->query($query) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        //echo "<br> query = $query"; 
        //exit; 
        $query = "delete from ap21_notes";
        $conn->query($query);
        $query = "insert into ap21_notes_distinct(color_idx,note_type) 
			select distinct color_idx,'Color' from ap21_import";
        echo "<br> $query";
        $conn->query($query);
        $query = "insert into ap21_notes_distinct(style_idx,note_type) 
			select distinct style_idx,'Style' from ap21_import";
        echo "<br> $query";
        $conn->query($query);
        //header("Location:ap21_notes.php?action=insert");
        exit; elseif ($action == "insert"):
        //call_color_notes_api($curr_server, "36676");	
        //exit;
        $sql = "Select * from ap21_notes_distinct
                        where processed='No' 
                        order by color_idx";
        //echo "<br>  $sql";
        $result = mysqli_query($conn, $sql);
        if (mysqli_connect_errno()):
            echo "Failed to connect to MySQL: " . mysqli_connect_error();

        else:
            $cnt = 1;
            //print_r($result);
            //echo "<br> Record Count -".mysqli_num_rows($result);
            //exit;
            if (mysqli_num_rows($result) >= 1):
                while ($row = mysqli_fetch_assoc($result)) {
                    $style_idx = $row['style_idx'];
                    $color_idx = $row['color_idx'];
                    $note_type = $row['note_type'];
                    $update_dt = date('Y-m-d H:i:s');
                    echo "<br>style_idx=$style_idx | color_idx=$color_idx | note_type=$note_type";
                    if ($note_type == "Color"):
                        call_notes_api($curr_server, $color_idx, $note_type);
                        $upd_sql = "Update ap21_notes_distinct set processed='Yes',update_dt='$update_dt' where color_idx='$color_idx' and style_idx is NULL";
                    else:
                        call_notes_api($curr_server, $style_idx, $note_type);
                        $upd_sql = "Update ap21_notes_distinct set processed='Yes',update_dt='$update_dt' where style_idx='$style_idx' and color_idx is NULL";
                    endif;
                    mysqli_query($conn, $upd_sql);
                    $cnt++;
                }
                //header("Location:ap21_notes.php?action=insert");
                exit;
            else:
                echo "Product Note Import Complete";
                exit;
            endif;
        endif;
    elseif ($action == "update"):
        echo "Write Update Script";
    endif;
}

function call_notes_api($curr_server, $idx, $note_type) {
    global $app21_url, $country_code;
    //https://210.50.241.230:8525/RetailAPIFIT_LIVE/ProductNotes/17788?countryCode=aufit
    //$style_idx = 17788;
    if ($note_type == "Color"):
        $file = $app21_url . "/ProductColourNotes/" . $idx . "?countryCode=" . $country_code;
    else:
        $file = $app21_url . "/ProductNotes/" . $idx . "?countryCode=" . $country_code;
    endif;
    echo "<br> AP21 Api : " . $file;

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
    $prodnote = simplexml_load_string($data);
    //print_r($prodnote);
    // Check connection
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Checking if references are available
    if ($prodnote === false || !empty($prodnote->ErrorCode)) {
        foreach (libxml_get_errors() as $error) {
            echo "\t", $prodnote->ErrorCode . "<br />" . $prodnote->Description;
        }
        exit;
    }
    //echo "Success - Parse the XML";
    //$total_cnt=count($references->ReferenceType);
    if ($note_type == "Color"):
        $total_cnt = count($prodnote->ProductColourNoteType);
    else:
        $total_cnt = count($prodnote->ProductNoteType);
    endif;

    if (count($total_cnt) > 0):
        if ($note_type == "Color"):
            $notes = $prodnote->ProductColourNoteType;
        else:
            $notes = $prodnote->ProductNoteType;
        endif;

        //echo "<br>total_cnt - $total_cnt ";
        $cnt = 1;
        //$rcode=$prodnote->ReferenceTypeCode;
        //$rname=$prodnote->ReferenceTypeName;
        foreach ($notes as $curr_note):
            //echo "<hr> <pre>";echo "<br>aaaaa : "; print_r($curr_note);						
            $code = $curr_note->Code;
            //if (tag_exist($code,$conn)):
            $name = $curr_note->Name;
            $note = $curr_note->Note;
            $note_str = $note[0];
            $pos1 = strpos($note_str, "YY");
            $pos2 = strpos($note_str, "ZZ");
            //echo "<hr> Single element - ".$note[0];
            //echo "Pos 1 = $pos1 | Pos 2 =$pos2 ";
            $note_len = $pos2 - $pos1 - 2;
            $note_part = trim(strip_tags(substr($note_str, $pos1 + 2, $note_len), '<BR><SUP>'));
            //$note_part=trim(strip_tags(substr($note_str,$pos1+3,$note_len)));			
            $note_part = str_replace("&nbsp;", "", $note_part);
            $note_part = addslashes($note_part);
            //echo "<hr> $note_part";
            //exit;
            if ($note_type == "Color"):
                $sql = " INSERT INTO ap21_notes (color_idx,note_type,code,name,note) "
                        . "VALUES ('$idx','$note_type','$code','$name','$note_part')";
            else:
                $sql = "INSERT INTO ap21_notes (style_idx,note_type,code,name,note) 
                        VALUES ('$idx','$note_type','$code','$name','$note_part')";
            endif;
            //echo "<br> $sql";
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //endif; 
        endforeach;
    endif;
    $conn->close();
}

function tag_exist($code, $conn) {
    $sql = "select * from ap21_notes_map where code='$code'";
    //echo "<br>$sql";
    $result = $conn->query($sql);
    if (isset($result->num_rows) && $result->num_rows > 0):
        echo "<br>found";
        return true;
    else:
        //echo "<br>not found";
        return false;
    endif;
}

?>