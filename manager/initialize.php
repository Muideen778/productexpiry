<?php
error_reporting(0);
    session_start();
if(!isset($_SESSION['admin'])){
   header("location: index.php");
     exit;
	}
	
	
	
	  $rep = $_SESSION['admin'];
	  

include("includes/connect.inc.php");

		
	
/*		
if(array_key_exists('ini', $_POST)){
	

	
$tran = mysql_query("UPDATE transact SET name = 'no name', id = '1' WHERE id = '0' ") or die(mysql_error());

$reportnew="Administrator Operation Successfully Completed!";




   			}  */
			
			if(array_key_exists('ini', $_POST)){
	

	$queryx=mysql_query("select * FROM stock " )or die(mysql_error());
	$num = mysql_num_rows($queryx);
							
		 $i = 1 ; 
		 while($i<=$num){ $sn = $i++ ; 					
	
	$query=mysql_query("select * FROM stock WHERE sn = '$sn'" )or die(mysql_error());
		$row=mysql_fetch_array($query);
		 $item = $row['item'];
		 $sprice = $row['sprice'];					
							
							
$tran = mysql_query("UPDATE transact SET sprice = '$sprice' WHERE item = '$item' ") or die(mysql_error());


		 }

$reportnew="Administrator Operation Successfully Completed!";

  			}
			
			
		if(array_key_exists('alter', $_POST)){	
		
		$a = $_POST['a'];
		$b = $_POST['b'];
			$sql = mysql_query("ALTER TABLE `$a` ADD `$b` VARCHAR(225) NOT NULL");
	
	$reportnew="Table Operation Successfully Completed!";		
		}

;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Pro</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
  
  
  
  
  
   <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 
 

    <!-- Page-Level Plugin CSS - Tables -->
    <!-- <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    SB Admin CSS - Include with every page 
        <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome1/css/font-awesome.css" rel="stylesheet">
    
      <link href="css1/sb-admin.css" rel="stylesheet">
  
    -->
 
  <style type="text/css">
  body {
	padding: 50px;
}
  </style>
</head>

  <body>
'; echo $reportnew; ;echo '      <form action="" method="post" enctype="multipart/form-data">
        Fix Sprice  

          <button type="submit" class="btn btn-primary" name="ini">INITIALIZE</button>
      </form>
          
          <p>
          <form action="" method="post" enctype="multipart/form-data">
       <input name="a" placeholder="Table"> <input name="b" placeholder="Column"> 
          <button type="submit" class="btn btn-primary" name="alter">Alter Table</button>
         </form></p>
   ';;?>
