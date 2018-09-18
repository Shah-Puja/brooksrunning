<?php		
include_once "server.php";
$start = microtime(true);
ini_set('max_execution_time', 0);
$status_arr = array();
$time_elapsed_secs = 0;
foreach($server_arr as $type=>$curr_server):
	if($type=='sandbox'):
		sandbox_status($curr_server,$type,$status_arr);
	else:
	  current_status($curr_server,$type,$status_arr);
	endif;
	echo "<hr>";
	//exit;
endforeach;
echo "<hr> Time taken for step : " . (microtime(true) - $start) . " Seconds";
echo "<br> PROCESS COMPLETE. ";
exit;

function get_count($conn,$sql) {
    $cnt = 0;
	//echo "<br>$sql";
	//$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	//if (mysqli_connect_error()) {
    //die('Connect Error (' . mysqli_connect_errno() . ') '
          //  . mysqli_connect_error());
//}

	//echo "<br> $sql";  
	if ($conn->query($sql) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
			exit;
        }
    $result = $conn->query($sql);
	//print_r($result);
    $result_cnt = $result->fetch_assoc();
    $cnt = $result_cnt['cnt'];
	//echo "<br>-  cnt =  $cnt";
    return $cnt;
} 

function current_status($curr_server,$server_key,$status_arr = array()) {
global $app21_url;
	//print_r($curr_server);exit();
    $conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	
	$ap21_sku= get_count($conn,"SELECT count(*) as cnt FROM ap21_barcode");
	$web_sku= get_count($conn,"SELECT count(*) as cnt FROM `prod_barcode`");
	$common_sku=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid");
	$ap21_nomatch=get_count($conn,"select count(*)as cnt from ap21_barcode where skuid not in (select barcode from prod_barcode)");
	$web_nomatch=get_count($conn,"select count(*) as cnt from prod_barcode where barcode not in (select skuid from ap21_barcode)");	
	
	$future_reldt=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date>now()");
	$current_reldt=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date<=now()");
	$stock_sufficient=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date<=now() and ap21_stock>=1");
	$stock_insufficient=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date<=now() and ap21_stock<1");
	//$image_present=get_count($curr_server,"select count(*) as cnt from prod_barcode where Image_exist='Yes' and release_date<=now() and ap21_stock>=1");
	//$image_absent=get_count($curr_server,"select count(*) as cnt from prod_barcode where Image_exist='No' and release_date<=now() and ap21_stock>=1");
	$visible_sku=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid  and visible='Yes'");

	
	$server_type=$curr_server["server_type"];
	//$report_url=$curr_server["report_url"];
	$report_to=$curr_server["report_to"];	
	
	
	$sql_log = "INSERT INTO daily_log (server, ap21_sku, web_sku , common_sku, ap21_nomatch, web_nomatch,future_sku, current_sku, stock_sufficient, stock_insufficient,image_present, image_absent,visible_sku)
VALUES ('$server_type', '$ap21_sku', '$web_sku','$common_sku','$ap21_nomatch','$web_nomatch','$future_reldt','$current_reldt','$stock_sufficient','$stock_insufficient','$visible_sku')";
	$conn->query($sql_log);
	
	//echo "<br> $sql_log";
	//echo "<br> future_reldt = $future_reldt";
	//echo "<br> current_reldt = $current_reldt";
	
	$to = $report_to;	
    //$to = 'purvi.cshah@gmail.com,anylilawala@gmail.com';
    $subject = 'Brooks Daily process - '.$server_type;
    $headers = "";
    $headers .= "From: Brooks <sygtest@gmail.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><html><body>';
    $message .= '<html><body><div style="font-family:Arial, Helvetica, sans-serif;color:#000;">
<center>
    <table width="620" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;font-weight:normal;">      
      <tr>        
          <td><B>'.$server_type.' Environment</B></td>
      </tr>
	  <tr>
		<td>Report Dated : '.date('Y-m-d').'</td>	  
      </tr>
	 </table>

	 <table width="620" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;font-weight:normal;" cellpadding="2">      	  
      <tr>
        <td width="60%" align="right">Total SKUs(Present in Product XML of AP21 api) -</td>
          <td width="40%" align="left">'.$ap21_sku.'</td>
      </tr>
      <tr>
        <td align="right" >Total SKUs(Present in Barcode Table of Web Data) - </td>
          <td align="left">'.$web_sku.'</td>
      </tr>
      <tr>
        <td align="right">SKUs on web with nomatch in Ap21 -</td>
          <td align="left" >'.$web_nomatch.'</td>
      </tr>
      <tr>
        <td align="right">SKUs in AP21 with nomatch in web table</td>
          <td align="left">'.$ap21_nomatch.'</td>		  
      </tr>	  
      <tr>
        <td align="right">SKUs present in Both (AP21 and Web) -</td>
          <td align="left" >'.$common_sku.'</td>
      </tr>	  
	  </table>
		  
	<table width="720" border="1" cellspacing="0" cellpadding="5" style="font-size:12px;font-weight:normal;border:solid 1px #999;">
      <tr>
          <td><strong>Release Date Check</strong></td>
          <td bgcolor="#6699FF"  align="center"><strong>release date &gt; today<br>Future</strong><br> Not Visible</td>
          <td bgcolor="#6699FF" align="center" colspan=3><strong>release date &lt;= today.<br>Past+Today</strong><br>Visible</td>
      </tr>
      <tr>
          <td>Out of '.$common_sku.' SKUs</td>
          <td align="center">'.$future_reldt.'</td>
          <td align="center"  colspan=3 >'.$current_reldt.'</td>
      </tr>
      <tr>
          <td align="left" width="220"><strong>Stock Check</strong></td>
          <td bgcolor="#CCCCCC" width="200">&nbsp;</td>		  
          <td bgcolor="#6699FF" width="100" colspan=2 ALIGN="center"><strong>Stock>=1<br>In Stock</strong><br>Visible</td>
          <td bgcolor="#6699FF" width="100" ALIGN="center"><strong>Stock<1<br>Out of Stock</strong><br>Not Visible</td>
      </tr>
      <tr>
          <td>Out of '.$current_reldt.' Visible SKUs</td>
          <td bgcolor="#CCCCCC">&nbsp;</td>		  
          <td align="center" colspan="2">'.$stock_sufficient.'</td>
          <td align="center">'.$stock_insufficient.'</td>
      </tr>
      <tr>
          <td align="right" bgcolor="#6699FF" colspan=2><strong>No. Of.Visible SKUs: </td>      
		  <td align="center" bgcolor="#6699FF"><strong>'.$visible_sku.'</strong></td>		  
          <td bgcolor="#CCCCCC" colspan=2>&nbsp;</td>  	  
      </tr>	  
    </table>
	
  </center>
</div>
';
    $message .= '</body></html>';
    print_r($message);

    mail($to, $subject, $message, $headers);	

}

