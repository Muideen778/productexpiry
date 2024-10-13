<?php
error_reporting(0);

session_start(); ob_start();
if($_SESSION['frame']==1){$frame='salesall.php';} elseif($_SESSION['frame']==2){$frame='enterinvoice.php'; }elseif($_SESSION['frame']==3){$frame='returnitem.php'; }elseif($_SESSION['frame']==4){$frame='unstockitem.php'; }
	
 
include("includes/connect.inc.php");
$fetch =  mysql_query("select * from stock where barcode='$searchitem' ORDER BY sn DESC LIMIT 1");
$num=mysql_num_rows($fetch);
if($num>0){
while ( $row = mysql_fetch_object( $fetch ) ) {
	$x = $x + 1;
	$idp=$row->sn;
	 if($row->qty==0){ $col = 'bgcolor="#FF0000"'; } else{ $col = '';}
}

echo '<script> window.top.location.replace("../'.$frame.'?process='.sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'&pid='.$idp.' &dt='.  date('r').sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'")</script>';

}else{
	
	echo '<script> window.top.location.replace("../'.$frame.'?process='.sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'&pid='.$idp.' &dt='.  date('r').sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'")</script>';
	//$seracherror="Product not found ";
}



?>
