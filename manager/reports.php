<?php 
error_reporting(0);
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	


include("includes/connect.inc.php");
	userLog();
	
if(array_key_exists('generateReport', $_POST)){
$option = $_POST['options'];
$day = $_POST['day'];
$ddd = substr($day,4,2).'/'.substr($day,2,2).'/'.substr($day,0,2);
$week = $_POST['week'];
$month = $_POST['month'];
$year = $_POST['year'];
$catt = $_POST['cat'];
$day1 = $_POST['day1'];  //6 echo date('ymd',strtotime($dayy1)); 
$day2 =$_POST['day2']; //6
$date = str_replace('-', '', $day1);
$new = date('ymd', strtotime($date));
$date2 = str_replace('-', '', $day2);
$new2 = date('ymd', strtotime($date2));
$d1 = substr($day1,4,2).'/'.substr($day1,2,2).'/'.substr($day1,0,2);
$d2 = substr($day2,4,2).'/'.substr($day2,2,2).'/'.substr($day2,0,2);
if($option==10){$reportTitle = 'STOCK SUMMARY' ;}
if($option==1){$reportTitle = 'DAILY TRANSACTION DETAILS: '.$ddd;}
if($option==2){$reportTitle = 'WEEKLY TRANSACTION DETAILS: WEEK '.$week;}
if($option==3){$reportTitle = 'MONTHLY TRANSACTION DETAILS: '.date("F", mktime(0, 0, 0, $month, 10)).' '.date('Y');}
if($option==4){$reportTitle = 'ANNUAL TRANSACTION SUMMARY: YEAR 20'.$year;}
if($option==5){$reportTitle = 'STOCK DETAILS BY CATEGORY: '.strtoupper($catt);}
if($option==6){$reportTitle = 'SALES TRANSACTION DETAILS: FROM '.$day1.' TO '.$day2 ;}
if($option==7){$reportTitle = 'ANNUAL STOCKING SUMMARY: YEAR 20'.$year;}
if($option==8){$reportTitle = 'RE-STOCK RECOMMENDATIONS' ;}
if($option==9){$reportTitle = 'OUT-OF-STOCK ITEMS' ;}
if($option==11){$reportTitle = 'GENERAL EXPENDITURE' ;}
if($option==12){$reportTitle = 'PROFIT & LOSS STATEMENT' ;}
}

if($_GET['item']){
$itemno = $_GET['item'];
mysql_query("delete from stockout where sha1(sn)='$itemno' ");	
$option=8;
header('location: reports.php'); 
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reports</title>

    <!-- Bootstrap core CSS -->
    <link href="css1/bootstrapx.css" rel="stylesheet">

    <!-- Add custom CSS here -->
       <link rel="stylesheet" href="css/select2.min.css">
       
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
 
   <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 
 <script src="js/jquery.min.js"></script>
  <!-- Page-Level Plugin CSS - Tables -->
    <!-- <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    SB Admin CSS - Include with every page 
        <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome1/css/font-awesome.css" rel="stylesheet">
    
      <link href="css1/sb-admin.css" rel="stylesheet">
  
    -->
  <style type="text/css">

thead{display:table-header-group; }

  </style>
  <style type="text/css" media="print">
noprintx {display:none;visibility:hidden;}
</style>
   <script src='../js/jquery.min.js'></script> 
        <script type="text/JavaScript">

<!--

function BrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}

//-->

</script>

    <script>
        $(document).ready(function() {
			 $("#stoc").html('<img src="loadingg.gif" />');
            $('#stoc').load('stock.php?x=1'); 
        });
		
		
		        $(document).ready(function() {
			 $("#outstoc").html('<img src="loadingg.gif" />');
            $('#outstoc').load('outstock.php?x=1'); 
        });
    </script>
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


     <?php    include('reportnav.php') ;  ?>
     
     <?php     require('nav1.php') ;  ?>
     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
     
            <br> <br>  
            <!--  <div id="1" style="display: block">Test 1</div>
<div id="2" style="display: none; ">Test 2</div>
<div id="3" style="display: none; ">Test 3</div>
<div id="4" style="display: none; ">Test 4</div>
<div id="5" style="display: none; ">Test 5</div>  --->


                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        <div class="noprint">
                       <form method="post"> 
                       <div class="col-lg-3"><br><select name="options" id="options" class="form-control select2">
  <option value="10">Stock Summary</option>
   <option value="5">Stock Summary by Category</option>
   <option value="1" selected>Daily Sales Detail</option>
   <option value="2">Weekly Sales Detail</option>
  <option value="3">Monthly Sales Detail</option>
  <option value="4">Annual Sales Summary</option>
 <option value="7">Annual Stocking Summary</option> 
  <option value="6">Sales Details Across Date Range</option>
  
    <option value="8">Re-stock Recommendations</option>
     <option value="9">Out-of-Stock Items</option>
      <option value="11">Expenditure</option>
       <option value="12">Profit & Loss Statement</option>
 
