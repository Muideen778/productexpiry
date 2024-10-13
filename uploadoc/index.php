<?php
 
    session_start();

	
	
   if(array_key_exists('login', $_POST)){
      include('includes/connect.inc.php'); 
   	
	//if username and passord sent from form
	    $username = strtolower($_POST['username']);
	   $password = $_POST['password'];
	   $usertype = $_POST['usertype'];
	   
	   $today = date('y./.m./.d.,  .h.:.i');
	  
	   
	   $sql = "SELECT * FROM admin WHERE username ='$username' ";
	   $result = mysql_query($sql) or die(mysql_error()); 
	   $num = mysql_num_rows($result);
       if(mysql_num_rows($result) == 1){
	      $row = mysql_fetch_assoc($result);
		    if($row['password'] == $password  && $row['usertype'] == $usertype && $usertype == 'salesrep' ){
	           $_SESSION['admin'] = $row["username"];
			   
			   $sql3 = "UPDATE admin SET status = 'Online', logtime = '$today' WHERE username ='$username' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());
			   	
				header("location:salesrep/dashboard.php");
				$msg = "invalid log In" ;
		    }
			if($row['password'] == $password  && $row['usertype'] == $usertype && $usertype == 'manager'){
	           $_SESSION['admin'] = $row["username"];	
				
				$sql3 = "UPDATE admin SET status = 'Online', logtime = '$today' WHERE username ='$username' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());

header("location:manager/dashboard.php");
				$msg = "invalid log In" ;
			}
			
			else{
	            $msg = "invalid log In, Try Again!" ;
				
		 
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

    <title>Sales Pro'; echo $today; ;echo '</title>

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
          <ul class=\'nav navbar-nav side-nav\'>
           '; //   include('nav2.php') ;  
;echo '     
     ';    // require('nav1.php') ;  
;echo '     </ul>
     
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Access Panel</h1>
            
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome to Enterprise sales software developed by <a class="alert-link" href="http://www.trenet.com.ng" target="_blank">Technology Revolution Networks</a>! It is designed to help you manage your customer database, keep track record of all transactions and automatically send SMS to customers when they buy products or services from you. Enjoy the software.
            </div>
            
            
            
            
            <div class="login-panel panel panel-default" style="margin:0px 350px 0px 350px">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Please Sign In</b></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" id="username">
                              </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <p> <strong>Section </strong>
<select name="usertype" id="usertype" class="form-control">
                    <option selected>User Type</option>
                    <option value="salesrep">Salesrep</option>
                    <option value="manager">Manager</option>
                    </select>
                                  </p>
                                    <p><span class="center span5">
                                    <input type="submit" name="login" id="login" value="Log In" class="btn btn-primary btn-lg btn-block">
                                    <b style="color:#F0C">'; // echo $msg; //if(isset($msg)){ echo $msg;  } echo "<br>"; echo $loginerror;  
;echo '</b>
                                    </span> </p>
                                    <p>&nbsp;</p>
                            </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
                          </fieldset>
                        </form>
                    </div>
                    
                    
                    
                    
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

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
