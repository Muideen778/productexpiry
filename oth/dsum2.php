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
   <h3>DAILY FINANCIAL REPORT 2 [D17-D31] </h3> <div style="float:right"> <a href="msum.php"><i class="btn btn-success btn-xs">[BACK]</i></a></div>'; echo date(c) ;;echo '</td></tr> </thead>
                        <tbody>
                          <tr>
                            <th>S/N</th>
                            <th>INCOME/EXPENDITURE</th>
                            
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                            <th>TOTAL</th>
                          </tr>
<tr><th colspan="2">INCOME</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>                          ';  $i = 1; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '17' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '18' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '19' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '20' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '21' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '22' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '23' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '24' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '25' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '26' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '27' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '28' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '29' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '30' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '31' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                          </tr>
                          ';  } ;echo '                          <tr class="omm = \'$mm\' AND dd gradeX">
                            <td class="center" colspan="2">TOTAL INCOME</td>
                           
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '17' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '18' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '19' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '20' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '21' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '22' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '23' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '24' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '25' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '26' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '27' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '28' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '29' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '30' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '31' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

</tr>
                         
                                        
                                        
                                        
                                        
                                        
                                        
<tr><th colspan="2">INCOME</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>        
                          
                          '; 
						   $i = 1 ;
							$query=mysql_query("select * FROM expitem ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="omm = \'$mm\' AND dd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '17' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '18' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '19' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '20' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '21' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '22' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '23' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '24' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '25' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '26' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '27' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '28' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '29' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '30' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '31' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>


                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL EXPENDITURE</td>
                           
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '17' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '18' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '19' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '20' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '21' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '22' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '23' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '24' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '25' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '26' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '27' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '28' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '29' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '30' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '31' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

<td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

                          </tr>
                          
                          
                          
                          
                          
                          <tr class="odd gradeX">
                            <th class="center" colspan="2">PROFIT/LOSS</th>
                           
                            <th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '17' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '17' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '18' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '18' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '19' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '19' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '20' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '20' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '21' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '21' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '22' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '22' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '23' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '23' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '24' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '24' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '25' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '25' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '26' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '26' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '27' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '27' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '28' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '28' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '29' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '29' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '30' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '30' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' AND dd = '31' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' AND dd = '31' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
<th>';  $resulta = mysql_query("SELECT SUM(amount) AS value_sum FROM income WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($resulta); 
$sum1 = $rowa['value_sum'];

$resultb = mysql_query("SELECT SUM(amount) AS value_sum FROM expend WHERE mm = '$mm' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sum2 = $rowb['value_sum'];
$sum = $sum1-$sum2 ;
echo $sum ; ;echo '</th>
                            


                          </tr>
                        </tbody>
                      </table>
</body>
</html>';;?>
