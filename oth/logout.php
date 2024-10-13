<?php
 
   session_start();
	if(!isset($_SESSION['admin'])){
      header("location: index.php");
      exit;
	}
	
	 if($_GET){ // this partr displays records ready for updating
      if(isset($_GET['regno'])){
        @$regno = $_GET['regno'];
      }
    }
   	 $today = date(y).'/'.date(m).'/'.date(d).',  '.date(h).':'.date(i);
	 $rep = $_SESSION['admin'];
   
	 include("includes/connect.inc.php");

	 $sql3 = "UPDATE admin SET status = 'Offline', logtime = '$today' WHERE username ='$rep' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());

	 header('location:uplogout.php');
	 exit;
   
	  
     
;?>
