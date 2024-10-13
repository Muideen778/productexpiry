<?php
 
    session_start();
if(!isset($_SESSION['admin'])){
    header("location: index.php");
     exit;
	}
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['id'])){
        @$id = $_GET['id'];
      }
    }
	
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 $dd = date('d') ;
	  $yy = date('y') ;
	  $mm = date('m') ;
	  $ww = date('W') ;

	 
	   $result = mysql_query("select * FROM transact ") or die (mysql_error());
	     $num = mysql_num_rows($result);
	   
	 	 $i = 1 ; 
		 while($i<=$num){ $sn = $i++ ; 

 	$sql =" SELECT * FROM transact WHERE id = '$id' AND today = '$today' AND sn = '$sn' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);

  $name = $row['name'] ; 
    $item = $row['item'] ;
  $des = $row['des'] ;
    $cat = $row['cat'] ;
  $phone = $row['phone'] ;
    $amount = $row['amount'] ;    
  
  
$res = mysql_query("INSERT INTO income (id,name,phone,item,des,amount,rep,today,cat,dd,mm,yy,ww)
VALUES('$id','$name','$phone','$item','$des','$amount','$rep','$today','$cat','$dd','$mm','$yy','$ww')" ) ;

	
$res2 = mysql_query("UPDATE transact SET cash='$amount', balance='0' WHERE sn = '$sn' ") or die(mysql_error()); 


 }
header("location: profilei.php?id=$id") ;
;?>
