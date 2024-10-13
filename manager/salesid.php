<?php
 
error_reporting(0);
    session_start();
if(!isset($_SESSION['admin'])){
   header("location: index.php");
     exit;
	}
	
	if($_GET['dis']){
	$dis = $_GET['dis'];
	$_SESSION['dis'] = $dis;
	} 
	 $dis = $_SESSION['dis'];
	//elseif(isset($_SESSION['dis'])){$dis = $_SESSION['dis'];} else{$dis = '0' ;}
	
	
	include("includes/connect.inc.php");
	    // $result = mysql_query(" SELECT * FROM dispense WHERE id = '$dis' ") or die (mysql_error());
	 
	// $row = mysql_fetch_assoc($result);
	// $_SESSION['dispensary'] = $row['company'];
	
$query=mysql_query("select * FROM transact WHERE id = '0' AND dis = '$dis' ORDER BY sn DESC LIMIT 1 " )or die(mysql_error());
 $num = mysql_num_rows($query); 
	$row=mysql_fetch_array($query);	 //
	if($num>0){ $salesid = $row['salesid'] ;
	$_SESSION['salesid'] = $salesid ;
	header('location: salesall.php');
	} else{
	  
	 // $sal = date('sihmdy'); //rand(100, 90000);
	  
	  //$salesid = $sal;//.date('is');
	  
	  $_SESSION['salesid'] = date('sihmdy');
	  
	  $_SESSION['id'] = '';
	  
	  header('location: salesall.php');
	  exit;
	  
	}
;echo '	  


';;?>
