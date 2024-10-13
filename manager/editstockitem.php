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
$des=$row['des'];
$uptimum=$row['uptimum'];
$cat=$row['cat'];
$rep=$row['rep'];
$unitprice=$row['unitprice'];
$packprice=$row['packprice'];
$expiry = $row['xm']."/".$row['xy'];
$barcode=$row['barcode'];

						
//header("location: ?");
   
    }
	
	
	
 
	
	

if(isset($_POST['editstock'])){


$item = $_POST['item'];
$uptimum = $_POST['uptimum'];
$des = $_POST['des'];
$barcode=$_POST['barcode'];
$items = $_POST['items'];
$continue = true;
$unitprice=$_POST['usp'];
$packprice=$_POST['psp'];
$expiry = $_POST['expiry'];
$xm = substr($expiry,0,2);
$xy = substr($expiry,3,2);
$sep = substr($expiry,2,1);

if($sep != '/' OR $xm > 12 OR $xy > 30){
	$experror = '<font color="red"><em>Oh sorry! You have entered an invalid expiry date. It should look like 08/19 </em></font>' ;
}else{

if($item!=$items){
	    $qry = " SELECT * FROM stock WHERE item = '$item' ";
			$result = mysql_query($qry)  or die(mysql_error());
			$num = mysql_num_rows($result);
			if($num > 0){
			   $errs = "This item has already been entered";
         $continue = false;
         $delay = 2; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
header("Refresh: $delay;"); 
			}
    }
	
			if($continue == true){

$sql ="UPDATE stock SET item ='$item',unitprice ='$unitprice',packprice ='$packprice', des = '$des',uptimum = '$uptimum',xm = '$xm',xy = '$xy',barcode = '$barcode' WHERE sn = '$sn'";
$res2 = mysql_query($sql) or die(mysql_error());

			}
      if($res2){ $delay = 2; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
        header("Refresh: $delay;"); $err = 'Item Edited Successful' ;}
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

    <title>Edit Stock Item</title>

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
            <h3>Edit Products Details</h3>
          
          </div>
        </div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row"></div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Edit Item | <strong><font color="#FFFF00"><?php echo $cat ; ?></font></strong></h3>
              </div>
              <div class="panel-body">
              <font color="green"><strong><?php echo $err ; ?></strong></font>
              <font color="red"><strong><?php echo $errs ; ?></strong></font>
              <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <tbody> 
					
                      <tr>
                        <td>
    <form  method="post">
                                        <div class="form-group">
                                     
                        <?php if(isset($cat)){ ?>
                                          <p>
                                            <label>Item</label>
                                              <input name="item" class="form-control" required value="<?php echo $item; ?>">
                                              <input name="items" type="hidden" class="form-control"  value="<?php echo $item; ?>">
                                          </p>
                                            <p>
                                            <label>Barcode</label>
                                              <input name="barcode" id="txtb"  class="form-control" value="<?php echo $barcode; ?>">
                                              <button type="button" onclick="gbarcode();">Generate</button>
                                            </p>
                                          
                                            <p>
                                                                                     <label>Unit S.Price:</label>
                                              <input name="usp" type="number" value="<?=$unitprice;?>" required class="form-control">
                                             </p>

                                             <p>
                                            <label>Pack S.Price::</label>
                                              <input name="psp" type="number"  value="<?=$packprice;?>" required class="form-control">
                                             </p>
                                             <p>
                                            <label>Expiry Date:</label>
                                            <input type="text" name="expiry" value="<?=$expiry;?>" class="js-date form-control" maxlength="5" required placeholder="MM/YY"/>
                                            <?=$experror;?>
                                          </p>


                                          <p>
                                             <label>Uptimum Quantity (Units)</label>
<input name="uptimum" class="form-control" required value="<?php echo $uptimum; ?>">
                                           </p>
                                           
                                           <p>
                                            <label>Description</label>
                                              <input name="des"  class="form-control" value="<?php echo $des; ?>">
                                          </p>
                  </div>
<button type="submit" name="editstock" class="btn btn-default">Edit Item</button>
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

