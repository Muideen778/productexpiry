<?php
error_reporting(0);

session_start(); ob_start();

 $dreg = date("M d Y");
$pds = base64_decode("MjAyNS0wMi0wOA==");
$sdts = strtotime($pds);
$edts = strtotime($dreg);
$tdiff = abs($edts-$sdts);
$ndts=$tdiff/86400;
$ndts=intval($ndts);
$vdts="365";
$warning=$vdts-$ndts;
if($ndts > 343 and $ndts <= $vdts){
//echo"<script language='javascript'>alert('Your Software will expire in $warning Days')</script>";	

}

elseif($ndts > $vdts){
//echo"<script language='javascript'>alert('Your Software has expired: Contact: +234901 1851 186 for new subscriotion')</script>";
//echo"<script language='javascript'>window.location.replace('index.php')</script>";
	

}else{}

?>
