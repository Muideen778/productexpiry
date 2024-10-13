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
	  
	  
	  


include("includes/connect.inc.php");

	  $dd = $_POST['dd'] ;
	  $yy = $_POST['yy'] ;
	  $mm = $_POST['mm'] ;
	   $today1 = $yy.$mm.$dd;
	  $ww = date('W') ;
		 $today = date('ymd');		  
			  
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





if(array_key_exists('expend', $_POST)){


$item = $_POST['item'];
$price = $_POST['price'];
$des = $_POST['des'];
$cat = $_POST['cat'];
$phone = $_POST['phone'];
$name = $_POST['name'];

	if($cat == 'Select Category'){$ercat = 'Please select category' ; }
else{
$sql = "INSERT INTO expend (item,des,name,phone,amount,cat,today,rep,dd,mm,yy,ww)
VALUES('$item','$des','$name','$phone','$price','$cat','$today1	','$rep','$dd','$mm','$yy','$ww') ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){ $err = 'Item Submitted' ;}

//Staff Salary


			}}
	
	


if(array_key_exists('pexpend', $_POST)){


$item = $_POST['item'];
$price = $_POST['price'];
$des = $_POST['des'];
$cat = $_POST['cat'];
$phone = $_POST['phone'];
$name = $_POST['name'];

	if($cat == 'Select Product'){$ercatp = 'Please select Product' ; }
else{
$sql = "INSERT INTO pexpend (item,des,name,phone,amount,cat,today,rep,dd,mm,yy,ww)
VALUES('$item','$des','$name','$phone','$price','$cat','$today1	','$rep','$dd','$mm','$yy','$ww') ";
$res2 = mysql_query($sql) or die(mysql_error());


$res = mysql_query("INSERT INTO expend (item,des,name,phone,amount,cat,today,rep,dd,mm,yy,ww)
VALUES('$item','$des','$name','$phone','$price','stock','$today1	','$rep','$dd','$mm','$yy','$ww') ") or die(mysql_error());


if($res2){ $errp = 'Product Expenditure Submitted' ;}




			}}
	
	
if(array_key_exists('salary', $_POST)){


$month = $_POST['mm'];
$purpose = $_POST['purpose'];
$des = $_POST['des'];
$name = $_POST['staff'];
$amount = $_POST['amount'];

$sn1 = substr($name,0,2);

$querys=mysql_query("select * FROM staff WHERE sn = '$sn1' ORDER BY sn ASC LIMIT 1" )or die(mysql_error());
$rows=mysql_fetch_array($querys)  ;
	
	$name2 = ucfirst($rows['surname']).' '.ucfirst($rows['firstname']);					

	if($cat == 'Select Category'){$ercat2 = 'Please select category' ; }
else{
$sql = "INSERT INTO salary (purpose,month,id,des,name,amount,rep,dd,mm,yy,ww)
VALUES('$purpose','$month','$sn1','$des','$name2','$amount','$rep','$dd','$mm','$yy','$ww') ";
$res2 = mysql_query($sql) or die(mysql_error());


if($res2){ $errs = 'Item Submitted' ;}

$res = mysql_query("INSERT INTO expend (item,des,name,phone,amount,cat,today,rep,dd,mm,yy,ww)
VALUES('$id','$purpose','$name2','$phone','$amount','Staff Salary','$today1	','$rep','$dd','$mm','$yy','$ww') ") or die(mysql_error());


			}}
	






if(array_key_exists('fitem', $_POST)){


$item = $_POST['item'];
$des = $_POST['des'];

	 



$sql = "INSERT INTO expitem (item,des)
VALUES('$item','$des') ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){ $errf = 'Item Succesfully Submitted' ;}




			}
	
	

if(array_key_exists('vitem', $_POST)){


$item = $_POST['item'];
$des = $_POST['des'];

	 



$sql = "INSERT INTO varied (item,des)
VALUES('$item','$des') ";
$res1 = mysql_query($sql) or die(mysql_error());

$sql = "INSERT INTO expitem (item,des)
VALUES('$item','$des') ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){ $errv = 'Item Succesfully Submitted' ;}




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
            <h2>Expenditure!</h2>
          
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> General Expenditure</h3>
              </div>
              <div class="panel-body">
                <font color="#FF0000">'; echo $err ; ;echo '</font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <p> <font color="red">'; echo $ercat ; ;echo ' </font>  <p><table width="100%">
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
                        </td></tr></table></p>
                                         <table>
                        <tr>
                          <td><input name="item" class="form-control" value="" placeholder="Item" ></td>
                          <td><select name="cat" class="form-control" >
                            <option>Select Category</option>
                            '; 
							$query=mysql_query("select * FROM expitem ORDER BY item ASC001" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							
							;echo '                            <option>'; echo $row['item'] ;echo '</option>
                            '; } ;echo '                          </select></td>
                        </tr>
                      </table>
                                          </p>
                                          
                                           <p>
                                            <label></label>
                                              <input name="des" class="form-control" id="firstname" placeholder="Item Description">
                                          </p>
                                          
                                           <p>
                                             <label></label><input name="name" class="form-control" id="phone" placeholder="Recipient\'s Name">
                                           </p>
                                           
                                            <p>
                                             <label></label><input name="phone" class="form-control" id="phone" placeholder="Recipient\'s Mobile Number">
                                           </p>
                                           
                                           <p>
                                              <label></label><input name="price" class="form-control" id="email" placeholder="Amount">
                                           </p>
                                          
                                           
                  </div>
<button type="reset" class="btn btn-default">Reset Form</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="expend" class="btn btn-default">Spend Money</button>
                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>
          
          
          
          
        <!----  
          
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Product Expenditure</h3>
              </div>
              <div class="panel-body">
                <font color="#FF0000">'; echo $errp ; ;echo '</font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <p> <font color="red">'; echo $ercatp ; ;echo ' </font>  <p>
                                          <table width="100%">
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
                        </td></tr></table></p>
                                         <table>
                        <tr>
                          <td><input name="item" class="form-control" value="" placeholder="Item" ></td>
                          <td><select name="cat" class="form-control" >
                            <option>Select Product</option>
                            '; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							;echo '                            <option>'; echo $row['item'] ;echo '</option>
                            '; } ;echo '                          </select></td>
                        </tr>
                      </table>
                                          </p>
                                          
                                           <p>
                                            <label></label>
                                              <input name="des" class="form-control" id="firstname" placeholder="Item Description">
                                          </p>
                                          
                                           <p>
                                             <label></label><input name="name" class="form-control" id="phone" placeholder="Recipient\'s Name">
                                           </p>
                                           
                                            <p>
                                             <label></label><input name="phone" class="form-control" id="phone" placeholder="Recipient\'s Mobile Number">
                                           </p>
                                           
                                           <p>
                                              <label></label><input name="price" class="form-control" id="email" placeholder="Amount">
                                           </p>
                                          
                                           
                  </div>
<button type="reset" class="btn btn-default">Reset Form</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="pexpend" class="btn btn-default">Spend Money</button>
                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>
          
          
          
          
          --->
          
          
          
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Monthly Salary Payment</h3>
              </div>
              <div class="panel-body">
                <font color="#FF0000">'; echo $errs ; ;echo '</font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <p> <font color="red">'; echo $ercat2 ; ;echo ' </font>  <p><table width="100%">
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
                        </td></tr></table></p><p><select name="purpose" class="form-control" >
                            <option>Select Category</option>
                           
                            <option value="salary">Salary</option>
                            <option value="advance">Salary Advance</option>
                            <option value="deduction">Salary Deduction</option>
                            <option value="transport">Transportation</option>
                            <option value="bonus">Bonus</option>
                            <option value="comm">Sales Commission</option>
                            
                          </select>
                                          </p>
                                           <p>
                                           <select name="staff" class="form-control" >
                            <option>Select Staff</option>
                           
                            '; 
							$query=mysql_query("select * FROM staff ORDER BY sn ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							;echo '                            <option>'; echo $row['sn'].' '.ucfirst($row['surname']).' '.ucfirst($row['firstname']) ;echo '</option>
                            '; } ;echo '                       
                          </select>
                                          </p>
                                           <p>
                                              <label></label><input name="amount" class="form-control" id="email" placeholder="Amount">
                                           </p>
                                           
                                            <p>
                                              <label></label><input name="des" class="form-control" id="email" placeholder="Description">
                                           </p>
                                          
                                           
                  </div>
<button type="reset" class="btn btn-default">Reset Form</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="salary" class="btn btn-default">Pay Allowance</button>
                                        
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
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Expenses Category</h3>
              </div>
              <div class="panel-body">
                <font color="#FF0000">'; echo $errs ; ;echo '</font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <p> <font color="red">'; echo $errf ; ;echo '</font>                                          
                                          <p>                                          
                                            <label></label><input name="item" class="form-control" id="item" placeholder="Item">
                                          </p>
                                           
                                            <p>
                                              <label></label><input name="des" class="form-control" id="des" placeholder="Description">
                                           </p>
                                         
                                          
                                           
                  </div>
<button type="reset" class="btn btn-default">Reset Form</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="fitem" class="btn btn-default">Submit Item</button>
                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>
          
          
       <!----   
            
         <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Variable Expenses Category</h3>
              </div>
              <div class="panel-body">
                <font color="#FF0000">'; echo $errs ; ;echo '</font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <p> <font color="red">'; echo $errv ; ;echo '</font>                                          
                                          <p>                                          
                                            <label></label><input name="item" class="form-control" id="item" placeholder="Item">
                                          </p>
                                           
                                            <p>
                                              <label></label><input name="des" class="form-control" id="des" placeholder="Description">
                                           </p>
                                         
                                          
                                           
                  </div>
<button type="reset" class="btn btn-default">Reset Form</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="vitem" class="btn btn-default">Submit Item</button>
                                        
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>
          
          
       
          ---->
          
          
          
          
          
          
          
          
          
         <div class="col-lg-4">
           <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="panel-title"><i class="fa fa-money"></i> Recent Expenditure</h3>
             </div>
             <div class="panel-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-hover table-striped tablesorter">
                   <thead>
                     <tr>
                       <th>S/N</th>
                       <th>Amount <i class="fa fa-sort"></i></th>
                       <th>Category<i class="fa fa-sort"></i></th>
                       <th>Date/Time</th>
                     </tr>
                   </thead>
                   <tbody>
                     '; 
							$query=mysql_query("select * FROM expend ORDER BY sn DESC LIMIT 0 , 6" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                     <tr>
                       <td>'; echo $row['sn'] ; ;echo '</td>
                       <td>'; echo $row['amount'] ; ;echo '</td>
                       <td>'; echo $row['cat'] ; ;echo '</td>
                       <td>'; echo ucfirst($row['created']) ; ;echo '</td>
                     </tr>
                     ';  }  ;echo '                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
         <div class="col-lg-4">
           <div class="panel panel-primary">
             <div class="panel-heading">
               <h3 class="panel-title"><i class="fa fa-money"></i> Recent Income</h3>
             </div>
             <div class="panel-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-hover table-striped tablesorter">
                   <thead>
                   <tr>
                       <th>S/N</th>
                       <th>Amount <i class="fa fa-sort"></i></th>
                       <th>Category<i class="fa fa-sort"></i></th>
                       <th>Date/Time</th>
                     </tr>
                   </thead>
                   <tbody>
                     '; 
							$query=mysql_query("select * FROM income ORDER BY sn DESC LIMIT 0 , 6" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							
							;echo '                     <tr>
                       <td>'; echo $row['sn'] ; ;echo '</td>
                       <td>'; echo $row['amount'] ; ;echo '</td>
                       <td>'; echo $row['cat'] ; ;echo '</td>
                       <td>'; echo $row['created'] ; ;echo '</td>
                     </tr>
                     ';  }  ;echo '                   </tbody>
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
