<?php
 
error_reporting(0);
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
	 
	  
	  $_SESSION['salesid'] = $sn ;
	  
	  $_SESSION['id'] = '';
	  
	  header('location: salesall.php');
	  exit;
	  
	  
;echo '	  


';;?>
