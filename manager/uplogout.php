<?php
 
error_reporting(0);
   session_start(); 
   if(isset($_SESSION['admin'])){
	 unset ($_SESSION['admin']);
	 if(isset($_COOKIE[session_name()])){
	    setcookie(session_name(), '', time()-86400, '/');
	 }

	 
	 session_destroy();
     header('location:index.php');
	 exit;
   } 
   else{
       header('location: http:index.php');
	   exit;
   }   
;?>
