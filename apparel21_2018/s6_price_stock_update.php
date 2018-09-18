<?php
include "server.php";
$start = microtime(true);
ini_set('max_execution_time', 900);
$status_arr = array();
$time_elapsed_secs = 0;
foreach($server_arr as $type=>$curr_server):	
	generate_sync_table($curr_server);
	$ins_id = insert_app21_log($curr_server);	
	//echo "<br>ins_id=$ins_id";
	process_ap21($curr_server,$type,$ins_id);	
	rename_temp_real($curr_server);
//echo "<hr> PROCESS COMPLETE. ";
endforeach;
echo "<hr> Time taken for step : " . (microtime(true) - $start) . " Seconds";
echo "<br> PROCESS COMPLETE. ";
echo "<br> <a href='s7_send_report.php'>Goto send Report <a> ";
exit;

$conn->close();

function table_exist($tablename,$curr_server){	
	$db =$curr_server["dbname"];
	$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	$sql = "SHOW TABLES FROM  `" . $db . "` WHERE  `Tables_in_" . $db . "` LIKE  '$tablename'";
	$result = $conn->query($sql);
	$rec_count = $result->num_rows;	
	if ($rec_count==1):
		return true;
	else:
		return false;
	endif;	
}

function rename_temp_real($curr_server){
	
	$timer = microtime(true);
	$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	
	 echo "<hr><h3>".$curr_server["server_type"]." : Step 4 - Renaming temporary tables to actual tables</h3>";
		
	$sync_name=date('Ymd_His');
	
	$prod_barcode_exist=table_exist('prod_barcode',$curr_server);
	$prod_barcode_sync_exist=table_exist('prod_barcode_autosync',$curr_server);

	
	if($prod_barcode_exist and $prod_barcode_sync_exist):	
		$sql="RENAME TABLE `prod_barcode` TO `prod_barcode_".$sync_name."`";
		$conn->query($sql);
		echo "<br> $sql ";
		
		$sql="RENAME TABLE `prod_barcode_autosync` TO `prod_barcode`";
		$conn->query($sql);	
		echo "<br> $sql ";
	endif;

	
	$prod_variation_exist=table_exist('prod_variation',$curr_server);
	$prod_variation_sync_exist=table_exist('prod_variation_autosync',$curr_server);	

	if($prod_variation_exist and $prod_variation_sync_exist):	
		$sql="RENAME TABLE `prod_variation` TO `prod_variation_".$sync_name."`";
		$conn->query($sql);
		echo "<br> $sql ";
		
		$sql="RENAME TABLE `prod_variation_autosync` TO `prod_variation`";
		$conn->query($sql);	
		echo "<br> $sql ";
	endif;
}