function sandbox_status($curr_server,$server_key,$status_arr = array()) {
global $app21_url;
	$conn = new mysqli($curr_server["servername"], $curr_server["username"], $curr_server["password"], $curr_server["dbname"]);
	
	$ap21_sku= get_count($conn,"SELECT count(*) as cnt FROM ap21_barcode");
	$web_sku= get_count($conn,"SELECT count(*) as cnt FROM `prod_barcode`");
	$common_sku=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid");
	$ap21_nomatch=get_count($conn,"select count(*)as cnt from ap21_barcode where skuid not in (select barcode from prod_barcode)");
	$web_nomatch=get_count($conn,"select count(*) as cnt from prod_barcode where barcode not in (select skuid from ap21_barcode)");	
	
	$future_reldt=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date>now()");
	$current_reldt=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date<=now()");
	$stock_sufficient=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date<=now() and ap21_stock>=1");
	$stock_insufficient=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid and release_date<=now() and ap21_stock<1");
	//$image_present=get_count($curr_server,"select count(*) as cnt from prod_barcode where Image_exist='Yes' and release_date<=now() and ap21_stock>=1");
	//$image_absent=get_count($curr_server,"select count(*) as cnt from prod_barcode where Image_exist='No' and release_date<=now() and ap21_stock>=1");
	$visible_sku=get_count($conn,"select count(*) as cnt from prod_barcode a,ap21_barcode b where a.barcode=b.skuid  and visible='Yes'");

	
	$server_type=$curr_server["server_type"];
	//$report_url=$curr_server["report_url"];
	$report_to=$curr_server["report_to"];	
	
	
	$sql_log = "INSERT INTO daily_log (server, ap21_sku, web_sku , common_sku, ap21_nomatch, web_nomatch,future_sku, current_sku, stock_sufficient, stock_insufficient,image_present, image_absent,visible_sku)
VALUES ('$server_type', '$ap21_sku', '$web_sku','$common_sku','$ap21_nomatch','$web_nomatch','$future_reldt','$current_reldt','$stock_sufficient','$stock_insufficient','$visible_sku')";
	$conn->query($sql_log);
	
	//echo "<br> $sql_log";
	//echo "<br> future_reldt = $future_reldt";
	//echo "<br> current_reldt = $current_reldt";
	
    $to = $report_to;
	//$to = 'purvi.cshah@gmail.com';
    $subject = 'Brooks Daily process - '.$server_type;
    $headers = "";
    $headers .= "From: Brooks <sygtest@gmail.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><html><body>';
    $message .= '<html><body><div style="font-family:Arial, Helvetica, sans-serif;color:#000;">
<center>
    <table width="620" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;font-weight:normal;">      
      <tr>        
          <td><B>'.$server_type.' Environment</B></td>
      </tr>
	  <tr>
		<td>Report Dated : '.date('Y-m-d').'</td>
      </tr>
	 </table>

	 <table width="620" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;font-weight:normal;" cellpadding="2">      	  
      <tr>
        <td width="60%" align="right">Total SKUs(Present in Product XML of AP21 api) -</td>
          <td width="40%" align="left">'.$ap21_sku.'</td>
      </tr>
      <tr>
        <td align="right" >Total SKUs(Present in Barcode Table of Web Data) - </td>
          <td align="left">'.$web_sku.'</td>
      </tr>
      <tr>
        <td align="right">SKUs on web with nomatch in Ap21 -</td>
          <td align="left" >'.$web_nomatch.'</td>
      </tr>
      <tr>
        <td align="right">SKUs in AP21 with nomatch in web table</td>
          <td align="left">'.$ap21_nomatch.'</td>		  
      </tr>	  
      <tr>
        <td align="right">SKUs present in Both (AP21 and Web) -</td>
          <td align="left" >'.$common_sku.'</td>
      </tr>	  
	  </table>
	  
	  <table width="620" border="1" cellspacing="0" cellpadding="5" style="font-size:12px;font-weight:normal;border:solid 1px #999;">
      <tr>
          <td><strong>Release Date Check</strong></td>
          <td bgcolor="#6699FF"  colspan=2 align="center"><strong>release date &gt; today<br>Future</strong><br>Visible</td>
          <td bgcolor="#6699FF" align="center"><strong>release date &lt;= today.<br>Past+Today</strong><br>Not Visible</td>
      </tr>
      <tr>

          <td>Out of '.$common_sku.' SKUs</td>
          <td align="center" colspan=2>'.$future_reldt.'</td>
          <td align="center" >'.$current_reldt.'</td>
      </tr>
      <!--<tr>

          <td align="left" width="220"><strong>Image Exist Check</strong></td>
          <td bgcolor="#6699FF" width="100" ALIGN="center"><strong>Image Exists</strong><br>Visible</td>
		  <td bgcolor="#6699FF" width="100" ALIGN="center"><strong>Image Missing</strong><br>Not Visible</td>
          <td bgcolor="#CCCCCC" width="200">&nbsp;</td>
      </tr>
      <tr>

          <td>Out of '.$future_reldt.' Visible SKUs</td>
          <td align="center">'.$image_present.'</td>
          <td align="center">'.$image_absent.'</td>
          <td bgcolor="#CCCCCC">&nbsp;</td>
      </tr>
      <tr>

          <td align="right" bgcolor="#6699FF" colspan="2"><strong>No. of.Visible SKUs : <strong>'.$visible_sku.'</strong></td>
		  <td bgcolor="#CCCCCC" colspan="2">&nbsp;</td>         

      </tr>-->
    </table>
	<!--<table  width="620" border="0" cellspacing="0" cellpadding="5" style="font-size:12px;font-weight:normal;">
      <tr>
          <td><a target="_blank" href="' . $report_url . '/apparel21/missing_image_report.php?server_type='.$server_key.'">Click here</a> to view Missing Image Report</td>
      </tr>
      <tr>
          <td><a target="_blank" href="' . $report_url . '/apparel21/missing_barcode_report.php?server_type='.$server_key.'">Click here</a> to view barcode exception Report</td>
      </tr>-->
      <!--<tr>
          <td><a target="_blank" href="' . $report_url . '/apparel21/visible_barcode_report.php?server_type='.$server_key.'">Click here</a> to view visibility exception Report(Skus which are not visible)</td>
      </tr>-->
    </table>
  </center>
</div>
';
    $message .= '</body></html>';
    print_r($message);

    mail($to, $subject, $message, $headers);
}


?>