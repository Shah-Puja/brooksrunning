<?php date_default_timezone_set('Australia/Brisbane');
ini_set('max_execution_time', 0);
include_once "server.php";
error_reporting(1);
$dbname = $server_arr["current"]["dbname"];
$conn = create_connection($servername, $username, $password, $dbname);
process_ap21($app21_url, $country_code);
//echo "<hr> PROCESS COMPLETE. ";
$conn->close();

function table_exist($tablename, $conn, $dbname) {
    $sql = "SHOW TABLES FROM  `" . $dbname . "` WHERE  `Tables_in_" . $dbname . "` LIKE  '" . $tablename . "'";
    //echo "<br>". $sql;
    $result = $conn->query($sql);
    $rec_count = $result->num_rows;
    if ($rec_count == 1):
        return true;
    else:
        return false;
    endif;
}

function process_ap21($app21_url, $country_code, $inserted_id) {
    $data = file_get_contents('api_data.xml');
    $products = simplexml_load_string($data);
    echo "<hr><h2>Step 3 - Call Product API & Process the XML to update data</h2>";
    $conn = create_connection($servername, $sername, $password, $dbname);
    // This line is very IMP.. reconnect is required because.. for some reason we are loosing connection after API call.
    // Checking if products are available
    if ($products === false || !empty($products->ErrorCode)) {
        echo "Failed loading XML\n";
        foreach (libxml_get_errors() as $error) {
            echo "\t", $products->ErrorCode . "<br />" . $products->Description;
        }
        exit;
    } echo "<br> $servername , $username , $password , $dbname";
    $status = "working";
    $old_style = "";
    $old_color = "";
    $cnt = 0;
    if (count($products->Product) > 0):
        $query = "TRUNCATE TABLE ap21_import";
        if ($conn->query($query) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        foreach ($products->Product as $curr_product):
            $style_idx = $curr_product->Id;
            $style_ap21 = $curr_product->Code;
            $prodname = $curr_product->Name;
            echo "<hr>$style_idx - $style_ap21  - $prodname<br>";
            //print_r($curr_product->References);
            $prod_type = "";
			$flag_bra = 'No';
			$brooks_style='No';
            foreach ($curr_product->References->Reference as $curr_reference):
                $ref_type_id = trim($curr_reference->ReferenceTypeId);
                $ref_id = trim($curr_reference->Id);
                echo "<br>---- $ref_type_id - $ref_id";								
				if ($ref_type_id == "1347"): 					
					$brand=$ref_id; 
					if ($ref_id==4391 or $ref_id==4395):
						$brooks_style='Yes'; //4391 is Brooks and 4395 is MC
					else:
						break; //exit foreach if its non-brooks item
					endif;
				endif;
                if ($ref_type_id == "1341"):
					$category=$ref_id;					
                    switch ($ref_id):
                        case '4404' : $prod_type = 'Footwear'; break;
                        case '4407' : $prod_type = 'Apparel'; break; // Performance Apparel
                        case '4408' : $prod_type = 'Apparel'; break;
						case '4409' : $prod_type = 'Apparel'; break; //Accessories
                        case '25081' : $prod_type = 'Apparel'; 
                            $flag_bra = 'Yes';
                            break; // Sports Bra
                    endswitch;
                    //echo "<br>prod_type = $prod_type <br>";                    
                endif;
				if ($ref_type_id == "1"): 
					$prod_group=$ref_id; 
					//echo "Prod_group found : $prod_group";					
					break; // Exit for as we dont need to know other ref_type_id
				endif;
            endforeach;
			//exit;
			if($brooks_style):
				foreach ($curr_product->Clrs->Clr as $curr_color):
					$color_idx = $curr_color->Id;
					$ccode = $curr_color->Code;
					$color_name = $curr_color->Name;
					$season = $width_code = $color_code = $size_ext = "";
					if ($prod_type == "Footwear"):
						$color_arr = explode("_", $ccode);
						$season = $color_arr[0];
						$style=$style_ap21;
						$width_code = $color_arr[1];
						$color_code = $color_arr[2];
					elseif($prod_type == "Apparel"):
						$style_len=strlen($style_ap21);
						
						if ($style_len=='9'):
							$style=substr($style_ap21,0,6);
							$color_code=substr($style_ap21,6,3);	
							if($flag_bra=='Yes'):
														
								$width_arr = explode("-", $ccode);			
								$width_arr_length=count($width_arr);
								echo "<br> This is Bra with Width - ".$ccode;		
								if($width_arr_length==2):
									$size_ext=$width_arr[1];
									echo "<br>---------- This will have Cup Size--".$size_ext."<br>";
								endif;
								print_r($width_arr);
							endif;							
						else:
							$style=$style_ap21;
							$color_code=substr($ccode,2,3);
							//echo "<Hr> ------- Apparel Product length : $style_ap21 - $ccode $color_code";
							//exit;
						endif;
					endif;
					echo "<br> $color_idx - $color_code - $color_name";
					foreach ($curr_color->SKUs->SKU as $curr_sku):
						$sku_idx = $curr_sku->Id;
						$barcode = $curr_sku->Barcode;
						$sequence = $curr_sku->Sequence;
						$size = $curr_sku->SizeCode;
						if($size_ext!=""):
							$size=$size.$size_ext;
						endif;
						echo "<br> :::::: $sku_idx - $barcode - $sequence - $sizeCode";
						$ins_sql = "insert ignore into ap21_import(style_idx,style_ap21,style,prodname,prod_type,flag_bra,
									color_idx,ccode,season,width_code,color_code,color_name,
									sku_idx,barcode,sequence,size,brand,category,prod_group) 
								values ('$style_idx','$style_ap21','$style','$prodname','$prod_type','$flag_bra',
									'$color_idx','$ccode','$season','$width_code','$color_code','$color_name',
									'$sku_idx','$barcode','$sequence','$size','$brand','$category','$prod_group')";
						echo "<br>ins_sql - " . $ins_sql;
						mysqli_query($conn, $ins_sql);
					endforeach;
				endforeach;
			endif; //if($brooks_style):
        endforeach;
		echo "<hr>Process Complete";
        exit;
    endif;
}

?>
