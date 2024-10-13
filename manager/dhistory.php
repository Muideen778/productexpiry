<?php
 
error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ // this part displays records ready for updating
      if(isset($_GET['distributor'])){
        @$distributor = $_GET['distributor'];
		@$itemx = $_GET['itemx'];
      }
    }
	
	  $rep = $_SESSION['admin'];
	  $dis = $_SESSION['dis'];
	  $disp=$dis;
	 $transferid = $_SESSION['transferid'];


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 	 $ww = date('W');	
$dd = date('d');
	 
	 $yy= date('y');
	 $mm = date('m');
	 
	 
	 
	 
	 	$item = $_POST['item'];
		

	 
	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $cp = $rowx['cp'];
	 $cp1 = $cp/2;
	 $cp2 = $cp*2;
if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt>$cp && $qt<=$cp2){ $sta = 'Getting Critical' ; $color = 'blue' ;} elseif($qt>$cp1 && $qt<=$cp){ $sta = 'Critical' ; $color = 'purple';} elseif($qt>0 && $qt<=$cp1){ $sta = 'Very Critical' ; $color = '#900';} elseif($qt>$cp2){ $sta = 'OK' ; $color = 'green';} elseif($qt<0){ $sta = 'Negative' ; $color = 'black';} 
	

if(array_key_exists('sales', $_POST)){
	

	 $dd = $_POST['dd'] ;
	 $_SESSION['d']=$dd;
	 
	  $yy = $_POST['yy'] ;
	  $_SESSION['y']=$yy;
	  
	  $mm = $_POST['mm'] ;
	  $_SESSION['m']=$mm;
	  
	   $today = $yy.$mm.$dd;
	 $ww = date('W');
	  
	 	
$item2 = $_POST['item2'];
$des = $_POST['des'];

$qty = $_POST['qty'];
$price = $_POST['price'];
$other = $_POST['other'];

$amount = $qty*$price; 

 
$sqlx =" SELECT * FROM stock WHERE item = '$item2' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 $rowx = mysql_fetch_assoc($resultx);
	 
   $sprice = $rowx['sprice'] ;
     $qty1 = $rowx['qty'] ;
   $qty2 = $qty1-$qty ;	
			  
	if(!isset($qty1)){  $sql = "INSERT INTO dispen (salesid,id,name,phone,item,des,cat,qty,sprice,price,amount,balance,other,rep,today,dd,mm,yy,ww)
VALUES('$transferid','$dis','$name','$phone','$item2','$des','$item2','$qty','$sprice','$price','$amount','$amount','$other','$rep','$today','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error()); } 

elseif($qty1<1){$erqty = 'Sorry! this item is no longer available in the store. Please contact the manager' ; } 
	elseif($qty1<$qty){	$erqty = 'Oh sorry! available quantity is less than the specified quantity. You can take '.$qty1.' units or less.' ;}
	else{ 	  
$sql = "INSERT INTO dispen (salesid,id,name,phone,item,des,cat,qty,sprice,price,amount,balance,other,rep,today,dd,mm,yy,ww)
VALUES('$transferid','$dis','$name','$phone','$item2','$des','$item2','$qty','$sprice','$price','$amount','$amount','$other','$rep','$today','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Added!";




   
$sqlk = "UPDATE stock SET qty = '$qty2' WHERE item = '$item2' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());

}

}}

		
		

			
			
if(array_key_exists('edit', $_POST)){
	
 $dd = date('d') ;
	  $yy = date('y');
	  $mm = date('m') ;
	 $ww = date('W');	
	  $today = date('ymd');
	  
$na = $_POST['na'];
$id = $_POST['id'];
$pn = $_POST['pn'];

			  
$sql = "UPDATE client SET name = '$na', phone = '$pn', rep = '$rep' WHERE id = '$id' LIMIT 1";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){
	


$reportnew="Customer Data Successfully Updated!";




   			}}









	
	 
 $quer=mysql_query("select * FROM dispense WHERE id = '$dis' " )or die(mysql_error());
							$ro=mysql_fetch_array($quer);
							$dispensary = $ro['company'];

;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dispensary History</title>

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
.fm1{padding:20px;
color:#033;
width:40%;
float:left; 
margin-right:50px;
}

.fm2{padding:10px;
color:#033;
font-weight:bolder;
width:100%;
float:left; 
border:thin solid #999;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}

form input{
	font-weight:bolder;
}

sta{background-color:'; echo $color  ;;echo ';
color:#FFF;
padding:3px 10px; border-radius:5px;

}

  </style>
</head>

  <body>

<div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="tlog.png" width="220"  >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     ';    include('nav2.php') ;  ;echo '     
     ';     require('nav1.php') ;  ;echo '     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
       <!---  <div style="float:right;"><ul> '; $query=mysql_query("select * FROM dispense ORDER BY id ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo ' <li  class="btn btn-default" style="float:left; list-style:none; margin:5px; '; if($dis==$row['id']){ ;echo 'background-color:#CF9; '; } ;echo '"> <a href="profiled.php?id='; echo $row['id'];;echo '" style="text-decoration:none;">'; echo ucfirst($row['company']); ;echo '</a></li> '; }  ;echo '      
                            </ul> </div> --->
          <div class="col-lg-12">
            <h1><small>History of Transfer to Dispensary<font color="blue"><b></b></font></small></h1>
            
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">All Transaction</li>
<li class="TabbedPanelsTab" tabindex="0">Current Month Summary</li>
<li class="TabbedPanelsTab" tabindex="0"> Current Week Summary</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Date/Time</th>
                            <th>Transfer ID</th>
                            <th>Request by</th>
                            <th>Worth</th>
                            <th>Stock Officer</th>
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; $i = 1; 
							$query=mysql_query("select * FROM dispen2 ORDER BY sn DESC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e; ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td><td>'; echo ucfirst($row['salesid']) ;echo '</td>
                            <td class="center">'; echo $row['name'] ;echo '</td>
                            
                            <td>'; echo $row['amount']; ;echo '</td>
                            
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                            <td><a href="modifyd.php?ss='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">Details</i></a></td>
                          </tr>
                          ';  } ;echo '                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <th>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM dispen2 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</th>
                            <td></td>
                            <th></th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
<div class="TabbedPanelsContent">
  
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Date/Time</th>
                            <th>Transfer ID</th>
                            <th>Request by</th>
                            <th>Worth</th>
                            <th>Stock Officer</th>
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; $i = 1; 
							$query=mysql_query("select * FROM dispen2 WHERE mm = '$mm' AND yy = '$yy' ORDER BY sn DESC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e; ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td><td>'; echo ucfirst($row['salesid']) ;echo '</td>
                            <td class="center">'; echo $row['name'] ;echo '</td>
                            
                            <td>'; echo $row['amount']; ;echo '</td>
                            
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                            <td><a href="modifyd.php?ss='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">Details</i></a></td>
                          </tr>
                          ';  } ;echo '                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <th>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM dispen2 WHERE mm = '$mm' AND yy = '$yy' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</th>
                            <td></td>
                            <th></th>
                          </tr>
                        </thead>
                      </table>
                  
          </div>
<div class="TabbedPanelsContent">
   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Date/Time</th>
                            <th>Transfer ID</th>
                            <th>Request by</th>
                            <th>Worth</th>
                            <th>Stock Officer</th>
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; $i = 1; 
							$query=mysql_query("select * FROM dispen2 WHERE mm = '$mm' AND yy = '$yy' AND ww = '$ww' ORDER BY sn DESC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e; ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td><td>'; echo ucfirst($row['salesid']) ;echo '</td>
                            <td class="center">'; echo $row['name'] ;echo '</td>
                            
                            <td>'; echo $row['amount']; ;echo '</td>
                            
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                            <td><a href="modifyd.php?ss='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">Details</i></a></td>
                          </tr>
                          ';  } ;echo '                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <th>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM dispen2 WHERE mm = '$mm' AND yy = '$yy' AND ww = '$ww' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</th>
                            <td></td>
                            <th></th>
                          </tr>
                        </thead>
                      </table>
</div>
            </div>
            
            
       
            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:2});
    </script>
    
    
    
    
    
    
    <script src="js1/jquery-1.10.2.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js1/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js1/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js1/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js1/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $(\'#dataTables-example\').dataTable();
    });
    </script>
    
    
  </body>
</html>';;?>
