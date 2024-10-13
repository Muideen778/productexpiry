<?php 
error_reporting(0);
    session_start(); ob_start();

$_SESSION['frame']=1;

include("includes/connect.inc.php");

if(isset($_POST['oldtransaction'])){
$cbname=$_POST['cbname'];
mysql_query("update transact set status=3, name='$cbname' where salesid='".$_SESSION['salesid']."'");
$_SESSION['salesid']=date('sihmdy'); //rand(100000, 10000);
$salesid = $_SESSION['salesid'];
}

if(isset($_POST['removed'])){
$cbname=$_POST['sids'];
mysql_query("delete from transact where salesid = '$cbname'");
}

if(isset($_POST['continue'])){
$cbname=$_POST['sids'];
$_SESSION['salesid']=$cbname;
$salesid = $_SESSION['salesid'];
mysql_query("update transact set status=0 where salesid='$cbname'");


}

$edituprice="readonly";
$editpprice="readonly";
if(isset($_POST['edituprice'])){
  $edituprice="";
 
  }elseif(isset($_POST['editpprice'])){
    $editpprice="";
  }

 
if($ndts > $vdts){

echo'<html>
	<head>
		<meta name="author" content="Kai Oswald Seidler, Kay Vogelgesang, Carsten Wiedmann">
		<link href="xampp.css" rel="stylesheet" type="text/css">
		<title></title>
	</head>

	<body>
<br />
<br /><br /><br /><br />		<div align="center">
		<h1 style="color:red">Software Expired</h1>
</div>
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			


			<tr>
				<td align="center" width="600"><h2 style="color:green">Contact: +234 813 4822 049</h2></td>
			</tr>
<tr>
				<td align="center" width="600"><h2 style="color:green; size:16px">ronextechnology@gmail.com</h2></td>
			</tr>
		</table>
	</body>
</html>';

}else{

include("includes/sales.php");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Manager</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
     <link rel="stylesheet" href="css/select2.min.css">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  
  
   <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 
 

    <!-- Page-Level Plugin CSS - Tables -->
    <!-- <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    SB Admin CSS - Include with every page 
        <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome1/css/font-awesome.css" rel="stylesheet">
    
      <link href="css1/sb-admin.css" rel="stylesheet">
  
    -->
  <style type="text/css">
.fm1{
width:45%;
float:left; 
margin-right:20px;
}

.fm2{padding:10px;
color:#033;
font-weight:bolder;
width:100%;
float:left; 
border:thin solid #999;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
}

form input{
	font-weight:bolder;
}

sta{background-color:<?php echo $color  ;?>;
color:#FFF;

}

  </style>
  
  <script src='../js/jquery.min.js'></script>
                      <script type="text/javascript">

    $(document).ready(function(){

        $(".js-calc").keyup(function(){

            var val1 = parseInt($("#qty").val());
            var val2 = parseInt($("#price").val());
			 var val3 = parseInt($("#qty2").val());
			  var val4 = parseInt($("#price2").val());
			   var val5 = parseInt($("#qtyx").val());

         if ( ! isNaN(val1) && ! isNaN(val2))
            {
                 $("#result").text(val1 * val2);
            
			}
			
			         if ( ! isNaN(val3) && ! isNaN(val2))
            {
                 $("#result2").text(val3 * val4);
				 
				  $("#totalqty").text(val3 * <?php echo $pqty; ?>);
				 
				 //   $("#res").text('<?php echo $error; ?>');
            }
			
			if ( ! isNaN(val5) && ! isNaN(val1))
            {
			 
			 if ( val5 < val1)
            {
                 $("#resx").text('<?php echo $error; ?>');
			}
			if ( val5 > val1)
            {
                 $("#resx").text('');
			}
			if ( val5 < (<?php echo $pqty; ?>*val3))
            {
                 $("#resy").text('<?php echo $error; ?>');
			}
			
			if ( val5 > (<?php echo $pqty; ?>*val3))
            {
                 $("#resy").text('');
			}
			}
		

        });

    });



    </script>
    
      
    <script>
        $(document).ready(function() {
            // $('#test').load('localpage.htm'); works!
			 $("#test").html('<img src="loadingg.gif" />');
            $('#test').load('salesx.php'); // does not work!
        });
		
		setInterval(function(){
    document.getElementById("updatetime").innerHTML = (new Date()).toLocaleTimeString();
}, 1000);

    </script>
    
      <script type="text/JavaScript">

<!--

function BrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}

//-->

</script>


</head>

  <body>
  <?php  
  if(isset($invno)){ ?>
<script type="text/javascript">window.open("receipt.php?transactionIndex=<?php echo $invno; ?>");</script>
  <?php }
  ?>

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
          <img src="tlog.png" width="200"  >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     <?php    include('nav2.php') ;  ?>
     
     <?php     require('nav1.php') ;  
	 
	  $query = mysql_query(" select * from transact where status = 0 AND rep='$rep' LIMIT 1 ");
							  $snotra = mysql_num_rows($query);
							  if($snotra>0){ 
							  
							  while($row=mysql_fetch_array($query)){
							  $_SESSION['salesid']=$row['salesid'];
$salesid = $_SESSION['salesid'];
							  }
							  }
	 
                include('settingstatus.php');
	 
	 ?>
     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

          <div class="col-lg-12">
            
           
       
              
            <div class="col-lg-6">
              <div style="font-size:18px; font-weight:bold">POINT OF SALE PANEL</div>
			 
                  <iframe  src="search/index.php" width="100%" style="border:dash"></iframe>


