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
	 $today2 = $today-1;		
			  
 $sqld2 =" SELECT * FROM transact LIMIT 0, 100000 ";
     $resultd2 = mysql_query($sqld2) or die (mysql_error());
     $numd2 = mysql_num_rows($resultd2); 
	 
	  $sql92 =" SELECT * FROM client LIMIT 0, 100000 ";
     $result92 = mysql_query($sql92) or die (mysql_error());
     $num92 = mysql_num_rows($result92);  
	 
	  $sqld1 =" SELECT * FROM transact WHERE today = '$today' LIMIT 0, 100000 ";
     $resultd1 = mysql_query($sqld1) or die (mysql_error());
     $numd1 = mysql_num_rows($resultd1); 
	 
	  $sql91 =" SELECT * FROM client WHERE today = '$today' LIMIT 0, 100000 ";
     $result91 = mysql_query($sql91) or die (mysql_error());
     $num91 = mysql_num_rows($result91);    
;echo '



<!DOCTYPE html>
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
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
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
            <h1>Dashboard <small>Statistics Overview</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome to Enterprise sales software developed by <a class="alert-link" href="http://www.trenet.com.ng" target="_blank">Technology Revolution Networks</a>! It is designed to help you manage your customer database, keep track record of all transactions and automatically send SMS to customers when they buy products or services from you. Enjoy the software.
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">'; echo $num92 ; ;echo '</p>
                    <p class="announcement-text">Customers!</p>
                  </div>
                </div>
              </div>
              <a href="clients.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      All Customers
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">'; echo $numd2 ; ;echo '</p>
                    <p class="announcement-text">Transactions</p>
                  </div>
                </div>
              </div>
              <a href="transact2.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">All Transactions</div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">'; echo $num91 ; ;echo '</p>
                    <p class="announcement-text">Customers</p>
                  </div>
                </div>
              </div>
              <a href="clients.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">Today\'s Customers</div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">'; echo $numd1 ; ;echo '</p>
                    <p class="announcement-text">Transactions</p>
                  </div>
                </div>
              </div>
              <a href="transact3.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">Today\'s Transactions</div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row">
          
         <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Today\'s Customers</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                          
                      <tr>
                        <th>Client # <i class="fa fa-sort"></i></th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Sex <i class="fa fa-sort"></i></th>
                        <th>Phone Number <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody> 
					'; 
							$query=mysql_query("select * FROM client WHERE today = '$today' ORDER BY id DESC LIMIT 0 , 6" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                      <tr>
                        <td>'; echo $row['id'] ; ;echo '</td>
                        <td>'; echo $row['name'] ; ;echo '</td>
                        <td>'; echo $row['sex'] ; ;echo '</td>
                        <td>'; echo $row['phone'] ; ;echo '</td>
                      </tr>
                      ';  }  ;echo '                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="client.php">View All Customers <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          
           <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Today\'s Transactions</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                          
                     <tr>
                        <th>Sales # <i class="fa fa-sort"></i></th>
                        <th>Sales Time <i class="fa fa-sort"></i></th>
                        <th>Customer Name <i class="fa fa-sort"></i></th>
                        <th>Amount (NGN) <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody> 
					'; 
							$query=mysql_query("select * FROM transact WHERE today = '$today' ORDER BY sn DESC LIMIT 0 , 5" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                      <tr>
                        <td>'; echo $row['sn'] ; ;echo '</td>
                        <td>'; echo $row['created'] ; ;echo '</td>
                        <td>'; echo $row['name'] ; ;echo '</td>
                        <td>'; echo $row['amount'] ; ;echo '</td>
                      </tr>
                      ';  }  ;echo '                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="transact3.php">View All New Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Yesterday\'s Transactions</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                          
                      <tr>
                        <th>Sales # <i class="fa fa-sort"></i></th>
                        <th>Sales Time <i class="fa fa-sort"></i></th>
                        <th>Customer Name <i class="fa fa-sort"></i></th>
                        <th>Amount (NGN) <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody> 
					'; 
							$query=mysql_query("select * FROM transact WHERE today = '$today2' ORDER BY sn DESC LIMIT 0 , 5" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                      <tr>
                        <td>'; echo $row['sn'] ; ;echo '</td>
                        <td>'; echo $row['created'] ; ;echo '</td>
                        <td>'; echo $row['name'] ; ;echo '</td>
                        <td>'; echo $row['amount'] ; ;echo '</td>
                      </tr>
                      ';  }  ;echo '                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="transact3.php">View All New Transactions <i class="fa fa-arrow-circle-right"></i></a>
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

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
';;?>
