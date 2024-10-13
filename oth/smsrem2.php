<?php
 
    session_start();
if(!isset($_SESSION['admin'])){
    header("location: index.php");
     exit;
	}
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['id'])){
        @$id = $_GET['id'];
      }
    }
	
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 
	   $result = mysql_query(" SELECT * FROM client ") or die (mysql_error());
	     $num = mysql_num_rows($result);
	   
	 	 $i = 1 ; 
		 while($i<=$num){ $id = $i++ ; 

     $result = mysql_query(" SELECT * FROM client WHERE id = '$id' ") or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $name = $row['name'];
	 $phone = $row['phone'];
	
		
		$result1 = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE id = '$id' "); 
$row1 = mysql_fetch_assoc($result1); 
$amount = $row1['value_sum'];



$result2 = mysql_query("SELECT SUM(cash) AS value_sum FROM transact WHERE id = '$id' "); 
$row2 = mysql_fetch_assoc($result2); 
$cash = $row2['value_sum'];


$result3 = mysql_query("SELECT SUM(balance) AS value_sum FROM transact WHERE id = '$id' "); 
$row3 = mysql_fetch_assoc($result3); 
$balance = $row3['value_sum'];

if($balance != '0' && $balance != ''){
$msg = 'Hello '.$name.'! Your total transaction summary is as follow, Total Amount: '.$amount.', Cash Paid: '.$cash.', Balance: '.$balance.'. Please pay your balance as soon as possible. 08032318588' ;	 

$msg1 = urlencode($msg) ;

$senderid = 'LumenChris' ;
$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg1";
   
$ret = file($url);

if($ret){

$ers="SMS has been sent to ".strtoupper($name) ;

$_SESSION['ers'] = $ers ;

$status = "Sent" ;
}

else{

$ers="SMS not sent";

$_SESSION['ers'] = $ers ;

$status = "Not Sent" ;
}

	$sql5 = "INSERT INTO smsrec (id,recip,phone,msg,count,rep,today,category,status)
VALUES('$id','$name','$phone','$msg','1','$rep','$today','reminder','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());

		 } }
header('location:clientsms.php') ;
;?>
