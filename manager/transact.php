<?php
 
error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['distributor'])){
        @$distributor = $_GET['distributor'];
      }
    }
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');		
	 
	 
			 

	     $sql =" SELECT * FROM admin WHERE sn = '$sn' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);





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
         <div style="float:right;"><ul> '; $query=mysql_query("select * FROM admin ORDER BY sn ASC LIMIT 0 , 10" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo ' <li  class="btn btn-default" style="float:left; list-style:none; margin-left:10px; '; if($distributor==$row['username']){ ;echo 'background-color:#CF9; '; } ;echo '"> <a href="transact2.php?distributor='; echo $row['username'];;echo '" style="text-decoration:none;">'; echo ucfirst($row['username']) ; ;echo '</a></li> '; }  ;echo '  </ul> </div> <div class="col-lg-12">
            <h1><small>View '; echo ucfirst($distributor);;echo '\'s Transactions</small></h1>
            
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">All Transaction</li>
                <li class="TabbedPanelsTab" tabindex="0">Debt Profile</li>
                <li class="TabbedPanelsTab" tabindex="0">Today\'s Transaction</li>
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
                            <th>Customer</th>
                            <th>Mobile Number</th>
                            <th>Product</th>
       
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Cash Paid</th>
                             <th>Balance</th>
                            <th>Date/Time</th>
                            <th>Sold By</th>
                            <th>Invoice</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; $i = 1; 
							$query=mysql_query("select * FROM transact WHERE rep = '$distributor' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e; ;echo '</td>
 <td><a href="profilei.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>                            <td>'; echo ucfirst($row['phone']) ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>'; echo $row['qty'] ;echo '</td>
                            <td class="center">'; echo $row['price'] ;echo '</td>
                            <td class="center">'; echo $row['amount'] ;echo '</td>
                             <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['balance'] ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td>
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                           <td><a href="profileinv.php?sn='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">Invoice</i></a></td>
                          </tr>
                          ';  } ;echo '                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
                <div class="TabbedPanelsContent"><div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Sales Id</th>
                            <th>Customer</th>
                            <th>Mobile Number</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Cash Paid</th>
                            <th>Balance</th>
                            <th>Date/Time</th>
                            <th>Sold By</th>
                            <th>Invoice</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; 
							$query=mysql_query("select * FROM transact WHERE balance != '0' AND rep = '$distributor' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $row['sn'] ;echo '</td>
 <td><a href="profilei.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>                            <td>'; echo ucfirst($row['phone']) ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>'; echo $row['qty'] ;echo '</td>
                            <td class="center">'; echo $row['price'] ;echo '</td>
                            <td class="center">'; echo $row['amount'] ;echo '</td>
                             <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['balance'] ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td>
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                         <td><a href="profileinv.php?sn='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">Invoice</i></a></td>
                          </tr>
                          ';  } ;echo '                        </tbody>
                      </table>
                </div></div>
                <div class="TabbedPanelsContent">
           <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Customer</th>
                                            <th>Mobile Number</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                            <th>Cash Paid</th>
                                            <th>Balance</th>
                                            <th>Date/Time</th>
                                            <th>Sold By</th>
                                            <th>Invoice</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM transact WHERE today = '$today' AND rep = '$distributor' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
 <td><a href="profilei.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>                                             <td>'; echo ucfirst($row['phone']) ;echo '</td>
                                             <td>'; echo ucfirst($row['item']) ;echo '</td>
                                            <td>'; echo $row['qty'] ;echo '</td>
                                            <td class="center">'; echo $row['price'] ;echo '</td>
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                             <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['balance'] ;echo '</td>
                                            <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                           <td><a href="profileinv.php?sn='; echo $row['sn'] ; ;echo '"><i class="btn btn-success btn-xs">Invoice</i></a></td>
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
