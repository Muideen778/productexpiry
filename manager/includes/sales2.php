	<?php 	$pid = $_GET['pid'];
		

if(array_key_exists('EditItem', $_POST)){
	

$unitprice = $_POST['unitprice'];
$packprice = $_POST['packprice'];
$uptimum = $_POST['uptimum'];
$cat = $_POST['cat'];
$item = $_POST['item'];
$des = $_POST['des'];
$pqty = $_POST['pqty'];

$expiry = $_POST['expiry'];
$xm = substr($expiry,0,2);
$xy = substr($expiry,3,2);
$sep = substr($expiry,2,1);


if($sep != '/' OR $xm > 12 OR $xy > 30){
	$erqty = '<p><font color="red"><em>Oh sorry! You have entered an invalid expiry date. It should look like 08/19 </em></font></p>' ;}
	
	else{

$resk = mysql_query("UPDATE stock SET item = '$item',cat = '$cat',unitprice = '$unitprice',packprice = '$packprice',xm = '$xm',xy = '$xy',des = '$des',uptimum = '$uptimum',pqty = '$pqty' WHERE sn = '$pid' ") or die(mysql_error());
$erqty = '<p><font color="green"><em>You have Successfully Updated '.ucwords($item).' </em></font></p>' ;
}
$edit=1;
}







	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$pid' ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $price = $rowx['unitprice'];
	  $item = $rowx['item'];
	   $cat = $rowx['cat'];
	 
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
	$quet=mysql_query("select * FROM stockup WHERE status != 1 LIMIT 1 " )or die(mysql_error());
			$Trap=mysql_num_rows($quet);
			$trow = mysql_fetch_array($quet);
			
			if($Trap > 0){$_SESSION['salesid']=$trow['salesid']; }
			else{
		unset($_SESSION['salesid']);  }
		unset($_SESSION['mode']);
		unset($_SESSION['trans']);
		
	}
	
	if(!isset($_SESSION['salesid'])){  $_SESSION['salesid'] = date('sihmdy'); //rand(100000, 1000000000);
	$que=mysql_query("select * FROM stockup WHERE salesid = '$salesid' " )or die(mysql_error());
							$TrN=mysql_num_rows($que);
							if($TrN>0){$_SESSION['salesid'] = date('sihmdy'); } //rand(100000, 1000000000);}
	 }
	$salesid = $_SESSION['salesid'];
	//ReSET
	if(array_key_exists('reset', $_POST)){
	unset($_SESSION['mode']); 
	mysql_query("delete from stockup2 where salesid='$salesid'");
	mysql_query("update stockup set status=0 where salesid='$salesid'");
	}
	
	if(array_key_exists('CancelTransact', $_POST)){
	mysql_query("delete from stockup2 where salesid='$salesid'");
	
$qq=mysql_query("select * FROM stockup WHERE salesid='$salesid' " );
	while($rw=mysql_fetch_object($qq)){
	
	$qtx = $rw->qty;
	$pidx = $rw->pid; 
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pidx' " )or die(mysql_error());
$ro=mysql_fetch_object($quer);

$qtyx = $ro->qty ;

$qty2 = $qtx + $qtyx ;

$resk = mysql_query("UPDATE stock SET qty = '$qty2' WHERE sn = '$pidx' ") or die(mysql_error());

	}
	
	mysql_query("delete from stockup where salesid='$salesid'");
	unset($_SESSION['mode']); 
	}

if(array_key_exists('OutOfStock', $_POST)){
	mysql_query("insert into stockout select * from stock where sn='$pid'");
}