<?php  if(isset($pid) && !empty($rowx['item'])){  $em = mysql_query(" SELECT * FROM stock WHERE sn = '$pid' "); $rx = mysql_fetch_assoc($em);
$itemstatus = $rx['qty']*100/$rx['uptimum']; 

?>
	
<font color="green"><?php echo $er; ?></font>
                  <table class="table table-bordered" >
                  <tr><td>Item:<br><font size="+1"><?php echo strtoupper($rowx['item']); ?></font><br><?php echo $rowx['des'].' | <b>'.$rowx['cat'].'</b>'; ?></td>
                  <td>Avail. Qty:<br><font size="+1"><?php echo number_format($rx['qty']); ?></font><br>
                  Packs: <?php echo number_format($rx['qty']/$rx['pqty'],1); ?></td>
                  <td bgcolor="<?php echo $color  ;?>" style="color:#FFF">Status: <?php echo number_format($itemstatus); ?>%<br><font size="+1"><?php echo $sta; ?></font></td>
                  </tr></table>
                  
                   <form method="post">
                   <strong><?php echo $erqty; ?></strong>
                      <p><font color="red"><em><span id="resx"></span><span id="resy"></span></em></font></p>
                      <table class="table table-bordered" >
                  <tr><td>
                   
                   <strong>RETAIL TRANSACTION</strong><br>
                  <div class="col-lg-3" >Unit Price(₦):<br>
                 <input class="form-control" <?=$edituprice;?> style="font-size:14px" name="price" id="price" type="text" value="<?php echo $rowx['unitprice']; ?>"  placeholder="Price">
                <?php
                 if($changepricestatus>0 || $_SESSION['user'] == 'admin'){
                  ?>
                 <button name="edituprice" type="submit" style="font-size:10px; border:0;">Edit Price</button>
                 <?php
                }
                  ?>
                </div>
                     
                      <div class="col-lg-3" >
                       Quantity:<br>
                        <input name="qty" onfocus= "clearInputs(this)" type="text" id="qty" class="js-calc form-control" value="1" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                         <input type="hidden" id="qtyx" class="js-calc" value="<?php echo $rx['qty']; ?>" required >
                         </div>
                     <div class="col-lg-3" >Sub Total:<br><textarea id="result" class="form-control" rows="1" style="resize: none;" readonly></textarea></div><div class="col-lg-3" ><br><?php if($_SESSION['mode'] != 2){ ?> <button type="submit" style="font-weight:bold" class="btn btn-primary" name="sales" <?php if($qt==0){echo 'disabled'; } ?> >Add Units</button><?php  }  ?></div></form>
                    
					</td></tr></table>
                     
                     <form method="post">
                       <table class="table table-bordered" >
                  <tr><td>
                 
                    <strong>WHOLESALE TRANSACTION</strong> &nbsp;&nbsp;Units/Pack: <?php echo $rowx['pqty']; ?>&nbsp;&nbsp; <em>Total Units Entered:<span id="totalqty" style="color:#63C; text-decoration:underline; font-weight:bold"></span></em><br>
                       <div class="col-lg-3" >
                        Pack Price(₦):<br>
                       <input <?=$editpprice;?> style="font-size:14px" class="form-control" name="price" id="price2" type="text" value="<?php echo $rowx['packprice']; ?>"  placeholder="Price">
                       <?php
                 if($changepricestatus>0 || $_SESSION['user'] == 'admin'){
                  ?>
                       <button name="editpprice" type="submit" style="font-size:10px; border:0;">Edit Price</button>
                     <?php } ?>
                      </div>
                     
                      <div class="col-lg-3" >
                       Pack Qty:<br>
                        <input name="qty2" onfocus= "clearInputs(this)" type="text" id="qty2" class="js-calc form-control" value="1" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"></div>
                     <div class="col-lg-3" >Sub Total:<br><textarea id="result2" class="form-control" rows="1" readonly style="resize: none;"></textarea></div><div class="col-lg-3" ><br> <?php if($_SESSION['mode'] != 2){ ?> <button type="submit" class="btn btn-warning" name="sales2" <?php if($qt==0 || $qt<$pu){echo 'disabled'; } ?>  style="font-weight:bold" >Add Packs</button><?php  }  ?></div>
                    </form>
                       </td></tr></table> 
               <?php   }?>
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="col-lg-6">
				 
                   <div id="updatetime" style="float:right; font-size:18px"></div>
				   
			   <div style="font-size:14px; font-weight:bold" class="text-danger">INV NO: <?php echo $salesid; ?> </div>
			   
                   <form method="post">
              <?php $quer=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' " )or die(mysql_error());
							$rg=mysql_fetch_array($quer); $disc = $rg['discount']; 
							 ?>
          <table class="table table-bordered" >
                  <tr>
                
                
                  <?php  if($_SESSION['mode']==2){?>  <td bgcolor="green"><a href="#" onClick="BrWindow('receipt.php','','width=800,height=600')" style="width:100%; height:50px" class="btn btn-primary" >Print Receipt</a></td><?php } else{ ?>  
                    <td bgcolor="grey">
                     <!--<button type="submit" id="txt6" style="width:100%; height:50px" class="btn btn-default" name="checkout" <?php //if($_SESSION['user'] != 'admin'){ echo 'disabled';}?>>Check<br> Out</button>
                  -->
                      <button type="button" id="txt6" style="width:100%; height:50px" class="btn btn-default"  data-toggle="modal" data-target="#modal-checkout">Make Payment</button>
                    
                    
                    </td>  <?php } ?>
                  </tr>
                
                 
                </table>  
                  
                  </form>
                  <?php if($_session['carterror']){ ?>
                                    <span style="color: red; font-weight:bolder;"><?php echo $_session['carterror'];?></span>
                                    <?php unset($_session['carterror']); } ?>
                  <table class="table table-bordered"><tr><td>
                    <table class="table table-striped table-hover" >
                      <thead>
                       
                        <tr>
                          <th>QTY</th>
                          <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                          <th>REMOVE <?php echo sqL1('transact','salesid',$salesid,3);
                          if(sqL1('transact','salesid',$salesid,3) > 0 && $sum < 1){
                            $delay = 0; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
                            //header("Refresh: $delay;"); 
                                  }
                      
                          //
                          ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							//$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());   
							$query = sqL1('transact','salesid',$salesid,1);
							  $notra = mysql_num_rows($query);
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                     <form method="post">   <tr class="odd gradeX">
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo number_format($row['price']) ?></td>
                          <td class="center">₦<?php echo number_format($row['amount']) ?></td>
                          <td class="center"><?php if($row['status']!=1){?><button type="submit" class="btn btn-danger btn-xs" name="RemoveItem" value="<?php echo $row['sn'] ?>"  >Remove</button> <?php }  ?></td>
                        </tr>
						 
						</form>
						
						  
                        <?php  }?>
							  <?php $query = mysql_query(" select * from transact where status = 0 AND rep='$rep' ");
							  $snotra = mysql_num_rows($query);
							  if($snotra>0){ ?>
					<form method="post"> 
                   <tr style="margin-top:20px">
				    <td></td>
				   <td></td>
				   <td></td>
				   <td><input type="text" class="form-control" name="cbname" placeholder="Enter name" required></td>
				   <td >   
				   <button type="submit" class="btn btn-success form-control" name="oldtransaction">Hold Transaction</button>
				   
				   
				   
				   </td></tr></form>
						   <?php  } ?>
                      </tbody>
                    </table><table class="table"><thead><tr><td><b>Sub-Total: <?php  if($_SESSION['mode']==2){ ?> <br> Discount: <br> Total: <?php } ?></b></td>
                      
                          <td><b>₦
                            <?php  
							  
