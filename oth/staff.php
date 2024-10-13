<?php
 
    session_start();
if(!isset($_SESSION['admin'])){
    header("location: index.php");
     exit;
	}
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');		

if(array_key_exists('register', $_POST)){
	
	
	  $rep = $_SESSION['admin'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$othername = $_POST['othername'];
$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$salesrep = $_POST['salesrep'];

$discipline = $_POST['discipline'];
$qualification = $_POST['qualification'];
$designation = $_POST['designation'];
$assignment = $_POST['assignment'];
$apdate = $_POST['apdate'];
$refname = $_POST['refname'];
$refadd = $_POST['refadd'];
$refphone = $_POST['refphone'];
$id = $_POST['id'];
$other = $_POST['other'];






	 
				 
				  $qry = "SELECT * FROM staff WHERE surname = '$surname' AND phone = '$phone' ";
				 $result = mysql_query($qry) or die(mysql_error());
				 $number =mysql_num_rows($result);
				 if ($number > 0){
					 $reportadded ="This Customer Has Already Been Registered";
					 $continue = false;
				 }
				 else{
			  
$sql = "INSERT INTO staff (firstname,surname,othername,phone,address,sex,dob,other,email,today,rep,apdate,discipline,qualification,assignment,designation,refname,refadd,refphone,id,salesrep)
VALUES('$firstname','$surname','$othername','$phone','$address','$sex','$dob','$other','$email','$today','$rep','$apdate','$discipline','$qualification','$assignment','$designation','$refname','$refadd','$refphone','$id','$salesrep')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){
	


$reportadded="Staff Customer Data Successfully Added!";

//header("location:transact.php");
//exit;



        }
       }
			}



;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff</title>

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
            <h1><small>Manage Staff</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Staff List</li>
                <li class="TabbedPanelsTab" tabindex="0">Sales Rep</li>
                <li class="TabbedPanelsTab" tabindex="0">Add Staff</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body"> <font color="#FF0000"> '; echo $reportadded; ;echo '</font>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Staff Id</th>
                            <th>Full Name</th>
                            <th>Sex</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Appointment Date</th>
                            <th>Qualification</th>
                            <th>Discipline</th>
                            <th>Designation</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; 
							$query=mysql_query("select * FROM staff ORDER BY id DESC0" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $row['id'] ;echo '</td>
                            <td><a href="profiles.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['firstname']).' '.ucfirst($row['surname']).' '.ucfirst($row['othername']) ;echo '</i></a></td>
                            <td>'; echo ucfirst($row['sex']) ;echo '</td>
                            <td>'; echo $row['phone'] ;echo '</td>
                            <td class="center">'; echo $row['address'] ;echo '</td>
                            <td class="center">'; echo $row['apdate'] ;echo '</td>
                            <td class="center">'; echo $row['qualification'] ;echo '</td>
                            <td class="center">'; echo ucfirst($row['discipline']) ;echo '</td>
                            <td class="center">';  echo $row['designation'] ;echo '</td>
                          </tr>
                          ';  } ;echo '                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
                <div class="TabbedPanelsContent"> <div class="panel-body"> <font color="#FF0000"> '; echo $reportadded; ;echo '</font>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Staff Id</th>
                            <th>Full Name</th>
                            <th>Sex</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Appointment Date</th>
                            <th>Qualification</th>
                            <th>Discipline</th>
                            <th>Designation</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; 
							$query=mysql_query("select * FROM staff WHERE salesrep = 'yes' ORDER BY id DESC0" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $row['sn'] ;echo '</td>
                            <td><a href="profilerep.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['firstname']).' '.ucfirst($row['surname']).' '.ucfirst($row['othername']) ;echo '</i></a></td>
                            <td>'; echo ucfirst($row['sex']) ;echo '</td>
                            <td>'; echo $row['phone'] ;echo '</td>
                            <td class="center">'; echo $row['address'] ;echo '</td>
                            <td class="center">'; echo $row['apdate'] ;echo '</td>
                            <td class="center">'; echo $row['qualification'] ;echo '</td>
                            <td class="center">'; echo ucfirst($row['discipline']) ;echo '</td>
                            <td class="center">';  echo $row['designation'] ;echo '</td>
                          </tr>
                          ';  } ;echo '                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div></div>
                <div class="TabbedPanelsContent">
  <h3>Staff information</h3><font color="#FF0000"> '; echo $reportadded; ;echo ' </font>  
<form action="" method="post" enctype="multipart/form-data">
<div class="fm1"> <p>Personal Data </p>      
<p><input name="firstname" class="form-control" placeholder="First Name">
</p>
<p><input name="surname" class="form-control" placeholder="Surname">
</p>
<p><input name="othername" class="form-control" placeholder="Other Name(s)">
</p>
<p><label>Sex</label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline1" value="male" > Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline2" value="female"> Female
                </label>
</p>
<p><input name="dob" class="form-control" placeholder="Date of Birth (DD/MM/YYYY)"></p>
<p><input name="phone" class="form-control" placeholder="Phone Number"></p>
<p><input name="email" class="form-control" placeholder="E-mail"></p>
<p><input name="address" class="form-control" placeholder="Address"></p>

</div>

<div class="fm1"> <p>Appointment Data</p>
<p><input name="id" class="form-control" placeholder="Staff Identification Number"></p>
<p><input name="apdate" class="form-control" placeholder="Appointment Date (DD/MM/YYYY)"></p>
<p><input name="discipline" class="form-control" placeholder="Discipline"></p>
<p><input name="qualification" class="form-control" placeholder="Qualification"></p>
<p><input name="designation" class="form-control" placeholder="Designation"></p>
<p><input name="assignment" class="form-control" placeholder="Primary Assignment"></p>
<p>Are you a salesrep? &nbsp;&nbsp;&nbsp;<input name="salesrep" type="radio" value="yes">Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="salesrep" type="radio" value="no"> No</p>
<p><input name="refname" class="form-control" placeholder="Refree\'s Name"></p>
<p><input name="refadd" class="form-control" placeholder="Refree\'s Address"></p>
<p><input name="refphone" class="form-control" placeholder="Refree\'s Phone Number"></p>
<textarea name="other" class="form-control" rows="3" placeholder="Other Information"></textarea></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset Form</button>
<button type="submit" class="btn btn-default" name="register">Add Staff</button>
              
</p>  

</div>
</form>

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
