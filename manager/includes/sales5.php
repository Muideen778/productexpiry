	<?php 	
			if(array_key_exists('NewTransaction', $_POST)){
		unset($_SESSION['receipt']);
	}
		if($_POST['receipt']){  $_SESSION['receipt'] = $_POST['receipt'];  }
	$receipt = $_SESSION['receipt'];
	
	
	if(array_key_exists('returnItem', $_POST)){
	$sn = $_POST['returnItem'];
	$retqty = $_POST['retqty'];
	
$query=mysql_query("select * FROM expend WHERE sn = '$sn' " );
	$row=mysql_fetch_array($query);
	
	$amt = $row['amount']; 
	$new = $amt - $retqty;
	if($retqty > $amt){$err = 'You have entered an invalid quantity. Enter a value that is less than or equal to '.$qt; }else{
$sql = mysql_query("UPDATE expend SET amount = '$new' WHERE sn = '$sn' LIMIT 1") or die(mysql_error());
//$sql1 = mysql_query("INSERT INTO returnx SELECT * FROM transact WHERE sn = '$sn' LIMIT 1") or die(mysql_error());
}
	}

?>