if(array_key_exists('StockItem', $_POST)){
	

	  

$packno = $_POST['packno'];
$upp = $_POST['upp'];
$qty = $upp*$packno;
$totalcost = $_POST['cost'];
$unitcost = $totalcost/$qty;

$unitprice = $_POST['unitprice'];
$packprice = $_POST['packprice'];
$uptimum = $_POST['uptimum'];

$expiry = $_POST['expiry'];
$xm = substr($expiry,0,2);
$xy = substr($expiry,3,2);
$sep = substr($expiry,2,1);
$balqty = $qt+$qty;

if($sep != '/' OR $xm > 12 OR $xy > 30){
	$erqty = '<p><font color="red"><em>Oh sorry! You have entered an invalid expiry date. It should look like 08/19 </em></font></p>' ;}
	
	else{ 	  
$res2 = mysql_query("INSERT INTO stockup (salesid,pid,item,cat,qty,qtyb,qtya,packno,pqty,unitcost,totalcost,unitprice,packprice,uptimum,xm,xy,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$pid','$item','$cat','$qty','$qt','$balqty','$packno','$upp','$unitcost','$totalcost','$unitprice','$packprice','$uptimum','$xm','$xy','$rep','$ymd','$dd','$mm','$yy','$ww')") or die(mysql_error());

if($res2){

$resk = mysql_query("UPDATE stock SET qty = '$balqty',unitprice = '$unitprice',unitcost = '$unitcost',packprice = '$packprice',xm = '$xm',xy = '$xy',pqty = '$upp',uptimum = '$uptimum' WHERE sn = '$pid' ") or die(mysql_error());

}

}}







if(array_key_exists('StockItemUnit', $_POST)){
	
$qty = $_POST['qtyx'];
$totalcost = $_POST['totalcost'];
$unitcost = $totalcost/$qty;

$unitprice = $_POST['unitprice'];
//$packprice = $_POST['packprice'];
$uptimum = $_POST['uptimum'];

$expiry = $_POST['expiry'];
$xm = substr($expiry,0,2);
$xy = substr($expiry,3,2);
$sep = substr($expiry,2,1);
$balqty = $qt+$qty;

if($sep != '/' OR $xm > 12 OR $xy > 30){
	$erqty = '<p><font color="red"><em>Oh sorry! You have entered an invalid expiry date. It should look like 08/19 </em></font></p>' ;}
	
	else{ 	  
$res2 = mysql_query("INSERT INTO stockup (salesid,pid,item,cat,qty,qtya,qtyb,unitcost,totalcost,unitprice,uptimum,xm,xy,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$pid','$item','$cat','$qty','$balqty','$qt','$unitcost','$totalcost','$unitprice','$uptimum','$xm','$xy','$rep','$ymd','$dd','$mm','$yy','$ww')") or die(mysql_error());

if($res2){

$resk = mysql_query("UPDATE stock SET qty = '$balqty',unitprice = '$unitprice',unitcost = '$unitcost',xm = '$xm',xy = '$xy',uptimum = '$uptimum' WHERE sn = '$pid' ") or die(mysql_error());

}

}}









