<?php
   
    session_start();
if(!isset($_SESSION['admin'])){
    header("location: index.php");
     exit;
	}
	
	  $rep = $_SESSION['admin'];
	  
if ( ! $rep) exit('No direct script access allowed');

include("includes/connect.inc.php");

	 $today = date('ymd');		
			 
$queryb=mysql_query("select * FROM client WHERE phone != '' ORDER BY id DESC" )or die(mysql_error());
     $numb = mysql_num_rows($queryb); 

if(array_key_exists('sms', $_POST)){
	
	$msg = $_POST['msg'];
	$phone = $_POST['phone'];
	$name = $row['name'];
	$senderid = 'LumenChris' ;
	
	 $msg1 = urlencode($msg);

	if(empty($msg)){$er = 'Message box is empty' ;}	
	else{
	

$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg1";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";

$status = "Sent" ;
  
}
else{ $er="SMS not sent!";

$status = "Not Sent"  ;	

}

$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','$numb','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());

        }
	
	
} 


;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customers</title>

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
width:40%;
float:left; 
margin-right:50px;
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
            <h1><small>Manage Customers <font color="red"> '; $ers = $_SESSION['ers']; if(isset($_SESSION['ers'])){echo 'Last ' ;} echo $ers ; ;echo '</font></small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Customer List</li>
                <li class="TabbedPanelsTab" tabindex="0">Send Reminder to All Customers</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body"> <font color="#FF0000"> '; echo $reportadded; ;echo '</font>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Client Id</th>
                            <th>School Name</th>
                            <th>School Phone Number</th>
                            <th>E-mail</th>
                            <th>Total Amount</th>
                            <th>Cash Paid</th>
                            <th>Balance</th>
                            <th>Send SMS</th>
                            <th>TR</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; 
							$query=mysql_query("select * FROM client ORDER BY id DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $row['id'] ;echo '</td>
                            <td><a href="profilei.php?id='; $idd = $row['id'] ; echo $idd ; ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>
                            <td>'; echo ucfirst($row['phone']) ;echo '</td>
                            <td>'; echo $row['email'] ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE id = '$idd' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact WHERE id = '$idd' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">'; $result = mysql_query("SELECT SUM(balance) AS value_sum FROM transact WHERE id = '$idd' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center"><a href="smsrem.php?id='; echo $idd ;echo '"><i class="btn btn-warning btn-xs">Send SMS</i></a></td>
                            <td>';  echo '<b class="btn btn-primary btn-xs">'.$row['tno'].'</b>'; ;echo '</td>
                          </tr>
                          ';  } ;echo '                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
                <div class="TabbedPanelsContent">
               <div class="fm1">   <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Click the botton below once to send reminder to all customers that are still owing the company!</div>
                 <p></p> <p><a href="smsrem2.php"><i class="btn btn-warning btn-ms">Remind all Debtors</i></a></p> </div>
                 
                 <div class="fm1">
                 <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>Broadcas SMS to all Customers</h4>
                <font color="red"> '; echo $er ;  ;echo '</font>
                <form action="" method="post" enctype="multipart/form-data" >
                  <p style="float:right">
                    <button type="submit" class="btn btn-default" name="balance">Check SMS Balance</button>
                  </p>
                  <br>
                </form>
                <form action="" method="post" enctype="multipart/form-data" >
                  <p>Recipients: <font color="red">';   echo $numb ; ;echo '</font>
                    <textarea name="phone" class="form-control">'; $queryd=mysql_query("select * FROM client WHERE phone != '' ORDER BY id DESC" )or die(mysql_error());
     $numb = mysql_num_rows($queryd);   
							while($rowd=mysql_fetch_array($queryd)){ echo $rowd['phone'].',' ;} ;echo '                    </textarea>
                  </p>
                  <p>
                    <textarea name="msg" class="form-control" rows="3" placeholder="Type SMS here..."></textarea>
                  </p>
                  <p style="float:right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-default" name="sms">Send Message</button>
                  </p>
                </form>
                <p></p><br>
                <br>
              </div></div>
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