echo number_format($sum) ;
					  ?><?php if($_SESSION['mode']==2){ ?> <br>₦<?php echo number_format($disc); ?> <br>₦<?php echo number_format($sum-$disc); } ?>
                          </b></td>
                          <td></td>
                        <td><b><?php  if($_SESSION['mode']==2){ ?> <br> Tendered Amount: <br> Change: <?php } ?></b></td>
                      
                          <td><b>
                          <?php if($_SESSION['mode']==2){ ?> <br>₦<?php echo number_format($rg['cash']); ?> <br>₦<?php echo number_format($rg['cash']-$sum+$disc); } ?>
                          </b></td>
                          
                           </tr></thead></table>
                    </td></tr></table>
            </div>
                    
                    <div class="col-lg-12">
                  
                    <table class="table table-bordered" >
                  <tr>
				  <?php $query = mysql_query(" select * from transact where status = 0 AND rep='$rep' ");
							  $snotra = mysql_num_rows($query);
							  if($snotra>0){ ?>
             <td bgcolor="blue"><button style="width:100%; height:50px" class="btn btn-default" disabled="disabled">New<br> Sales</button></td>
			 <?php } else{?>
			  <form method="post">
			  <td bgcolor="blue"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="NewTransaction" >New<br> Sales</button></td>
        </form>
        <?php }?>
      
                
				    <?php $query = mysql_query(" select * from transact where status = 0 AND rep='$rep' ");
							  $snotra = mysql_num_rows($query);
							  if($snotra>0){ ?>
                  <form method="post">
         <td bgcolor="yellow"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="CancelTransact">Cancel<br> Sales</button></td>
         </form>
			 <?php } else{?>
			 
				  		  
                  <td bgcolor="yellow"><button style="width:100%; height:50px" class="btn btn-default" disabled="disabled">Cancel<br> Sales</button></td>
				  
				  
				    <?php }?>
				  </form>
                  <td bgcolor="purple"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="LastTransact"  data-toggle="modal" data-target="#modal-default">Last<br> Sales</button></td>
          
          
                  <?php if($_SESSION['user'] != ''){ ?>    <td bgcolor="blue"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="LastTransact"  data-toggle="modal" data-target="#modal-trapped">Hold<br> Transactions</button></td> 
								
                
                
                                  <td bgcolor="grey"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="LastTransact"  data-toggle="modal" data-target="#modal-itemSales">Item<br>History</button></td> 
								<?php } ?>
                  
                  <td bgcolor="purple"><button data-toggle="modal" data-target="#modal-recent" type="button" style="width:100%; height:50px" class="btn btn-default" name="RecentTransact">Recent<br> Sales</button></td>
                 
                  <td bgcolor="purple"><button data-toggle="modal" data-target="#modal-summary" type="button" style="width:100%; height:50px" class="btn btn-default" name="SalesSummary">My Sales<br> Summary</button></td>
                   <form method="post"> 
                <td bgcolor="red">
                  <form method="post">
                  <button type="submit" style="width:100%; height:50px" class="btn btn-default" name="OutOfStock">
                  <?php if($rx['qty']==0){?> Report<br> Out-of-Stock <?php } else{ ?>Recommend<br> Re-Stock<?php } ?> </button></form></td>
                
                  <td bgcolor="green"><button data-toggle="modal" data-target="#modal-customer"  type="button" style="width:100%; height:50px" class="btn btn-default" name="print">Add<br>Customer</button></td>   <td bgcolor="yellow">
                   <a href="#" style="width:100%; height:50px" class="btn btn-default" onClick="BrWindow('trackinvoice.php','','width=800,height=600')" >Track<br>Invoice </a></td>
                  </tr></table>  
              
              
              
              
              
              
              
         <!------ MODALS ------>
         
