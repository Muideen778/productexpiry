<?php
error_reporting(0);
session_start();
	
include("includes/connect.inc.php");	
	 if($_GET['snitem']){ // tdis partr displays records ready for updating
     
        $sn = $_GET['snitem'];
		
		
$query=mysql_query("select * FROM stock WHERE sn='$sn' " );
$row=mysql_fetch_array($query) ;
$item = $row['item'];
$num = $row['qty'] ;


if($num<1){
$result = mysql_query("DELETE FROM stock WHERE sn='$sn'");
	
}	
						
header("location: ?");
   
    }
	
	
	
 if($_GET['sncat']){ // tdis partr displays records ready for updating
        $sn = $_GET['sncat'];	
	$query=mysql_query("select * FROM cat WHERE sn='$sn' " );
$row=mysql_fetch_array($query) ;
$cat = $row['cat'] ;

$query1=mysql_query("select * FROM stock WHERE cat='$cat' " );
$num1 = mysql_num_rows($query1);

if($num1<1){
$result = mysql_query("DELETE FROM cat WHERE sn='$sn'");
}
	header("location: ?");
	
 }
	  




if($_POST['cat']){ $_SESSION['cat'] = $_POST['cat'];  }
 $cat = $_SESSION['cat'] ;

if(array_key_exists('stock', $_POST)){


$item = $_POST['item'];
$uptimum = $_POST['uptimum'];
$des = $_POST['des'];
$barcode=$_POST['barcode'];
$unitprice=$_POST['usp'];
$packprice=$_POST['psp'];
$expiry = $_POST['expiry'];
$xm = substr($expiry,0,2);
$xy = substr($expiry,3,2);
$sep = substr($expiry,2,1);

if($sep != '/' OR $xm > 12 OR $xy > 30){
	$experror = '<font color="red"><em>Oh sorry! You have entered an invalid expiry date. It should look like 08/19 </em></font>' ;
}else{

if($_POST['sprice']){$sprice = $_POST['sprice'];} else{$sprice = $price/1.15;}
if(!empty($barcode)){
		 $qryed = " SELECT * FROM stock WHERE barcode = '$barcode'";
			$resulted = mysql_query($qryed)  or die(mysql_error());
			$numed = mysql_num_rows($resulted);
}
		    $qry = " SELECT * FROM stock WHERE item = '$item' ";
			$result = mysql_query($qry)  or die(mysql_error());
			$num = mysql_num_rows($result);

			if($num > 0 ){
        $itemerror = '<font color="red"><em> This item has already been entered</em></font>' ;

			}elseif(intval($numed) > 0 ){
        $barcodeerror = '<font color="red"><em> This barcode has already been entered</em></font>' ;
      }
		  
			else{   
      
$sql = "INSERT INTO stock (item,des,unitprice,packprice,uptimum,cat,rep,today,dd,mm,yy,ww,xm,xy,barcode)
VALUES('$item','$des','$unitprice','$packprice','$uptimum','$cat','$rep','$ymd','$dd','$mm','$yy','$ww','$xm','$xy','$barcode') ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){ $err = 'Item Submitted' ; 

  $delay = 1; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
  header("Refresh: $delay;"); 
  
}

			}
    }
}
	


