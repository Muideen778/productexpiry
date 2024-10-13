<?php
 
error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['sn'])){
        @$sn = $_GET['sn'];
      }
    }
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');		
	 
	 

	     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);


							$queryk=mysql_query("select * FROM stock WHERE sn = '$sn' LIMIT 1" )or die(mysql_error());
							$rowk=mysql_fetch_array($queryk) ;
					$item = $rowk['item'] ;

if(array_key_exists('stock', $_POST)){

$itemx = $_POST['item'];
$price = $_POST['price'];
$des = $_POST['des'];
$cp = $_POST['cp'];


$sql = "UPDATE stock SET item='$itemx',des='$des',cp='$cp',price='$price',rep='$rep' WHERE sn='$sn' LIMIT 1 ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){ $err = 'Product Information Updated' ;}
			}


;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lumen Christi</title>

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
font-weight:bolder;
margin-right:60%;
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
         <img src="tlog.png" width="220" >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     ';    include('nav2.php') ;  ;echo '     
     ';     require('nav1.php') ;  ;echo '     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Manage Stock: '; echo $item; ;echo '</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Edit '; echo $item; ;echo '</li>
                <li class="TabbedPanelsTab" tabindex="0">Stock</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money"></i> Edit Item Information</h3>
                      </div>
                      <div class="panel-body"> <font color="#FF0000">'; echo $err ; ;echo '</font>
                        <div class="table-responsive">
                          '; 
							$query=mysql_query("select * FROM stock WHERE sn = '$sn' LIMIT 1" )or die(mysql_error());
							$rowj=mysql_fetch_array($query)
							
							;echo '                          <table class="table table-bordered table-hover table-striped tablesorter">
                            <tbody>
                              <tr>
                                <td><form  method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <p>
                                      <label>Item</label>
                                      <input name="item" class="form-control" id="firstname" value="'; echo $rowj['item'] ;echo '">
                                    </p>
                                    <p>
                                      <label>Description</label>
                                      <input name="des" class="form-control" id="firstname" value="'; echo $rowj['des'] ;echo '">
                                    </p>
                                    <p>
                                      <label>Available Quantity</label>
                                      <input name="qty" class="form-control" id="phone" value="'; echo $rowj['qty'] ;echo '" disabled>
                                    </p>
                                    <p>
                                      <label>Critical Quantity</label>
                                      <input name="cp" class="form-control" value="'; echo $rowj['cp'] ;echo '">
                                    </p>
                                    <p>
                                      <label>Selling Price</label>
                                      <input name="price" class="form-control" value="'; echo $rowj['price'] ;echo '">
                                  </div>
                                  <button type="reset" class="btn btn-default">Reset Form</button>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <button type="submit" name="stock" class="btn btn-default">Update Item</button>
                                </form></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Product</th>
                                           											<th>Indicator</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Sold Qty</th>
                                            <th>Sold Amount</th>
                                            <th>Date/Time</th>
                                            <th>Re-Stock</th>
                                            <th>Unstock</th>
                                            
                                            <th>View Purchase</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; $i=1;
							$query=mysql_query("select * FROM stock ORDER BY item ASC LIMIT 0 , 200001" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$e=$i++;
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $e ;echo '</td>
                                            
                                             <td><a href="stock2.php?sn='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['item']) ;echo '</i></a></td>
                                            <td>'; $snn = $row['sn'];  $sqlx =" SELECT * FROM stock WHERE sn = '$snn' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $cp = $rowx['cp'];
	 $cp1 = $cp/2;
	 $cp2 = $cp*2;

if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt>$cp && $qt<=$cp2){ $sta = 'Getting Critical' ; $color = 'blue' ;} elseif($qt>$cp1 && $qt<=$cp){ $sta = 'Critical' ; $color = 'purple';} elseif($qt>0 && $qt<=$cp1){ $sta = 'Very Critical' ; $color = '#900';} elseif($qt>$cp2){ $sta = 'OK' ; $color = 'green';} elseif($qt<0){ $sta = 'Negative' ; $color = 'black';} ;echo '  <font style="padding:3px; display:block; background-color:'; echo $color  ;;echo '; color:#FFF; border-radius:3px;">'; echo $sta ;echo '</font></td>
                                            <td>'; echo $row['qty'] ;echo '</td>
                                            <td class="center">'; echo $row['price'] ;echo '</td>
                                             <td class="center">'; $item2 = $row['item']  ;  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$item2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo $sum2 ;
					  ;echo '</td>
                                              <td class="center">'; $item2 = $row['item']  ;  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE item = '$item2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo $sum2 ;
					  ;echo '</td>
                                            <td class="center">'; echo $row['created'] ;echo '</td>
                                             <td><a href="stock3.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-success btn-xs">Re-Stock</i></a></td>
                                             <td><a href="unstock.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-warning btn-xs">Unstock</i></a></td>
                                           
                                            <td><a href="purchases.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-success btn-xs">Purchases</i></a></td>
                                      </tr>
                                         ';  } ;echo '                                    </tbody>
                            </table>
                            
                            </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
                </div>
              </div>
            </div>
            
            
       
            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
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