<?php if($_SESSION['user'] == 'admin'){ $query=mysql_query("select * FROM transact2 ORDER BY sn DESC LIMIT 1 " )or die(mysql_error());  }else{ $query=mysql_query("select * FROM transact2 WHERE rep = '$rep' ORDER BY sn DESC LIMIT 1 " )or die(mysql_error());   }
						$ro=mysql_fetch_array($query);
						$lastsalesid = $ro['salesid'];
						$date = $ro['created'];   
                        $tit1 = 'Last Transaction:  '.$date; 
						  $tit2 = 'Recent Transactions'; 
						    $tit3 = 'Transaction Summary'; 
						
                    ?>
						
				
        	<?php	modalHead('default',$tit1); ?>
        
              
              
                <p> 
                    <table class="table table-striped table-hover" >
                      <thead>
                       <tr><td colspan="2">Customer: <?php echo $ro['name']; ?></td><td colspan="2">Invoice Number: <?php echo $ro['inv']; ?></td></tr>
                        <tr>
                          <th>QTY</th>
                          <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                   
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
						
							$query=mysql_query("select * FROM transact WHERE salesid = '$lastsalesid' ORDER BY sn ASC " )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                     <form method="post">   <tr class="odd gradeX">
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo $row['price'] ?></td>
                          <td class="center">₦<?php echo $row['amount'] ?></td>
                         
                        </tr></form>
                        <?php  } ?>
                       </tbody>
                       <tr><td colspan="3">Total: </td>
                      
                          <td><b>₦ <?php echo number_format($ro['amount'],2) ; ?> </td>
                         
                           </tr>
                  </table>
                    </p>
             
        <!-- /.modal -->
        
        <?php modalFoot('primary','');?>
        
        
        
        <?php if($_SESSION['user'] != ''){ ?>
        
     				<?php		modalHead('trapped','Saved Transaction'); ?>
        
              
              
                <p>
				  <div class="table-responsive">
                      <table class="table table-striped table-hover" id="dataTables-example">
                
                      <thead>
                       
                        <tr>
                          <th>NAME</th>
                          <th>INV ID</th>
						  <th>DATE/TIME</th>
						   <th>S. REP</th>
                          <th>CONTINUE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
						if($_SESSION['user'] == 'admin'){
							//$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());   
							$query = mysql_query(" select * from transact where status != 1 GROUP BY salesid");
							}  else {
							
						$query = mysql_query(" select * from transact where status = 3 AND rep='$rep' GROUP BY salesid");
							}
							  $notra = mysql_num_rows($query);
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                  
					 <tr class="odd gradeX">
					    <form method="post">   
                          <td class="center"><?php echo $row['name'] ;?></td>
                          <td><?php echo $row['salesid']; ?><input type="hidden" value="<?php echo $row['salesid']; ?>" name="sids" readonly></td>
						   <td><?php echo $row['created']; ?></td>
						    <td><?php echo $row['rep']; ?></td>
						   <td class="center"><a href=""><button type="submit" class="btn btn-success btn-xs" name="continue">Continue</button></a></td>
                 
						   </form>
                        </tr>
                        <?php  } ?>
                       
                      </tbody>
                    </table>
                    </p>
             </div>
        <!-- /.modal -->
        
        <?php modalFoot('primary','');?>  
        
        
        
                
     				<?php		modalHead('itemSales','SALES HISTORY OF '.strtoupper($item)); ?>
        
                    <table class="table table-striped table-hover" >
                      <thead>
                       
                        <tr>
                          <th>SN</th>
                          <th>QTY</th>
                           <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                          <th>AGENT</th>
                          <th>DATE/TIME</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							//$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());   
							$query = sqL1('transact','pid',$pid,1);
							  $notra = mysql_num_rows($query);
							$i=1;
							while($row=mysql_fetch_array($query)){
							$e=$i++;
							
							?>
                      <tr class="odd gradeX">
                          <td class="center"><?php echo $e ?></td>
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo number_format($row['price']) ?></td>
                          <td class="center">₦<?php echo number_format($row['amount']) ?></td>
                          <td class="center"><?php echo $row['rep']; ?></td>
                          <td class="center"><?php echo $row['created']; ?></td>
                        </tr>
                        <?php  } ?>
                        <tr><th>Total</th><th colspan="3"><?php echo trSumC1('transact','qty','pid',$pid) ?></th><th colspan="3">₦<?php echo trSumC1('transact','amount','pid',$pid) ?></th>
                        </tr>
                      </tbody>
                    </table>
                    
                    <strong>STOCKING HISTORY OF <?php echo strtoupper($item); ?></strong>
                 <table class="table table-striped table-hover" >
                      <thead>
                       
                        <tr>
                          <th>SN</th>
                          <th>QTY</th>
                           <th>ITEM</th>
                          <th>COST</th>
                          <th>AMOUNT</th>
                          <th>AGENT</th>
                          <th>DATE/TIME</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							//$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());   
							$query = sqL1('stockup','pid',$pid,1);
							  $notra = mysql_num_rows($query);
							$i=1;
							while($row=mysql_fetch_array($query)){
							$e=$i++;
							
							?>
                      <tr class="odd gradeX">
                          <td class="center"><?php echo $e ?></td>
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo number_format($row['unitcost']) ?></td>
                          <td class="center">₦<?php echo number_format($row['totalcost']) ?></td>
                          <td class="center"><?php echo $row['rep']; ?></td>
                          <td class="center"><?php echo $row['created']; ?></td>
                        </tr>
                        <?php  } ?>
                        <tr><th>Total</th><th colspan="3"><?php echo trSumC1('stockup','qty','pid',$pid) ?></th><th colspan="3">₦<?php echo trSumC1('stockup','totalcost','pid',$pid) ?></th>
                        </tr>
                      </tbody>
                    </table>
           
        <!-- /.modal -->
        
        <?php modalFoot('primary','');?>   
        
       <?php } ?>       
        
        
        
        
