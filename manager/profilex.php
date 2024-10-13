<?php
 
error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
   header("location: index.php");
      exit;
	}
	if(empty($_SESSION['userx'])){
   header("location: staffdetails.php");
      exit;
	}

	  
	  $repx = $_SESSION['userx'];
	   $rep = $_SESSION['admin'];


include("includes/connect.inc.php");

	 $today = date('ymd');
	 
	
	 

	   $resul = mysql_query( "SELECT * FROM admin WHERE username = '$rep' ") or die(mysql_error()); 
	      $ro = mysql_fetch_assoc($resul);
		  $pwd = $ro['password'];


	if(array_key_exists('edit', $_POST)){
	
$opwd = md5($_POST['opwd']);
$npwd = md5($_POST['npwd']);
$npwd2 = md5($_POST['npwd2']);

	 
	 //if($pwd==$opwd && $npwd==$npwd2){
     if($npwd==$npwd2){
	 $sqlm = "UPDATE admin SET password = '$npwd' WHERE username = '$repx' ";
$resm = mysql_query($sqlm) or die(mysql_error());
$delay = 1; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
header("Refresh: $delay;"); 
$re='Password Successfully Changed!' ;

	 } else{
$re='You have either entered incorect old password or new passwords do not match! ' ;
	 } 
	 }

if(array_key_exists('del', $_POST)){
$sql =" DELETE FROM admin WHERE username = '$repx' "; 
     $result = mysql_query($sql) or die (mysql_error());
     unset($_SESSION['userx']);
     $delay = 0; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
	header("Refresh: $delay;"); 
	 }
   if(array_key_exists('uprole', $_POST)){
    $usertype = $_POST['usertype'];
    $sql ="UPDATE admin SET usertype = '$usertype' WHERE username = '$repx' ";
         $result = mysql_query($sql) or die (mysql_error());
         $delay = 1; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
      header("Refresh: $delay;"); 
      $ros="User role Successfully Changed!";
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
 
   <style type="text/css">
.fm1{padding:20px;
color:#033;
margin-right:10%;
float:right;
width:400px;
}

  </style> </head>

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
            <h3>User Profile <a href="staffdetails.php" style="float: right" class="btn btn-danger"> Staff</a></h3>
          
          </div>
        </div><!-- /.row -->

     
        <div class="row">
         
         <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"> User Personal Data</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>'; $sql =" SELECT * FROM admin WHERE username = '$repx' "; 
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);  $usertype=$row['usertype']  ;echo '     
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
                                           <p>
                                        
                                           <button type="submit" class="btn btn-danger" name="del">Delete Account</button>  </form> 
          
                                           </p> 
                                         
                  </div>

                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
               
              </div>
              </div>
            </div>   
            
            
            <div class="col-lg-4">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"> <b>Reset Password</b></h3>
              </div>
              <div class="panel-body">
            
              <b><font color="#00FF00" size="-1"><i> '.$ros.'</i></font></b>
                 
         <form method="post"> 
         
        
          <label>User Role</label>
                                         <select name="usertype" class="form-control">
                                        '; if( $usertype=='admin'){ $tadmin="selected";}
                                        elseif( $usertype=='cahsier'){$tcahsier="selected";}; echo '               
                                        <option value="salesrep">Sales Rep</option>
                                         <option value="cahsier" '.$tcahsier.'>Cashier</option>
                                         <option value="admin" '.$tadmin.'>Admin</option>


                                         </select><br>
          <button type="submit" class="btn btn-primary" name="uprole">Update Role</button>  </form> 
          
      </div> 
          </div>
          

          <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title"> <b>Update Role</b></h3>
              </div>
              <div class="panel-body">
            
            ';  if($_SESSION['user']=='admin'){ ;echo '      <b><font color="#00FF00" size="+1"><i> ';  echo $re ; ;echo '</i></font></b>
                 
         <form method="post" align="center"> 
         
          Password will reset to <stong>password1</strong><hr>
         <input name="opwd" type="hidden" class="form-control">
         
         <input name="npwd" type="hidden" class="form-control" value="password1">
        
         <input name="npwd2" type="hidden" class="form-control" value="password1">
          <button type="submit" class="btn btn-primary" name="edit">Click to Reset Password</button>  </form> 
          
          ';  } ;echo '        </div> 
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
