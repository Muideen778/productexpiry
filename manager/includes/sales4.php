	<?php 	$pid = $_GET['pid'];
		
	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$pid' ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $price = $rowx['unitprice'];
	  $packprice = $rowx['packprice'];
	  $item = $rowx['item'];
	   $cat = $rowx['cat'];
	 $pqty = $rowx['pqty'];
	 
$uptimum = $rowx['uptimum'];
	 $cq = 100*$qt/$uptimum;
	
	 
	 
if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt<0){ $sta = 'Negative' ; $color = 'black';} 
elseif($cq<10){ $sta = 'Very Low' ; $color = '#900' ;} 
elseif($cq<30){ $sta = 'Low' ; $color = 'purple';} 
elseif($cq<40){ $sta = 'Getting Low' ; $color = 'blue';} 
elseif($cq<60){ $sta = 'Average' ; $color = 'pink';} 
elseif($cq<80){ $sta = 'High' ; $color = 'green';} 
elseif($cq<100){ $sta = 'Very High' ; $color = 'green';} 
	else{ $sta = 'Excess' ; $color = '#036';} 
	
	if(array_key_exists('NewTransaction', $_POST)){
		unset($_SESSION['salesid']);
		unset($_SESSION['mode']);
		unset($_SESSION['trans']);
		
	}
	
	if(!isset($_SESSION['salesid'])){  $_SESSION['salesid'] = date('sihmdy'); //rand(100000, 1000000000);
	$que=mysql_query("select * FROM unstock WHERE salesid = '$salesid' " )or die(mysql_error());
							$TrN=mysql_num_rows($que);
							if($TrN>0){$_SESSION['salesid'] = date('sihmdy');}//rand(100000, 1000000000);}
	 }
	$salesid = $_SESSION['salesid'];
	//ReSET
	if(array_key_exists('reset', $_POST)){
	unset($_SESSION['mode']); 
	mysql_query("delete from unstock2 where salesid='$salesid'");
	mysql_query("update unstock set status=0 where salesid='$salesid'");
	}
	
	if(array_key_exists('CancelTransact', $_POST)){
	mysql_query("delete from unstock2 where salesid='$salesid'");
	
$qq=mysql_query("select * FROM unstock WHERE salesid='$salesid' " );
	while($rw=mysql_fetch_object($qq)){
	
	$qtx = $rw->qty;
	$pidx = $rw->pid; 
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pidx' " )or die(mysql_error());
$ro=mysql_fetch_object($quer);

$qtyx = $ro->qty ;

$qty2 = $qtx + $qtyx ;

$resk = mysql_query("UPDATE stock SET qty = '$qty2' WHERE sn = '$pidx' ") or die(mysql_error());

	}
	
	mysql_query("delete from unstock where salesid='$salesid'");
	unset($_SESSION['mode']); 
	}

