<?php
error_reporting(0);
session_start();
	
include("includes/connect.inc.php");	

$dc="ACCROSS DATE RANGE";

if(array_key_exists('generateReport', $_POST)){
 
$day1 = $_POST['day1'];  //6
$day2 = $_POST['day2']; //6
$d1 = substr($day1,4,2).'/'.substr($day1,2,2).'/'.substr($day1,0,2);
$d2 = substr($day2,4,2).'/'.substr($day2,2,2).'/'.substr($day2,0,2);
$date = str_replace('-', '', $day1);
$new = date('ymd', strtotime($date));
$date2 = str_replace('-', '', $day2);
$new2 = date('ymd', strtotime($date2));
$dc = "BETWEEN ".$day1." - ".$day2;
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stock History</title>

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
         <?php    include('reportnav.php') ;       require('nav1.php') ; ?>    
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

      <div class="row">
      <form method="post">
          
          <div  class="col-lg-4">
          </div>

          <div class="col-lg-2" >

          </div>


         <div class="col-lg-2" >Start Date <br>
         <input type="date" name="day1" value="" class="form-control select2">
         </div>
                         <div class="col-lg-2" >End Date<br>
                         <input type="date" name="day2" value="" class="form-control select2">
              
                     </div>
                       
                   <div class="col-lg-2" ><br>
                   <button style="width:100%" type="submit" class="btn btn-primary" name="generateReport" >Generate Report</button>
                 </div>
                 </div>
                </form>
      </div>

        <div class="row" style="">
          <div class="col-lg-12">
          <div style="float: right; margin-right: 20px"> 
					<a  href="javascript:void(0)" class="btn-download"><img src="pdf.png" width="20px"> </a>
					
					 <img src="printicon.png" width="25px" onClick="printDiv()">
      </div>
          </div>
        </div><!-- /.row -->

      
        <div class="row" style="margin: 18px;">
          
       
                       <div class="col-lg-12">
                     
			      <div id="GFG">
					  <div id="invoice">
					  
					  
          <center>  <strong><font size="+2"><?php  echo $r['name']; ?></font> </strong><br>
          STOCK TRANSACTION DETAILS [Report Generated: <?php   
		    echo $currentTime ;  ?>]</center>
                    <hr>     




                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-money"></i> STOCK DETAILS  | <strong><font color="#FFFF00"><?php echo $dc; ?></font></strong> </h3>
                          </div>
                          <div class="panel-body" style="width: 100%; overflow: scroll;>
                             <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="sdataTables-example" style="font-size: 12px;">
                                    <thead>
                                        <tr>
                                        <tr>
                        <th>SN</th>
                        <th>Item</th>
                        <th>Pr. QTY</th>
                        <th>QTY</th>
                        <th>Price</th>
                        <th >Total</th>
                        <th>Cur. QTY</th>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Rep</th>
                  </tr>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php $i = 1; 


 if(empty($day1) && empty($day2)){
  $query=mysql_query("select * FROM stockup ORDER BY sn DESC LIMIT 0, 200" )or die(mysql_error());
                    }else{
                    
                   
  $query=mysql_query("select * FROM stockup WHERE today between '$new' and '$new2' ORDER BY sn DESC " )or die(mysql_error());  
                   
                    }
							
						
							while($row=mysql_fetch_array($query)){							$e=$i++;
               $totalqty+=$row['qty'];
               $totalprice+=$row['unitcost'];
               $totalamount+=$row['totalcost'];
               $totalqtyb+=$row['qtyb'];
               $totalqtya+=$row['qtya'];
							?>						
							
                           
                            

                                  <tr class="odd gradeX">
                                 
              <td class="center"><?=$e?></td>
              
              <td class="center"><?=$row['item']?></td>
              <td><?=$row['qtyb']?></td>
     <td><?=$row['qty']?></td>

     <td><?=$row['unitcost']?></td>

     <td><?=$row['totalcost']?></td>
     <td><?=$row['qtya']?></td>
     <td><?=$row['created']?></td>
     <td><?=$row['salesid']?></td>
     <td><?=$row['rep']?></td>
        </tr>
          
                                            
                                      </tr>   <?php }  ?>
                                      <tr style="font-weight:bolder;">
                                      <td></td>
                                      <td>TOTAL</td>
                                      <td><?=intval($totalqtyb);?></td>
                                      <td><?=intval($totalqty);?></td>
                                      <td><?=number_format($totalprice);?></td>
                                      <td><?=number_format($totalamount);?></td>
                                      <td><?=intval($totalqtya);?></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>


                                      </tr>
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

 <!-- Generate PDF -->
    
 <script src="js/jspdf.debug.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="js/html2pdf.min.js"></script>

<script>

const options = {
  margin: 0.5,
  filename: 'unstockdetails.pdf',
  image: { 
    type: 'jpeg', 
    quality: 500
  },
  html2canvas: { 
    scale: 1 
  },
  jsPDF: { 
    unit: 'in', 
    format: 'letter', 
    orientation: 'portrait' 
  }
}

$('.btn-download').click(function(e){
  e.preventDefault();
  const element = document.getElementById('invoice');
  html2pdf().from(element).set(options).save();
});


function printDiv(divName) {
 var printContents = document.getElementById(divName).innerHTML;
 var originalContents = document.body.innerHTML;

 document.body.innerHTML = printContents;

 window.print();

 document.body.innerHTML = originalContents;
}
</script>
<script>
    function printDiv() {
        var divContents = document.getElementById("GFG").innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body > <br>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
  </body>
</html>