</select> </div>
                      
                       
                        <div id="1" style="display: block"><div class="col-lg-3" ><br>
                        <select name="day" class="form-control select2"> 
                                          
                      <?php 
							$query=mysql_query("select * FROM datt WHERE ymd <= '$ymd' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($ymd==$row['ymd']){echo 'selected';} ?> value="<?php echo $row['ymd'];?>" ><?php echo $row['date'] ;?></option><?php }  ?>
                          </select>
                          </div>
                          <!--<div class="col-lg-3" ><br><select name="per" class="form-control select2"> 
                          <option>PER SALES</option>
                          <option>PER ITEM</option></select>
                          </div>-->
                          </div>
<div id="2" style="display: none; "><div class="col-lg-3" ><br>
                        <select name="week" class="form-control select2"> 
                                          
                      <?php 
						$i = 1; 
							while($i<=53){ $e=$i++;
							?>                            <option <?php if($week==$e){echo 'selected';} ?> value="<?php echo $e;?>" >WEEK <?php echo $e ;?></option><?php }  ?>
                          </select></div></div>
<div id="3" style="display: none; "><div class="col-lg-3" ><br><select name="month" class="form-control select2"> 
                                          
                      <?php 
						$i = 1; 
							while($i<=12){ $e=$i++;
							?>                            <option value="<?php echo $e;?>" > <?php echo date("F", mktime(0, 0, 0, $e, 10)).' '. date('Y') ;?></option><?php }  ?>
                          </select></div></div>
<div id="4" style="display: none; "><div class="col-lg-3" ><br><select name="year" class="form-control select2"> 
                                          
                      <?php 
						$i = date('y'); $f = $i-3; 
							while($i>=$f){ $e=$i--;
							?>                            <option value="<?php echo $e;?>" > 20<?php echo $e ;?></option><?php }  ?>
                          </select></div></div>
                          
                          <div id="7" style="display: none; "><div class="col-lg-3" ><br><select name="year" class="form-control select2"> 
                                          
                      <?php 
						$i = date('y'); $f = $i-3; 
							while($i>=$f){ $e=$i--;
							?>                            <option value="<?php echo $e;?>" > 20<?php echo $e ;?></option><?php }  ?>
                          </select></div></div>
                          
<div id="5" style="display: none; "><div class="col-lg-3" ><br> <select name="cat" class="form-control"> 
                                             <option  disabled selected>SELECT CATEGORY</option>
                      <?php 
							$query=mysql_query("select * FROM cat ORDER BY cat DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($cat==$row['cat']){echo 'selected';} ?> ><?php echo $row['cat'] ;?> </option><?php }  ?>
                          </select></div></div>
                          
                          
                          <div id="6" style="display: none; "><div class="col-lg-3" >
                            Start Date <br> 
                            <input type="date" name="day1" value="" class="form-control select2">
                          </div>
                                            <div class="col-lg-3" >End Date<br> 
                                            <input type="date" name="day2" value="" class="form-control select2">
                                            </select>
                                          
                                          </div>
                          </div>
                        
                    <div class="col-lg-3" ><br><button style="width:100%" type="submit" class="btn btn-primary" name="generateReport" >Generate Report</button></div></form>
					
				
					<br><br><hr> 
                        </div>
						 <center> 
					<a  href="javascript:void(0)" class="btn-download"><img src="pdf.png" width="20px"> </a>
					
					 <img src="printicon.png" width="25px" onClick="printDiv()">
						</center>
			      <div id="GFG">
					  <div id="invoice">
					  
					  
          <center>  <strong><font size="+2"><?php  echo $r['name']; ?></font> </strong><br><?php   
		    echo $reportTitle ;  ?> [Report Generated: <?php   
		    echo $currentTime ;  ?>]</center>
                    <hr>        
                                <?php if($option==10){ ?>                    
                 <div id="stoc" style="float:left"></div>
             
             
       <?php }elseif($option==9){?> 
		                     
                 <div id="outstoc"></div>
                 
       <?php }elseif($option==1){  ?>
	   
	 
        <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th >Receipt No</th>
                                           	<th >Customer</th>
                                            <th >Stock Worth</th>
  						                               <th >Discount</th>
                                             <th >Amount Due</th>
                                          
                                           <th >Cash Paid</th>
                                           
                                            <?php 
							$query=mysql_query("select * FROM bank ORDER BY id asc limit 5" )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                    
                         
                          <th class="center"><?php echo $row['bank']; ?></th>
                         
                        <?php  } ?>
                                           <th >Credit</th>
                                           <th >Cost Price</th>
  						                              <th >Profit</th>
                                           <th >Date/Time</th>
                                         
                                             <th >Print</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;

							$querprofit=mysql_query("select * FROM transact WHERE today = $day and status = $i ORDER BY sn DESC" )or die(mysql_error());
								   while($rowprofit=mysql_fetch_array($querprofit)){
                   									$otalcprice += number_format($rowprofit['cprice']);
								  }	

							$query=mysql_query("select * FROM transact2 WHERE today = '$day' ORDER BY sn DESC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$totalcprice += $row['cprice'];
							$damount += $row['cash'];
							$e=$i++;
							
							?>
							
							
                           
                            

                                  <tr class="odd gradeX" <?php if($row['cash']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['salesid']) ?></td>
                                            <td><?php echo $row['name'];   ?></td>
                                            <td><?php echo number_format($row['amount']) ?></td>

                                           <td ><?php echo number_format($row['discount']) ?></td>
                                            <td ><?php echo number_format($row['amount']-$row['discount']) ?></td>

                                            <td class="center"><?php echo number_format($row['cashp']) ?></td>

                                            
                                            				
                                            <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 1 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 2 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
					              	
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>

                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                          <td  class="center"><?php echo $row['credit'] ?></td>
                                           
                                            <td  class="center">
                                              
                                            <?php echo $row['cprice']; ?>
                                          
                                          
                                          </td>

 					<td class="center"><?php echo number_format($row['cash']-$row['cprice'])?></td>

          
                                            <td  class="center"><?php echo $row['created'] ?></td>
                                           
                                            <td  class="center"><a href="#" onClick="BrWindow('receipt.php?transactionIndex=<?php echo $row['salesid']; ?>','','width=800,height=600')" > Receipt </a></td>  
                                    
                                    </tr>  <?php  } ?>
                                    <tr><th colspan="3">TOTAL</th><th><?php echo trSumC1('transact2','amount','today',$day); ?></th>
                                    <th><?php echo trSumC1('transact2','discount','today',$day); ?></th>
                                    <th><?php echo trSumC1('transact2','amount-discount','today',$day); ?></th>
                                    <th><?php echo trSumC1('transact2','cashp','today',$day); ?></th>

                                    <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today = '$day' AND method = 1"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                   
                                   <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today = '$day' AND method = 2"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>      

<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today = '$day' AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today = '$day' AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today = '$day' AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                    
                                    <th><?php echo trSumC1('transact2','credit','today',$day);?></th>

                                    <th><?php echo number_format($totalcprice);?></th>
                                    <th><?php echo number_format($damount-$totalcprice);?></th>
                                   

				
                                    <th></th><th></th><th></th></tr>
									
						         
									
                                    </tbody></table>
                                    


       
            
                 <?php  }elseif($option==6){  ?>
       
        <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                            <th>SN</th>
                                            <th >Receipt No</th>
                                           	<th >Customer</th>
                                            <th >Stock Worth</th>
  						                               <th >Discount</th>
                                             <th >Amount Due</th>
                                          
                                           <th >Cash Paid</th>
                                           
                                            <?php 
							$query=mysql_query("select * FROM bank ORDER BY id asc limit 5" )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                    
                         
                          <th class="center"><?php echo $row['bank']; ?></th>
                         
                        <?php  } ?>
                                           <th >Credit</th>
                                           <th >Cost Price</th>
  						                              <th >Profit</th>
                                           <th >Date/Time</th>
                                         
                                             <th >Print</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;

   //$querprofit=mysql_query("select * FROM transact WHERE today between '$day1' and '$day2' and status = '$i' and amount > 0" )or die(mysql_error());
								   //while($rowprofit=mysql_fetch_array($querprofit)){
									$totalcprice += $rowprofit['cprice'];
								  // }

							$query=mysql_query("select * FROM transact2 WHERE today between '$new' and '$new2' and amount > 0 " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$actotalcprice += $row['cprice'];
							$sns=$row['sn'];
							$acamount += $row['amount'];
              $acdisamount += $row['discount'];
              $actotalcashp += $row['cashp'];
              $actotalcredit += $row['credit'];
              $actotalcash += $row['cash'];
							$e=$i++;
							?>
							
							
                           
                            

              <tr class="odd gradeX" <?php if($row['cash']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['salesid']) ?></td>
                                            <td><?php echo $row['name'];   ?></td>
                                            <td><?php echo number_format($row['amount']) ?></td>

                                           <td ><?php echo number_format($row['discount']) ?></td>
                                            <td ><?php echo number_format($row['amount']-$row['discount']) ?></td>

                                            <td class="center"><?php echo number_format($row['cashp']) ?></td>

                                            
                                            				
                                            <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 1 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 2 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
					              	
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>

                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                          <td  class="center"><?php echo $row['credit'] ?></td>
                                           
                                            <td  class="center">
                                              
                                            <?php echo $row['cprice']; ?>
                                          
                                          
                                          </td>

 					<td class="center"><?php echo number_format($row['cash']-$row['cprice'])?></td>

          
                                            <td  class="center"><?php echo $row['created'] ?></td>
                                           
                                            <td  class="center"><a href="#" onClick="BrWindow('receipt.php?transactionIndex=<?php echo $row['salesid']; ?>','','width=800,height=600')" > Receipt </a></td>  
                                    
                                    </tr>  <?php  } ?>

                                    <tr><th colspan="3">TOTAL</th><th><?php echo number_format($acamount);?></th>
                                    <th><?php echo number_format($acdisamount);?></th>
                                    <th><?php echo number_format($acamount-$acdisamount);  ?></th>
                                    <th><?php echo number_format($actotalcashp); ?></th> 

                                    <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today between '$day1' and '$day2' AND method = 1"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                   
                                   <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today between '$day1' and '$day2' AND method = 2"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>      

<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today between '$day1' and '$day2' AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today between '$day1' and '$day2' AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE today between '$day1' and '$day2' AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                    
                                    <th><?php echo number_format($actotalcredit);?></th>

                                    <th><?php echo number_format($actotalcprice);?></th>
                                    <th><?php echo number_format($actotalcash-$actotalcprice);?></th>
                                   

				
                                    <th></th><th></th><th></th></tr>



                                    </tbody></table>
                                    
       
            
                 <?php  }elseif($option==2){  ?>
       
        <table class="table table-striped table-bordered table-hover">
                                   <thead>
                                   <tr>
                                            <th>SN</th>
                                            <th >Receipt No</th>
                                           	<th >Customer</th>
                                            <th >Stock Worth</th>
  						                               <th >Discount</th>
                                             <th >Amount Due</th>
                                          
                                           <th >Cash Paid</th>
                                           
                                            <?php 
							$query=mysql_query("select * FROM bank ORDER BY id asc limit 5" )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                    
                         
                          <th class="center"><?php echo $row['bank']; ?></th>
                         
                        <?php  } ?>
                                           <th >Credit</th>
                                           <th >Cost Price</th>
  						                              <th >Profit</th>
                                           <th >Date/Time</th>
                                         
                                             <th >Print</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;

								   $sdate=date('Y');

   $querprofit=mysql_query("select * FROM transact WHERE ww = '$week' and created LIKE '%$sdate%' ORDER BY sn DESC" )or die(mysql_error());
								   while($rowprofit=mysql_fetch_array($querprofit)){
									$otalcprice += number_format($rowprofit['cprice']);
                 // $totalcprice += number_format($rowprofit['cprice']);
								   }

							$query=mysql_query("select * FROM transact2 WHERE ww = '$week' and created LIKE '%$sdate%' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$totalcprice += $row['cprice'];
							$wtamount += $row['amount'];
							$disamount += $row['discount'];
							$wpaid += $row['cash'];
							$e=$i++;
							$totalpos += number_format($row['pos']);
							$totalcashp += $row['cashp'];
              $totalcredit += $row['credit'];
              

							?>
							
							
                           
                            

                              
              <tr class="odd gradeX" <?php if($row['cash']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['salesid']) ?></td>
                                            <td><?php echo $row['name'];   ?></td>
                                            <td><?php echo number_format($row['amount']) ?></td>

                                           <td ><?php echo number_format($row['discount']) ?></td>
                                            <td ><?php echo number_format($row['amount']-$row['discount']) ?></td>

                                            <td class="center"><?php echo number_format($row['cashp']) ?></td>

                                            
                                            				
                                            <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 1 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 2 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
					              	
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>

                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                          <td  class="center"><?php echo $row['credit'] ?></td>
                                           
                                            <td  class="center">
                                              
                                            <?php echo $row['cprice']; ?>
                                          
                                          
                                          </td>

 					<td class="center"><?php echo number_format($row['cash']-$row['cprice'])?></td>

          
                                            <td  class="center"><?php echo $row['created'] ?></td>
                                           
                                            <td  class="center"><a href="#" onClick="BrWindow('receipt.php?transactionIndex=<?php echo $row['salesid']; ?>','','width=800,height=600')" > Receipt </a></td>  
                                    
                                    </tr>  <?php  } ?>




                                    <tr><th colspan="3">TOTAL</th><th><?php echo number_format($wtamount);?></th>
                                    <th><?php echo number_format($disamount);?></th>
                                    <th><?php echo number_format($wtamount-$disamount);  ?></th>
                                    <th><?php echo number_format($totalcashp); ?></th>

                                    <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE ww = $week AND created LIKE '%$sdate%' AND method = 1"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                   
                                   <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE ww = $week and created LIKE '%$sdate%' AND method = 2"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>      

