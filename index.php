<?php
error_reporting(0);
session_start(); ob_start();

	 include('includes/connect.inc.php'); 

 
  
   if(array_key_exists('login', $_POST)){
	    $username = strtolower($_POST['username']);
	   $password = md5($_POST['password']);
	   
	   $result = $datab->dbSel('admin','username',$username); 
	   $num = $datab->Crows($result);
       if($num == 1){
	      $row = $datab->Fetch($result);
		    if($row->password == $password){
	           $_SESSION['admin'] = $row->username;
			   $_SESSION['user'] = $row->usertype;

if($row->active=='0'){ $msg = 'You have not been authorized to access this server, please contact the administrator';} 
	else{	   
$update = mysql_query("UPDATE admin SET status = 'Online', logtime = '$today' WHERE username ='$username' LIMIT 1") or die(mysql_error());

				header("location:manager/salesall.php");
		    }  }

			else{
	            $msg = "invalid log In, Try Again!" ;
	        }
        }else{
          $msg = "invalid log In, Try Again!" ;
      }
		
 }else{
  //$url="manager/activate/";
  //$file="manager/activate/activate.php";
  //include('manager/activate/checkactive.php');
 }

  $sqlogo =" SELECT * FROM clogo WHERE id = '1' ";
$resultlogo = mysql_query($sqlogo) or die (mysql_error());
$rowlogo = mysql_fetch_assoc($resultlogo);

$logo = $rowlogo['logo'];
$rfooter = $rowlogo['rfooter'];
$bglogo = $rowlogo['bglogo'];

$sqltitle =" SELECT * FROM title WHERE sn = '1' ";
$resulttitle = mysql_query($sqltitle) or die (mysql_error());
$rowltitle = mysql_fetch_assoc($resulttitle);

$title = $rowltitle['name'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <script type="text/JavaScript">

<!--

function BrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}

//-->

</script>

<style>
html{
  height: 100%;
}
  </style>

  </head>

  <body background="<?=$bglogo?>" style="background-repeat: no-repeat; background-size: 100% 100%;">

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
         <img src="tlog.png" width="220"  >  <ul class="nav navbar-nav navbar-right navbar-user"><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li><li> <a href="#"><font color="#00FF00" size="+2" face="impact">PRODUCT EXPIRY SYSTEM</font></a></li></ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
       
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
         
            <br>
            <br>
            <br><br>
            <br>
           <center> 
            

        
         <div class="login-panel panel panel-default" style="width:320px">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Please Sign In</b></h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" id="username" value="<?=$_POST['username'];?>">
                              </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?=$_POST['password'];?>">
                                </div>
                                <div class="form-group">
                                 <!--   <p> <strong>Section </strong>
<select name="usertype" id="usertype" class="form-control">
                    <option selected>User Type</option>
                    <option value="salesrep">Salesrep</option>
                    <option value="manager">Manager</option>
                    </select>
                                  </p> --->
                                    <p><span class="center span5">
                                    <input type="submit" name="login" id="login" value="Log In" class="btn btn-primary btn-lg btn-block" onChange="confirmClose">
                                    <b style="color:#F0C"><?php echo $msg; //if(isset($msg)){ echo $msg;  } echo "<br>"; echo $loginerror;  
;  //echo sha1(12); ?></b>
                                    </span> </p>
                                    <p></p>
                        <!--   <a href="#" onclick="BrWindow('sign/','','width=1200,height=450')" >Supplier Login</a>   --->
                            </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
                          </fieldset>
                        </form>
                    </div>
                    
                    
                    
                    
          </div>
          </center>
          
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
