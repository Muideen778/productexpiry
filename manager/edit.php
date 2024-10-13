<?php
 

error_reporting(0);
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
			 
		     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 



if(array_key_exists('register', $_POST)){
	
	include("includes/connect.inc.php");
	
		
$name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];

$company = $_POST['company'];
$other = $_POST['other'];

	


			  
$sql = "UPDATE client SET name='$name', phone='$phone', address='$address', sex='$sex', company='$company', other='$other', email='$email', today='$today' WHERE id = '$id' ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Updated!";

header("location:profile.php?id=$id ");
exit;



        }
       }
			
if(array_key_exists('sms', $_POST)){
	
	$msg = $_POST['msg'];
	$phone = $row['phone'];
	$name = $row['name'];
	$senderid = 'Trenet' ;

	if(empty($msg)){$er = 'Message box is empty' ;}	
	else{
	
	$sql = "INSERT INTO smsrec (id,recip,phone,msg,count,rep,today,category)
VALUES('$id','$name','$phone','$msg','1','$rep','$today','single')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){

$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=testing&password=testgni&sender=$senderid&recipient=$phone&message=$msg";
   
$ret = file($url);

if($ret){

$er="Your message has been sent Successfully!";
  
}

        }
	
	
} }

if(array_key_exists('balance', $_POST)){
header("location:http://trenetsms.com/components/com_spc/smsapi.php?username=testing&password=testgni&balance=true");
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
            <h1><small>Manage Customer Profile</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Customer\'s Profile</li>
<li class="TabbedPanelsTab" tabindex="0">Edit Profile</li>
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
<button type="submit" class="btn btn-primary" name="balance">Check SMS Balance</button> </p>

<textarea name="msg" class="form-control" rows="3" placeholder="Type SMS here..."></textarea></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" class="btn btn-primary" name="sms">Send Message</button>
              
</p>


</form>



</p></div>
                </div>
                </div>
<div class="TabbedPanelsContent">
<div class="fm1"><h3>Edit Customer information</h3>  <font color="#FF0000"> '; echo $reportadded; ;echo ' </font>        
            <p>
 <p>Customer ID<div class="fm2">'; echo $row['id']; ;echo '</div></p>
<form action="" method="post" enctype="multipart/form-data" >
<p>Name<input name="name" class="form-control" value="'; echo $row['name']; ;echo '" >
</p>
<p><label>Sex</label>
                <label class="radio-inline">
                  <input name="sex" type="radio" id="optionsRadiosInline1" value="male" '; if($row['sex'] == 'male'){ echo 'checked' ; } ;echo ' > Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline2" value="female" '; if($row['sex'] == 'female'){ echo 'checked' ; } ;echo ' > Female
                </label>
</p>

<p>Mobile Number<input name="phone" class="form-control" value="'; echo $row['phone']; ;echo '" ></p>

<p>E-mail<input name="email" class="form-control" value="'; echo $row['email']; ;echo '" ></p>

<p>Address<input name="address" class="form-control" value="'; echo $row['address']; ;echo '"></p>

<p>Company<input name="company" class="form-control" value="'; echo $row['company']; ;echo '" ></p>
<p>Other Information
<input name="other" class="form-control" value="'; echo $row['other']; ;echo '" >
</p>



<p style="float:right">
<button type="reset" class="btn btn-default">Reset Form</button>
<button type="submit" class="btn btn-primary" name="register">Edit Customer Info</button>
              
</p>
</form>
</div>









</p></div>
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
