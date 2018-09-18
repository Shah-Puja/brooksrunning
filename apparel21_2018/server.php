<?php
/*function create_connection($servername="", $username="", $password="", $dbname=""){
	$servername = "test.texaspeak.com.au";
	$username 	= "texaspea_brnew";
	$password 	= "Test2000!";
	$dbname 	= "texaspea_new";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	return $conn; 
}*/

$server_arr["current"]=array("servername" => "test.texaspeak.com.au",
							"username" => "texaspea_brnew",
							"password" => "Test2000!",
							"dbname" => "texaspea_new",
							"server_type"=>"Test",
							"report_to"=>"sygtest@gmail.com"); 								
							
// App21 Live URL
$country_code="AUFIT";
$app21_url="https://api.texaspeak.com.au:8525/RetailAPIFIT_LIVE";
date_default_timezone_set('Australia/Brisbane');

?>