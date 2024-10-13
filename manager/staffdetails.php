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
userLog();

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







if(array_key_exists('register', $_POST)){


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
$passwordx = md5($password);


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
VALUES('$firstname','$lastname','$usertype','$username','$passwordx','$email','$phone','$rep','$sex','$district') ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){
//$_SESSION["fname"] = strtoupper($fname);
$adminadded="User Successfully Added";
echo "<script>alert('".$adminadded."');</script>";

header("refresh: 0;");
//header("location:add_user.php");


        }
       }
      }

}

if(array_key_exists('title', $_POST)){
	

	  
$nick = $_POST['nick'];
$add = $_POST['add'];
$motto = $_POST['motto'];
$pn = $_POST['phone'];
$pn2 = $_POST['phone2'];
$email = $_POST['email'];
$website = $_POST['website'];
$senderid = $_POST['senderid'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$cos = substr(str_shuffle(str_repeat("1234567890", 12)), 0, 12);
$date = date('d/m/y');
$actno = rand(1000, 9000).date('ymdh');
			  
$sql = "UPDATE title SET phone = '$pn', phone2 = '$pn2', address = '$add', email = '$email', website = '$website', senderid = '$senderid', username = '$username', pwd = '$pwd', cos = '$cos', date = '$date', nick = '$nick', actno = '$actno', motto = '$motto' WHERE sn = '1' LIMIT 1";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){
	


$erb="!";

      echo "<script type=\"text/javascript\">
    alert(\"Business Data Successfully Updated!  You can now activate the software\");
    window.location = \"setting.php\"
    </script>";


   			}}	
			
			
				if(array_key_exists('signout', $_POST)){
$_SESSION['userx'] = $_POST['name'] ;
header('location: profilex.php');  
}
//$userr = $_SESSION['username']; 



				if(array_key_exists('power', $_POST)){
  	$result = mysql_query("UPDATE admin SET active = '1' WHERE usertype!='admin' ");
}

				if(array_key_exists('shutdown', $_POST)){
					$today = date('y/m/d h:i');
	$result = mysql_query("UPDATE admin SET active = '0', status = 'Offline', logtime = '$today' WHERE usertype!='admin' ");
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
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
            <h3>Manage Staffs!</h3>
          
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row">
           '; ;echo '          
           <div class="col-lg-4">
          
           <div class="panel panel-primary">
           <div class="panel-heading">
             <h3 class="panel-title"><i class="fa fa-money"></i> Add New User</h3>
           </div>
           <div class="panel-body">
           <font color="green"></font><div class="table-responsive">
             <table class="table table-bordered table-hover table-striped tablesorter">
               <tbody> 
     
                 <tr>
                   <td>
<form method="post" enctype="multipart/form-data">
                                   <div class="form-group">

       
                                     <p>
                                         <label>Surname</label>
                                         <input name="firstname" class="form-control" id="fname" value="'.$_POST['firstname'].'">
                                      <span style="color:red; font-size: 10px;">'.$firstname2.'</span>
                                         </p> 
                                      
                                      <p>
                                         <label>Other Names</label>
                                         <input name="lastname" class="form-control" id="onames" value="'.$_POST['lastname'].'">
                                         <span style="color:red; font-size: 10px;">'.$lastname2.'</span>
                                         </p> 
                                      
                                       <p>
                                       <label>Mobile</label>
                                       <input name="phone" class="form-control" id="phone" value="'.$_POST['phone'].'">
                                       <span style="color:red; font-size: 10px;">'.$phone2.'</span>
                                       </p>
                                     
                                      <p>
                                        <label>E-mail</label>
                                        <input name="email" class="form-control" id="email" value="'.$_POST['email'].'">
                                        <span style="color:red; font-size: 10px;">'.$email2.'</span>
                                        </p>
                                      <p>
                                        <label>Sex</label>
                                        <select name="sex" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        </select>
                                        <span style="color:red; font-size: 10px;">'.$sex2.'</span>
                                      </p>
         <p>
                                        <label>Address</label>
                                        <input name="district" class="form-control" id="" value="'.$_POST['district'].'">
                                        <span style="color:red; font-size: 10px;">'.$district2.'</span>
                                     <p>
                                         <label>User Role</label>
                                         <select name="usertype" class="form-control">
                                         <option value="salesrep">Sales Rep</option>
                                         <option value="cahsier">Cashier</option>
                                         <option value="admin">Admin</option>
                                         </select>
                                         <span style="color:red; font-size: 10px;">'.$usertype2.'</span>
                                      </p> 
                                      
                                       <p>
                                         <label>Username</label>
                                         <input name="username" class="form-control" id="" value="'.$_POST['username'].'">
                                         <span style="color:red; font-size: 10px;">'.$username2.'</span>
                                         </p> 
                                     <p>
                                       <label>Password</label>
                                       <input name="password" type="password" class="form-control" value="'.$_POST['password'].'">
                                       <span style="color:red; font-size: 10px;">'. $password2.'</span>
                                      </p> 
                                       <p>
                                         <label>Confirm Password</label>
                                         <input name="confirmpassword" type="password" class="form-control">
                                      </p> 

                                      <p>
                                      <br>
                                      <button type="submit" name="register" class="btn btn-primary">Click to Save</button>
                                      <button type="reset" style="float:right" class="btn btn-danger">Click to Reset</button>
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
         
         
         
         
         <div class="col-lg-8" id="users">
         <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title"><i class="fa fa-money"></i> Currently Online Users</h3>
         </div>
         <div class="panel-body">
           <div class="table-responsive">
             <table class="table table-bordered table-hover table-striped tablesorter">
               <thead>
                 <tr>
                   <th>Name <i class="fa fa-sort"></i></th>
                   <th>Phone No <i class="fa fa-sort"></i></th>
                   <th>Username</th>
                 </tr>
               </thead>
               <tbody>
                 '; 
          $query=mysql_query("select * FROM admin WHERE status = 'online' ORDER BY sn DESC LIMIT 0 , 20" )or die(mysql_error());
          while($row=mysql_fetch_array($query)){
          $id=$row['id'];
          
          ;echo '                     <tr>
                   <td>'; echo ucfirst($row['firstname']).' '.ucfirst($row['lastname']) ; ;echo '</td>
                   <td>'; echo $row['phone'] ; ;echo '</td>
                   <td>'; echo $row['username'] ; ;echo '</td>
                 </tr>
                 ';  }  ;echo '                   </tbody>
             </table>
           </div>
         </div>
       </div>
           <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="panel-title"><i class="fa fa-money"></i> View Registered Users</h3>
             </div>
             <div class="panel-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-hover table-striped tablesorter">
                   <thead>
                     <tr>
                       <th>Name <i class="fa fa-sort"></i></th>
                       <th>Unit <i class="fa fa-sort"></i></th>
                       
                       <th>Status</th>
                       <th>Log in/out time</th>
                      ';   if($_SESSION['user']=='admin'){ ;echo ' <th>Authorize</th>
                        '; } ;echo '                       <th>Username</th>
                     </tr>
                   </thead>
                   <tbody>
                     '; 
							$query=mysql_query("select * FROM admin ORDER BY sn DESC LIMIT 0 , 40" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                     <tr>
                       <td>'; echo ucfirst($row['firstname']).' '.ucfirst($row['lastname']) ; ;echo '</td>
                       <td>'; echo $row['dispensary'] ; ;echo '<br><b>';  if($_SESSION['user']=='admin'){  echo $row['usertype'] ; } ;echo '</b></td>
                  
					   <td class="center"><font color=\''; if($row['status'] == 'Online'){ echo '#00DF00' ; } else{echo '#FF0000' ;};echo '\' >
                              ';  echo $row['status'] ;echo '                            </font></td>
                            <td class="center">'; echo $row['logtime'] ;echo '</td>
                           ';   if($_SESSION['user']=='admin'){ ;echo '                            <td class="center">'; $active = $row['active']; if($active=='1'){ ;echo '                                      <a href="active.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-warning btn-xs">Deactivate</i></a>
                                      '; } elseif($active=='0'){ ;echo '                                      <a href="active.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-primary btn-xs">Activate</i></a>
                                      '; } ;echo '</td>
                                      
					    '; }  if($_SESSION['user']=='admin'){ ;echo ' <td><form method="post" > <input name="name" value="'; echo $row['username']; ;echo '" hidden ><input type="submit" name="signout" value="'; echo $row['username'] ;echo '" ></form></td> ';  } else { ;echo '                   
                       <td>'; echo $row['username'] ; ;echo '</td> '; } ;echo '                     </tr>
                     ';  }  ;echo '                   </tbody>
                 </table>
                 
              ';   if($_SESSION['user']=='admin'){ ;echo '                 <span class="center span5">
                                   <form method="post"> <input type="submit" name="shutdown" id="login" value="SHUTTDOWN SOFTWARE" class="btn btn-danger btn-lg btn-block">   
                                    
                                    <input type="submit" name="power" id="login" value="POWER ON SOFTWARE" class="btn btn-primary btn-lg btn-block"></form>
                                    </span>
                                    
                                    ';   }  ;echo '               </div>
             </div>
           </div>
         </div>
         
         
        
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
	

   

  </body>
</html>
';;?>
