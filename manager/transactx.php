<?php

error_reporting(0); 
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	

	  $rep = $_SESSION['admin'];
	    $dis = $_SESSION['dis'];


include("includes/connect.inc.php");

	 $today = date('ymd');		
	 
	 
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
         <div class="col-lg-12">
            <h1><small>View Transactions: <font color="blue"><b>'; echo strtoupper($_SESSION['dispensary']);;echo '</b></font></small></h1>
            
            
              
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
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Cash Paid</th>
                                            <th>Balance</th>
                                            <th>Date</th>
                                            <th>Sold By</th>
                                            <th>Pay Cash</th>
                                            <th>Invoice No</th>
                                            <th>Invoice</th>
                                      </tr>
                        </thead>
                        <tbody>
                          '; $i = 1; 
							$query=mysql_query("select * FROM transact2 WHERE dis = '$dis' ORDER BY sn DESC LIMIT 0, 200" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){							$e=$i++
							
							
							;echo '                           <tr class="odd gradeX">
                                            <td class="center">'; echo $e ;echo '</td>
                                            <td><a href="profilei.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>
                                            
                                            <td class="center">'; echo $row['amount']-$row['discount'] ;echo '</td>
                                   <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['amount']-$row['discount']-$row['cash'] ;echo '</td>         <td class="center">'; echo $row['dd'].'-'.$row['mm'].'-'.$row['yy'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td class="center">'; if($row['amount']-$row['discount']-$row['cash']!=0){ ;echo '                              <a href="paydebt.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">Pay Debt</i></a>
                              '; };echo '</td>
                              <td><a href="edittrans.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-warning btn-xs">'; echo $row['inv'] ;echo '</i></a></td>
                              <td> <a href="profileinv.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-warning btn-xs">Invoice</i></a></td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            
                                            <td> </td>
                                          <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-discount) AS value_sum FROM transact2 WHERE dis = '$dis'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td> 
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE dis = '$dis'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-cash-discount) AS value_sum FROM transact2 WHERE dis = '$dis'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                             <td> </td>
                                      </tr>
                        
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
                <div class="TabbedPanelsContent"><div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Cash Paid</th>
                                            <th>Balance</th>
                                            <th>Date</th>
                                            <th>Sold By</th>
                                            <th>Pay Cash</th>
                                            <th>Invoice No</th>
                                            <th>Invoice</th>
                                      </tr>
                        </thead>
                        <tbody>
                          ';  $i=1;
							$query=mysql_query("select * FROM transact2 WHERE  dis = '$dis'  AND amount-cash-discount != '0' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$e = $i++;
							
							;echo '                           <tr class="odd gradeX">
                                            <td class="center">'; echo $e ;echo '</td>
                                            <td><a href="profilei.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>
                                            
                                            <td class="center">'; echo $row['amount']-$row['discount'] ;echo '</td>
                                   <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['amount']-$row['discount']-$row['cash'] ;echo '</td>         <td class="center">'; echo $row['dd'].'-'.$row['mm'].'-'.$row['yy'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td class="center">'; if($row['amount']-$row['discount']-$row['cash']!=0){ ;echo '                              <a href="paydebt.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">Pay Debt</i></a>
                              '; };echo '</td>
                              <td>'; echo $row['inv'] ;echo '</td>
                              <td> <a href="profileinv.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-warning btn-xs">Invoice</i></a></td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            
                                            <td> </td>
                                          <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-discount) AS value_sum FROM transact2 WHERE dis = '$dis' AND amount-cash-discount != '0' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td> 
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE dis = '$dis' AND amount-cash-discount != '0' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-cash-discount) AS value_sum FROM transact2 WHERE dis = '$dis' AND amount-cash-discount != '0' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                             <td> </td>
                                      </tr>
                         
                        </tbody>
                      </table>
                </div></div>
                <div class="TabbedPanelsContent">
           <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                      <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Cash Paid</th>
                                            <th>Balance</th>
                                            <th>Date</th>
                                            <th>Sold By</th>
                                            <th>Pay Cash</th>
                                            <th>Invoice No</th>
                                            <th>Invoice</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     ';   $i = 1;
							$query=mysql_query("select * FROM transact2 WHERE dis = '$dis' AND today = '$today' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$e = $i++;
							$today = date('ymd');
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $e ;echo '</td>
                                            <td><a href="profilei.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>
                                            
                                            <td class="center">'; echo $row['amount']-$row['discount'] ;echo '</td>
                                   <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['amount']-$row['discount']-$row['cash'] ;echo '</td>         <td class="center">'; echo $row['dd'].'-'.$row['mm'].'-'.$row['yy'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td class="center">'; if($row['amount']-$row['discount']-$row['cash']!=0){ ;echo '                              <a href="paydebt.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">Pay Debt</i></a>
                              '; };echo '</td>
                              <td>'; echo $row['inv'] ;echo '</td>
                              <td> <a href="profileinv.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-warning btn-xs">Invoice</i></a></td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            
                                            <td> </td>
                                          <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-discount) AS value_sum FROM transact2 WHERE dis = '$dis' AND today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td> 
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE dis = '$dis' AND today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-cash-discount) AS value_sum FROM transact2 WHERE dis = '$dis' AND today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                             <td> </td>
                                      </tr>
                                        
                                    </tbody>
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
