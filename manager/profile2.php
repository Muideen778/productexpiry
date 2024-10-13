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
	 $today2 = $today-1;		
	 
	     $sql =" SELECT * FROM admin WHERE username = '$rep' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
			  



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




	if(array_key_exists('edit', $_POST)){
	
$opwd = md5($_POST['opwd']);
$npwd = md5($_POST['npwd']);
$npwd2 = md5($_POST['npwd2']);


	   $result = mysql_query( "SELECT * FROM admin WHERE username = '$rep' ") or die(mysql_error()); 
	      $row = mysql_fetch_assoc($result);
		  $pwd = $row['password'];
		  
		  
	 
	 if($pwd==$opwd && $npwd==$npwd2){
	 $sqlm = "UPDATE admin SET password = '$npwd' WHERE username = '$rep' ";
$resm = mysql_query($sqlm) or die(mysql_error());

$re='Password Successfully Changed! ' ;

	 } else{
$re='You have either entered incorect old password or new passwords do not match! ' ;
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
            <h2>User Profile</h2>
          
          </div>
        </div><!-- /.row -->

     
        <div class="row">
          
         <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"> My Personal Data</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post">
                                        <div class="form-group">
                                          <p>
                                              <label>Surname</label>
                                              <input name="firstname" class="form-control" id="firstname" value="'; echo $row['firstname']; ;echo '" disabled>
                                          </p>
                                          
</div>
                                         <div class="form-group">
                                           <p>
                                              <label>Other names</label>
                                              <input name="lastname" class="form-control" id="lastname" value="'; echo $row['lastname']; ;echo '" disabled>
                                           </p>
                                           
                            <p>
                                              <label>Sex</label>
                                              <input name="lastname" class="form-control" id="lastname" value="'; echo $row['sex']; ;echo '" disabled>
                                           </p>
                                           
                                          <p>
                                              <label>Phone Number</label>
                                              <input name="lastname" class="form-control" id="lastname" value="'; echo $row['phone']; ;echo '" disabled>
                                           </p>
                                           
                                           <p>
                                              <label>E-mail</label>
                                              <input name="lastname" class="form-control" id="lastname" value="'; echo $row['email']; ;echo '" disabled>
                                           </p>
                                           <p>
                                              <label>Usernames</label>
                                              <input name="lastname" class="form-control" id="lastname" value="'; echo $row['username']; ;echo '" disabled>
                                           </p>
                                           
                                          <p>
                                              <label>User Type</label>
                                              <input name="lastname" class="form-control" id="lastname" value="'; echo $row['usertype']; ;echo '" disabled>
                                           </p> 
                                           
                  </div>

                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>   <div class="fm1">
      <b><font color="#00FF00" size="+1"><i> ';  echo $re ; ;echo '</i></font></b><br>
                 <h4>  <b>Change Password</b></h4>
         <form method="post" enctype="multipart/form-data"> 
         Old Password<br>
         <input name="opwd" type="password" class="form-control">
         New Password<br>
         <input name="npwd" type="password" class="form-control">
         Retype New Password<br>
         <input name="npwd2" type="password" class="form-control"><br>
          <button type="submit" class="btn btn-default" name="edit">Change Password</button>  </form> 
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