$result = mysql_query("SELECT SUM(totalcost) AS value_sum FROM stockup WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];



if(array_key_exists('checkout', $_POST)){
	

$cash = $_POST['cash'];
$inv = $_POST['inv'];
$customer = $_POST['vendor'];
//$sumtotal = $_POST['sumtotal'];

if($customer==0){$id = 0;
  $name = 'Select Vendor';}else{
 $fetch = mysql_query("SELECT * FROM supply WHERE id = '$customer' ") or die(mysql_error());
 $row = mysql_fetch_object($fetch);
 $id = $row->id;
  $name = $row->name;
}


$quer=mysql_query("select * FROM stockup2 WHERE salesid = '$salesid' " )or die(mysql_error());
							$rg=mysql_fetch_array($quer);
								$TrNum=mysql_num_rows($quer);				  
			 if($TrNum==1){} else{ 

$res2 = mysql_query("INSERT INTO stockup2 (id,salesid,inv,amount,cash,discount,name,rep,today,dd,mm,yy,ww)
VALUES('$id','$salesid','$inv','$sum','$cash','$discount','$name','$rep','$ymd','$dd','$mm','$yy','$ww')") or die(mysql_error());

$resk = mysql_query("UPDATE stockup SET status = 1 WHERE salesid = '$salesid' ") or die(mysql_error());

$_SESSION['mode']=2;
			 }
/*  echo "<script type=\"text/javascript\">
    alert(\"Transaction Complete! Pirint Invoice\");
    </script>";
	*/
}






if(array_key_exists('RemoveStock', $_POST)){
	$sn = $_POST['RemoveStock'];
$query=mysql_query("select * FROM stockup WHERE sn = '$sn' " );
	$row=mysql_fetch_array($query);
	
	$newqty = $row['qty'] ;
	$pid = $row['pid']; 
	
$quer=mysql_query("select * FROM stock WHERE sn = '$pid' " )or die(mysql_error());
$ro=mysql_fetch_array($quer);

$stockqty = $ro['qty'] ;

$qty2 =  $stockqty - $newqty;


$sqlk = "UPDATE stock SET qty = '$qty2' WHERE sn = '$pid' " ;
$resk = mysql_query($sqlk) or die(mysql_error());
	
	$result = mysql_query("DELETE FROM stockup WHERE sn='$sn'");
	$delay = 0; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
	header("Refresh: $delay;"); 
	 	
}


if(array_key_exists('expenditem', $_POST)){
	
$item = $_POST['expend'];
$note = $_POST['note'];
$cresult = mysql_query("SELECT * FROM expitem WHERE item = '$item' " ) or die(mysql_error()); 
$nitem=mysql_num_rows($cresult);
if($nitem>0){
	$errors = 'Category Already Exist';

}else{
$res2 = mysql_query("INSERT INTO expitem (item,des,rep,today)
VALUES('$item','$note','$rep','$ymd')") or die(mysql_error());

$error = 'Category Successfully Entered';
}
}




if(array_key_exists('updatebank', $_POST)){
	if($_POST['bank']){$banks = $_POST['bank'];}
	$reps = $rep;
	$idb = $_POST['id'];
	$pbank = $_POST['pbank'];
	$date = date('Y-m-d H:i:s');
	$bquer=mysql_query("select * FROM bank WHERE id = '$idb' " )or die(mysql_error());
							$rg=mysql_fetch_array($bquer);
							$bankk=$rg['bank'];
							if($banks == $bankk){
								$berror = 'Bank already Exist';
							}else{
	$bank2 = mysql_query("UPDATE bank SET rep='$rep', bank='$banks', pbank='$pbank', modified='$date' WHERE id='$idb' ") or die(mysql_error());
	$error = 'Banks Successfully Updated and Closed';
	//unset($_SESSION['salesid']);
	}}






if(array_key_exists('expensis', $_POST)){
	
$catsn = $_POST['cat'];
$note = addslashes($_POST['note']);
$agent = $_POST['agent'];
$amount = $_POST['amt'];

$rr = sqL1('expitem','sn',$catsn);

$cat = $rr->item;

$res2 = mysql_query("INSERT INTO expend (salesid,expid,amount,item,des,name,rep,dd,mm,yy,ww,today)
VALUES('$salesid','$catsn','$amount','$cat','$note','$agent','$rep','$dd','$mm','$yy','$ww','$ymd')") or die(mysql_error());
$error = 'Expenditure Successfully Entered';
}



if(array_key_exists('closeInv', $_POST)){
	
if($_POST['inv']){$inv = $_POST['inv']; }else{$inv = $salesid;}
$vendor = $_POST['vendor'];


$res2 = mysql_query("UPDATE expend SET inv='$inv',vendor='$vendor' WHERE salesid='$salesid' ") or die(mysql_error());
$error = 'Expenditure Successfully Updated and Closed';
unset($_SESSION['salesid']);
header("location: expenditure.php");
}


if(array_key_exists('removeExp', $_POST)){
	$sn = $_POST['removeExp'];
	$result = mysql_query("DELETE FROM expend WHERE sn='$sn'");
	$error = 'Expenditure Item Deleted';
}




if(array_key_exists('addVendor', $_POST)){
   $name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];

				  $qry = "SELECT * FROM supply WHERE name = '$name' OR phone = '$phone' ";
				 $result = mysql_query($qry) or die(mysql_error());
				 $number =mysql_num_rows($result);
				 if ($number > 0){
					 $errors ="This Supplier Has Already Been Registered";
					 $continue = false;
				 }
				 else{
			  
$sql = "INSERT INTO supply (name,phone,address,company,today,rep)
VALUES('$name','$phone','$address','$name','$today','$rep')";
$res2 = mysql_query($sql) or die(mysql_error());
$error="Supplier Data Successfully Added!";


       }
			}

?>