function process_ap21($curr_server,$type,$inserted_id) {
    $timer = microtime(true);
	$server_type=$curr_server["server_type"];
	$data = file_get_contents('api_data.xml');
    $products = simplexml_load_string($data);
	$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	
	echo "<hr><h3>".$curr_server["server_type"]." : Step 3 - Call Product API & Process the XML to update data</h3>";

	// Checking if products are available
	if ($products === false  || !empty($products->ErrorCode)) {
		$reason = "failed to load xml";
		$status = "error";
		$sql = "UPDATE `app21_log` SET `status` = '".$status."' , `reason` = '".$reason."' WHERE `id` = ".$inserted_id.";";
		$conn->query($sql);
		//echo "<br> affected rows:".$conn->affected_rows;
		echo "Failed loading XML\n";
		foreach(libxml_get_errors() as $error) {
			echo "\t", $products->ErrorCode."<br />".$products->Description;
		}
		exit;
	}
	//include_once "server.php";
	echo "<br> $servername , $username , $password , $dbname";
    
	$status = "working";
	$sql = "UPDATE `app21_log` SET `status` = '".$status."' WHERE `id` = ".$inserted_id.";";
	echo "<br> $sql";
	$conn->query($sql);
	//echo "<br> affected rows:".$conn->affected_rows;


	$old_style="";$old_color="";$cnt=0;

	if(count($products->Product) > 0):
	
		$query = "TRUNCATE TABLE ap21_barcode";
        if ($conn->query($query) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
		
		$upd_sql="Update prod_barcode_autosync set visible='No'";
		$conn->query($upd_sql);
		$current_date = date('Y-m-d');


		foreach($products->Product as $curr_product):

			$style 		=$curr_product->Code;
			$prodname 	=$curr_product->Name;
			$style_idx 	=$curr_product->Id;
			
			foreach($curr_product->Clrs->Clr as $curr_color):		
				$color_idx = $curr_color->Id;
				$color_code = $curr_color->Code;									
				$color_name = $curr_color->Name;
				$release_dt = get_release_date($conn,$color_idx);
				echo "<br>---$release_dt";
				if($release_dt=="") $release_dt_str="0000-00-00"; else $release_dt_str=$release_dt;
				//echo "<br>$color_idx - SKU - STYLE - COLOR - SIZE - PRICE - ORG. PRICE - STOCK";
				foreach($curr_color->SKUs->SKU as $curr_sku):
									
					$org_price 	=$curr_sku->OriginalPrice;
					$price 		=$curr_sku->Price;
					$stock 		=$curr_sku->FreeStock;
					$sku_id 	=$curr_sku->Id;
					$price_sale	=$price;

					$cnt++;
					
					$update_set = "price=$org_price,price_sale=$price_sale,ap21_stock=$stock,release_date='$release_dt_str',
								style_idx='$style_idx',color_idx='$color_idx'";
								
					/*echo "<br> ::::: org_price - price = ".($org_price-$price);
					
					if($org_price!=$price) echo "<br>Item on Sale";
								
					if($org_price-$price==0) $price_sale=0;	*/
								
					if ($server_type != "Sandbox"): // For Live & Test
							if ($release_dt == ''):
								//Visible should be No.. its made yes only for testing
								$upd_sql="update prod_barcode_autosync 
										set $update_set , season='Current', visible='No',reason_no='Release date blank'
										where barcode='$sku_id'";	
							elseif($release_dt > $current_date):
								//Visible should be No.. its made yes only for testing
								$upd_sql="update prod_barcode_autosync 
										set $update_set , season='Current', visible='No',reason_no='Release date Future'
										where barcode='$sku_id'";														
							elseif($release_dt <= $current_date):				
								if($stock>=1):				
									$upd_sql="update prod_barcode_autosync 
												set $update_set , season='Current', visible='Yes',reason_no=''
												where barcode='$sku_id'";																
								else:
									$upd_sql="update prod_barcode_autosync 
											set $update_set , season='Current', visible='No',reason_no='Insufficient Stock'
											where barcode='$sku_id'";									
								endif;													
							endif;
							echo "<br> Current - " . $upd_sql;
							if ($conn->query($upd_sql) === FALSE):
								echo "<br> Error: " . $upd_sql . "<br>" . $conn->error;
							endif;		
					else:
							if ($release_dt == ''):
								$upd_sql="update prod_barcode_autosync 
										set $update_set , season='Sandbox', visible='No',reason_no='Release date blank'
										where barcode='$sku_id'";	
							elseif($release_dt > $current_date):
								//echo "-------------------";
								$upd_sql="update prod_barcode_autosync 
										set $update_set , season='Sandbox', visible='Yes'
										where barcode='$sku_id'";														
							elseif($release_dt <= $current_date):
								$upd_sql="update prod_barcode_autosync 
										set $update_set , season='Sandbox', visible='No',reason_no='Release date Past'
										where barcode='$sku_id'";
							endif;													
							//echo "<br> Sandbox - " . $upd_sql;
							if ($conn->query($upd_sql) === FALSE):
								echo "Error: " . $upd_sql . "<br>" . $conn->error;
								exit;
							endif;
							$conn->query($upd_sql);
					endif;							
					$curr_dt=date('Y-m-d');
					$ins_sql = "insert into ap21_barcode(style_idx,color_idx,barcode,skuid,style,prodname,curr_dt) 
							values ('$style_idx','$color_idx','$barcode',$sku_id,'$style','$prodname','$curr_dt')";
					mysqli_query($conn,$ins_sql);		
					 
				endforeach;
			endforeach;
		endforeach;
		
		$sql = "update prod_barcode_autosync set price_sale=0 where  price=price_sale;";
		echo "<br> $sql";
		$conn->query($sql);
		
		$status = "complete";
		$sql = "UPDATE `app21_log` SET `status` = '".$status."' WHERE `id` = ".$inserted_id.";";
		echo "<br> $sql";
		$conn->query($sql);
		echo "<br> affected rows:".$conn->affected_rows;
		echo "Process Status - $ret_val <hr>";
		
		/* Process for sale items */
		//Step 1 - Remove all items from Sale
		$sql="update prod_variation_autosync set tag=replace(tag,',Sale,','') where tag like '%Sale%'";
		$conn->query($sql);
		echo "<br> 1. Removed the Sale tag affected rows:".$conn->affected_rows;
		//echo "<br> 1. Removed the Sale tag";
		//Step 2 - Add Sale Tag for items having sale_price
		
		$sql="update prod_variation_autosync a, prod_barcode_autosync b
				set tag=concat(tag,',Sale,')
				where a.style=b.style and a.color_code=b.color_code and price>price_sale and price_sale!=0 and tag not like '%Sale%'";
				// where a.style=b.style and a.color_code=b.color_code and b.visible = 'Yes' and price>price_sale and price_sale!=0 and tag not like '%Sale%'";
		$conn->query($sql);
		echo "<br> 2. Added the Sale tag : <br> $sql <br>affected rows:".$conn->affected_rows;		
		
		/* Process for updating style_idx in prod_mast table */
		/*$sql="update prod_mast a, prod_barcode b
				set a.style_idx=b.style_idx
				where a.style=b.style and b.visible='Yes'";
		$conn->query($sql);
		echo "<br> affected rows:".$conn->affected_rows;
		echo "<br> 3. Updated prod_mast style_idx";*/
		
		/* Process for updating style_idx and color_idx in prod_variation table */
		/*$sql="update prod_variation_autosync a, prod_barcode b
				set a.color_idx=b.color_idx,a.style_idx=b.style_idx
				where a.style=b.style and a.color_code=b.color_code and b.visible='Yes'";
		$conn->query($sql);
		echo "<br> affected rows:".$conn->affected_rows;
		echo "<br> 4. Updated prod_variation style_idx, color_idx";	*/	
		
		
	endif;
}


function insert_app21_log($curr_server) {
    $timer = microtime(true);
	$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	echo "<hr><h3>".$curr_server["server_type"]." : Step 2 - Insert Log in app21_log table</h3>";	
	$sql = "INSERT INTO `app21_log` (`id`, `status`, `reason`, `start_time`, `end_time`) VALUES (NULL, 'start', '', NOW(), CURRENT_TIMESTAMP);";
	$conn->query($sql);
	$inserted_id = $conn->insert_id;
	echo "<br>$sql<br> inserted_id".$inserted_id;
	return $inserted_id;
}
function generate_sync_table($curr_server) {
    $timer = microtime(true);
	
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
    echo "<h2>".$curr_server["server_type"]." : Step 1 - Create table prod_barcode_sync and prod_variation_sync</h2>";
    $table_arr = array("prod_barcode_autosync","prod_variation_autosync");

    $count = 1;
    foreach ($table_arr as $table) {        
        $sql = "SHOW TABLES FROM  `" . $curr_server["dbname"] . "` WHERE  `Tables_in_" . $curr_server["dbname"] . "` LIKE  '$table'";
        echo $sql . "<br>";
        $result = $conn->query($sql);
        if ($result->num_rows != 0) {            
            $sql = "DROP TABLE $table";
            $conn->query($sql);
        }
        $orig_table = str_replace('_autosync', '', $table); // removes _sync 
        //Create prod_barcode_sync
        $sql = "CREATE TABLE IF NOT EXISTS $table LIKE $orig_table";
        $conn->query($sql);
        echo "<br>SQL : " . $sql;

        //Populate prod_barcode_sync
        $sql = "INSERT $table SELECT * FROM $orig_table";
        $conn->query($sql);
        echo "<br>SQL : " . $sql . "<br>";
        $count++;
    }
    echo "Time taken : " . (microtime(true) - $timer) . " Seconds";
}


function get_release_date($conn,$color_idx = 0) {
    $release_date = "";
    //$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
   
   $sql = "SELECT release_dt FROM ap21_colour WHERE clridx = " . $color_idx;
   //echo "<br> $sql";
    $result = $conn->query($sql);
    if (isset($result->num_rows) && $result->num_rows > 0):
        $result_arr = ($result->fetch_assoc());
        $release_dt = (isset($result_arr) && !empty($result_arr)) ? $result_arr['release_dt'] : "";
        $release_date = ($release_dt == "") ? '0000-00-00' : date('Y-m-d', strtotime($release_dt)); // to avoid 1970-01-01
    endif;
	echo "<br> Release Date =<br> ".$release_date;
	//exit;
    return $release_date;
}
?>