<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE ww = $week and created LIKE '%$sdate%' AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE ww = $week and created LIKE '%$sdate%' AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE ww = $week AND created LIKE '%$sdate%' AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                    
                                    <th><?php echo number_format($totalcredit);?></th>

                                    <th><?php echo number_format($totalcprice);?></th>
                                    <th><?php echo number_format($wpaid-$totalcprice);?></th>
                                   

				
                                    <th></th><th></th><th></th></tr>


                               
                                    </tbody></table>
                                    <br> <br> 
       
            
                 <?php  }elseif($option==3){  ?>
       
        <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                            <th>SN</th>
                                            <th >Receipt No</th>
                                           	<th >Customer</th>
                                            <th >Stock Worth</th>
  						                               <th >Discount</th>
                                             <th >Amount Due</th>
                                          
                                           <th >Cash Paid</th>
                                           
                                            <?php 
							$query=mysql_query("select * FROM bank ORDER BY id asc limit 5" )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                    
                         
                          <th class="center"><?php echo $row['bank']; ?></th>
                         
                        <?php  } ?>
                                           <th >Credit</th>
                                           <th >Cost Price</th>
  						                              <th >Profit</th>
                                           <th >Date/Time</th>
                                         
                                             <th >Print</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;
								    $sdate=date('Y');
