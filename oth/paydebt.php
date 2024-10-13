<?php
 
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
	  
	  $id = $_SESSION['id'];
	  
	  $id3 = $id ;
	  
	  
	  


include("includes/connect.inc.php");

		$dd = date('d') ;
	  $yy = date('y') ;
	  $mm = date('m') ;
	  $ww = date('W') ;

	 $today = date('ymd');	
	 
	 	
		$item = $_POST['item'];
		
				$item2 = $_POST['item2'];
		
	 	    $sqls =" SELECT * FROM stock WHERE item = '$item2' LIMIT 1";
     $results = mysql_query($sqls) or die (mysql_error());
	 $rows = mysql_fetch_assoc($results);		


			 
		     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $name3 = $row['name'];
	 	 $address3 = $row['address'];
	 $phone3 = $row['phone'];
	 $stat = $row['status'];

	 
	 
	 
	 		 $sqlx =" SELECT * FROM stock WHERE item = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 $rowx = mysql_fetch_assoc($resultx);
	 

if(array_key_exists('sales', $_POST)){
	
	
$item2 = $_POST['item2'];
$des = $_POST['des'];

$qty = '1';
$price = $_POST['price'];
$cash = $_POST['cash'];
$bal = $price-$cash;
$cat = $_POST['cat'];
$other = $_POST['other'];

$amount = $qty*$price;

 $name = $row['name'];
  $phone = $row['phone'];
   $tno = $row['tno'];
   $tno2 = $tno+1;
   
   $qty1 = $rows['qty'] ;
   $qty2 = $qty1-$qty ;	
   
	$senderid = 'Trenet' ;
	
	

	$msg = "Thank you ".ucfirst($name)." for buying ".$item2." from ".$senderid.". We appreciate your patronage, hope to see you again. Our hotline is 08032318588"  ;

 $msg2 = urlencode($msg);

			  
$sql = "INSERT INTO transact (id,name,phone,item,des,qty,price,amount,other,rep,today,cash,balance,cat,dd,mm,yy,ww)
VALUES('$id','$name','$phone','$item2','$des','$qty','$price','$amount','$other','$rep','$today','$cash','$bal','$cat','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadd="Transaction Data Successfully Added!";

$sql3 = "UPDATE client SET tno = '$tno2' WHERE id = '$id3' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());



	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item2','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


if($res5){


$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg2";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";

$status = "Sent" ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


  
}
else{ $status = "Not Sent"  ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());
 }



}}}
		
		

if(array_key_exists('update', $_POST)){
	
	include("includes/connect.inc.php");
	
		
$name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];

$company = $_POST['company'];
$other = $_POST['other'];

	


			  
$sql = "UPDATE client SET name='$name', phone='$phone', address='$address', sex='$sex', company='$company', other='$other', email='$email' WHERE id = '$id' ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Updated!";

header("location:profilei.php?id=$id ");
exit;



        }
       }
			
if(array_key_exists('sms', $_POST)){
	
	$msg = $_POST['msg'];
	$phone = $row['phone'];
	$name = $row['name'];
	$senderid = 'Trenet' ;
	
	 $msg1 = urlencode($msg);

	if(empty($msg)){$er = 'Message box is empty' ;}	
	else{
	


$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg1" ;
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";

$status = "Sent" ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


  
}
else{ $status = "Not Sent"  ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());
 }


        }
	
	
} 

if(array_key_exists('balance', $_POST)){
header("location:http://trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&balance=true");
exit;
	
}


				
 if(array_key_exists('paydebt', $_POST)){ 
 
 	$sql =" SELECT * FROM transact WHERE sn = '$sn' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);

$credit = $_POST['credit'] ; 
 $ncash = $row['cash']+$credit ; 
 $nbal = $row['balance']-$credit ;
  $name = $row['name'] ; 
    $item = $row['item'] ;
  $des = $row['des'] ;
    $cat = $row['cat'] ;
  $phone = $row['phone'] ;    
  
  
	
$sql = "UPDATE transact SET cash='$ncash', balance='$nbal' WHERE sn = '$sn' ";
$res2 = mysql_query($sql) or die(mysql_error()); 

$sql9 = "INSERT INTO income (id,name,phone,item,des,amount,rep,today,cat,dd,mm,yy,ww)
VALUES('$id','$name','$phone','$item','$des','$credit','$rep','$today','$cat','$dd','$mm','$yy','$ww')";
$res9 = mysql_query($sql9) or die(mysql_error());


 header("location: paydebt.php?sn=$sn"); 
 exit ;} 
;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trenet Sales</title>

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
            <h1><small>Manage '; echo ucfirst($row['name']); ;echo '\'s Profile</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Customer\'s Profile</li>
