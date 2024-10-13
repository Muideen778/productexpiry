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
	  $_SESSION['id'] = $id;
	  $id3 = $id ;
	  
	  
	  


include("includes/connect.inc.php");

	 $today = date('ymd');	
	  $dd = $_POST['dd'] ;
	  $yy = $_POST['yy'] ;
	  $mm = $_POST['mm'] ;
	 $ww = date('W') ;	
	 
	 
	 	
		$item = $_POST['item'];
		
				$item2 = $_POST['item2'];
		
	 	    $sqls =" SELECT * FROM stock WHERE item = '$item2' LIMIT 1";
     $results = mysql_query($sqls) or die (mysql_error());
	 $rows = mysql_fetch_assoc($results);		


			 
		     $sql =" SELECT * FROM supply WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $name3 = $row['name'];
	 	 $address3 = $row['address'];
	 $phone3 = $row['phone'];

	 
	 
	 
	 		 $sqlx =" SELECT * FROM stock WHERE item = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $cp = $rowx['cp'];
	 $cp1 = $cp/2;
	 $cp2 = $cp*2;
if(!empty($cp)){
if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt>$cp && $qt<=$cp2){ $sta = 'Getting Critical' ; $color = 'blue' ;} elseif($qt>$cp1 && $qt<=$cp){ $sta = 'Critical' ; $color = 'purple';} elseif($qt>0 && $qt<=$cp1){ $sta = 'Very Critical' ; $color = '#900';} elseif($qt>$cp2){ $sta = 'OK' ; $color = 'green';}}
	

if(array_key_exists('sales', $_POST)){
	
	
$item2 = $_POST['item2'];
$des = $_POST['des'];

$qty = $_POST['qty'];
$price = $_POST['price'];
$other = $_POST['other'];
$amount = $price;

 $name = $row['name'];
  $phone = $row['phone'];
   $tno = $row['tno'];
   $tno2 = $tno+1;
   
   $qty1 = $rows['qty'] ;
   $qty2 = $qty1-$qty ;	
   
	$senderid = 'BlossomFood' ;
	
	

	$msg = "Thank you ".ucfirst($name)." for buying ".$item2." from ".$senderid.".We appreciate your patronage,hope to see you again.Our hotline is 08034100823"  ;

 $msg2 = urlencode($msg);

//$sql = "INSERT INTO income (sn,id,name,phone,item,des,cat,amount,rep,today,dd,mm,yy,ww)
//VALUES('$sn','$id','$name','$phone','$item2','$des','$item2','$amount','$rep','$today','$dd','$mm','$yy','$ww')";
//$res2 = mysql_query($sql) or die(mysql_error());

			  
$sql = "INSERT INTO transact2 (id,name,phone,item,des,cat,qty,price,amount,balance,other,rep,today,dd,mm,yy,ww)
VALUES('$id','$name','$phone','$item2','$des','$item2','$qty','$price','$amount','$amount','$other','$rep','$today','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Supplier Data Successfully Added!";



$sql3 = "UPDATE supply SET tno = '$tno2' WHERE id = '$id3' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());

/*

$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=blossom&password=foods&sender=$senderid&recipient=$phone&message=$msg2";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this Supplier!";

$status = "Sent" ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item2','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


  
}
else{ $status = "Not Sent"  ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item2','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());
 }

*/

}}
		
		

if(array_key_exists('update', $_POST)){
	
	
		
$name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];

$company = $_POST['company'];
$other = $_POST['other'];

	


			  
$sql = "UPDATE supply SET name='$name', phone='$phone', address='$address', sex='$sex', company='$company', other='$other', email='$email' WHERE id = '$id' ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Supplier Data Successfully Updated!";

header("location:profilesu.php?id=$id ");
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
	


$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=blossom&password=foods&sender=$senderid&recipient=$phone&message=$msg1" ;
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this Supplier!";

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
header("location:http://trenetsms.com/components/com_spc/smsapi.php?username=blossom&password=foods&balance=true");
exit;
	
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
                <li class="TabbedPanelsTab" tabindex="0">Supplier\'s Profile</li>
                <li class="TabbedPanelsTab" tabindex="0">Edit Profile</li>
                <li class="TabbedPanelsTab" tabindex="0">Transaction List</li>
                <li class="TabbedPanelsTab" tabindex="0">Add Transaction</li>
</ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                          
<div class="fm1">   '; echo $reportadded; ;echo '    
         
<form action="" method="get" >
<p>Supplier ID<div class="fm2">'; echo $row['id']; ;echo '</div>

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

<p></p>

</form>



<p></p></div>







<div class="fm1"><p></p><p></p>
<h4>Send SMS to Supplier</h4>        
           <font color="red"> '; echo $er ;  ;echo '</font>
<form action="" method="post" enctype="multipart/form-data" >
<p style="float:right">
<button type="submit" class="btn btn-default" name="balance">Check SMS Balance</button> </p>

<textarea name="msg" class="form-control" rows="3" placeholder="Type SMS here..."></textarea><p></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" class="btn btn-default" name="sms">Send Message</button>
              
