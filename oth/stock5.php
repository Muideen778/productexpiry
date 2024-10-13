<?php
 
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['item'])){
        @$item = $_GET['item'];
      }
    }
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');		
	  $dd = date('d') ;	
	 $mm = date('m') ;	
	 $yy = date('y') ;	
	  $ww = date('W') ;	
	 
			 
	     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);


	     $sql1 =" SELECT * FROM stock WHERE item = '$item' LIMIT 1 ";
     $result1 = mysql_query($sql1) or die (mysql_error());
	 $row1 = mysql_fetch_assoc($result1);
	 
	 $oqty = $row1['qty'] ;
	 $oprice = $row1['price'] ;
	 	 $osprice = $row1['sprice'] ;

	 
	 

 
  if(array_key_exists('restock', $_POST)){
	
$nqty1 = $_POST['nqty'];
$nprice = $_POST['nprice'];
$nsprice = $_POST['nsprice'];
$xm = $_POST['xm'];
$xy = $_POST['xy'];

$nqty = $nqty1+$oqty;

			  
$sql = "INSERT INTO stockup (item,nqty,nprice,sprice,rep,dd,mm,yy,xm,xy,ww)
VALUES('$item','$nqty1','$nprice','$nsprice','$rep','$dd','$mm','$yy','$xm','$xy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){




$sql3 = "UPDATE stock SET qty = '$nqty', price = '$nprice', sprice = '$nsprice' WHERE item = '$item' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());


$re="Product Data Successfully Updated!";
        }
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
.fm1{padding:20px;
color:#033;
font-weight:bolder;
margin-right:60%;
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
                <li class="TabbedPanelsTab" tabindex="0">All Stock History</li>
<li class="TabbedPanelsTab" tabindex="0">'; echo $item; ;echo ' Stock History</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Stock Worth</th>
                                            <th>Date/Time</th>
                                            <th>Stocked By</th>
                                            <th>View Purchase</th>
                                            <th>Re-Stock</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM stockup ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
                                            
                                             <td>'; echo ucfirst($row['item']) ;echo '</td>  
                                            <td>'; echo $row['nqty'] ;echo '</td>
                                            <td class="center">'; echo $row['nprice'] ;echo '</td>
                                            <th class="center">'; $sum3 = $row['nqty']*$row['nprice'];  echo $sum3 ; ;echo '</th>
                                           
                                            <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td><a href="stock3.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-success btn-xs">Purchases</i></a></td>
                                            <td><a href="stock5.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-success btn-xs">Stock History</i></a></td>
                                            
                                      </tr>
                                         ';  } ;echo '                                    </tbody>
                            </table>
                            
                            </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
                </div>
<div class="TabbedPanelsContent">
 <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Stock Worth</th>
                                            <th>Date/Time</th>
                                            <th>Stocked By</th>
                                            <th>View Purchase</th>
                                            <th>Re-Stock</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM stockup WHERE item = '$item' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
                                            
                                             <td>'; echo ucfirst($row['item']) ;echo '</td>  
                                            <td>'; echo $row['nqty'] ;echo '</td>
                                            <td class="center">'; echo $row['nprice'] ;echo '</td>
                                            <th class="center">'; $sum3 = $row['nqty']*$row['nprice'];  echo $sum3 ; ;echo '</th>
                                           
                                            <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td><a href="stock3.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-success btn-xs">Purchases</i></a></td>
                                            <td><a href="stock5.php?item='; echo $row['item'] ; ;echo '"><i class="btn btn-success btn-xs">Re-Stock </i></a></td>
                                            
                                      </tr>
                                         ';  } ;echo '                                    </tbody>
                            </table>
                            
                            </div>
                            
                            <!-- /.table-responsive -->
                         <div class="fm1">  <font color="#FF0000">'; echo $re; ;echo '</font>  <form action="" method="post" enctype="multipart/form-data">
                           <p> Re-Stock '; echo $item ;;echo ': Specify Additional Qty <input name="nqty" class="form-control" value="" placeholder="Current Qty: '; echo $oqty; ;echo '" ></p></p><p>
                            
                           New Cost Price <input name="nsprice" class="form-control" value="'; echo $osprice; ;echo '" placeholder="New Price" ></p>
                           <p>
                            
                           New Selling Price <input name="nprice" class="form-control" value="'; echo $oprice; ;echo '" placeholder="New Price" ></p>
                           <p><label>Expiry Date</label>
                                            <table width="100%">
                        <tr>
                          <td><select name="xm" class="form-control" >
                            
                            '; $i = 1;
							while($i<=12){
							 $e = $i++ ;
							
							
							;echo '                            <option>'; echo $e ; ;echo '</option>
                            '; } ;echo '                          </select>
                          </td>
                          <td>
                          <select name="xy" class="form-control" >
                            
                            '; $i = date(Y); $i2 = $i+10; 
							while($i<=$i2){
							 $e = $i++ ;
							
							
							;echo '                            <option>'; echo $e ; ;echo '</option>
                            '; } ;echo '                          </select></td>
                        </tr>
                      </table>
                                          </p>
                                          <p>
                            <button type="submit" class="btn btn-default" name="restock">Re-Stock</button></p>
                            
                            </form></div>
                        
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
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:1});
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
