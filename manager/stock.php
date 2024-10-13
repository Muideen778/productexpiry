 <?php 
error_reporting(0);
session_start();
 if($_GET['x']==1){

  
  
	$con=mysql_connect('localhost','root','Ronextec112..');
if(!$con){
die("could not connect to db :" . mysql_error());
}
$db = mysql_select_db('expirysystem');
if(!$db){
die("could not select db:" . mysql_error());
}
 }
 ?>  <table class="table table-bordered table-hover">
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
                          <?php $ii=1;
							$qu=mysql_query("select * FROM cat ORDER BY cat ASC " )or die(mysql_error());
							while($roc=mysql_fetch_array($qu)){
							$cat=$roc['cat'];
							$f=$ii++;
							?>
                        
                    <tr><th colspan="11"><?php  echo $f.'. '.strtoupper($roc['cat']); ?></th></tr>
                                   
                                    
                                     <?php $i=1;
							$query=mysql_query("select * FROM stock WHERE cat = '$cat' ORDER BY item ASC " )or die(mysql_error());
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
                           
                      
                             <?php  } ?>
                              </table>
                           