$querprofit=mysql_query("select * FROM transact WHERE mm = '$month' and created LIKE '%$sdate%' and status = '$i' ORDER BY sn DESC")or die(mysql_error());
								   while($rowprofit=mysql_fetch_array($querprofit)){
									$totalcpricey += $rowprofit['cprice'];
                  //$mtotalcprice +=  $rowprofit['cprice'];
								   }


							$query=mysql_query("select * FROM transact2 WHERE mm = '$month' and created LIKE '%$sdate%' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$mwtamount += $row['amount'];
							$mdisamount += $row['discount'];
							$mwpaid += $row['cash'];
							$e=$i++;
              $mtotalpos += number_format($row['pos']);
							$mtotalcashp += $row['cashp'];
              $mtotalcredit += $row['credit'];
              $mtotalcprice +=  intval($row['cprice']);
							?>
							
							
                           
                            

              <tr class="odd gradeX" <?php if($row['cash']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['salesid']) ?></td>
                                            <td><?php echo $row['name'];   ?></td>
                                            <td><?php echo number_format($row['amount']) ?></td>

                                           <td ><?php echo number_format($row['discount']) ?></td>
                                            <td ><?php echo number_format($row['amount']-$row['discount']) ?></td>

                                            <td class="center"><?php echo number_format($row['cashp']) ?></td>

                                            
                                            				
                                            <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 1 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 2 "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
					              	
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>

                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                       <td  class="center"> <?php
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE salesid = ".$row['salesid']." AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum) ;
                       ?>
                       </td>
                          <td  class="center"><?php echo $row['credit'] ?></td>
                                           
                                            <td  class="center">
                                              
                                            <?php echo $row['cprice']; ?>
                                          
                                          
                                          </td>

 					<td class="center"><?php echo number_format($row['cash']-$row['cprice'])?></td>

          
                                            <td  class="center"><?php echo $row['created'] ?></td>
                                           
                                            <td  class="center"><a href="#" onClick="BrWindow('receipt.php?transactionIndex=<?php echo $row['salesid']; ?>','','width=800,height=600')" > Receipt </a></td>  
                                    
                                    </tr>  <?php  } ?>



                                    <tr><th colspan="3">TOTAL</th><th><?php

