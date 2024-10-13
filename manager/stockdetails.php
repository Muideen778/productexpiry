<?php
 
//error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	

	  $rep = $_SESSION['admin'];
	    //$dis = $_SESSION['dis'];
		 


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 

	if(array_key_exists('search', $_POST)){
$_SESSION['customerid'] = $_POST['client'] ; 
}

if (isset($_SESSION['customerid']) AND !empty($_SESSION['customerid'])){
  $clients=mysql_query("select * FROM client WHERE id=".$_SESSION['customerid']." LIMIT 1 " )or die(mysql_error());
  while($client=mysql_fetch_array($clients)){
  	$id	= $client['id'];
    $name	= $client['name'];
    $phone	= $client['phone'];
    $email	= $client['email'];
    $address	= $client['address'];
    $company	= $client['company'];
    $other	= $client['other'];
    $rep	= $client['rep'];
    $created= $client['created'];
}
}

if(array_key_exists('generateReport', $_POST)){
  $catt = $_POST['cat'];
  if($_POST['cat']=="all"){
    $catt="All Category";
  }

$day1 = $_POST['day1'];  //6
$day2 = $_POST['day2']; //6
$d1 = substr($day1,4,2).'/'.substr($day1,2,2).'/'.substr($day1,0,2);
$d2 = substr($day2,4,2).'/'.substr($day2,2,2).'/'.substr($day2,0,2);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer's Ledger</title>

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
margin-right:60%;
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

<?php   include('reportnav.php') ;     
   require('nav1.php') ;  
   ?> 
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">


       
            <form method="post">
          
          <div  class="col-lg-4">
          </div>

          <div class="col-lg-2" >Category <br> <select name="cat" class="form-control select2" required> 
                                         
          <option  readonly selected value="">Select Category</option>
          <option  value="all">All Category</option>
                      <?php 
							$query=mysql_query("select * FROM cat ORDER BY cat DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($cat==$row['cat']){echo 'selected';} ?> ><?php echo $row['cat'] ;?> </option><?php }  ?>
                          </select></div>


         <div class="col-lg-2" >Start Date <br> <select name="day1" class="form-control select2"> 
                                         
                     <?php 
             $query=mysql_query("select * FROM datt WHERE ymd <= '$ymd' ORDER BY sn DESC" )or die(mysql_error());
             while($row=mysql_fetch_array($query)){
             ?>                            <option value="<?php echo $row['ymd'];?>" ><?php echo $row['date'] ;?></option><?php }  ?>
                         </select></div>
                         <div class="col-lg-2" >End Date<br> <select name="day2" class="form-control select2"> 
                                         
                     <?php 
             $query=mysql_query("select * FROM datt WHERE ymd <= '$ymd' ORDER BY sn DESC" )or die(mysql_error());
             while($row=mysql_fetch_array($query)){
             ?>                            <option value="<?php echo $row['ymd'];?>" ><?php echo $row['date'] ;?></option><?php }  ?>
                         </select></div>
                       
                   <div class="col-lg-2" ><br>
                   <button style="width:100%" type="submit" class="btn btn-primary" name="generateReport" >Generate Report</button>
                 </div>
                 </div>
                </form>
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
               
                
                <li class="TabbedPanelsTab" tabindex="0">Stock Details</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
             
             
                <div class="TabbedPanelsContent">
           <div class="panel-body">
            
						 <center> 
					<a  href="javascript:void(0)" class="btn-download"><img src="pdf.png" width="20px"> </a>
					
					 <img src="printicon.png" width="25px" onClick="printDiv()">
						</center>
			      <div id="GFG">
					  <div id="invoice">
					  
					  
          <center>  <strong><font size="+2"><?php  echo $r['name']; ?></font> </strong><br>
          STOCK DETAILS BY CATEGORY :<?=strtoupper($catt)?> BETWEEN <b> <?=$d1." - ".$d2;?> </b> [Report Generated: <?php   
		    echo $currentTime ;  ?>]</center>
                    <hr>        
             
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                           
                                            <th >Stock</th>
                                            <th style="width: 10%;">Item</th>
                                          
                                            <th>Qty</th>
                                           
                                           <th>C. Price</th>
                                           <th>S. Price</th>
                                         
                                          
                                            <th>Amount</th>
                                            <th>Rep</th>
                                            <th>Date</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                          <?php $ii=1;

                    if($_POST['cat']=="all"){
                      $qu=mysql_query("select * FROM cat ORDER BY cat ASC " )or die(mysql_error());
                    }else{
                      $qu=mysql_query("select * FROM cat WHERE cat = '$catt' ORDER BY cat ASC " )or die(mysql_error());
                    }
							

							while($roc=mysql_fetch_array($qu)){
							$cat=$roc['cat'];
							$f=$ii++;
							?>
                        
                    <tr><th colspan="9"><?php  echo $f.'. '.strtoupper($roc['cat']); ?></th></tr>
                                   
                                    
                                     <?php $i=1;
							$query=mysql_query("select * FROM stock WHERE cat = '$cat' ORDER BY sn DESC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$e=$i++;
							?>
							
							
                           
                            

                                  <tr class="odd gradeX" <?php if($row['qty']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                          
                                            <td><b><?php echo ("Stock Summary") ?></b></td>
                                             <td><?php echo ucfirst($row['item']) ?></td>
                                             
                                            

                                            <td><?php echo number_format($row['qty']) ?></td>
                                          
                                            
                                            <td class="center"><?php echo number_format($row['unitcost']) ?></td>
                                            <td  class="center"><?php echo number_format($row['unitprice']) ?></td>
                                            
                                           
                                              <td class="center"><?=number_format($row['qty']*$row['unitprice']);?></td>
                                    <td><?php echo ucfirst($row['rep']) ?></td>
                                           
                                           <td><?php echo $row['created'] ?></td>        
                                           
                                      </tr>




                                      <?php  
                                        
                                        $querystockup=mysql_query("select * FROM transact WHERE today between '$day1' and '$day2' AND pid = '".$row['sn']."' ORDER BY sn DESC " )or die(mysql_error());
							while($stockup=mysql_fetch_array($querystockup)){
                                         ?>
  <tr class="odd gradeX">
                                          
                                          <td><?php echo ("New Sales") ?></td>
                                           <td><?php echo ucfirst($stockup['item']) ?></td>
                                           
                                          

                                          <td><?php echo number_format($stockup['qty']) ?></td>
                                        
                                          
                                          <td class="center"><?php echo number_format($stockup['cprice']) ?></td>
                                          <td  class="center"><?php echo number_format($stockup['price']) ?></td>
                                          
                                         
                                            <td class="center"><?=number_format($stockup['amount']);?></td>
                                  <td><?php echo ucfirst($stockup['rep']) ?></td>
                                         
                                         <td><?php echo $stockup['created'] ?></td>        
                                         
                                    </tr>



<?php } 
                                        
                                        $querystockup=mysql_query("select * FROM stockup WHERE today between '$day1' and '$day2' AND pid = '".$row['sn']."' ORDER BY sn DESC " )or die(mysql_error());
							while($stockup=mysql_fetch_array($querystockup)){
                                         ?>
  <tr class="odd gradeX">
                                          
                                          <td><?php echo ("New Stock") ?></td>
                                           <td><?php echo ucfirst($stockup['item']) ?></td>
                                           
                                          

                                          <td><?php echo number_format($stockup['qty']) ?></td>
                                        
                                          
                                          <td class="center"><?php echo number_format($stockup['totalcost']) ?></td>
                                          <td  class="center"><?php echo number_format($stockup['unitprice']) ?></td>
                                          
                                         
                                            <td class="center"><?=number_format($stockup['qty']*$stockup['unitprice']);?></td>
                                  <td><?php echo ucfirst($stockup['rep']) ?></td>
                                         
                                         <td><?php echo $stockup['created'] ?></td>        
                                         
                                    </tr>



<?php }
  $querystockup=mysql_query("select * FROM returnx WHERE today between '$day1' and '$day2' AND pid = '".$row['sn']."' ORDER BY sn DESC " )or die(mysql_error());
  while($stockup=mysql_fetch_array($querystockup)){
                             ?>
<tr class="odd gradeX">
                              
                              <td><?php echo ("New Return") ?></td>
                               <td><?php echo ucfirst($stockup['item']) ?></td>
                               
                              

                              <td><?php echo number_format($stockup['qty']) ?></td>
                            
                              
                              <td class="center"></td>
                              <td  class="center"><?php echo number_format($stockup['price']) ?></td>
                              
                             
                                <td class="center"><?=number_format($stockup['amount']);?></td>
                      <td><?php echo ucfirst($stockup['rep']) ?></td>
                             
                             <td><?php echo $stockup['created'] ?></td>        
                             
                        </tr>
                        <?php }
                                        
                                        $querystockup=mysql_query("select * FROM unstock WHERE today between '$day1' and '$day2' AND pid = '".$row['sn']."' ORDER BY sn DESC " )or die(mysql_error());
							while($stockup=mysql_fetch_array($querystockup)){
                                         ?>
  <tr class="odd gradeX">
                                          
                                          <td><?php echo ("Unstock Stock") ?></td>
                                           <td><?php echo ucfirst($stockup['item']) ?></td>
                                           
                                          

                                          <td><?php echo number_format($stockup['qty']) ?></td>
                                        
                                          
                                          <td class="center"><?php echo number_format($stockup['price']) ?></td>
                                          <td  class="center"><?php echo number_format($stockup['price']) ?></td>
                                          
                                         
                                            <td class="center"><?=number_format($stockup['amount']);?></td>
                                  <td><?php echo ucfirst($stockup['rep']) ?></td>
                                         
                                         <td><?php echo $stockup['created'] ?></td>        
                                         
                                    </tr>



<?php }}?>


                                   
                                  </tbody>
                           
                      
                             <?php  } ?>
                              </table>
                            </div>
                            </div>
                            </div>

                                
                           
                            
                            <!-- /.table-responsive -->
                        
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
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:2});
    </script>
    
    
    <!-- Generate PDF -->
    
    <script src="js/jspdf.debug.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="js/html2pdf.min.js"></script>

    
    <script src="js1/jquery-1.10.2.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js1/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js1/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js1/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js1/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) + 1350;
            var top = (screen.height - h) / 10;  
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', left=' + left +', top=' + top);
        } 
</script>
    




<script>

    const options = {
      margin: 0.5,
      filename: 'posreport.pdf',
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
