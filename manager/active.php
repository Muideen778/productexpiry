<?php

error_reporting(0);
session_start(); ob_start();
	if(!isset($_SESSION['admin'])){
      header("location: ../index.php");
      exit;
	}
 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['sn'])){
        @$sn = $_GET['sn'];
      }
    }$rep = $_SESSION['admin'];

     include("includes/connect.inc.php");

     $result10 = mysql_query(" SELECT * FROM admin WHERE sn = '$sn' ") or die (mysql_error());
	 $row=mysql_fetch_array($result10) ;
	$act = $row['active'] ;
	$today = date('y/m/d h:i');
	
	if($act==1){
	$result = mysql_query("UPDATE admin SET active = '0', status = 'Offline', logtime = '$today' WHERE sn='$sn' ");
	}
	
	else {
	$result1 = mysql_query("UPDATE admin SET active = '1', logtime = '$today' WHERE sn='$sn' ");
	}

	
	 header("location:staffdetails.php");
exit;


;?>
