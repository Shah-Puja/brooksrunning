<?php include "server.php";
libxml_use_internal_errors(true);
$file = $app21_url . "/Products?countryCode=" . $country_code;

/*
Date -26-Mar-18
We are making a full call bcoz Brooks & MC products are stored under differnt brand.
After a month or so they are going to combine this. Once that is done, we can add &query=1,4391 in query
*/
//$file = $app21_url . "/Products?countryCode=" . $country_code."&query=1,4391";
//refid : 1347 = 4391 means its a brooks Product
echo "<br> Ap21 Api Call - " . $file;
$headers = array(
    "GET HTTP/1.1",
    "Content-type: text/xml",
    "Accept: Version_2.0"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 900);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

$data = curl_exec($ch);
$products = simplexml_load_string($data);
print_r($data);

$prod_xml = 'api_data.xml';
if (file_exists($prod_xml)):
    $new_name = date('YmdHis') . '_api_data.xml';
    rename("api_data.xml", "product_xml/" . $new_name);
endif;

//exit;
$success = file_put_contents('api_data.xml', $data);
//file_put_contents() 
$curr_server = $server_arr["current"];
$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
// This line is very IMP.. reconnect is required because.. for some reason we are loosing connection after API call.
// Checking if products are available

if ($products === false || !empty($products->ErrorCode)):
    foreach (libxml_get_errors() as $error) {
        echo "\t", $products->ErrorCode . "<br />" . $products->Description;
    }
    exit;
else:
    //echo "insert query";
    $curr_dt = date('Y-m-d H:i:s');
    $prod_sql = "insert into ap21_api(`api_name`,`api_url`,`created_dt`) value('product','$file','$curr_dt')";
    //echo "<br> $prod_sql";
    if ($conn->query($prod_sql) === FALSE):
        echo "Error: " . $query . "<br>" . $conn->error;
    endif;
endif;
$conn->close();
echo "<br> Time taken : " . (microtime(true) - $start) . " Seconds";
echo "<hr> <a href='s2_import_product_api.php'>Goto Next Process (1 of 2) - Generate ap21_import table <a> ";
?>