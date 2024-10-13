<?php 
error_reporting(0);
    session_start(); ob_start();
	
	
$_SESSION['frame']=1;

include("includes/connect.inc.php");

include("includes/sales.php");

if($_GET['transactionIndex']){
	$salesid = $_GET['transactionIndex'];
}

$sqlogo =" SELECT * FROM clogo WHERE id = '1' ";
     $resultlogo = mysql_query($sqlogo) or die (mysql_error());
	 $rowlogo = mysql_fetch_assoc($resultlogo);
	 
	 $logo = $rowlogo['logo'];
$rfooter = $rowlogo['rfooter'];

include('settingstatus.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Receipt</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

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
tr{

}

table{
	/*border:thin solid #999;  */
}


  </style>
  <style>
    .content{
      max-width: 500px;
      margin: auto;
      padding: 10px;
    }
    </style>

</head>

  <body onLoad="print()">

                   <div style="font:Courier New" class="content" >
                  
                    <table style="font-size:12px; margin-right:5px; margin-left:5px; margin-top:-20px" >
                      <thead>

                      <?php if($changelogoonreceiptstatus>0){ ?>
                      <tr>
					 <td colspan="5" align="center">

						  <img src="upload/<?php echo $logo; ?>" width="50" height="50" />

						  
						</td>
					  </tr> <?php } ?>

                        <tr>
                          <td colspan="5" align="center"><?php $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); ?> <strong style="font-size:16px; margin-bottom:0;"><?php echo strtoupper($r['name']); ?></strong><br>
                                              <?php echo $r['address']; ?> <br>
                                            <?php echo $r['phone']; ?><br><br></td>
                        </tr>
                        <tr>
                          <td colspan="5"><div style="float:right"> <strong><?php   $query=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 1 " )or die(mysql_error());
$rowt=mysql_fetch_array($query) ; echo substr($rowt['created'],0,16); ?></div></strong>
                        <strong>   <b>Receipt No
                            <?php  echo $salesid; ?><b></strong>
                            <br>

                            <div style="float:right">
                            Served by: <?php echo ucfirst($rowt['rep']); ?>
                            </div>
        <b>                      Customer:
                         <?php echo $rowt['name']; ?></b>&nbsp;&nbsp;&nbsp;                      
                            
                           </td>
                        </tr>
                      <td colspan="5" align="center"><h5><b>SALES RECEIPT</b></h5></td>
      <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999;">
                                     
                                        <th width="30%">Item</th>
										 <th width="5%"></th>
                                        <th width="15%">Qty</th>
                                        <th width="25%">Price</th>
                                        <th width="25%">Amount</th>
                                      </tr>
                      <tbody>
                        <?php 
		 $i = 1 ;
							$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
						 $e = $i++ ;	
							?>
                        <tr>
                     
                          <td><?php echo $row['item'] ?></td>
						   <td></td>
                          <td><?php echo $row['qty'] ?></td>
                          <td align="center">₦<?php echo number_format($row['price']) ?></td>
                          <td align="center">₦<?php echo number_format($row['amount']); ?></td>
                        </tr>
                        <?php  } ?>
                        <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999; ">
                        <tr>
                          <td align="center" colspan="5" style="border-bottom:thin dashed #999; border-top:thin dashed #999; "><b>Mode of Payment:</b></td>
                      </tr>
                      <tr> 
<td align="center" colspan="5" ><b>TRANSFER:<?php echo $rowt['tfamount'];?> CASH:<?php echo $rowt['cashp'];?> POS:<?php echo $rowt['pos'];?> ON-CREDIT:<?php echo $rowt['credit'];?></b></td>
</tr>
                          <td colspan="3" >
                          <b>Sub-Total:  </b><br>
                           <b> Discount:</b><br>
                           <b> Brought-Through:</b><br>
                           <b> Total Amount:</b><br>
                         
                          <td>
                          <b>₦<?php echo number_format($rowt['amount']);?>
                            <br>
                            ₦<?php echo number_format($rowt['discount']);  ?> <br>
                            <?php   
                         $na = $rowt['name'];
                        $totaldr = mysql_query("SELECT SUM(credit) AS value_sum FROM transact2 WHERE name='$na' AND crstatus=1"); 
                        $tdr = mysql_fetch_assoc($totaldr); 
                        $tot = $rowt['cash'];
                          $dr= $tdr['value_sum'];
                          $tota = $tot + $dr - $rowt['credit'];
                         ?>
                            ₦<?php echo number_format($dr);  ?> <br>
                        
                            ₦<?php echo number_format($tota);  ?></b>
                           
                            </td>
                        </tr>

                        

              <tr>
              <td colspan="6" >
              <b> Amount in word: </b>
              <?php include('amtoword.php');
                            $sum2=$tota;
                            echo " ".ucwords(convertNumber($sum2))." Naira Only";  ?>
            </td>
						 
              
						  </tr>
              <?php if($changebarcodeonreceiptstatus>0 ){ ?>
                        <tr >
                          <td colspan="5" align="center">  
                            
                          <?php $barcode=$salesid; include('barcode/generate.php'); ?>
                        </tr>
<?php  } ?>
                        <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999; ">
                          <td colspan="5" align="center">  
                          <?php echo $rfooter; ?>
                        </tr>
                      </tbody>
                    </table>
                    
                    </div>
         

   
    
  </body>
</html>