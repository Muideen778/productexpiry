<?php

error_reporting(0);
session_start();
 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['sn'])){
        $sn = $_GET['sn'];
      }
    }
include("includes/connect.inc.php");



$query=mysql_query("select * FROM cat WHERE sn='$sn' " );
$row=mysql_fetch_array($query) ;
$cat = $row['cat'] ;

$query1=mysql_query("select * FROM stock WHERE cat='$cat' " );
$num1 = mysql_num_rows($query1);

if($num1<1){
$result = mysql_query("DELETE FROM cat WHERE sn='$sn'");
	
}	else{
  echo "<script>alert('please unstock item before deleting')</script>";
}
						
header("location:stockitem.php");
exit();

?>
