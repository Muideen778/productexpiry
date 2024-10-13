	<?php 	
			if(array_key_exists('NewTransaction', $_POST)){
		unset($_SESSION['receipt']);
	}
		if($_POST['receipt']){  $_SESSION['receipt'] = $_POST['receipt'];  }
	$receipt = $_SESSION['receipt'];
	
	
	if(array_key_exists('returnItem', $_POST)){
	$sn = $_POST['returnItem'];
	$retqty = $_POST['retqty'];
	
$query=mysql_query("select * FROM transact WHERE sn = '$sn' " );
	$row=mysql_fetch_array($query);
	$qt = $row['qty'] ;
	$ssid = $row['salesid'] ;
	$pid = $row['pid'];
	$item = $row['item']; 
	$amt = $row['amount']; 
	$cat = $row['cat']; 
	$price = $row['price']; 
	$costprice = ($row['cprice']/$qt)*$retqty;
	$remqty = $qt - $retqty;
	$remamt = $remqty*$price;
	$retamt = $retqty*$price;
	$rcprice = $row['cprice']-$costprice;
	if($retqty > $qt){$err = 'You have entered an invalid quantity. Enter a value that is less than or equal to '.$qt; }else{
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pid' " )or die(mysql_error());
$ro=mysql_fetch_array($quer);
$qtyx = $ro['qty'] ;

$qty2 = $qtyx + $retqty;

$tnox = $ro['tno'] ;
$soldx = $ro['sold'] ;

$tno1 = $tnox-1;
$sold1 = $soldx-$amt;

//Checking Transact summary
$qss=mysql_query("select * FROM transact2 WHERE salesid = '$ssid' " )or die(mysql_error());
$rss=mysql_fetch_array($qss);
$aamt = $rss['amount'];
$amtpaid = $rss['cash'];
$aamtnew = $aamt - $retamt;
$aamtpaid = $amtpaid - $retamt;
$tcprice = $rss['cprice']-$costprice;
$sql = mysql_query("UPDATE stock SET qty = '$qty2' WHERE sn = '$pid' LIMIT 1") or die(mysql_error());
//$sql1 = mysql_query("INSERT INTO returnx SELECT * FROM transact WHERE sn = '$sn' LIMIT 1") or die(mysql_error());
$sql2 = mysql_query("UPDATE transact SET qty='$remqty', amount='$remamt',cprice='$rcprice' WHERE sn = '$sn' LIMIT 1") or die(mysql_error());
$sql3 = mysql_query("UPDATE transact2 SET amount='$aamtnew', cash='$aamtpaid',cprice='$tcprice' WHERE salesid = '$ssid' LIMIT 1") or die(mysql_error());

$sql1 =  mysql_query("INSERT INTO returnx (salesid,pid,item,cat,qty,price,amount,cprice,rep,today,dd,mm,yy,ww)
VALUES('$receipt','$pid','$item','$cat','$retqty','$price','$retamt','$costprice','$rep','$ymd','$dd','$mm','$yy','$ww')");
}
	}





	if(array_key_exists('reverseReturn', $_POST)){
	$sn = $_POST['reverseReturn'];
	

$query=mysql_query("select * FROM transact WHERE sn = '$sn' " );
	$row=mysql_fetch_array($query);
	$qt = $row['qty'] ;
	$pid = $row['pid'];
	$amt = $row['amount']; 
	$price = $row['price']; 
	$ssid = $row['salesid'] ;
	
	      function retSum($col='amount'){
global $pid,$receipt ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM returnx WHERE pid = '$pid' AND salesid = '$receipt' "); 
$rowa = mysql_fetch_assoc($result); 
return $rowa['value_sum'];
  }
		$revamt = retSum();
		$revqty = retSum('qty');
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pid' " )or die(mysql_error());
$ro=mysql_fetch_array($quer);
$qtyx = $ro['qty'] ;

$qty2 = $qtyx - $revqty;

$tnox = $ro['tno'] ;
$soldx = $ro['sold'] ;

$tno1 = $tnox+1;
$sold1 = $soldx+$amt;

$qss=mysql_query("select * FROM transact2 WHERE salesid = '$ssid' " )or die(mysql_error());
$rss=mysql_fetch_array($qss);
$aamt = $rss['amount'];
$cpaid = $rss['cash'];
$aamtnew = $aamt + $revamt;
$ncpaid = $cpaid + $revamt;

$sql = mysql_query("UPDATE stock SET qty = '$qty2' WHERE sn = '$pid' LIMIT 1") or die(mysql_error());
$sql2 = mysql_query("UPDATE transact SET qty='$revqty', amount='$revamt' WHERE sn = '$sn' LIMIT 1") or die(mysql_error());
$sql3 = mysql_query("UPDATE transact2 SET amount='$aamtnew', cash='$ncpaid' WHERE salesid = '$ssid' LIMIT 1") or die(mysql_error());
$sql1 = mysql_query("DELETE FROM returnx WHERE pid = '$pid' AND salesid = '$receipt'") or die(mysql_error());
}




	

?>