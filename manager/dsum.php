<?php
 
error_reporting(0);

    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}

	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 		$dd = date('d') ;
	  $yy = date('y') ;
	  $mm = date('m') ;
	  $wk = date('W') ;

	 	
	 
	 
$resultr = mysql_query("SELECT SUM(amount) AS value_sum FROM transact "); 
$rowr = mysql_fetch_assoc($resultr); 
$sumr = $rowr['value_sum'];

$results = mysql_query("SELECT SUM(amount) AS value_sum FROM expend "); 
$rows = mysql_fetch_assoc($results); 
$sums = $rows['value_sum'];





;echo '<!DOCTYPE html>
<html lang="en">
  <head>


    <title>Sales Pro</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
  table,td,th {
	font-size: 14px;
	border-top:thin solid #999;
	border-right:thin solid #999;
}

  table {
	border:thin solid #999;
}
  </style>
</head>

<body style="margin: 20px;">
  <table class="table table-striped table-bordered table-hover" id=""> <thead><tr> <td colspan="19">'; require('address.php') ;;echo '  
   <h3>DAILY FINANCIAL REPORT 2 [D1-D16] '; echo strtoupper(date(F)).', 20'.$yy ;;echo ' </h3> <div style="float:right"> <a href="msum.php"><i class="btn btn-success btn-xs">[BACK]</i></a></div>'; echo date(c) ;;echo '</td></tr> </thead>
                        <tbody>
                          <tr>
                            <th>S/N</th>
                            <th>INCOME/EXPENDITURE</th>
                            
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>TOTAL</th>
                          </tr>
<tr><th colspan="2">INCOME</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>                          ';  $i = 1; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
                $it=$row['item'];
                $itid=$row['sn'];
							
							
							
						 $re = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND pid = '$itid' "); 
$r = mysql_fetch_assoc($re); 
$s = $r['value_sum']; if($s!=0){ $e = $i++ ;	;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; $it=$row['item']; echo ucfirst($row['item']) ;echo '</td>
                            
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '1' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '2' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '3' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '4' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '5' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '6' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '7' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '8' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '9' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '10' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '11' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '12' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '13' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '14' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '15' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '16' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND pid = '$itid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                          </tr>
                          ';  }} ;echo '                          <tr class="omm = \'$mm\' AND dd gradeX">
                            <td class="center" colspan="2">TOTAL INCOME</td>
                           
                            <td>';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '5' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '6' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '7' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '8' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '9' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '10' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '11' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '12' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '13' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '14' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '15' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '16' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

</tr>
                         
                                        
                                        
                                        
                                        
                                        
                                        
<tr><th colspan="2">INCOME</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>        
                          
                          '; 
						   $i = 1 ;
							$query=mysql_query("select * FROM expitem ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
              $itid=$row['sn'];
							$e = $i++ ;
							;echo '                          <tr class="omm = \'$mm\' AND dd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '1' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '2' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '3' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '4' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '5' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '6' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '7' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '8' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '9' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '10' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '11' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '12' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '13' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '14' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '15' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '16' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND expid = '$itid'  "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>


                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL EXPENDITURE</td>
                           
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '5' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '6' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '7' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '8' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '9' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '10' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '11' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '12' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '13' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '14' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '15' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '16' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo number_format($sum); ;echo '</td>

                          </tr>
                          
                          
                          
                          
                          
                          <tr class="odd gradeX">
                            <th class="center" colspan="2">PROFIT/LOSS</th>
                           
                            <th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '1' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '1' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '2' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '2' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '3' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '3' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '4' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '4' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '5' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '5' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '6' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '6' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '7' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '7' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '8' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '8' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '9' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '9' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '10' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '10' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '11' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '11' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '12' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '12' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '13' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '13' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '14' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '14' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '15' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '15' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>

<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' AND dd = '16' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '16' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>

<th>';  $resulta = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo number_format($sum) ; ;echo '</th>
                            


                          </tr>
                        </tbody>
                      </table>
</body>
</html>';;?>
