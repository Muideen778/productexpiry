<?php
error_reporting(0);
//session_start();
ini_alter('date.timezone','Africa/Lagos');
// Ronextech112.	date_default_timezone_set('Africa/Lagos'); ID
include('uploadoc/saledetails.php'); 
$dhost="localhost";
$duser="root";
$dpass="";
$dname="expirysystem";

	$con=mysqlconnect($dhost,$duser,$dpass);
if(!$con){
	$setup="true";
}
$db = mysql_select_db($dname);
if(!$db){
	
		$setup="true";

} //https://github.com/Muideen778/productexpiry

 $today = date('y/m/d h:i');

$q=mysql_query("select * FROM title WHERE sn = '1' " );
			$r=mysql_fetch_array($q);
			$username = $r['username'];
			$password = $r['pwd'];
			$senderid = $r['senderid'];
			$phn = $r['phone'];
			$nick = $r['nick'];
			$website = $r['website'];
			
			
			class DATAB{
	
function Query($sql){
	return mysql_query($sql);
}
function Crows($result){
	return mysql_num_rows($result);}
	
	function Fetch($result){
	return mysql_fetch_object($result);}
	
	function dbSel($a,$b,$c){
			return mysql_query("SELECT * FROM $a WHERE $b = '$c' ");
	}
}

$datab = new DATAB; 

$_SESSION['dhost']=$dhost;
 $_SESSION['duser']=$duname;
 $_SESSION['dpass']=$dpass;
 $_SESSION['dname']=$dname;
 
 
 
?>
