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
	 $dd = date('d');	
	 $mm = date('m');	
	 $yy = date('y');	
	 $ww = date('W');
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





if(array_key_exists('stock', $_POST)){
include("includes/connect.inc.php");


$item = $_POST['item'];
$price = $_POST['price'];
$sprice = $_POST['sprice'];
$qty = $_POST['qty'];
$des = $_POST['des'];
$cat = $_POST['cat'];
$cp = $_POST['cp'];
$xm = $_POST['xm'];
$xy = $_POST['xy'];
$vendor = $_POST['vendor'];
$naf = $_POST['naf'];
$batch = $_POST['batch'];



		    $qry = " SELECT * FROM stock WHERE item = '$item' ";
			$result = mysql_query($qry)  or die(mysql_error());
			$num = mysql_num_rows($result);
			if($num > 0){
			   $err = "this item has already been entered";
			}
		  
		
			else{   
$sql = "INSERT INTO stock (item,des,qty,price,sprice,cat,today,rep,cp,dd,mm,yy,ww,xm,xy,vendor,naf,batch)
VALUES('$item','$des','$qty','$price','$sprice','$cat','$today','$rep','$cp','$dd','$mm','$yy','$ww','$xm','$xy','$vendor','$naf','$batch') ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){ $err = 'Item Submitted' ;}


$sql = "INSERT INTO stockup (item,des,nqty,nprice,sprice,rep,dd,mm,yy,ww,today,xm,xy,vendor,naf,batch)
VALUES('$item','$des','$qty','$price','$sprice','$rep','$dd','$mm','$yy','$ww','$today','$xm','$xy','$vendor','$naf','$batch')";
$res2 = mysql_query($sql) or die(mysql_error());


			}
}
	





if(array_key_exists('register', $_POST)){
include("includes/connect.inc.php");


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$district = $_POST['district'];
$usertype = $_POST['usertype'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];



$continue = true;
//validation
 if($_POST['firstname'] == false ){
		   $firstname2 =  "Please enter firstname";
		   $continue = false;
		 }
		 if($_POST['lastname'] == false ){
		   $lastname2 =  "Please enter surname";
		   $continue = false;
		 }
		  if($_POST['password'] == false ){
		   $password2 =  "Please enter Password";
		   $continue = false;
		   }
		    elseif($_POST['password'] != $_POST['confirmpassword'] ){
		    $password2 =  "Passwords do not match";
		    $continue = false;
		   }
		 
		 		  if($_POST['username'] == false ){
		   $username2 = "Please enter username";
		   $continue = false;
		   }
		  if($continue == true){
		    $qry = " SELECT * FROM admin WHERE username = '$username' ";
			$result = mysql_query($qry)  or die(mysql_error());
			$num = mysql_num_rows($result);
			if($num > 0){
			   $username2 = "this username has already been used";
			}
		  
		
			else{   
$sql = "INSERT INTO admin (firstname,lastname,usertype,username,password,email,phone,registeredby,sex,district)
VALUES('$firstname','$lastname','$usertype','$username','$password','$email','$phone','$rep','$sex','$district') ";
$res2 = mysql_query($sql) or die(mysql_error());


if($res2){
//$_SESSION["fname"] = strtoupper($fname);

$adminadded="User Added";
//header("location:add_user.php");


        }
       }
      }

}


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
            <h3>Stock New Item</h3>
          
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Add Products</h3>
              </div>
              <div class="panel-body">
                <font color="#FF0000">'; echo $err ; ;echo '</font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <p>
                                            <label>Vendor</label>
                                              <select name="vendor" class="form-control"> 
                                               <option>Select Vendor</option>
                        '; 
							$query=mysql_query("select * FROM supply ORDER BY company ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							
							;echo '                            <option>'; echo $row['company'] ;echo '</option>
                            '; } ;echo '</select>
                                          </p>
                                          <p>
                                            <label>Item</label>
                                              <input name="item" class="form-control" id="firstname">
                                          </p>
                                          
                                           <p>
                                            <label>Description</label>
                                              <input name="des" class="form-control" id="firstname">
                                          </p>
                                          
                                           <p>
                                             <label>Quantity</label>
<input name="qty" class="form-control" id="phone">
                                           </p>
                                           <p>
                                             <label>Critical Quantity</label>
<input name="cp" class="form-control" id="">
                                           </p>
                                           
                                          <p>
                                              <label>Cost Price</label>
                                              <input name="sprice" class="form-control" id="email">
                                           </p> 
                                           <p>
                                              <label>Selling Price</label>
                                              <input name="price" class="form-control" id="email">
                                           </p>
                                      <!---      <p><label>Expiry Date</label>
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
                            
                            '; $i = date('Y'); $i2 = $i+10; 
							while($i<=$i2){
							 $e = $i++ ;
							
							
							;echo '                            <option>'; echo $e ; ;echo '</option>
                            '; } ;echo '                          </select></td>
                        </tr>
                      </table>
                                          </p>
                                          <p>
                                              <label>NAFDAC Number</label>
                                              <input name="naf" class="form-control" id="email">
                                           </p>
                                           
                                           <p>   ---->
                                              <label>Batch Number</label>
                                              <input name="batch" class="form-control" id="email">
                                           </p>
                                            
                  </div>
<button type="reset" class="btn btn-default">Reset Form</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="stock" class="btn btn-default">Add Item to Store</button>
                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
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
