<?php
 
    session_start();
	if(!isset($_SESSION['admin'])){
     header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['sn'])){
        @$sn = $_GET['sn'];
      }
    }
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');		
	 
	 

	     $sql =" SELECT * FROM smsrec WHERE sn = '$sn' LIMIT 1 ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	
	$msg = $row['msg'];
	$phone = $row['phone'];
	$senderid = 'Trenet' ;
	 $msg1 = urlencode($msg);

	
	

$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=testing&password=testgni&sender=$senderid&recipient=$phone&message=$msg1";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";

$status = "Sent" ;

$sql3 = "UPDATE smsrec SET status = '$status', rep = '$rep' WHERE sn = '$sn' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());

if($res3){
	header('location:sms2.php');
	exit ;
}
}
else{ $status = "Not Sent"  ;

$sql3 = "UPDATE smsrec SET status = '$status', rep = '$rep' WHERE sn = '$sn' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());

if($res3){
	header('location:sms2.php');
	exit ;
} }

;?>
