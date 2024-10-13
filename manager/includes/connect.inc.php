<?php

$rep = $_SESSION['admin'];




	if(!isset($_SESSION['admin'])){
      header("location: ../index.php");
      exit;
	}
 
	$con=mysql_connect('localhost','root','');
if(!$con){
die("could not connect to db :" . mysql_error());
}
$db = mysql_select_db('expirysystem');
if(!$db){
die("could not select db:" . mysql_error());
}

  $today = date('ymd');
   $ymd = date('ymd');
   $dd = date('d');
    $mm = date('m'); 
	$yy = date('y');
	$ww = date('W');
	$w = date('W')-1;
	$yyyy = date('Y');
	$lm = $mm-1;
		$lw = $ww-1;
	
	
	$ddate =date('Y-m-d');
$datea = new DateTime($ddate);
	$snds=date('z');
	$dds=date('d');
	$wws=date('w');
	$ws=date('d');
	$wks=$datea->format("W");
	$mms=date('m');
	$months=date('M');
	$yys=date('y');
	$days=date('M');
	$dates=date('d-M-Y');
	$ymds=date('ymd');
	$createds=date('Y-m-d h:i:s');
	     $result = mysql_query(" SELECT * FROM datt WHERE ymd < '$ymd' ORDER BY sn DESC LIMIT 1 ") or die (mysql_error());
	 $yes=mysql_fetch_array($result) ;
	$yest = $yes['ymd'] ;
	
	 $resul = mysql_query(" SELECT * FROM datt WHERE ymd = '$ymd' ORDER BY sn DESC LIMIT 1 ") or die (mysql_error());
	 $ye=mysql_fetch_array($resul) ;
	$ysd = $ye['ymd'] ;
	
	if(empty($ysd)){
		mysql_query ("INSERT INTO `datt` 
		(`snd`, `dd`, `ww`, `w`, `wk`, `mm`, `month`, `yy`, `day`, `date`, `created`, `ymd`) 
		VALUES ('$snds', '$dds','$wws','$ws','$wks','$mms','$months','$yys','$days','$dates','$createds','$ymds')");
	}
													
  $currentTime = date('d/m/Y h:i A');
  
     $result = mysql_query(" SELECT * FROM admin WHERE username = '$rep' ") or die (mysql_error());
	 $row=mysql_fetch_array($result) ;
	$act = $row['active'] ;
	
	if($act==0){ header('location: ../'); }


	include("includes/function.php"); 		

?>
