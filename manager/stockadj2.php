<?php 
error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	

	 $rep = $_SESSION['admin'];
	    $item = $_SESSION['item'];

$sn = $_GET['sn'];
$snn = $sn+1;
$snp = $sn-1;


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 $dd = date('d');	
	 $mm = date('m');	
	 $yy = date('y');		
	 
	 
			 
	 

if(array_key_exists('next', $_POST)){

  $de = mysql_query("TRUNCATE stockup ") or die (mysql_error());


$query=mysql_query("select * FROM stock " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							//	$sn=$row['sn'];
								$item=$row['item'];
								$cat=$row['cat'];
								$des=$row['des'];
								$price=$row['price'];
								$sprice=$row['sprice'];
								$rep=$row['rep'];
								$qty=$row['qty'];
								$dd=$row['dd'];
								$mm=$row['mm'];
								$yy=$row['yy'];
								$vendor=$row['vendor'];
								$today=$row['today'];
								$ww=$row['ww'];
								$xm=$row['xm'];
								$xy=$row['xy'];

     $res2 = mysql_query("INSERT INTO stockup (item,des,nqty,sprice,nprice,rep,today,dd,mm,yy,ww,xm,xy,vendor)
VALUES('$item','$des','$qty','$sprice','$price','$rep','$today','$dd','$mm','$yy','$ww','$xm','$xy','$vendor')") or die (mysql_error());
	 
	 
	 
	
								
							}

 echo "<script type=\"text/javascript\">
    alert(\" ".$item." Operation Complet!\");
    window.location = \"stockadj.php?sn=$snn\"
    </script>";

			}
			
			
			
			
			
			
			if(array_key_exists('pre', $_POST)){



header("location: stockadj.php?sn=$snp") ;
}
		

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stock Profile</title>

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
margin-right:5%;
float:left;
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
         <img src="tlog.png" >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     <?php    include('nav2.php') ;  ?>
     
     <?php     require('nav1.php') ;  ?>
     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Manage Stock: <font color="blur"><b><?php echo strtoupper($item); ?></b></font></small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Edit Item</li>
</ul>
              <div class="TabbedPanelsContentGroup">
<div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                         
                           <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money"></i> Edit Item Information</h3>
                      </div>
                      <div class="panel-body"> <font color="green"><strong><?php echo $err ; ?></strong></font>
                        
                         
                          <table class="table table-bordered table-hover table-striped tablesorter">
                            <tbody>
                              <tr>
                                <td><form  method="post" enctype="multipart/form-data">
                                   
                                   <button type="submit" name="pre" class="btn btn-default">PREVIOUS</button>
                                  <button type="submit" name="next" class="btn btn-default">UPDATE/NEXT</button>
                                </form></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                          <div class="col-lg-4">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money"></i> Edit Item Information</h3>
                      </div>
                      <div class="panel-body">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                            <tbody>
                            <?php $query=mysql_query("select * FROM stockup WHERE item = '$item' ORDER BY sn ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?> <tr>
                                <td><?php echo $row['item']; ?></td>
                                 <td><?php echo $row['nqty']; ?></td>
                              </tr>
                              
                              <?php } ?>
                            </tbody>
                          </table>
                             </div>
                      </div>
                    </div>
                    
                    
                    
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
        $('#dataTables-example').dataTable();
    });
    </script>
    
    
  </body>
</html>