<?php modalHead('recent',$tit2); ?> 
                <p> 
                    <table class="table table-striped table-hover" >
                      <thead>
                         <tr>
                          <th>INV #</th>
                          <th>Customer</th>
                          <th>Item</th>
                          <th>AMOUNT</th>
                            <th>Action</th>
                   
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
						if($_SESSION['user'] == 'admin'){
							$query=mysql_query("select * FROM transact2 where today = '$ymd' ORDER BY sn ASC LIMIT 0 , 40" )or die(mysql_error());   }else{
							$query=mysql_query("select * FROM transact2 where today = '$ymd' AND rep='$rep'  ORDER BY sn ASC LIMIT 0 , 20" )or die(mysql_error());    }
							$i = 1;
							while($row=mysql_fetch_array($query)){ $salesno = $row['salesid'];
							$e=$i++; 
							
							?>
                     <form method="post">   <tr class="odd gradeX">
                          <td class="center"><?php echo $row['salesid'] ?><br><?php echo $row['created'] ?></td>
                          <td><?php echo ucfirst($row['name']) ?></td>
                          <td class="center"><?php $qu=mysql_query("select * FROM transact where salesid='$salesno' ORDER BY sn ASC " )or die(mysql_error());
							
							while($r=mysql_fetch_array($qu)){  echo $r['qty'].' '.$r['item'].' ₦'.number_format($r['amount']).'<br>'; } ?></td>
                          <td class="center">₦<?php echo number_format($row['amount']) ?></td>
                           <td class="center"><?php if($_SESSION['user'] == 'admin' AND $e==1){ ?><button type="submit" value="<?php echo $row['salesid'] ?>" class="btn btn-warning" name="review" <?php if($_SESSION['mode']==2 || $notra==0){}else{echo 'disabled'; } ?>> Review </button> <?php }  ?>
                           <a href="#" onClick="BrWindow('receipt.php?transactionIndex=<?php echo $row['salesid']; ?>','','width=800,height=600')" > Receipt </a></td>
                         
                        </tr></form>
                        <?php  } ?>
                       </tbody></table> 
                      
                    </p>
             <?php modalFoot('success',''); ?>
        
        
        
        
        
        
                
        
        
       <?php modalHead('summary',$tit3); ?> 
              
               <p> <strong>USER DAILY SUMMARY</strong>
                    <table class="table table-striped table-hover" >
                      <thead>
                         <tr>
                          <th>Number of Transactions</th>
                          <th>Worth of Items</th>
                          <th>Discount</th>
                          <th>Cash Paid</th>
                          <th>Expenses</th>
                          <th>Remaining Balance</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
 

$quer1=mysql_query("select * FROM transact2 WHERE today = '$ymd' AND rep='$rep' " )or die(mysql_error());
$count = mysql_num_rows($quer1);
$quera=mysql_query("select * FROM expend WHERE today = '$ymd' AND rep='$rep' " )or die(mysql_error());
$count = mysql_num_rows($quera);	

							?>
                  <tr class="odd gradeX">
                          <td class="center"><?php echo $count; ?></td>
                          <td>₦<?php echo 	trSum2('transact2','amount'); ?></td>
                          <td class="center">₦<?php echo trSum2('transact2','discount'); ?></td>
                          <td class="center">₦<?php echo trSum2('transact2','cash'); ?></td>
                          <td class="center">₦<?php echo trSum2('expend','amount'); ?></td>
                        <?php  
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE today ='$ymd' AND rep='$rep';"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum']; 