if(array_key_exists('port', $_POST)){
$occ = str_replace(" ","-",trim(strtolower($_POST['occ'])));
$_SESSION['cat'] = $occ;


		  $sql45 =" SELECT * FROM cat WHERE cat = '$occ' ";
     $result45 = mysql_query($sql45) or die (mysql_error());
     $num45 = mysql_num_rows($result45);	  
	if($num45==0){
		
		$sql = "INSERT INTO cat (cat,rep)
VALUES('$occ','$rep') ";
$res2 = mysql_query($sql) or die(mysql_error());

		$eroc2 = 'Category added to the database' ;
	}
	else{
	$eroc2 = 'Category already exists' ;
  header("refresh: 1;");
        }
       }


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Item</title>

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
         <img src="tlog.png" >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
         <?php    include('prodnav.php') ;       require('nav1.php') ; ?>    
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
         
            <h3>Add New Item</h3>
            
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Add Item | <strong><font color="#FFFF00"><?php echo $cat ; ?></font></strong></h3>
              </div>
              <div class="panel-body">
                <font color="red"><strong><?php echo $err ; ?></strong></font><div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post">
                                        <div class="form-group">
                             <p>
                                            <label>Category</label>
                                              <select name="cat" class="form-control" onChange="submit()"> 
                                             <option value="">SELECT CATEGORY</option>
                      <?php 
							$query=mysql_query("select * FROM cat ORDER BY cat ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($_SESSION['cat']==$row['cat']){echo 'selected';} ?> ><?php echo $row['cat'] ;?> </option><?php }  ?>
                          </select>
                                          </p>            
                                    
                                    <?php if(isset($cat)){ ?>
                                          <p>
                                            <label>Item</label>
                                              <input name="item" value="<?=$_POST['item'];?>" class="form-control" id="firstname" required>
                                         <?=$itemerror;?>
                                            </p>
                                            <p>
                                            <label>Barcode</label>
                                              <input name="barcode" value="<?=$_POST['barcode'];?>"  class="form-control" id="txtb" onmouseover="this.focus();">
                                              <button type="button" onclick="gbarcode();">Generate</button>
                                              <?=$barcodeerror;?>
                                            </p>
                                            <p>
                                            <label>Unit S.Price:</label>
                                              <input name="usp" type="number" value="<?=$_POST['usp'];?>" required class="form-control">
                                             </p>

                                             <p>
                                            <label>Pack S.Price::</label>
                                              <input name="psp" type="number"  value="<?=$_POST['psp'];?>" required class="form-control">
                                             </p>
                                             <p>
                                            <label>Expiry Date:</label>
                                            <input type="text" name="expiry" value="<?=$_POST['expiry'];?>" class="js-date form-control" maxlength="5" required placeholder="MM/YY"/>
                                            <?=$experror;?>
                                          </p>

                                         
                                          <p>
                                             <label>Uptimum Quantity (Units)</label>
<input name="uptimum" value="<?=$_POST['uptimum'];?>" class="form-control" id="" required>
                                           </p>
                                           <p>
                                            <label>Description</label>
                                              <input name="des"  value="<?=$_POST['des'];?>" class="form-control" id="firstname">
                                          </p>
                                      
                  </div>
<button type="submit" name="stock" class="btn btn-default">Add Item</button>
                                        <?php }  ?>
                          </form>
                        </td>

                      </tr>
                    
                    </tbody>
                  </table>
                  
                  <p>&nbsp;</p>
                 
                </div>
               
              </div>
            </div>
          </div>
          
          
          
          
                                
                      <div class="col-lg-3">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money"></i> Add/Delete Category </h3>
                          </div>
                          
                          <div class="panel-body">
                            <div class="table-responsive" style="overflow-x: auto;">
                              <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td><form  method="post">
                                   
                                    <b style="color:red; font-size:12px;"> <?php  echo $eroc2; ?></b>
                                      <div class="form-group">
                                        <p>
                                          <label>Category</label>
                                          <input name="occ" class="form-control" id="occ" required>
                                        </p>
                                        
                                    
                                      <button type="submit" name="port" class="btn btn-default">Add Category</button>
                                    </form></td>
                                  </tr>
                                </tbody>
                              </table>
                              
                              
                              
                               <table  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Category</th>
                                             <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                   <?php  $i=1;
							$query=mysql_query("select * FROM cat ORDER BY cat ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$e=$i++;
							
							?>						
							
                           
                            

                                  <tr class="odd gradeX">
                                           <td class="center"><?php  echo $e; ?></td>
                                           <td><?php  echo ucfirst($row['cat']) ;?></td><td><a href="delp.php?sn=<?php  echo $row['sn'] ; ?>">Delete</a></td>
                                          
                                            
                                   
                                            
                                      </tr><?php }  ?>
                                                                           </tbody>
                        </table>
                        
                        <p><strong>NEWLY ADDED ITEMS</strong>
                  
                  <table  class="table table-striped table-bordered table-hover" style="font-size: 12px;">
                                  <thead>
                                      <tr>
                                          <th>SN</th>
                                          <th>Item</th>
                                           <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                              <?php  $i=1;
            $query=mysql_query("select * FROM stock ORDER BY sn DESC LIMIT 0, 10" )or die(mysql_error());
            while($row=mysql_fetch_array($query)){
            $e=$i++;
            
            ?>						
            
                         
                          

                                <tr class="odd gradeX">
                                         <td class="center"><?php  echo $e; ?></td>
                                         <td><?php  echo ucfirst($row['item']) ;?></td><td><a href="?snitem=<?php echo $row['sn'] ?>">Delete</a></td>
                                        
                                          
                                 
                                          
                                    </tr>   <?php }  ?>
                                                                         </tbody>
                      </table>
                        </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                       <div class="col-lg-5">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money"></i> View by Category  | <strong><font color="#FFFF00"><?php echo $cat ; ?></font></strong> </h3>
                          </div>
                          <div class="panel-body" style="width: 100%; overflow: scroll;>
                             <div class="table-responsive">
                      <table class="table table-hover" id="dataTables-example" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Item</th>
                                             <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php  $i=1;
							$query=mysql_query("select * FROM stock WHERE cat = '$cat' ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$e=$i++;
							
							?>						
							
                           
                            

                                  <tr class="odd gradeX">
                                           <td class="center"><?php  echo $e; ?></td>
                                           <td><?php  echo ucfirst($row['item']) ;?></td><td><a href="?snitem=<?php echo $row['sn'] ?>">Delete</a>
										   
										   <a href="editstockitem.php?snitem=<?php echo $row['sn'] ?>">Edit</a>
										   
										   
										   </td>
                                          
                                    
                                            
                                      </tr>   <?php }  ?>
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
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>



 <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js1/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js1/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <script src="js/expirydate.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    <script>
function gbarcode() {

  var barcode = Math.floor(new Date().valueOf() * Math.random());
     
if (!isNaN(barcode)){
  document.getElementById("txtb").value = barcode;
}
}




var input = document.querySelectorAll('.js-date')[0];
  
var dateInputMask = function dateInputMask(elm) {
  elm.addEventListener('keypress', function(e) {
    if(e.keyCode < 47 || e.keyCode > 57) {
      e.preventDefault();
    }
    
    var len = elm.value.length;
    
    // If we're at a particular place, let the user type the slash
    // i.e., 12/12/1212
    if(len !== 1 || len !== 3) {
      if(e.keyCode == 47) {
        e.preventDefault();
      }
    }
    
    // If they don't add the slash, do it for them...
    if(len === 2) {
      elm.value += '/';
    }

    // If they don't add the slash, do it for them...
    //if(len === 5) {
    //  elm.value += '/';
   // }
  });
};
  
dateInputMask(input);
    </script>
  </body>
</html>