if(array_key_exists('OutOfStock', $_POST)){
	mysql_query("insert into stockout select * from stock where sn='$pid'");
}
if(array_key_exists('sales', $_POST)){
	 
$reason = $_POST['ureason'];
$qty = $_POST['qty'];
$amount = $qty*$price; 
$balqty = $qt-$qty;
			  
	if($qt<$qty){	$erqty = '<p><font color="red"><em>Oh sorry! available quantity is less than the specified quantity. You can unstock '.$qt.' units or less.</em></font></p>' ;}
	elseif($qty<1){	$erqty = '<p><font color="red"><em>Oh sorry! quantity less than 1. You can unstock '.$qt.' units or less.</em></font></p>' ;}
	else{ 	  
$res2 = mysql_query("INSERT INTO unstock (salesid,pid,item,cat,qty,qtyb,qtya,price,amount,rep,today,dd,mm,yy,ww,tr_type,reason)
VALUES('$salesid','$pid','$item','$cat','$qty','$qt','$balqty','$price','$amount','$rep','$ymd','$dd','$mm','$yy','$ww','$tr_type','$reason')") or die(mysql_error());

if($res2){

$resk = mysql_query("UPDATE stock SET qty = '$balqty' WHERE sn = '$pid' LIMIT 1") or die(mysql_error());

}

}}

$error = 'Sorry! available quantity ('.$qt.') is less than the specified quantity.' ;

if(array_key_exists('sales2', $_POST)){

$qty2 = $_POST['qty2'];
$reason = $_POST['ureason'];
$amount = $qty2*$packprice; 
$balqty = $qt-($qty2*$pqty);
$qty = $qty2*$pqty;
$price = $amount/$qty;
			  
	if($qt<$qty){	$erqty = '<p><font color="red"><em>Oh sorry! available quantity is less than the specified quantity. You can unstock '.$qt.' units or less.</em></font></p>' ;}
	elseif($qty2<1){	$erqty = '<p><font color="red"><em>Oh sorry! quantity less than 1. You can unstock '.$qt.' units or less.</em></font></p>' ;}
	
	else{ 	  

$res2 = mysql_query("INSERT INTO unstock (salesid,pid,item,cat,qty,qtyb,qtya,price,amount,rep,today,dd,mm,yy,ww,tr_type,reason)
VALUES('$salesid','$pid','$item','$cat','$qty','$qt','$balqty','$price','$amount','$rep','$ymd','$dd','$mm','$yy','$ww','$tr_type','$reason')") or die(mysql_error());
//$_SESSION['trans']=2;
if($res2){

$resk = mysql_query("UPDATE stock SET qty = '$balqty' WHERE sn = '$pid' LIMIT 1") or die(mysql_error());

}


}}


$result = mysql_query("SELECT SUM(amount) AS value_sum FROM unstock WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];



if(array_key_exists('checkout', $_POST)){
	

$cash = $_POST['cash'];
$discount = $_POST['discount'];
$customer = $_POST['customer'];
//$sumtotal = $_POST['sumtotal'];
$quer=mysql_query("select * FROM unstock2 WHERE salesid = '$salesid' " )or die(mysql_error());
							$rg=mysql_fetch_array($quer);
								$TrNum=mysql_num_rows($quer);				  
			 if($TrNum==1){} else{ 

$res2 = mysql_query("INSERT INTO unstock2 (salesid,inv,amount,cash,discount,name,rep,today,dd,mm,yy,ww,tr_type)
VALUES('$salesid','$salesid','$sum','$cash','$discount','$customer','$rep','$ymd','$dd','$mm','$yy','$ww','$tr_type')") or die(mysql_error());

$resk = mysql_query("UPDATE unstock SET status = 1 WHERE salesid = '$salesid' ") or die(mysql_error());

$_SESSION['mode']=2;
			 }
/*  echo "<script type=\"text/javascript\">
    alert(\"Transaction Complete! Pirint Invoice\");
    </script>";
	*/
}






if(array_key_exists('', $_POST)){
	$sn = $_POST[''];
$query=mysql_query("select * FROM unstock WHERE sn = '$sn' " );
	$row=mysql_fetch_array($query);
	
	$qt = $row['qty'] ;
	$pid = $row['pid']; 
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pid' " )or die(mysql_error());
$ro=mysql_fetch_array($quer);

$qtyx = $ro['qty'] ;

$qty2 = $qt + $qtyx ;


$sqlk = "UPDATE stock SET qty = '$qty2' WHERE sn = '$pid' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());
	
	$result = mysql_query("DELETE FROM unstock WHERE sn='$sn'");
	 	
}

if(array_key_exists('RemoveItem', $_POST)){
	$sn = $_POST['RemoveItem'];
$query=mysql_query("select * FROM transact WHERE sn = '$sn' " );
	$row=mysql_fetch_array($query);
	
	$qt = $row['qty'] ;
	$pid = $row['pid'];
	
	$amt = $row['amount'] ;

	
$quer=mysql_query("select * FROM stock WHERE sn = '$pid' " )or die(mysql_error());
$ro=mysql_fetch_array($quer);

$qtyx = $ro['qty'] ;
$tnox = $ro['tno'] ;
$soldx = $ro['sold'] ;

$qty2 = $qt + $qtyx ;

$tno1 = $tnox-1;
$sold1 = $soldx-$amt;

$sqlk = "UPDATE stock SET qty = '$qty2', tno = '$tno1', sold = '$sold1' WHERE sn = '$pid' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());
	
	$result = mysql_query("DELETE FROM transact WHERE sn='$sn'");
	
	$delay = 0; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
	header("Refresh: $delay;"); 
	 	
}
?>