$results = mysql_query("SELECT SUM(cash) AS values_sum FROM transact2 WHERE today ='$ymd' AND rep='$rep';"); 
$rowas = mysql_fetch_assoc($results); 
$sums = $rowas['values_sum']; 
?>
                          <td class="center">₦<?php echo $sums-$sum; ?></td>
                        </tr>
                
                       </tbody></table>  
                       
                       
                    </p>   
                    
                    
                <?php     if($_SESSION['user'] == 'admin'){  ?>
                    <p> <strong>GENERAL DAILY SUMMARY</strong>
                    <table class="table table-striped table-hover" >
                      <thead>
                         <tr>
                          <th>Number of Transactions</th>
                          <th>Worth of Items</th>
                          <th>Discount</th>
                          <th>Cash Paid</th>
                          <th>Expenses</th>
                          <th>Remaining Balance</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
 

$quer1=mysql_query("select * FROM transact2 WHERE today = '$ymd' " )or die(mysql_error());
$count = mysql_num_rows($quer1);
$quera=mysql_query("select * FROM expend WHERE today = '$ymd' " )or die(mysql_error());
$count = mysql_num_rows($quera);	
				
							
							?>
                  <tr class="odd gradeX">
                          <td class="center"><?php echo $count; ?></td>
                          <td>₦<?php echo 	trSum2x('transact2','amount'); ?></td>
                          <td class="center">₦<?php echo trSum2x('transact2','discount'); ?></td>
                          <td class="center">₦<?php echo trSum2x('transact2','cash'); ?></td>
                          <td class="center">₦<?php echo trSum2x('expend','amount'); ?></td>
                        <?php  
                        $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE today ='$ymd';"); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum']; 

$results = mysql_query("SELECT SUM(cash) AS values_sum FROM transact2 WHERE today ='$ymd';"); 
$rowas = mysql_fetch_assoc($results); 
$sums = $rowas['values_sum']; 
?>
                          <td class="center">₦<?php echo $sums-$sum; ?></td>
                        </tr>
                   
                       </tbody></table>  
                       
                       
                    </p>   
                    
                    <?php }  ?>
            
          <?php   modalFoot('warning',''); ?>
        <!-- /.modal -->
              
              
       <form method="post" >     
              
     <?php $bt = '<button type="submit" class="btn btn-primary" name="AddCustomer" >Add Customer</button>';
	   modalHead('customer','Add Customer'); ?> 
     <p>
     <div class="col-lg-4" > <label>Name</label><input name="name" value="<?=$_POST['name'];?>" type="text"  class="form-control" required >
     <?php echo "<span style='color:red; font-size: 10px;'>".$_SESSION['clientnameerror']."</span>";
     unset($_SESSION['clientnameerror']);
     ?>
    </div>
     
     <div class="col-lg-4" > <label>Phone Number</label><input name="phone" value="<?=$_POST['phone'];?>" type="text" type="text"  class="form-control"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  required >
     <?php echo "<span style='color:red; font-size: 10px;'>".$_SESSION['clientphoneerror']."</span>";
     unset($_SESSION['clientphoneerror']);
     ?>
    </div>
     <div class="col-lg-4" > <label>Address</label><input name="address" type="text"  class="form-control"  ></div>
     </p>
     <p>&nbsp;</p>
       <?php   modalFoot('default',$bt); ?>
       
       
       </form>


       <form method="post" >     
              
     <?php $bt = '';
	   modalHead('checkout','<b>Check Out</b>'); ?> 
     <p>
   

     <div style="font-size:14px; font-weight:bold" class="text-danger">INV NO: <?php echo $salesid; ?> </div>
			 
    <?php $quer=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' " )or die(mysql_error());
    $rg=mysql_fetch_array($quer); $disc = $rg['discount']; 
     ?>
