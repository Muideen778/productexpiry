<?php

error_reporting(0);

 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['sn'])){
        @$sn = $_GET['sn'];
      }
    }
include("includes/connect.inc.php");



$query=mysql_query("select * FROM stock WHERE sn='$sn' " );
$row=mysql_fetch_array($query) ;
$item = $row['item'] ;

$query1=mysql_query("select * FROM dispen WHERE item='$item' " );
$num1 = mysql_num_rows($query1);

if($num1<1){
$result = mysql_query("DELETE FROM stock WHERE sn='$sn'");
	
}	
						
header("location:stockitem.php");
exit;

;?>
