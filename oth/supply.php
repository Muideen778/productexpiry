<?php
 
    session_start();
if(!isset($_SESSION['admin'])){
    header("location: index.php");
     exit;
	}
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');		
			 
	/*	  $sql10 =" SELECT phone FROM admin WHERE username = '$rep' LIMIT 1 ";
     $result10 = mysql_query($sql10) or die (mysql_error());
     $num10 = mysql_num_rows($result10);
	 
	 
	 
	 			 
		  $sql4 =" SELECT * FROM report WHERE rep = '$rep' AND today = '$today' ORDER BY regno ASC LIMIT 0, 1000 ";
     $result4 = mysql_query($sql4) or die (mysql_error());
     $num4 = mysql_num_rows($result4);
	
			  $sql5 =" SELECT * FROM report WHERE today = '$today' ORDER BY regno ASC LIMIT 0, 1000 ";
     $result5 = mysql_query($sql5) or die (mysql_error());
     $num5 = mysql_num_rows($result5); 
	 
	 			  $sql6 =" SELECT * FROM report ";
     $result6 = mysql_query($sql6) or die (mysql_error());
     $num6 = mysql_num_rows($result6); 

		  $sql7 =" SELECT * FROM report WHERE rep = '$rep' ORDER BY regno ASC LIMIT 0, 1000 ";
     $result7 = mysql_query($sql7) or die (mysql_error());
     $num7 = mysql_num_rows($result7);


	 
	 		  $sqld =" SELECT * FROM report WHERE denomination = 'invitee' LIMIT 0, 1000 ";
     $resultd = mysql_query($sqld) or die (mysql_error());
     $numd = mysql_num_rows($resultd);  

			 	 	 

*/


if(array_key_exists('register', $_POST)){
	
	include("includes/connect.inc.php");
	
	  $rep = $_SESSION['admin'];
$name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];

$company = $_POST['company'];
$other = $_POST['other'];




	 
	   	     if(array_key_exists('register', $_POST)){
				 
				  $qry = "SELECT * FROM supply WHERE name = '$name' AND phone = '$phone' ";
				 $result = mysql_query($qry) or die(mysql_error());
				 $number =mysql_num_rows($result);
				 if ($number > 0){
					 $reportadded ="This Supplier Has Already Been Registered";
					 $continue = false;
				 }
				 else{
			  
$sql = "INSERT INTO supply (name,phone,address,sex,company,other,email,today,rep)
VALUES('$name','$phone','$address','$sex','$company','$other','$email','$today','$rep')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){
	


$reportadded="Supplier Data Successfully Added!";

//header("location:transact.php");
//exit;



        }
       }
			}}



;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Suppliers</title>

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
            <h1><small>Manage Suppliers</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Supplier List</li>
<li class="TabbedPanelsTab" tabindex="0">Add Supplier</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body"> <font color="#FF0000"> '; echo $reportadded; ;echo '</font>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>supply Id</th>
                            <th>Full Name</th>
                            <th>Sex</th>
                            <th>Mobile</th>
                            <th>E-mail</th>
                            <th>Date/Time</th>
                            <th>Reg. By</th>
                            <th>Transactions</th>
                          </tr>
                        </thead>
                        <tbody>
                          '; 
							$query=mysql_query("select * FROM supply ORDER BY id DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $row['id'] ;echo '</td>
                            <td><a href="profilesu.php?id='; echo $row['id'] ;echo '"><i class="btn btn-success btn-xs">'; echo ucfirst($row['name']) ;echo '</i></a></td>
                            <td>'; echo ucfirst($row['sex']) ;echo '</td>
                            <td>'; echo $row['phone'] ;echo '</td>
                            <td class="center">'; echo $row['email'] ;echo '</td>
                            <td class="center">'; echo $row['created'] ;echo '</td>
                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                            <td class="center"><i class="btn btn-warning btn-xs"> <font color="white"><b>
                              ';  echo $row['tno'] ;echo '                            </b></font></i></td>
                          </tr>
                          ';  } ;echo '                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
<div class="TabbedPanelsContent">
  <div class="fm1"><h3>Supplier information</h3>  <font color="#FF0000"> '; echo $reportadded; ;echo ' </font>        
            <p>
<form action="" method="post" enctype="multipart/form-data">
<p><input name="name" class="form-control" placeholder="Full Name">
</p>
<p><label>Sex</label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline1" value="male" > Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline2" value="female"> Female
                </label>
</p>
<p><input name="phone" class="form-control" placeholder="Phone Number"></p>
<p><input name="email" class="form-control" placeholder="E-mail"></p>
<p><input name="address" class="form-control" placeholder="Address"></p>
<p><input name="company" class="form-control" placeholder="Company"></p>
<p>
<textarea name="other" class="form-control" rows="3" placeholder="Other Information"></textarea></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset Form</button>
<button type="submit" class="btn btn-default" name="register">Add Supplier</button>
              
</p>




</form>



<p></p></div>
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
    
    
    
  </div><script>
    $(document).ready(function() {
        $(\'#dataTables-example\').dataTable();
    });
    </script></body>
</html>';;?>
