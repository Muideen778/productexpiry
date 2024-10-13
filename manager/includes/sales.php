	<?php 
	
	$dierror = "Cannot access server, Try Later";
		if($_GET['pid']){$_SESSION['pid'] = $_GET['pid']; }
		elseif($_POST['pid']){$_SESSION['pid'] = $_POST['pid'];  }
		$pid = $_SESSION['pid'] ;
	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$pid' ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $price = $rowx['unitprice'];
	  $packprice = $rowx['packprice'];
	  $item = $rowx['item'];
	   $cat = $rowx['cat'];
	 $pqty = $rowx['pqty'];
	  $tno = $rowx['tno'];
	   $sold = $rowx['sold'];
	$unitcost=$rowx['unitcost'];
	 $_SESSION['item']=$item;
	 
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
		
			$quet=mysql_query("select * FROM transact WHERE status = 0 AND rep='$rep' LIMIT 1 " )or die(mysql_error());
			$Trap=mysql_num_rows($quet);
			$trow = mysql_fetch_array($quet);
		
			if($Trap > 0){//$_SESSION['salesid']=$trow['salesid']; 
			$bl=rand(100000, 10000);
			
			}
			


			else{

				$_SESSION['salesid']=date('sihmdy');
		
			}
		unset($_SESSION['mode']);
		unset($_SESSION['trans']);
		
	}
	
		if(array_key_exists('review', $_POST)){
		$_SESSION['salesid'] = $_POST['review'];
		$_SESSION['mode'] = 2;
	}
	
	if(!isset($_SESSION['salesid'])){  $_SESSION['salesid'] = date('sihmdy'); //rand(100000, 1000000000);
	$que=mysql_query("select * FROM transact WHERE salesid = '$salesid' " )or die(mysql_error());
							$TrN=mysql_num_rows($que);
							if($TrN>0){$_SESSION['salesid'] = date('sihmdy'); } //rand(100000, 1000000000);}
	 }
	$salesid = $_SESSION['salesid'];
	//ReSET
	if(array_key_exists('reset', $_POST)){
	unset($_SESSION['mode']); 
	mysql_query("delete from transact2 where salesid='$salesid'");
	mysql_query("update transact set status=0 where salesid='$salesid'");
	}
	
	if(array_key_exists('CancelTransact', $_POST)){

	mysql_query("insert into canceltransact2 select * from transact2 where salesid='$salesid'");
	mysql_query("delete from transact2 where salesid='$salesid'");
	
$qq=mysql_query("select * FROM transact WHERE salesid='$salesid' " );
	while($rw=mysql_fetch_object($qq)){
	
	$qtx = $rw->qty;
	$pidx = $rw->pid; 
	
	$amt = $rw->amount; 
	
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pidx' " )or die(mysql_error());
$ro=mysql_fetch_object($quer);

$qtyx = $ro->qty ;

$tnox = $ro->tno ;
$soldx = $ro->sold ;

$qty2 = $qtx + $qtyx ;

$tno1 = $tnox-1;
$sold1 = $soldx-$amt;

$resk = mysql_query("UPDATE stock SET qty = '$qty2', tno = '$tno1', sold = '$sold1' WHERE sn = '$pidx' ") or die(mysql_error());

	}
				mysql_query("insert into canceltransact select * from transact where salesid='$salesid'");
	mysql_query("delete from transact where salesid='$salesid'");
	

$erqty = '<p><font color="green"><em>Current Transaction Cancelled by User </em></font></p>' ;

	unset($_SESSION['mode']); 
	}

if(array_key_exists('OutOfStock', $_POST)){
	mysql_query("insert into stockout select * from stock where sn='$pid'");
$erqty = '<p><font color="green"><em>You Recommended Restock of '.ucwords($item).' </em></font></p>' ;
}









if(array_key_exists('sales', $_POST)){
$price=$_POST['price'];
$qty = $_POST['qty'];
$amount = $qty*$price; 
$balqty = $qt-$qty;
$cprice = $unitcost*$qty;
$tno1 = $tno+1;
$sold1 = $sold+$amount;

			  
	if($qt<$qty){	$erqty = '<p><font color="red"><em>Oh sorry! available quantity is less than the specified quantity. You can buy '.$qt.' units or less.</em></font></p>' ;}
	
	else{ 	  
$res2 = mysql_query("INSERT INTO transact (salesid,pid,item,cat,qty,price,cprice,amount,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$pid','$item','$cat','$qty','$price','$cprice','$amount','$rep','$ymd','$dd','$mm','$yy','$ww')") or die(mysql_error());

if($res2){

$resk = mysql_query("UPDATE stock SET qty = '$balqty', tno = '$tno1', sold = '$sold1' WHERE sn = '$pid' LIMIT 1") or die(mysql_error());

}

}}

