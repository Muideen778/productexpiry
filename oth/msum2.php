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
 <table class="table table-striped table-bordered table-hover" id=""> <thead><tr> <td colspan="18">'; require('address.php') ;;echo '  
   <h3>MONTHLY FINANCIAL REPORT FOR '; echo strtoupper(date(F)) ;;echo ' </h3> <div style="float:right"> <a href="msum.php"><i class="btn btn-success btn-xs">[BACK]</i></a></div>'; echo date(c) ;;echo '</td></tr> </thead>
                        <tbody>
 <tr>
                            <th>S/N</th>
                            <th>INCOME/EXPENDITURE</th>
                           
                            <th>QTY SOLD</th>
                          
                            <th>CURRENT PRICE</th>
                            <th>TOTAL SALES(N)</th>
                            <th>Ratio</th>
                          </tr>                     
                          <tr>
                            <th colspan="2">STOCK/INCOME</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <th></th>
                          </tr>
                          ';  $i = 1; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                           

<td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$suma = $rowa['value_sum'];

echo $suma ; ;echo '</td>


                    <td>'; echo $row['price'] ; ;echo '</td>          
                            <td class="center">';  
							
 $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$suma = $rowa['value_sum']; echo $suma ; 
 ;echo '</td>
                            <td>'; 
$result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result);
$sumg = $rowa['value_sum'];

$result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result);
$sums = $rowa['value_sum'];

 $sumt = $sums/$sumg*100 ; echo round($sumt) ; ;echo '                              %</td>
                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL INCOME</td>
                            <th></th>
                            <th></th>
                            
                           
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' "); 
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
                            
                            
                            <th></th>
                            <td></td>          
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE cat = '$it' AND mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
 echo $sum 
 ;echo '</td>
                            <td>'; 
  $result2 = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
$row2 = mysql_fetch_assoc($result2); 
$sumg = $row2['value_sum'];

 $result2 = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE cat = '$it' AND mm = '$mm' "); 
$row2 = mysql_fetch_assoc($result2); 
$sumh = $row2['value_sum'];
 $sumt = $sumh/$sumg*100 ; echo round($sumt) ; ;echo '                              %</td>
                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL EXPENDITURE</td>
                            
                            <th></th>
                            <td></td>  
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; echo '100%' ;echo '</td>
                          </tr>
                          <tr class="odd gradeX">
                            <th class="center" colspan="2">PROFIT/LOSS</th>
                            <th></th>
                            <th></th>
                           
                           
                            
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
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
