<?php 
error_reporting(0);
    session_start(); ob_start();
	
	
$_SESSION['frame']=1;

include("includes/connect.inc.php");

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
            $('#list').load('stockli.php'); 
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
     
     <?php     require('nav1.php') ;  ?>
     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

          <div class="col-lg-12">
            
           
       
              
            <div class="col-lg-6">
              <div style="font-size:18px; font-weight:bold">POINT OF SALE PANEL</div> 
               <div style="margin:20px"><form method="post">
               <select name="pid" class="form-control select2" onChange="submit()" id="list" title="Enter iten to search"> 
                       <option selected disabled>SELECT ITEM</option>                      
                          </select>
               </form></div>


<?php  if(isset($pid)){  $em = mysql_query(" SELECT * FROM stock WHERE sn = '$pid' "); $rx = mysql_fetch_assoc($em);
$itemstatus = $rx['qty']*100/$rx['uptimum']; ?>
	
<font color="green"><?php echo $er; ?></font>
                  <table class="table table-bordered" >
                  <tr><td>Item:<br><font size="+1"><?php echo strtoupper($rowx['item']); ?></font><br><?php echo $rowx['des'].' | <b>'.$rowx['cat'].'</b>'; ?></td>
                  <td>Avail. Qty:<br><font size="+1"><?php echo number_format($rx['qty']); ?></font><br>
                  Packs: <?php echo number_format($rx['qty']/$rx['pqty'],1); ?></td>
                  <td bgcolor="<?php echo $color  ;?>" style="color:#FFF">Status: <?php echo number_format($itemstatus); ?>%<br><font size="+1"><?php echo $sta; ?></font></td>
                  </tr></table>
                  
                   <form method="post">
                   <strong><?php echo $erqty; ?></strong>
                      <table class="table table-bordered" >
                  <tr><td>
                   <p><font color="red"><em><span id="resx"></span><span id="resy"></span></em></font></p>
                  <div class="col-lg-3" >Unit Price:<br><strong style="font-size:18px">₦<?php echo number_format($rowx['unitprice']); ?></strong></div>
                      <input name="price" id="price" type="hidden" value="<?php echo $rowx['unitprice']; ?>"  placeholder="Price">
                      <div class="col-lg-3" >
                       Quantity:<br>
                        <input name="qty" type="number" id="qty" class="js-calc form-control" value="1" required >
                         <input type="hidden" id="qtyx" class="js-calc" value="<?php echo $rx['qty']; ?>" required >
                         </div>
                     <div class="col-lg-3" >Sub Total:<br><textarea id="result" class="form-control" rows="1"></textarea></div><div class="col-lg-3" ><br><?php if($_SESSION['mode'] != 2){ ?> <button type="submit" class="btn btn-primary" name="sales" <?php if($qt==0){echo 'disabled'; } ?> >Add Item</button><?php  }  ?></div></form>
                     <form method="post">
                     
                    <div class="clearfix"></div><br>
                       <div class="col-lg-3" >Pack Price:<br><strong style="font-size:18px">₦<?php echo number_format($rowx['packprice']); ?></strong><br>units: <?php echo $rowx['pqty']; ?></div>
                      <input name="price" id="price2" type="hidden" value="<?php echo $rowx['packprice']; ?>"  placeholder="Price">
                      <div class="col-lg-3" >
                       Pack Qty:<br>
                        <input name="qty2" type="number" id="qty2" class="js-calc form-control" value="1" ><em>Total Qty:<span id="totalqty"></span></em></div>
                     <div class="col-lg-3" >Sub Total:<br><textarea id="result2" class="form-control" rows="1"></textarea></div><div class="col-lg-3" ><br> <?php if($_SESSION['mode'] != 2){ ?> <button type="submit" class="btn btn-warning" name="sales2" <?php if($qt==0 || $qt<$pu){echo 'disabled'; } ?>>Add Item</button><?php  }  ?></div>
                    </form>
                       </td></tr></table> 
               <?php   }?>
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="col-lg-6">
                   <div id="updatetime" style="float:right; font-size:18px"></div>
                   <form method="post">
              <?php $quer=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' " )or die(mysql_error());
							$rg=mysql_fetch_array($quer); $disc = $rg['discount']; 
							 ?>
          <table class="table table-bordered" >
                  <tr  <?php if($_SESSION['mode']==2){?> bgcolor="pink" <?php } ?> ><td width="30%">Bill To:<br> <select name="customer" class="form-control select2"> 
                                            <option><?php if(isset($rg['name'])){ echo $rg['name']; } else{echo 'Customer'; } ?></option> 
                      <?php 
							$query=mysql_query("select * FROM client ORDER BY name ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($rg['name']==$row['name']){echo 'selected';} ?> value="<?php echo $row['name'];?>" ><?php echo $row['name'].' '.$row['phone'] ;?></option><?php }  ?>
                          </select></td>
                  <td  width="20%">Tendered:<br> <input class="form-control" name="cash" value="<?php if(isset($rg['cash'])){ echo round($rg['cash']); } else{echo round($sum); } ?>"></td>
                  <td>Discount:<br> <input class="form-control" name="discount" <?php if($_SESSION['user'] != 'admin'){ echo 'disabled';}?> value="<?php if(isset($rg['discount'])){ echo $rg['discount']; } else{echo '0'; } ?>"></td>
                   <td width="20%">Mode:<br><select class="form-control" name="mode"><?php if(isset($rg['mode'])){  ?><option><?php echo $rg['mode']; ?></option> <?php }  ?> <option>CASH</option><option>POS</option></select></td>
                   
                
                  <?php  if($_SESSION['mode']==2){?>  <td bgcolor="green"><a href="#" onclick="BrWindow('receipt.php','','width=800,height=600')" style="width:100%; height:50px" class="btn btn-primary" >Print<br>Receipt</a></td><?php } else{ ?>  <td bgcolor="grey"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="checkout">Check<br> Out</button></td>  <?php } ?>
                  </tr></table>  
                  
                  </form>
                
                  <table class="table table-bordered"><tr><td>
                    <table class="table table-striped table-hover" >
                      <thead>
                       
                        <tr>
                          <th>QTY </th>
                          <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                          <th>REMOVE <?php echo sqL1('transact','salesid',$salesid,3); ?></th>
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
                        </tr></form>
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
                    <form method="post">
                    <table class="table table-bordered" >
                  <tr>
                  <td bgcolor="blue"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="NewTransaction">New<br> Sales</button></td>
                  <td bgcolor="red"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="reset">Reset<br> Sales</button></td>
                  <td bgcolor="yellow"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="CancelTransact">Cancel<br> Sales</button></td></form>
                  <td bgcolor="purple"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="LastTransact"  data-toggle="modal" data-target="#modal-default">Last<br> Sales</button></td>
                                <?php if($_SESSION['user'] == 'admin'){ ?>    <td bgcolor="blue"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="LastTransact"  data-toggle="modal" data-target="#modal-trapped">Trapped<br> Sales</button></td> 
								<td bgcolor="grey"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="LastTransact"  data-toggle="modal" data-target="#modal-itemSales">Item<br>History</button></td> 
								<?php } ?>
                  
                  <td bgcolor="purple"><button data-toggle="modal" data-target="#modal-recent" type="button" style="width:100%; height:50px" class="btn btn-default" name="RecentTransact">Recent<br> Sales</button></td>
                 
                  <td bgcolor="purple"><button data-toggle="modal" data-target="#modal-summary" type="button" style="width:100%; height:50px" class="btn btn-default" name="SalesSummary">My Sales<br> Summary</button></td>
                   <form method="post"> 
                <?php if($rx['qty']==0){?>    <td bgcolor="red"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="OutOfStock">Report<br> Out-of-Stock</button></td><?php } else{ ?>
                <td bgcolor="red"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="OutOfStock">Recommend<br> Re-Stock</button></td>  <?php } ?> </form>
                  <td bgcolor="green"><button data-toggle="modal" data-target="#modal-customer"  type="button" style="width:100%; height:50px" class="btn btn-default" name="print">Add<br>Customer</button></td>   <td bgcolor="yellow">
                   <a href="#" style="width:100%; height:50px" class="btn btn-default" onclick="BrWindow('trackinvoice.php','','width=800,height=600')" >Track<br>Invoice </a></td>
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
        
        
        
        <?php if($_SESSION['user'] == 'admin'){ ?>
        
     				<?php		modalHead('trapped','Trapped Transactions'); ?>
        
              
              
                <p>
                    <table class="table table-striped table-hover" >
                      <thead>
                       
                        <tr>
                          <th>QTY</th>
                          <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                          <th>AGENT</th>
                          <th>REMOVE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							//$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());   
							$query = mysql_query(" select * from transact where status != 1 AND today < '$ymd' ");
							  $notra = mysql_num_rows($query);
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                     <form method="post">   <tr class="odd gradeX">
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo number_format($row['price']) ?></td>
                          <td class="center">₦<?php echo number_format($row['amount']) ?></td>
                          <td class="center"><?php echo $row['rep'].' <br>'.$row['created'] ?></td>
                          <td class="center"><?php if($row['status']!=1){?><button type="submit" class="btn btn-danger btn-xs" name="RemoveItem" value="<?php echo $row['sn'] ?>"  >Remove</button> <?php }  ?></td>
                        </tr></form>
                        <?php  } ?>
                        
                      </tbody>
                    </table>
                    </p>
             
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
                           <a href="#" onclick="BrWindow('receipt.php?transactionIndex=<?php echo $row['salesid']; ?>','','width=800,height=600')" > Receipt </a></td>
                         
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
 

$quer1=mysql_query("select * FROM transact2 WHERE today = '$ymd' AND rep='$rep' " )or die(mysql_error());
$count = mysql_num_rows($quer1);
							
							
							?>
                  <tr class="odd gradeX">
                          <td class="center"><?php echo $count; ?></td>
                          <td>₦<?php echo 	trSum2('transact2','amount'); ?></td>
                          <td class="center">₦<?php echo trSum2('transact2','discount'); ?></td>
                          <td class="center">₦<?php echo trSum2('transact2','cash'); ?></td>
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						
 

$quer1=mysql_query("select * FROM transact2 WHERE today = '$ymd' " )or die(mysql_error());
$count = mysql_num_rows($quer1);
							
							
							?>
                  <tr class="odd gradeX">
                          <td class="center"><?php echo $count; ?></td>
                          <td>₦<?php echo 	trSum2x('transact2','amount'); ?></td>
                          <td class="center">₦<?php echo trSum2x('transact2','discount'); ?></td>
                          <td class="center">₦<?php echo trSum2x('transact2','cash'); ?></td>
                        </tr>
                   
                       </tbody></table>  
                       
                       
                    </p>   
                    
                    <?php }  ?>
            
          <?php   modalFoot('warning',''); ?>
        <!-- /.modal -->
              
              
              
              
     <?php $bt = '<button type="submit" class="btn btn-primary" name="AddCustomer" >Add Customer</button>';
	   modalHead('customer','Add Customer'); ?> 
     <p>
     <div class="col-lg-4" > <label>Name</label><input name="name" type="text"  class="form-control"  ></div>
     <div class="col-lg-4" > <label>Phone Number</label><input name="phone" type="text"  class="form-control"  ></div>
     <div class="col-lg-4" > <label>Address</label><input name="address" type="text"  class="form-control"  ></div>
     </p>
     <p>&nbsp;</p>
       <?php   modalFoot('default',$bt); ?>
       
       
       
       
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
    
    
    
  </body>
</html>