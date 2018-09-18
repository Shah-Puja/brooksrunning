<?php

include "server.php";
$dbname = $server_arr["current"]["dbname"];
$conn = create_connection($servername, $username, $password, $dbname);

foreach ($server_arr as $type => $curr_server) {
    $table_arr = array("prod_mast", "prod_variation", "prod_barcode");
    $action = (isset($_GET["action"])) ? $_GET["action"] : "";
    if ($action == "") {
        echo "Typical Call to this script :"
        . "<ul><li> Step 1: Generate New tables <a href='s4_generate_webdata.php?action=generate'>s4_generate_webdata.php?action=generate</a></li>
            <li> Step 2: Update Product Notes <a href='s4_generate_webdata.php?action=update'>s4_generate_webdata.php?action=update</a></li>
             <li> Step 3: Queries to adjust data <a href='s4_generate_webdata.php?action=setup'>s4_generate_webdata.php?action=setup</a></li>
            <li> Step 4: Rename to live <a href='s4_generate_webdata.php?action=rename'>s4_generate_webdata.php?action=rename</a></li>  
					</ul>";
    } else if ($action == "generate") {
        echo "<h3>Take backup & using ap21_import generate prod tables and update seqno of prod_barcode table</h3>";
        generate_table($curr_server, $table_arr, $conn);
    } else if ($action == "update") {
        echo "<h3>Update fields</h3>";
        update_table($curr_server, $table_arr, $conn);
    } else if ($action == "setup") {
        echo "<h3>Setup prod_type,threshold,seqno and pricing module</h3>";
        setup_table($curr_server, $table_arr, $conn);
    } else if ($action == "rename") {
        rename_table($curr_server, $table_arr, $conn);
    }
}

function generate_table($curr_server, $table_arr, $conn) {
    foreach ($table_arr as $table) {
        $bkp_table = $table . '_bkp_' . date('Ymd_His');
        $new_table = $table . '_new';
        $sql = "SHOW TABLES FROM  `" . $curr_server["dbname"] . "` WHERE  `Tables_in_" . $curr_server["dbname"] . "` LIKE  '$new_table'";
        $result = $conn->query($sql);
        if (isset($result) && !empty($result)) {
            if ($result->num_rows != 0) {
                $sql = "DROP TABLE $new_table";
                $conn->query($sql);
                echo $sql . "<br>";
            }
        }

        $sql1 = "CREATE TABLE IF NOT EXISTS $new_table LIKE $table";
        $conn->query($sql1);
        echo "<br>SQL : " . $sql1 . "<br><hr/>";
    }
    $sql = "INSERT IGNORE INTO prod_barcode_new(style,prod_type,color_code,width_code,season,size,barcode,sku,style_idx,color_idx,seqno) 
	SELECT style,prod_type,color_code,width_code,season,size,sku_idx,barcode,style_idx,color_idx,sequence FROM ap21_import where prod_type in('Apparel','Footwear')";
    //$sql = "INSERT INTO prod_barcode_new(style,color_code,sku,barcode,style_idx,color_idx) SELECT style,color_idx,skuid,barcode,style_idx,color_idx FROM ap21_import";
    $conn->query($sql);
    echo "<br>Prod_barcode SQL : " . $sql . "<br>";
    $sql = "INSERT IGNORE INTO prod_variation_new(style,color_code,style_idx,color_idx,width_code,prod_type) 
		SELECT DISTINCT style,color_code,style_idx,color_idx,width_code,prod_type FROM ap21_import";
    $conn->query($sql);
    echo "<br>Prod_variation SQL : " . $sql . "<br>";

    $sql = "INSERT IGNORE INTO prod_mast_new(style,style_idx,prod_type,flag_bra) 
		SELECT DISTINCT style,style_idx,prod_type,flag_bra FROM ap21_import";
    $conn->query($sql);
    echo "<br>Prod_mast SQL : " . $sql . "<br>";

    //Set ap21_notes_distinct and ap21_notes 
    $sql = "UPDATE ap21_notes_distinct SET note_processed='No'";
    $conn->query($sql);

    $sql = "UPDATE ap21_notes SET processed='No'";
    $conn->query($sql);

    $sql = "UPDATE ap21_notes_map SET processed='No'";
    $conn->query($sql);

    echo "<br/><a href='s4_generate_webdata.php?action=update'>Next Step - Update</a>";
}

function update_table($curr_server, $table_arr, $conn) {
    //Set ap21_notes_distinct and ap21_notes 
    $sql = "SELECT * FROM ap21_notes_map 
			WHERE web_table in('prod_mast','prod_variation','prod_barcode') and rtype='1-1' and sync='Yes' 
			and processed='No'";
    echo "$sql<hr>";
    //exit;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $id = $row['id'];
            $code = $row['code'];
            $web_table = $row['web_table'];
            $web_field = $row['web_field'];
            $note_type = $row['note_type'];
            if (strtolower($note_type) == 'style') {
                $join_crit = " a.style_idx = b.style_idx ";
            } else {
                $join_crit = "a.color_idx = b.color_idx ";
            }
            // We do not need to clean up previous data bcoz its a fresh data generation.
            // Cleaning before updating is creating issues in notes like C_IMAGE. this field is set by product and by color.
            //$clean_query="update {$web_table}_new set $web_field=''";
            //$conn->query($clean_query);	

            $upd_query = "update {$web_table}_new a, ap21_notes b set a.$web_field=b.note  
				where $join_crit and b.code='$code' and note!=''";
            $conn->query($upd_query);
            $id_query = "update ap21_notes_map set processed='Yes' where id=$id";
            $conn->query($id_query);
            echo "<Hr> $upd_query <br> $id_query";
        }
    }
    echo "<br><a href='s4_generate_webdata.php?action=setup'>Next Step - Setup</a>";
}

function setup_table($curr_server, $table_arr, $conn) {
    //Step 4.1 : Set seqno of all products in prod_barcode table
    echo "<h4>Set seqno of all products in prod_barcode table</h4>";
    $sql = "UPDATE prod_barcode_new a, sequence_mast b SET a.seqno = b.seqno WHERE a.size = b.size";
    $conn->query($sql);
    echo "<br>SQL : " . $sql . "<br><hr>";


    $sql = 'update prod_barcode_new set width_name=replace(width_name," ","")';
    $conn->query($sql);
    echo "<br>SQL :  $sql <br><hr>";

    $sql = 'update prod_variation_new set color_filter=replace(color_filter," ","")';
    $conn->query($sql);
    echo "<br>SQL :  $sql <br><hr>";

    $sql = 'update prod_variation_new set arch=replace(arch," ","")';
    $conn->query($sql);
    echo "<br>SQL :  $sql <br><hr>";


    $sql = "UPDATE prod_barcode_new SET size='' WHERE size='-'";
    $conn->query($sql);
    echo "<br>SQL : " . $sql . "<br><hr>";
    echo "<br/><a href='s4_generate_webdata.php?action=rename'>Next Step - Rename</a>";
}

function rename_table($curr_server, $table_arr, $conn) {
    foreach ($table_arr as $table) {
        //Backup table
        $backup_name = $table . "_" . date('Ymd_His');
        $sql = "RENAME TABLE $table TO $backup_name";
        $conn->query($sql);
        echo "<br>SQL : " . $sql . "<br>";
        //Rename new table
        $orig_name = $table . "_new";
        $sql = "RENAME TABLE $orig_name TO $table";
        $conn->query($sql);
        echo "<br>SQL : " . $sql . "<br>";
        echo "<hr>";
    }
    echo "<b>Process completed</b>";
}
