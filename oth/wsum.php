<?php
 
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['id'])){
        @$id = $_GET['id'];
      }
    }
	
	  $rep = $_SESSION['admin'];
	  


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 		$dd = date('d') ;
	  $yy = date('y') ;
	  $mm = date('m') ;
	  $wk = date(W) ;

	 	
	 
	 
$resultr = mysql_query("SELECT SUM(amount) AS value_sum FROM income "); 
$rowr = mysql_fetch_assoc($resultr); 
$sumr = $rowr['value_sum'];

$results = mysql_query("SELECT SUM(amount) AS value_sum FROM expend "); 
$rows = mysql_fetch_assoc($results); 
$sums = $rows['value_sum'];



	     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);


if(array_key_exists('register', $_POST)){
	
	include("includes/connect.inc.php");
	
	
$item = $_POST['item'];

$des = $_POST['des'];

$qty = $_POST['qty'];
$price = $_POST['price'];
$other = $_POST['other'];
$amount = $qty*$price;

 $name = $row['name'];
  $phone = $row['phone'];
   $tno = $row['tno'];
   $tno2 = $tno+1;




	 
	   	     if(array_key_exists('register', $_POST)){
				 
				 
		
			  
$sql = "INSERT INTO transact (id,name,phone,item,des,qty,price,amount,other,rep,today)
VALUES('$id','$name','$phone','$item','$des','$qty','$price','$amount','$other','$rep','$today')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Added!";


$sql3 = "UPDATE client SET tno = '$tno2' WHERE id = '$id' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());


        }
       }
			}



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

  <body>
 <table class="table table-striped table-bordered table-hover" id=""> <thead><tr> <td colspan="9">'; require('address.php') ;;echo '  
  <h3>WEEKLY FINANCIAL REPORT </h3><div style="float:right"> <a href="msum.php"><i class="btn btn-success btn-xs">[BACK]</i></a></div> '; echo date(c) ;;echo '</td></tr> </thead>
                        <tbody>


                        
                          <tr>
                            <th>S/N</th>
                            <th>INCOME/EXPENDITURE</th>
                            <th>WEEK 1</th>
                            <th>WEEK 2</th>
                            <th>WEEK 3</th>
                            <th>WEEK 4</th>
                            <th style="color:#F00">WEEK 5 <br>CURRENT</th>
                            
                            <th>TOTAL</th>
                            <th>Ratio</th>
                          </tr>
                       
                          <tr>
                            <th colspan="2">INCOME</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          ';  $i = 1; $ww = date('W') ; $ww1 = $ww-1; $ww2 = $ww-2; $ww3 = $ww-3; $ww4 = $ww-4;
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww4' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww3' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww2' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww1' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td style="color:#F00" class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE cat = '$it' AND ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
 echo $sum 
 ;echo '</td>
                            <td>'; 
  $result2 = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE cat = '$it' AND ww >= '$ww4' "); 
$row2 = mysql_fetch_assoc($result2); 
$sumg = $row2['value_sum'];
 $sumt = $sumg/$sumr*100 ; echo round($sumt) ; ;echo '                              %</td>
                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL INCOME</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td style="color:#F00" class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; echo '100%' ;echo '</td>
                          </tr>
                          <tr>
                            <th colspan="2">EXPENDITURE</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          '; 
						   $i = 1 ;
							$query=mysql_query("select * FROM expitem ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww4' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww3' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww2' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww1' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td style="color:#F00" class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE cat = '$it' AND ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
 echo $sum 
 ;echo '</td>
                            <td>'; 
  $result2 = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE cat = '$it' AND ww >= '$ww4' "); 
$row2 = mysql_fetch_assoc($result2); 
$sumg = $row2['value_sum'];
 $sumt = $sumg/$sums*100 ; echo round($sumt) ; ;echo '                              %</td>
                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL EXPENDITURE</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td style="color:#F00" class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; echo '100%' ;echo '</td>
                          </tr>
                          <tr class="odd gradeX">
                            <th class="center" colspan="2">PROFIT/LOSS</th>
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww4' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww4' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww3' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww3' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww2' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww2' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww1' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww1' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            <th style="color:#F00">';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww = '$ww' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww = '$ww' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE ww >= '$ww4' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            <th></th>
                          </tr>
                        </tbody>
                      </table>                  
    
    
</body>
</html>';;?>