<li class="TabbedPanelsTab" tabindex="0">Transaction List</li>
                <li class="TabbedPanelsTab" tabindex="0">Debt Payment</li>
</ul>
              <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                          
<div class="fm1">   '; echo $reportadded; ;echo '    
         
<form action="" method="get" >
<p>Customer ID<div class="fm2">'; echo $row['id']; ;echo '</div>

<p>Name<input name="name" class="form-control" placeholder="Full Name" value="'; echo $row['name']; ;echo '" disabled>
</p>
<p><label>Sex</label>
                <label class="radio-inline">
                  <input name="sex" type="radio" id="optionsRadiosInline1" value="male" '; if($row['sex'] == 'male'){ echo 'checked' ; } ;echo ' disabled> Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline2" value="female" '; if($row['sex'] == 'female'){ echo 'checked' ; } ;echo '  disabled> Female
                </label>
</p>

<p>Mobile Number<input name="phone" class="form-control" placeholder="Phone Number" value="'; echo $row['phone']; ;echo '" disabled></p>

<p>E-mail<input name="email" class="form-control" placeholder="E-mail" value="'; echo $row['email']; ;echo '" disabled></p>

<p>Address<input name="address" class="form-control" placeholder="Address" value="'; echo $row['address']; ;echo '" disabled></p>

<p>Company<input name="company" class="form-control" placeholder="Company" value="'; echo $row['company']; ;echo '" disabled></p>
<p>Other Information
<div class="fm2"> '; echo $row['other']; ;echo '</div>

</p>

</form>



</p></div>







<div class="fm1"><p></p><p></p>
<h4>Send SMS to Customer</h4>        
           <font color="red"> '; echo $er ;  ;echo '</font>
<form action="" method="post" enctype="multipart/form-data" >
<p style="float:right">
<button type="submit" class="btn btn-default" name="balance">Check SMS Balance</button> </p>

<textarea name="msg" class="form-control" rows="3" placeholder="Type SMS here..."></textarea></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" class="btn btn-default" name="sms">Send Message</button>
              
</p>


</form>



</p></div>
                </div>
                </div>
<div class="TabbedPanelsContent">
                
          <div class="panel-body"> <font color="#FF0000"> '; echo $reportadded; ;echo '</font>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Sales Id</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Cash Paid</th>
                            <th>Balance</th>
                            <th>Amount</th>
                            <th>Date/Time</th>
                            <th>Sold By</th>
                            <th>Pay Cash</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; 
							$query=mysql_query("select * FROM transact WHERE id = '$id' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $row['sn'] ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>'; echo ucfirst($row['des']) ;echo '</td>
                            <td>'; echo $row['cash'] ;echo '</td>
                            <td class="center">'; echo $row['balance'] ;echo '</td>
                            <td class="center">'; echo $row['amount'] ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td>
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                            <td class="center">'; if($row['balance']!=0){ ;echo '                              <a href="paydebt.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">Pay Cash</i></a>
                              '; };echo '</td>
                          </tr>
                          ';  } ;echo '                          <tr>
                            <td><b>Total:</b></td>
                            <td></td>
                            <td></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(balance) AS value_sum FROM transact WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  
                  </div>
                <div class="TabbedPanelsContent">
                
                
                <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                          <font color="#FF0000"> '; echo $reportadded; ;echo ' </font>
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th>Cash Paid</th>
                                            <th>Balance</th>
                                            <th>Amount</th>
                                            <th>Date/Time</th>
                                            <th>Sold By</th>
                                            <th>Pay Cash</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM transact WHERE sn = '$sn' ORDER BY sn DESC LIMIT 1 " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
                                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                                            <td>'; echo ucfirst($row['des']) ;echo '</td>
                                            <td>'; echo $row['cash'] ;echo '</td>
                                            <td class="center">'; echo $row['balance'] ;echo '</td>
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                            <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td class="center"><table><tr><td><form method="post" enctype="multipart/form-data"><input name="credit" class="form-control" size="4" maxlength="8" value="'; echo $row['balance'] ;echo '"></td><td><button type="submit" class="btn btn-default" name="paydebt" style="background-color:#903; color:#FFF;">Pay Cash</button></td></tr></table>
							</form></td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td> <b>';     $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '</b></td>
                                            <td> <b>';     $result = mysql_query("SELECT SUM(balance) AS value_sum FROM transact WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '</b></td>
                                            <td> <b>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                      </tr>
                                    </tbody>
                            </table>
                            
                    
                           <a href="profilei.php?id='; echo $id ; ;echo '"><i class="btn btn-success btn-xs">BACH</i></a> 
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