$error = 'Sorry! available quantity ('.$qt.') is less than the specified quantity.' ;

if(array_key_exists('sales2', $_POST)){
	$packprice =$_POST['price'];
$qty2 = $_POST['qty2'];
$amount = $qty2*$packprice; 
$balqty = $qt-($qty2*$pqty);
$qty = $qty2*$pqty;
$cprice = $unitcost*$qty;
$price = round($amount/$qty,1);

$tno1 = $tno+1;
$sold1 = $sold+$amount;
			  
	if($qt<$qty){	$erqty = '<p><font color="red"><em>Oh sorry! available quantity is less than the specified quantity. You can buy '.$qt.' units or less.</em></font></p>' ;}
	
	else{ 	  
$res2 = mysql_query("INSERT INTO transact (salesid,pid,item,cat,qty,price,cprice,amount,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$pid','$item','$cat','$qty','$price','$cprice','$amount','$rep','$ymd','$dd','$mm','$yy','$ww')") or die(mysql_error());
$_SESSION['trans']=2;
if($res2){

$resk = mysql_query("UPDATE stock SET qty = '$balqty', tno = '$tno1', sold = '$sold1' WHERE sn = '$pid' LIMIT 1") or die(mysql_error());

}

}}


$result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

$resultcp = mysql_query("SELECT SUM(cprice) AS value_sumcp FROM transact WHERE salesid = '$salesid' "); 
$rowacp = mysql_fetch_assoc($resultcp); 
$sumcp = $rowacp['value_sumcp'];

