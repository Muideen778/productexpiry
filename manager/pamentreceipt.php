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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment Receipt</title>

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

  <body>

                   <div style="font:Courier New" class="content" >
                  
                    <table style="font-size:12px; margin-right:5px; margin-left:5px; margin-top:-50px" >
                      <thead>
                      <?php if(!empty($logo)){ ?>
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
                          <td colspan="5"><div style="float:right"> <strong><?php   $query=mysql_query("select * FROM payment_method WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 1 " )or die(mysql_error());
$rowt=mysql_fetch_array($query) ; echo $rowt['dd']." / ".$rowt['mm']." / ".$rowt['yy']; ?></div></strong>
                        <strong>   <b>Receipt No
                            <?php  echo $salesid; ?><b></strong>
                            <br>

                            <div style="float:right">
                            Served by: <?php echo ucfirst($rowt['rep']); ?>
                            </div>
        <b>                      Customer:<?php echo $_GET['uname']; ?></b>&nbsp;&nbsp;&nbsp;                      
                            
                           </td>
                        </tr>
                      <td colspan="5" align="center"><h5><b>PAYMENT RECEIPT</b></h5></td>
      <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999;">
                                     
                                        <th align="center" colspan="3" >Amount</th>
										
                                        <th >Method</th>
                                       
                                      </tr>
                      <tbody>
                        <?php 
		 $i = 1 ;
							$query=mysql_query("select * FROM payment_method WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
                $totalamount+=$row['amount'];
						 $e = $i++ ;	
							?>
                        <tr>
                     
                          <td  colspan="3" >₦<?php echo $row['amount'] ?></td>
						 
                          <td><?php 
                          if($row['method']=='6'){
                            echo "CASH";
                          }elseif($row['method']=='7'){
                            echo "FROM BALANCE";
                          }else{
                          $queryb=mysql_query("select * FROM bank WHERE id = ".$row['method']." " )or die(mysql_error());
                          while($rowb=mysql_fetch_array($queryb)){
                         
                            echo strtoupper($rowb['bank']);
                           }
                           
                            
                          }
                          
                          
                          
                          ?></td>
                        
                        </tr>
                        <?php  } ?>
                        <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999; font-size:18px;">
                         
                          <td colspan="3" > 
                           
                           <b> Total Amount:</b><br>
                         
                          <td><b>
                           
                            ₦<?php echo number_format($totalamount);  ?></b><br>
                           
                            </td>
                        </tr>

                        

              <tr>
              <td colspan="6" style="border-bottom:thin dashed #999; border-top:thin dashed #999;">
              <b> Amount in word: </b>
              <?php include('amtoword.php');
                           
                            echo " ".ucwords(convertNumber($totalamount))." Naira Only";  ?>
            </td>
						 
              
						  </tr>
              <?php if(isset($_GET['note']) and !empty($_GET['note'])) { ?>
              <tr style="float: left;">
                         
                         <td > 
                          
                          <b> Payment Note: </b><br>
                        
                         <td colspan="3" >
                          
                           <?php echo " ".$_GET['note'];  ?><br>
                          
                           </td>
                       </tr>
            <?php } ?>
                        <tr >
                          <td colspan="5" align="center">  
                            
                          <?php $barcode=$salesid; include('barcode/generate.php'); ?>
                        </tr>
                        <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999; ">
                          <td colspan="5" align="center">  
                          <?php echo $rfooter; ?>
                        </tr>
                      </tbody>
                    </table>
                    
                    </div>
         

   
    
  </body>
</html>