<table class="table table-bordered" >
        <tr  <?php if($_SESSION['mode']==2){?> bgcolor="pink" <?php } ?> >
        <td width="20%">Bill To:<br> 

        <select name="customer" class="form-control select2" required> 
        <option value="0"><?php if(!isset($rg['name'])){ echo 'Customer'; } ?></option> 
            <?php 
    $query=mysql_query("select * FROM client ORDER BY name DESC" )or die(mysql_error());
    while($row=mysql_fetch_array($query)){
    ?>                            <option <?php if($rg['id']==$row['id']){echo 'selected';} ?> value="<?php echo $row['id'];?>" ><?php echo $row['name'].' '.$row['phone'] ;?></option><?php }  ?>
                </select></td>

                
        <td  width="20%">Amount:<br> 
       
        <input readonly id="amount" class="form-control" name="amount" value="<?php if(isset($rg['cash'])){ echo round($rg['cash']); } else{echo round($sum); } ?>">
      
      </td>

        <td>Discount:<br> 
        <input onfocus= "clearInput(this)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="form-control" id="discount" required onkeyup="sum();" name="discount" <?php if($_SESSION['user'] != 'admin'){ echo 'disabled';}?> value="<?php if(isset($rg['discount'])){ echo $rg['discount']; } else{echo '0'; } ?>">
      </td>
         
        <td width="20%">Cash Paid:<br>

         <input type="hidden" name="mode" value="CASH">
         <input class="form-control" onfocus= "clearInput(this)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="cashp" id="cashp"  onkeyup="sum();"  value="0" ></td>

        </td>
         
      
        <?php  if($_SESSION['mode']==2){?>  <td bgcolor="green"><a href="#" onClick="BrWindow('receipt.php','','width=800,height=600')" style="width:100%; height:50px" class="btn btn-primary" >Print<br>Receipt</a></td><?php } else{ ?>  
          <td bgcolor="grey">
         <button type="submit" id="checkout" style="width:100%; height:50px" disabled class="btn btn-default" name="checkout" <?php if($_SESSION['user'] != 'admin'){ //echo 'disabled';
        }?>>Check<br> Out</button>
        
          
          </td>  <?php } ?>
        </tr>
      
       <?php
        $querybank1=mysql_query("select * FROM bank WHERE id = '1'" )or die(mysql_error());
    while($gbank1=mysql_fetch_array($querybank1)){
      $bank1=$gbank1['bank'];
    }
    if(empty($bank1)){
      
      $bank1="Bank1";
      $bank1_btn="disabled";
      $resb1 = mysql_query("INSERT INTO bank (bank, pbank, id)
      VALUES('$bank1','$bank1',1)") or die(mysql_error());
            }elseif($bank1=="Bank1"){
              $bank1_btn="disabled";;
            }

    $querybank2=mysql_query("select * FROM bank WHERE id = '2'" )or die(mysql_error());
    while($gbank2=mysql_fetch_array($querybank2)){
      $bank2=$gbank2['bank'];
     
    }
    if(empty($bank2)){
      $bank2="Bank2";
      $bank2_btn="disabled";
      $resb2 = mysql_query("INSERT INTO bank (bank, pbank, id)
      VALUES('$bank2','$bank2',2)") or die(mysql_error());
            }elseif($bank2=="Bank2"){
              $bank2_btn="disabled";;
            }

    $querybank3=mysql_query("select * FROM bank WHERE id = '3'" )or die(mysql_error());
    while($gbank3=mysql_fetch_array($querybank3)){
      $bank3=$gbank3['bank'];
    } 
    if(empty($bank3)){
      $bank3="Bank3";
      $bank3_btn="disabled";
      $resb3 = mysql_query("INSERT INTO bank (bank, pbank, id)
      VALUES('$bank3','$bank3',3)") or die(mysql_error());
            }elseif($bank3=="Bank3"){
              $bank3_btn="disabled";;
            }
    $querypos1=mysql_query("select * FROM bank WHERE id = '4'" )or die(mysql_error());
    while($gpos1=mysql_fetch_array($querypos1)){
      $pos1=$gpos1['bank'];
    }
    if(empty($pos1)){
      $pos1="pos1";
      $pos1_btn="disabled";
      $respos1 = mysql_query("INSERT INTO bank (bank, pbank, id)
      VALUES('$pos1','$pos1',4)") or die(mysql_error());
            }elseif($pos1=="pos1" ){
              $pos1_btn="disabled";
            }
    
    $querypos2=mysql_query("select * FROM bank WHERE id = '5'" )or die(mysql_error());
    while($gpos2=mysql_fetch_array($querypos2)){
      $pos2=$gpos2['bank'];
    }
    if(empty($pos2)){
      $pos2="pos2";
      $respos2 = mysql_query("INSERT INTO bank (bank, pbank, id)
      VALUES('$pos2','$pos2',5)") or die(mysql_error());
            } elseif($pos2=="pos2" ){
              $pos2_btn="disabled";
            }



            $querycashb=mysql_query("select * FROM bank WHERE id = '6'" )or die(mysql_error());
            while($gcashb=mysql_fetch_array($querycashb)){
              $gcashb1=$gcashb['bank'];
            }
            if(empty($gcashb1)){
              $gcashb1="cash";
              $resgcashb = mysql_query("INSERT INTO bank (bank, pbank, id)
              VALUES('$gcashb1','$gcashb1',6)") or die(mysql_error());
                    }
            
      ?>
        <tr >

       
          <td width="20%"><?=strtoupper($bank1); ?>:<br> 
          <input class="form-control" <?=$bank1_btn;?> onfocus= "clearInput(this)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="bank1" id="bank1"   onkeyup="sum();" value="0"  ></td>

          </td>
           
           <td width="20%"><?=strtoupper($bank2); ?>:<br>
         <input class="form-control" <?=$bank2_btn;?> onfocus= "clearInput(this)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="bank2" id="bank2"   onkeyup="sum();" value="0" ></td>

        <td width="20%"><?=strtoupper($bank3); ?>:<br> 
        <input class="form-control" <?=$bank3_btn;?> onfocus= "clearInput(this)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="bank3" id="bank3"  onkeyup="sum();" value="0" ></td>

         <td width="20%"><?=strtoupper($pos1); ?><br>

         <input type="hidden" id="txtus" value="<?php  echo $_SESSION['user']; ?>">
         <input class="form-control" <?=$pos1_btn;?> onfocus= "clearInput(this)"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="pos1" id="pos1" onkeyup="sum();" value="0" ></td>
         
         <td width="20%"><?=strtoupper($pos2); ?><br>
      
         <input class="form-control" <?=$pos2_btn;?> onfocus= "clearInput(this)"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="pos2" id="pos2"  onkeyup="sum();" value="0"></td>

      
      
      </tr>

      <tr >
          <td colspan="3"> </td> 
          <td width="20%">Subtotal:<br>
       
         <input class="form-control" name="subtotal" id="subtotal" value="<?php if(isset($rg['cash'])){ echo round($rg['cash']); } else{echo round($sum); } ?>" readonly required></td>

         <td width="20%">Tendered<br>
         <input class="form-control"  name="tendered" id="tender" value="0" readonly required></td>

      
         </td>
      
      </tr>
      <tr >
          <td colspan="3"> </td> 
        
         <td colspan="2">Balance:<br>
         <input class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="balance" id="balance" value="<?php if(isset($rg['cash'])){ echo round($rg['cash']); } else{echo round($sum); } ?>" readonly required></td>

      
         </td>
      
      </tr>
      
      
      </table>  
     </p>
     <p>&nbsp;</p>
       <?php   modalFoot('default',$bt); ?>
       
       
       </form>
       
            </div>
            
            
       
            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- JavaScript -->

  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
    
    
    
    
    
    
    <script src="js1/jquery-1.10.2.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js1/plugins/metisMenu/jquery.metisMenu.js"></script>
    
    <script src="js1/select2.full.min.js"></script>

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
    
    <script>
      
        function sum() {
      var discount = parseInt(document.getElementById('discount').value) || 0;
      var amount = parseInt(document.getElementById('amount').value) || 0;
      var cashp = parseInt(document.getElementById('cashp').value) || 0;
      var bank1 = parseInt(document.getElementById('bank1').value) || 0;
      var bank2 = parseInt(document.getElementById('bank2').value) || 0;
      var bank3 = parseInt(document.getElementById('bank3').value) || 0;
      var pos1 = parseInt(document.getElementById('pos1').value) || 0;
      var pos2 = parseInt(document.getElementById('pos2').value) || 0;
      var subtotal = parseInt(document.getElementById('subtotal').value) || 0;
      var tender = document.getElementById('tender').value;
      var balance = parseInt(document.getElementById('balance').value) || 0;
      
      var amt = amount - discount;
      var tendered = cashp + bank1 + bank2 + bank3 + pos1 + pos2;
      var bal = amt - tendered;
      if(bal < 0){
        bal = 0; 
      }
      document.getElementById('tender').value = tendered;
      document.getElementById('subtotal').value = amt;
      document.getElementById('balance').value = bal;
     
      //checkout.disabled=true;
      if (document.getElementById('subtotal').value < 1){
        checkout.disabled=true;
      }else if (document.getElementById('txtus').value != "admin" &&  document.getElementById('balance').value > 1){
        checkout.disabled=true;
      }else if (document.getElementById('txtus').value == "admin" &&  document.getElementById('subtotal').value > 1){
        checkout.disabled=false;
      }else{
        checkout.disabled=false;
      }
     
      /*if (document.getElementById('txt1').value.trim()=="") {
        document.getElementById('txt1').value= 0;
      }

      if (document.getElementById('txt2').value.trim()=="") {
        document.getElementById('txt2').value= 0;
      }

      if (document.getElementById('txt3').value.trim()=="") {
        document.getElementById('txt3').value= 0;
      }


      var result = parseInt(txtFourthNumberValue) - (parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue));
      var tamount = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue) + parseInt(result)
      
      if (!isNaN(result)) {
        document.getElementById('txt5').value = result;
      }
      if (result < 0) {
        document.getElementById("txt6").disabled = true;
       // document.getElementById('txt5').value = 0;
        //document.getElementById('txt4').value = 0;
      }else if (document.getElementById('txtus').value=="salesrep" &&  parseInt(document.getElementById('txt5').value) > 0){
        document.getElementById("txt6").disabled = true;
      }else{

        document.getElementById("txt6").disabled = false; 
      }
      */
}


  /*
function sbanks() {
      var selectbank = document.getElementById('ban').value;
      var txtFirstNumberValue = parseInt(document.getElementById('txt1').value) || 0;
  
  var results = parseInt(txtFirstNumberValue) + parseInt(document.getElementById('txt5').value);
      document.getElementById('txt5').value = results;

if (selectbank==0){
  document.getElementById("txt1").value = 0;
  document.getElementById("txt1").disabled = true;

}else{
  document.getElementById("txt1").disabled = false;
}
}


function cdiscount() {
  var txttenders= document.getElementById('txttender').value;
  var dicst= document.getElementById('txtd').value || 0;
  var tenders = document.getElementById('txt4').value;

  var txtFirstNumberValue = parseInt(document.getElementById('txt1').value) || 0;
      var txtSecondNumberValue = parseInt(document.getElementById('txt2').value) || 0;
      var txtThirdNumberValue = parseInt(document.getElementById('txt3').value) || 0;

  if (document.getElementById('txtd').value.trim()=="") {
        document.getElementById('txtd').value= 0;
      }

      if (document.getElementById('txt4').value.trim()=="") {
        document.getElementById('txt4').value = document.getElementById('txttender').value;;
      }

  var ampaid = parseInt(txttenders) - parseInt(dicst);
  if (!isNaN(ampaid)) {
    document.getElementById('txt4').value=ampaid; 
   document.getElementById('txt5').value = parseInt(txttenders-dicst) - (txtFirstNumberValue + txtSecondNumberValue + txtThirdNumberValue);
      }else{
        document.getElementById('txt4').value=txttenders; 
        document.getElementById('txtd').value=0;
      }

      if (document.getElementById('txt5').value < 0) {
        document.getElementById("txt6").disabled = true;
        //document.getElementById('txt5').value = 0;
       // document.getElementById('txt4').value = 0;
      }else{
        document.getElementById("txt6").disabled = false;
      }

 
  
}
*/
function clearInput(target){
        if (target.value== '0'){
            target.value= "";
       }
    }
    function clearInputs(target){
      
            target.value= "";
    }
      </script>
    
  </body>
</html>
<?php
}
?>