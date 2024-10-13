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
	
	  
		  $today = date('ymd');
	  $dd = date('d');
	  $mm = date('m');
	  $yy = date('y');
	  $ww = date('W');  
	  


include("includes/connect.inc.php");

	


$query=mysql_query("select * FROM transact2 WHERE sn = '$sn' " )or die(mysql_error());
							$row=mysql_fetch_array($query);
							$salesid = $row['salesid'];
				
 if(array_key_exists('edit', $_POST)){ 
 

$amount = $_POST['amount'] ; 
$cash = $_POST['cash'] ;
$id = $_POST['id'] ; 
$_SESSION['id'] = $id;
$query=mysql_query("select * FROM client WHERE id = '$id' " )or die(mysql_error());
							$ro=mysql_fetch_array($query);
							$name = $ro['name'];
							
  //update id
	
$sql = "UPDATE transact2 SET id='$id',name='$name' WHERE sn = '$sn' ";
$res2 = mysql_query($sql) or die(mysql_error()); 

$sql2 = "UPDATE transact SET name='$name' WHERE salesid = '$salesid' ";
$res = mysql_query($sql2) or die(mysql_error()); 

$sql3 = "UPDATE payment_method SET id='$id' WHERE salesid = '$salesid' ";
$res = mysql_query($sql3) or die(mysql_error()); 

$reportadded='<font color="red"><em>You have successfully edit the transaction</em></font>' ;

header('Refresh: 1');

} 
;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Review Payment</title>

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
            <h1><small>Receive Debts</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
<li class="TabbedPanelsTab" tabindex="0">Debt Payment</li>
</ul>
              <div class="TabbedPanelsContentGroup">
<div class="TabbedPanelsContent">
                
                
              <!-- /.panel-heading -->
                        
                <div class="panel-body">
                                                    
                          <font color="#FF0000"> '; echo $reportadded; ;echo ' </font>
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                           
                                            <th>Invoice No</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                           <th>Balance</th>
                                            <th>Date/Time</th>
                                            <th>Sold By</th>
                                            <th>Pay Cash</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							
							
							;echo '							
							
                           
                            
<form method="post" enctype="multipart/form-data">
                                  <tr class="odd gradeX">
                                            
                                            <td>'; echo ucfirst($row['inv']) ;echo '</td>
                                            <td><select class="form-control" name="id" >
                              '; 
							$query=mysql_query("select * FROM client ORDER BY name ASC " )or die(mysql_error());
							while($roww=mysql_fetch_array($query)){
						
							;echo '                              <option  '; if($row['name']==$roww['name']){ echo 'selected' ;} ;echo ' value="'; echo $roww['id'] ;echo '" >'; echo $roww['name']; ;echo '</option>
                              '; }    
 ;echo '                            </select></td>
                                            <td><input name="amount"  class="form-control" readonly value="'; echo $row['amount'] - $row['discount'] ;echo '"></td>
                                           <td class="center">'; echo $row['amount']-$row['discount']-$row['cash'] ;echo '</td>
                                            <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td class="center"><table><tr><td><button type="submit" class="btn btn-primary" name="edit" style="background-color:#903; color:#FFF;">UPDATE TRANSACTION</button></td></tr></table>
							</td>
                                      </tr></form>
                                         
                                                                                
                                    </tbody>
                            </table>
                            
                    
                           <a href="transacty.php"><i class="btn btn-success btn-xs">BACK</i></a> 
                          </div>
                            
                            <!-- /.table-responsive -->
                        
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
        $(\'#dataTables-example\').dataTable();
    });
    </script>
    
    
  </body>
</html>';;?>
