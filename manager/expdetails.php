<?php 
error_reporting(0);
    session_start(); ob_start();
	
	
$_SESSION['frame']=1;

include("includes/connect.inc.php");

include("includes/sales.php");


if($_POST['month']){ $m = $_POST['month']; }elseif($_GET['transactionMonth']){	$m = $_GET['transactionMonth']; }else{$m=100;}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expenditure Details</title>

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  
  
   <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 

  <style type="text/css">
tr{

}

table{
	
}


  </style>
  

</head>

  <body  style="margin:20px" >

                   <div style="font:Courier New">
                  
                    <table style="font-size:11px;" >
                      <thead>
                        <tr>
                          <td colspan="5" align="center"><?php $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); ?> <strong><?php echo strtoupper($r['name']); ?></strong><br>
                                              <?php echo $r['address']; ?>, 
                                            <?php echo $r['phone']; ?><br><br></td>
                        </tr>
                        

                        <tr>
                          <td colspan="5"><div style="float:right"> <strong><?php echo date('d-m-Y H:i'); ?></div></strong>
                          
                            <form method="post">
                              <select name="month" onchange="submit()" class="noprint"><option value="100" <?php if($m==100){  echo 'selected'; } ?> >All Months</option>
<?php $a=1; while($a<=12){$b=$a++;
                      $month = date("F", mktime(0, 0, 0, $b, 10)) ; ?>
                                              <option value="<?php echo $b; ?>" <?php if($m==$b){  echo 'selected'; } ?> ><?php echo strtoupper($month); ?></option>
                                            <?php } ?>
                              </select>
                            </form>
                           </td>
                        </tr>
                                        <?php if($_GET['transactionIndex']){
	$salesid = $_GET['transactionIndex'];
	$item = strtoupper($_GET['Item']);
?>    <tr>  <td colspan="4" align="center"><strong>EXPENDITURE DETAILS OF <?php echo $item; ?> FOR <?php  if($m==100){echo 'THE YEAR'; }else{ echo strtoupper(date("F", mktime(0, 0, 0, $m, 10)));  }  ?></strong></td></tr>
      <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999;">
                                     
                                        <th width="150">Item</th>
                                       
                                        <th width="80">Amount</th> 
                                        <th width="100">Agent</th>
                                        <th width="100">Vendor</th>
                                        <th width="120">Date</th>
                                        <th width="150">Note</th>
                                      </tr>
                      <tbody>
                        <?php 
		 $i = 1 ;
						if($m==100){	$query=mysql_query("select * FROM expend WHERE expid = '$salesid' AND yy='$yy' ORDER BY sn ASC " )or die(mysql_error()); } else{$query=mysql_query("select * FROM expend WHERE expid = '$salesid' AND yy='$yy' AND mm = '$m' ORDER BY sn ASC " )or die(mysql_error()); }
							while($row=mysql_fetch_array($query)){
							
						 $e = $i++ ;	
							?>
                        <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999; ">
                     
                          <td><?php echo ucwords(strtolower($row['item'])) ?></td>
                       
                          <td class="center">₦<?php echo number_format($row['amount']) ?></td>
                             <td><?php echo ucwords(strtolower($row['name'])); ?></td>
                             <td><?php echo ucwords(strtolower($row['vendor'])); ?></td>
                             <td class="center"><?php echo substr($row['created'],0,16); ?></td>
                             <td class="center"><?php echo $row['des']; ?></td>
                        </tr>
                        <?php  } ?>
                        <tr >
                         
                          <td >
                            <strong>TOTAL AMOUNT:</strong></td>
                          <td colspan="3"><b>
                            ₦<?php if($m==100){ echo trSumb('expend','amount','expid',$salesid); }else{echo trSumc('expend','amount','expid',$salesid,'mm',$m); }  ?></b>
                            </td>
                        </tr><?php } 
						
						elseif($_GET['transactionMonth']){

?> 
<tr>  <td colspan="4" align="center"><strong>EXPENDITURE DETAILS FOR <?php  if($m==100){echo 'THE YEAR'; }else{ echo strtoupper(date("F", mktime(0, 0, 0, $m, 10)));  }  ?></strong></td></tr>
      <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999;">
                                     
                                        <th width="150">Item</th>
                                       
                                        <th width="80">Amount</th> 
                                        <th width="100">Agent</th>
                                        <th width="120">Date</th>
                                         <th width="100">Vendor</th>
                                         <th width="100">Invoice No</th>
                                        <th width="150">Note</th>
                                      </tr>
                      <tbody>
                        <?php 
		 $i = 1 ;
						if($m==100){	$query=mysql_query("select * FROM expend WHERE yy='$yy' ORDER BY sn ASC " )or die(mysql_error()); } else{$query=mysql_query("select * FROM expend WHERE yy='$yy' AND mm = '$m' ORDER BY sn ASC " )or die(mysql_error()); }
							while($row=mysql_fetch_array($query)){
							
						 $e = $i++ ;	
							?>
                        <tr style="border-bottom:thin dashed #999; border-top:thin dashed #999; ">
                     
                          <td><?php echo ucwords(strtolower($row['item'])) ?></td>
                       
                          <td class="center">₦<?php echo number_format($row['amount']) ?></td>
                             <td><?php echo $row['name'] ?></td>
                             <td class="center"><?php echo substr($row['created'],0,16); ?></td>
                             <td class="center"><?php echo ucwords(strtolower($row['vendor'])); ?></td>
                             <td class="center"><?php echo $row['salesid']; ?></td>
                             <td class="center"><?php echo $row['des']; ?></td>
                        </tr>
                        <?php  } ?>
                        <tr >
                         
                          <td >
                            <strong>TOTAL AMOUNT:</strong></td>
                          <td colspan="5"><b>
                            ₦<?php if($m==100){ echo trSum('expend','amount'); }else{echo trSumb('expend','amount','mm',$m); }  ?></b>
                            </td>
                        </tr>
                        <?php }  ?>
                     
                      </tbody>
                    </table>
                    
                    </div>
         

   
    
  </body>
</html>