echo number_format($mwtamount);

?></th>


                  <th><?php echo number_format($mdisamount); ?></th>
                  <th><?php echo number_format($mwtamount-$disamount); ?></th>
                <th><?php echo number_format($mtotalcashp); ?></th>

                                    <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE mm = $month AND created LIKE '%$sdate%' AND method = 1"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                   
                                   <th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE mm = $month and created LIKE '%$sdate%' AND method = 2"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>      

<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE mm = $month and created LIKE '%$sdate%' AND method = 3"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE mm = $month and created LIKE '%$sdate%' AND method = 4"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
<th><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM  payment_method WHERE mm = $month AND created LIKE '%$sdate%' AND method = 5"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
echo number_format($sum)
?></th>
                                    
                                    <th><?php echo number_format($mtotalcredit);?></th>

                                    <th><?php echo number_format($mtotalcprice);?></th>
                                    <th><?php echo number_format($mwpaid-$mtotalcprice);?></th>
                                   

				
                                    <th></th><th></th><th></th></tr>






















                                  
<br><br>
                                    
                                    </tbody></table>
                                    
       
            
                 <?php  }elseif($option==4){  ?>
                 
                  <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th >Item</th>
                                            <?php $a=1; while($a<=12){$b=$a++;
											$month = date("F", mktime(0, 0, 0, $b, 10)) ; ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><?php echo strtoupper(substr($month,0,3)); ?></th>
                                            <?php } ?>
                                           	<th >Total</th>
                                            	<th class="noprint" >Details</th>
                                           
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;
							$query=mysql_query("select * FROM stock " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$expid=$row['sn'];
							
							$numtr = sqL2('transact','yy',$yy,'pid',$expid,3);
							
							if($numtr>0){  $e=$i++;
							?>
                                  <tr class="odd gradeX" >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['item']) ?></td>
                                             <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<td <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?> ><?php echo trSumc('transact','amount','pid',$expid,'mm',$b);  ?></td>
                                            <?php } ?>
                                             
                                             <td><?php echo trSumb('transact','amount','pid',$expid);  ?></td>
                                             <td  class="center noprint"><a href="#" onClick="BrWindow('itemdetails.php?transactionIndex=<?php echo $row['sn']; ?>&Item=<?php echo $row['item']; ?>','','width=800,height=600')" > Details </a></td>
                                           
                                    
                                    </tr>  <?php } } ?>
                                    <tr><th colspan="2">TOTAL</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><a href="#" onClick="BrWindow('itemdetails.php?transactionMonth=<?php echo $b; ?>&Item=<?php echo sha1($row['item']).sha1($row['des']); ?>','','width=800,height=600')" ><?php echo trSumb('transact','amount','mm',$b);  ?></a></th>
                                            <?php } ?>
                                            <th><?php echo trSum('transact','amount'); ?></th><th class="noprint"></th>
                                   
                                </tr>
                                    
                                    </tbody></table>
                                    
       
      
       
            
                 <?php  } elseif($option==7){  ?>
                 
                  <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th >Item</th>
                                            <?php $a=1; while($a<=12){$b=$a++;
											$month = date("F", mktime(0, 0, 0, $b, 10)) ; ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><?php echo strtoupper(substr($month,0,3)); ?></th>
                                            <?php } ?>
                                           	<th >Total</th>
                                           
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;
							$query=mysql_query("select * FROM stock " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$expid=$row['sn'];
							
							$numtr = sqL2('stockup','yy',$yy,'pid',$expid,3);
							
							if($numtr>0){  $e=$i++;
							?>
                                  <tr class="odd gradeX" >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['item']) ?></td>
                                             <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<td <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?> ><?php echo trSumc('stockup','totalcost','pid',$expid,'mm',$b);  ?></td>
                                            <?php } ?>
                                             
                                             <td><?php echo trSumb('stockup','totalcost','pid',$expid);  ?></td>
                                           
                                    
                                    </tr>  <?php } } ?>
                                    <tr><th colspan="2">TOTAL</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><?php echo trSumb('stockup','totalcost','mm',$b);  ?></th>
                                            <?php } ?>
                                            <th><?php echo trSum('stockup','totalcost'); ?></th>
                                   
                                </tr>
                                    
                                    </tbody></table>
                                    
       
      
       
            
                 <?php  } elseif($option==5){ ?>                    
                        <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="7%">SN</th>
                                            <th width="20%">Item</th>
                                           	<th width="8%">Indicator</th>
                                            <th width="8%">Stock Qty</th>
                                             <th width="8%">Uptimum Qty</th>
                                           <th width="8%">Unit Cost</th>
                                           <th width="8%">Unit Price</th>
                                           <th width="8%">Pack Price</th>
                                           <th width="8%">Unit/Pack</th>
                                            <th width="8%">Sold Qty</th>
                                            <th width="8%">Sold Amt</th>
                                           
                                      </tr>
                                    </thead>
                                    <tbody> 
                    <tr><th colspan="11"><?php  echo strtoupper($catt); ?></th></tr>
                                   
                                    
                                     <?php $i=1;
							$query=mysql_query("select * FROM stock WHERE cat = '$catt' ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$e=$i++;
							?>
							
							
                           
                            

                                  <tr class="odd gradeX" <?php if($row['qty']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['item']) ?></td>
                                            <td><?php $sta = $row['qty']*100/$row['uptimum'];   echo round($sta) ?>%</td>
                                            <td><?php echo number_format($row['qty']) ?></td>
                                           <td ><?php echo number_format($row['uptimum']) ?></td>
                                            
                                            <td class="center"><?php echo number_format($row['unitcost']) ?></td>
                                            <td  class="center"><?php echo number_format($row['unitprice']) ?></td>
                                            <td  class="center"><?php echo number_format($row['packprice']) ?></td>
                                            <td  class="center"><?php echo number_format($row['pqty']) ?></td>
                                             <td class="center"><?php $item2 = $row['item']  ;  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$item2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo number_format($sum2) ;
					  ?></td>
                                              <td class="center"><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE item = '$item2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo number_format($sum2) ;
					  ?></td>
                                           
                                           
                                      </tr>
                                         <?php  } ?>
                                  </tbody>
                           
                      
                              </table>
                           
             
       <?php } elseif($option==8){ ?>                    
                        <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="7%">SN</th>
                                            <th width="20%">Item</th>
                                           	<th width="8%">Indicator</th>
                                            <th width="8%">Stock Qty</th>
                                             <th width="8%">Uptimum Qty</th>
                                           <th width="8%">Unit Cost</th>
                                           <th width="8%">Unit Price</th>
                                           <th width="8%">Pack Price</th>
                                           <th width="8%">Unit/Pack</th>
                                            <th width="6%">Sold Qty</th>
                                            <th width="7%">Sold Amt</th>
                                             <th width="5%"  class="noprint">Action</th>
                                           
                                      </tr>
                                    </thead>
                                    <tbody> 
                  
                                   
                                    
                                     <?php $i=1;
							$query=mysql_query("select * FROM stockout ORDER BY qty ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$sns=$row['sn'];
							$e=$i++;
							?>
							
							
                           
                            

                                  <tr class="odd gradeX" <?php if($row['qty']==0){ ?> bgcolor="#FF66CC" <?php }  ?> >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['item']) ?></td>
                                            <td><?php $sta = $row['qty']*100/$row['uptimum'];   echo round($sta) ?>%</td>
                                            <td><?php echo number_format($row['qty']) ?></td>
                                           <td ><?php echo number_format($row['uptimum']) ?></td>
                                            
                                            <td class="center"><?php echo number_format($row['unitcost']) ?></td>
                                            <td  class="center"><?php echo number_format($row['unitprice']) ?></td>
                                            <td  class="center"><?php echo number_format($row['packprice']) ?></td>
                                            <td  class="center"><?php echo number_format($row['pqty']) ?></td>
                                             <td class="center"><?php $item2 = $row['item']  ;  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$item2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo number_format($sum2) ;
					  ?></td>
                                              <td class="center"><?php  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE item = '$item2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo number_format($sum2) ;
					  ?></td>
                      <td class="noprint"><a href="?item=<?php echo sha1($row['sn']); ?>">Clear</a></td>
                                           
                                           
                                      </tr>
                                         <?php  } ?>
                                  </tbody>
                           
                      
                              </table>
                           
             
       <?php  }elseif($option==11){  ?>
       
        <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th width="20%">Item</th>
                                            <?php $a=1; while($a<=12){$b=$a++;
											$month = date("F", mktime(0, 0, 0, $b, 10)) ; ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><?php echo strtoupper(substr($month,0,3)); ?></th>
                                            <?php } ?>
                                           	<th >Total</th>
                                         
                                            <th class="noprint" >Explore</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                                   <?php $i=1;
							$query=mysql_query("select * FROM expitem " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$expid=$row['sn'];
							$e=$i++;
							?>
                                  <tr class="odd gradeX" >
                                            <td class="center"><?php echo $e ?></td>
                                            
                                             <td><?php echo ucfirst($row['item']) ?></td>
                                             <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<td <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?> ><?php echo trSumc('expend','amount','expid',$expid,'mm',$b);  ?></td>
                                            <?php } ?>
                                             
                                             <td><?php echo trSumb('expend','amount','expid',$expid);  ?></td>
                                         
                                          <td  class="center"  class="noprint"><a href="#" onClick="BrWindow('expdetails.php?transactionIndex=<?php echo $row['sn']; ?>&Item=<?php echo $row['item']; ?>','','width=800,height=600')" > Details </a></td>  
                                    
                                    </tr>  <?php  } ?>
                                    <tr><th colspan="2">TOTAL</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><a href="#" onClick="BrWindow('expdetails.php?transactionMonth=<?php echo $b; ?>&Item=<?php echo sha1($row['item']).sha1($row['des']); ?>','','width=800,height=600')" ><?php echo trSumb('expend','amount','mm',$b);  ?></a></th>
                                            <?php } ?>
                                            <th><?php echo trSum('expend','amount'); ?></th>
                                   
                                <th></th></tr>
                                    
                                    </tbody></table>
                                    
                 <?php  }elseif($option==12){  ?>
       
        <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th colspan="2" >CATEGORY</th>
                                            <?php $a=1; while($a<=12){$b=$a++;
											$month = date("F", mktime(0, 0, 0, $b, 10)) ; ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><?php echo strtoupper(substr($month,0,3)); ?></th>
                                            <?php } ?>
                                           	<th >Total</th>
                                         
                                          
                                      </tr>
                                    </thead>
                                    <tbody> 
                                  <tr><th colspan="2">STOCKING COST</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>>₦<?php echo trSumb('stockup2','amount','mm',$b);  ?></th>
                                            <?php } ?>
                                            <th>₦<?php echo trSum('stockup2','amount'); ?></th>
                                   
                                </tr>
                                 <tr><th colspan="14"></th></tr> 
                                    <tr><th colspan="2">OTHER EXPENDITURE</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><a href="#" onClick="BrWindow('expdetails.php?transactionMonth=<?php echo $b; ?>&Item=<?php echo sha1($row['item']).sha1($row['des']); ?>','','width=800,height=600')" >₦<?php echo trSumb('expend','amount','mm',$b);  ?></a></th>
                                            <?php } ?>
                                            <th>₦<?php echo trSum('expend','amount'); ?></th>
                                   
                               </tr>
                                
                                 <tr><th colspan="14"></th></tr> 
                                
                                
                                
               <tr><th colspan="2">TOTAL COST</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th bgcolor="#99FF33" >₦<?php echo number_format(trSumbn('expend','amount','mm',$b) + trSumbn('stockup2','amount','mm',$b));  ?></th>
                                            <?php } ?>
                                            <th>₦<?php echo number_format(trSuman('expend','amount') + trSuman('stockup2','amount')); ?></th>
                                   
                                </tr>                  
                                 <tr><th colspan="14"></th></tr> 
                                    <tr><th colspan="2">SALES TOTAL</th>
                                    <?php $a=1; while($a<=12){$b=$a++;  ?>
                                            	<th <?php if($mm==$b){ ?> bgcolor="#99FF33" <?php  } ?>><a href="#" onClick="BrWindow('itemdetails.php?transactionMonth=<?php echo $b; ?>&Item=<?php echo sha1($row['item']).sha1($row['des']); ?>','','width=800,height=600')" >₦<?php echo trSumb('transact','amount','mm',$b);  ?></a></th>
                                            <?php } ?>
                                            <th>₦<?php echo trSum('transact','amount'); ?></th>
                                   
                                </tr>
                                 <tr><th colspan="14"></th></tr> 
                                <tr><th colspan="2">PROFIT</th>
                                    <?php $a=1; while($a<=12){$b=$a++; 
					$x = trSumbn('transact','amount','mm',$b) - trSumbn('expend','amount','mm',$b) - trSumbn('stockup2','amount','mm',$b);
									$y = trSuman('transact','amount') - trSuman('expend','amount') - trSuman('stockup2','amount'); ?>
                                            	<th <?php if($x<0){ ?>  bgcolor="red" <?php } else{ ?>  <?php } ?> >₦<?php echo number_format($x);  ?></th>
                                            <?php } ?>
                                            <th <?php if($y<0){ ?>  bgcolor="red" <?php } else{ ?>  <?php } ?>>₦<?php echo number_format($y); ?></th>
                                   
                                </tr>
                                
                                
                                    
                                    </tbody></table>
                                    
                                    <div class="noprint"><em>Click on a month's total amount to view details of transaction for that month</em></div>
                                    
       
            
                 <?php  } ?>
            
	</div>
			</div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
<script src="js/jspdf.debug.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="js/html2pdf.min.js"></script>


    <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
    
    
    
    
       <script src="js1/select2.full.min.js"></script>
    
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
        $('#dataTables-example').dataTable();
    });
    </script>
    
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>
    
    
    
    <script type="text/javascript">
document.getElementById('options').onchange = function() {
    var i = 1;
    var myDiv = document.getElementById(i);
    while(myDiv) {
        myDiv.style.display = 'none';
        myDiv = document.getElementById(++i);
    }
    document.getElementById(this.value).style.display = 'block';
};
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