if(array_key_exists('checkout', $_POST)){
	
$mode = $_POST['mode'];
$cash = intval($_POST['subtotal']);
$discount = intval($_POST['discount']);
$customer = $_POST['customer'];
//$bank=$_POST['bank'];
$tfamount=intval($_POST['bank1']) + intval($_POST['bank2']) + intval($_POST['bank3']);
$cashp=intval($_POST['cashp']);
$pos=$amout	= intval($_POST['pos1'] + $_POST['pos1']);
//$credit=intval($_POST['balance']);
$cred=intval($_POST['balance']);
$crstatus=0;

if($cred>0){
	$crstatus=1;
}
if($customer==0){$id = 0;
  $name = 'Customer';}else{
 $fetch = mysql_query("SELECT * FROM client WHERE id = '$customer' ") or die(mysql_error());
 $row = mysql_fetch_object($fetch);
 $id = $row->id;
  $name = $row->name;

}

if($id>0){
	$fetchadvance = mysql_query("SELECT * FROM advance WHERE id = '$id' ") or die(mysql_error());
	$rowadvanve = mysql_fetch_object($fetchadvance);
	$numadvance = mysql_num_rows($fetchadvance);
	if($numadvance>0){
		$availabeadvance = $rowadvanve->amount;	
		if($availabeadvance>=$cred){
			$advances=$availabeadvance-$cred;
			$crstatus=0;
			$tcredit=0;
			$advancess=$cred;
		}else{
			$crstatus=1;
			$advances=0;
			$tcredit=$cred-$availabeadvance;
			$advancess=$sum-$tcredit;
		}
		$updatadvance = mysql_query("UPDATE advance SET amount = '$advances' WHERE  id='$id' ") or die(mysql_error());
	}else{
		$tcredit=$cred;
	}
}else{
	$tcredit=$cred;
}
$credit = $tcredit;

$checkcart=mysql_query("select * FROM transact WHERE salesid = '$salesid' " )or die(mysql_error());
$cartNum=mysql_num_rows($checkcart);				  
if($cartNum>0){ 
//$sumtotal = $_POST['sumtotal'];
$quer=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' " )or die(mysql_error());
							$rg=mysql_fetch_array($quer);
								$TrNum=mysql_num_rows($quer);				  
			 if($TrNum==1){
				
			 } else{ 
				$llpaid = $tfamount + $cashp + $pos + $cred;
				if ($llpaid < $cash){
					$_session['carterror'] ="Amount input error";
				}else{
					
$res2 = mysql_query("INSERT INTO transact2 (salesid,id,inv,amount,cprice,cash,discount,name,rep,today,dd,mm,yy,ww,dispensary,tfamount,cashp,pos,credit,crstatus)
VALUES('$salesid','$id','$salesid','$sum','$sumcp','$cash','$discount','$name','$rep','$ymd','$dd','$mm','$yy','$ww','$mode','$tfamount','$cashp','$pos','$credit','$crstatus')") or die(mysql_error());

$resk = mysql_query("UPDATE transact SET status = '1', name='$name' WHERE  salesid='$salesid' ") or die(mysql_error());


if(!empty($_POST['bank1']) && $_POST['bank1'] > 0){
	$amout	= intval($_POST['bank1']);
	$method = "1";
	
$resp = mysql_query("INSERT INTO payment_method (id, salesid,amount,method,type,rep, today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
}
if(!empty($_POST['bank2']) && $_POST['bank2'] > 0){
	$amout	= intval($_POST['bank2']);
	$method = "2";
$resp = mysql_query("INSERT INTO payment_method (id,salesid,amount,method,type,rep, today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
}

if(!empty($_POST['bank3']) && $_POST['bank3'] > 0){
	$amout	= intval($_POST['bank3']);
	$method = "3";
$resp = mysql_query("INSERT INTO payment_method (id,salesid,amount,method,type,rep, today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
}
if(!empty($_POST['pos1']) && $_POST['pos1'] > 0){
	$amout	= intval($_POST['pos1']);
	$method = "4";
$resp = mysql_query("INSERT INTO payment_method (id,salesid,amount,method,type,rep, today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
}

if(!empty($_POST['pos2']) && $_POST['pos2'] > 0){
	$amout	= intval($_POST['pos2']);
	$method = "5";
$resp = mysql_query("INSERT INTO payment_method (id,salesid,amount,method,type,rep,today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
}
if(!empty($_POST['cashp']) && $_POST['cashp'] > 0){
	$amout	= intval($_POST['cashp']);
	$method = "6";
$resp = mysql_query("INSERT INTO payment_method (id,salesid,amount,method,type,rep,today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
} 
if(!empty($advancess) && $advancess > 0){
	$amout	= intval($advancess);
	$method = "7";
$resp = mysql_query("INSERT INTO payment_method (id,salesid,amount,method,type,rep,today,dd,ww,mm,yy	)
VALUES('$id','$salesid','$amout','$method','0','$rep','$ymd','$dd','$ww','$mm','$yy')") or die(mysql_error());
} 


$_SESSION['mode']=2;
				}
			 }
			}else{
			$_session['carterror'] ="No Item in the cart";
			}
/*  echo "<script type=\"text/javascript\">
    alert(\"Transaction Complete! Pirint Invoice\");
    </script>";
	*/
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


if(array_key_exists('AddCustomer', $_POST)){
	$name = trim(ucwords($_POST['name']));
		$phone = $_POST['phone'];
			$address = addslashes(ucwords($_POST['address']));
			
			$querclientphone=mysql_query("select * FROM client WHERE phone = '$phone' " )or die(mysql_error());
			$querclientname=mysql_query("select * FROM client WHERE name = '$name' " )or die(mysql_error());
			$CrNum=mysql_num_rows($querclientname);		
			$CpNum=mysql_num_rows($querclientphone);		
			
			
if($CrNum>0){ 
$_SESSION['clientnameerror'] = "Customer name already exist";
echo "<script>alert('".$_SESSION['clientnameerror']."');</script>";
}elseif($CpNum>0){
	$_SESSION['clientphoneerror'] = "Customer phone already exist";
	echo "<script>alert('".$_SESSION['clientphoneerror']."');</script>";}else{
			mysql_query("INSERT INTO client (name,phone,address,rep,today) VALUES('$name','$phone','$address','$rep','$ymd')") or die($dierror);
			
	$erqty = '<p><font color="green"><em>Customer Successfully Added.</em></font></p>' ;
}
}

if(array_key_exists('trackInvoice', $_POST)){
	$invno = trim($_POST['invoiceno']);

	//header("location: receipt.php?transactionIndex=$invno");
}
?>