</p>


</form>



<p></p></div>
                </div>
                </div>
                <div class="TabbedPanelsContent">
                  <div class="fm1">
                    <h3>Edit Supplier information</h3>
                    <font color="#FF0000"> '; echo $reportadded; ;echo '</font>
                    <p>                    
                    <p>Supplier ID
                    <div class="fm2">'; echo $row['id']; ;echo '</div>
                    <p></p>
                    <form action="" method="post" enctype="multipart/form-data" >
                      <p>Name
                        <input name="name" class="form-control" value="'; echo $row['name']; ;echo '" >
                      </p>
                      <p>
                        <label>Sex</label>
                        <label class="radio-inline">
                          <input name="sex" type="radio" id="optionsRadiosInline1" value="male" '; if($row['sex'] == 'male'){ echo 'checked' ; } ;echo ' >
                          Male </label>
                        <label class="radio-inline">
                          <input type="radio" name="sex" id="optionsRadiosInline2" value="female" '; if($row['sex'] == 'female'){ echo 'checked' ; } ;echo ' >
                          Female </label>
                      </p>
                      <p>Mobile Number
                        <input name="phone" class="form-control" value="'; echo $row['phone']; ;echo '" >
                      </p>
                      <p>E-mail
                        <input name="email" class="form-control" value="'; echo $row['email']; ;echo '" >
                      </p>
                      <p>Address
                        <input name="address" class="form-control" value="'; echo $row['address']; ;echo '">
                      </p>
                      <p>Company
                        <input name="company" class="form-control" value="'; echo $row['company']; ;echo '" >
                      </p>
                      <p>Other Information
                        <input name="other" class="form-control" value="'; echo $row['other']; ;echo '" >
                      </p>
                      <p style="float:right">
                        <button type="reset" class="btn btn-default">Reset Form</button>
                        <button type="submit" class="btn btn-default" name="update">Edit Supplier Info</button>
                      </p>
                    </form>
                  </div>
                  <p></p>
                </div>
                <div class="TabbedPanelsContent">
                
                
                <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                          <font color="#FF0000"> </font>
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Product</th>
                                            
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Date/Time</th>
                                            <th>Sold By</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM transact2 WHERE id = '$id' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
                                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                                            
                                            <td>'; echo $row['qty'] ;echo '</td>
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                   <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            <td> </td>
                                            <td> </td>
                                          <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact2 WHERE id = '$id' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td> 
                           
                            
                                            <td> </td>
                                            <td> </td>
                                           
                                      </tr>
                                    </tbody>
                            </table>
                            
                    
                            
                          </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
                
                
                </div>
                <div class="TabbedPanelsContent">
                 <h3>Sales information</h3>  <!-- <div class="fm1">
                    
                    <font color="#FF0000">'; echo $reportadded.'  ' ; echo $er; ;echo '</font>
                    
                                        <form action="" method="post" enctype="multipart/form-data">
                      <p>
                        <select name="item" class="form-control" >
                        <option>Select Product</option>
                        '; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC001" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							
							;echo '                            <option>'; echo $row['item'] ;echo '</option>
                            '; } ;echo '                        </select>
                        <p style="float:right">
                        <button type="submit" class="btn btn-default" >Find Item</button>
                        </p>
                        </form>
                       </div> ----->
                       
                       <div class="fm1">
                           <font color="green"> '; echo $reportadded; ;echo '</font>           
                    <form action="" method="post" enctype="multipart/form-data">
                      <p><table width="100%">
                        <tr><td><b>Date:</b></td><td><select name="dd" class="form-control">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        <option selected>'; echo date(d); ;echo '</option>
                        
                        </select></td><td>
                        <select name="mm" class="form-control">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option selected>'; echo date(m); ;echo '</option>
                        </select></td><td>
                        <select name="yy" class="form-control">
                        <option value="10">2010</option>
                        <option value="11">2011</option>
                        <option value="12">2012</option>
                        <option value="13">2013</option>
                        <option value="14">2014</option>
                        <option selected value="'; echo date(y); ;echo '">'; echo date(Y); ;echo '</option>
                        </select>
                        </td></tr></table></p><p>
 						<input name="item2" class="form-control" value="" placeholder="Item" >
                      </p>
                      <p>
                        <input name="des" class="form-control" rows="3" value=""  placeholder="Item Description">
                      </p>
                      <p>
                        <input name="qty" class="form-control" value=""  placeholder="Quantity">
                      </p>
                      <p>
                        <input name="price" class="form-control" value=""  placeholder="Total Cost">
                      </p>
                      <p>
                        <input name="other" class="form-control" rows="3" placeholder="Other Information" >
                      </p>
                      <p style="float:right">
                        <button type="reset" class="btn btn-default">Reset Form</button>
                        <button type="submit" class="btn btn-default" name="sales">Add Sales</button>
                      </p>
                    </form>
                    <p></p>
                  </div>
                </div>
</div>
              </div>
            </div>
            </div>
            
            
       
            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:3});
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
