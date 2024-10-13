<?php
 
    session_start();
if(!isset($_SESSION['admin'])){
   header("location: index.php");
     exit;
	}
	
	
	 if($_GET){ // tdis partr displays records ready for updating
      if(isset($_GET['sn'])){
        @$sn = $_GET['sn'];
      }
    }
	
include("includes/connect.inc.php");

	$queryy=mysql_query("select * FROM transact WHERE sn = '$sn' ORDER BY sn DESC LIMIT 1" )or die(mysql_error());
$roww=mysql_fetch_array($queryy) ;
	$todayx = $roww['today'];
	$id = $roww['id'];	
	
							
	  $rep = $_SESSION['admin'];
	  
	  $id3 = $id ;
	  
	  
	  




	 $today = date('ymd');	
	 
	 	
		$item = $_POST['item'];
		
				$item2 = $_POST['item2'];
				
				
					
							
		
	 	    $sqls =" SELECT * FROM stock WHERE item = '$item2' LIMIT 1";
     $results = mysql_query($sqls) or die (mysql_error());
	 $rows = mysql_fetch_assoc($results);		


			 
		     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $name3 = $row['name'];
	 	 $address3 = $row['address'];
	 $phone3 = $row['phone'];

	 
	 
	 
	 		 $sqlx =" SELECT * FROM stock WHERE item = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 $rowx = mysql_fetch_assoc($resultx);
	 

if(array_key_exists('sales', $_POST)){
	
	include("includes/connect.inc.php");
	
$item2 = $_POST['item2'];
$des = $_POST['des'];

$qty = $_POST['qty'];
$price = $_POST['price'];
$other = $_POST['other'];
$amount = $qty*$price;

 $name = $row['name'];
  $phone = $row['phone'];
   $tno = $row['tno'];
   $tno2 = $tno+1;
   
   $qty1 = $rows['qty'] ;
   $qty2 = $qty1-$qty ;	
   
	$senderid = 'Trenet' ;

	$msg = 'Thank you '.ucfirst($name).' for buying '.$item2.' from '.$senderid.'. We appreciate your patronage, hope to see you again. Our hotline is 08032318588' ;


				 
			  
$sql = "INSERT INTO transact (id,name,phone,item,des,qty,price,amount,other,rep,today)
VALUES('$id','$name','$phone','$item2','$des','$qty','$price','$amount','$other','$rep','$today')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Added!";


$sqlk = "UPDATE stock SET qty = '$qty2' WHERE item = '$item2' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());


$sql3 = "UPDATE client SET tno = '$tno2' WHERE id = '$id' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());



	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item2')";
$res5 = mysql_query($sql5) or die(mysql_error());


if($res5){


$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";
  
}



}}}
		
		

if(array_key_exists('update', $_POST)){
	
	include("includes/connect.inc.php");
	
		
$name = $_POST['name'];

$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];

$company = $_POST['company'];
$other = $_POST['other'];

	


			  
$sql = "UPDATE client SET name='$name', phone='$phone', address='$address', sex='$sex', company='$company', other='$other', email='$email', today='$today' WHERE id = '$id' ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Updated!";

header("location:profile.php?id=$id ");
exit;



        }
       }
			
if(array_key_exists('sms', $_POST)){
	
	$msg = $_POST['msg'];
	$phone = $row['phone'];
	$name = $row['name'];
	$senderid = 'Trenet' ;

	if(empty($msg)){$er = 'Message box is empty' ;}	
	else{
	
	$sql = "INSERT INTO smsrec (id,recip,phone,msg,count,rep,today,category)
VALUES('$id','$name','$phone','$msg','1','$rep','$today','single')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){

$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg";
   
$ret = file($url);

if($ret){

$er="Your message has been sent Successfully!";
  
}

        }
	
	
} }

if(array_key_exists('balance', $_POST)){
header("location:http://trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&balance=true");
exit;
	
}
;echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Pro</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
  
  
  
  
  
   <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 
 

    <!-- Page-Level Plugin CSS - Tables -->
    <!-- <link href="css1/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    SB Admin CSS - Include with every page 
        <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome1/css/font-awesome.css" rel="stylesheet">
    
      <link href="css1/sb-admin.css" rel="stylesheet">
  
    -->
  <style type="text/css">
.fm1{padding:20px;
color:#033;
width:40%;
float:left; 
margin-right:50px;
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

  </style>
</head>

  <body>

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
          <img src="tlog.png" width="220" >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     ';    include('nav2.php') ;  ;echo '     
     ';     require('nav1.php') ;  ;echo '     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">

<div class="panel-body">
                                                    
                          
                          <table class="table table-striped table-bordered table-hover" id="">
                                    <thead>
                                        <tr>
                                            <td colspan="6">'; require('address.php') ;;echo '</td>
                                            
                                            
                                      </tr>
                                      
                                       <tr>
                                            <td colspan="3">Client ID: '; echo $id3; ;echo '<br>Client Name: '; echo $name3; ;echo '<br>
                                            Phone No: '; echo $phone3; ;echo '<br> Address: '; echo $address3; ;echo '                                           
                                            
                                            </td>
                                            
                                            <td colspan="1"><center></center></td>

                                            <td colspan="2">Date: '; echo date(d.'-'.m.'-'.Y); ;echo '<br>Time: '; echo date(h.':'.i.':'.s) ; ;echo '<br><br>       Payment Status: <font color="blue"> '; $resultz = mysql_query("select * FROM transact WHERE id = '$id3' AND today = '$today' AND balance != '0' ");
				      $numz = mysql_num_rows($resultz);  if($numz>0){ $stat = 'Not Paid' ; } else { $stat = 'Fully Paid' ;} echo $stat ;;echo ' </font></td>
                                      </tr>
                                      <td colspan="6"><center><font face="Verdana, Geneva, sans-serif" size="+2">Sales Invoice</font></center></td>
                                      
                                       <tr>
                                            <th>S/N</th>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price(N)</th>
                                            <th>Amount(N)</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
		 $i = 1 ;
							$query=mysql_query("select * FROM transact WHERE id = '$id3' AND today = '$todayx' ORDER BY sn ASC001" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
						 $e = $i++ ;	
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $e ;echo '</td>
                                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                                            <td>'; echo ucfirst($row['des']) ;echo '</td>
                                            <td>'; echo $row['qty'] ;echo '</td>
                                            <td class="center">'; echo $row['price'] ;echo '</td>
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                           
                                      </tr>
                                         ';  } ;echo '                                         
                                        <tr>
                                            <td colspan="5"><b>Total</b>
                                           
                                            
                                            </td>
                                            
                                           <td><b>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE id = '$id3' AND today = '$todayx' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo $sum2 ;
					  ;echo '</b></td>
                                          
                                      </tr>
                                      
                                      <tr>
                                            <td colspan="6"><b>Total Amount in Words: </b>  ';
/*
Copyright 2007-2008 Brenton Fletcher. http://bloople.net/num2text
You can use this freely and modify it however you want.
*/

/*
w3resource team have modified it to make it nicer coverting cases.
*/

//$num = $today;



echo ucwords(convertNumber($sum2));


function convertNumber($num)
{
   list($num, $dec) = explode(".", $num);

   $output = "";

   if($num{0} == "-")
   {
      $output = "negative ";
      $num = ltrim($num, "-");
   }
   else if($num{0} == "+")
   {
      $output = "positive ";
      $num = ltrim($num, "+");
   }
   
   if($num{0} == "0")
   {
      $output .= "zero";
   }
   else
   {
      $num = str_pad($num, 36, "0", STR_PAD_LEFT);
      $group = rtrim(chunk_split($num, 3, " "), " ");
      $groups = explode(" ", $group);

      $groups2 = array();
      foreach($groups as $g) $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});

      for($z = 0; $z < count($groups2); $z++)
      {
         if($groups2[$z] != "")
         {
            $output .= $groups2[$z].convertGroup(11 - $z).($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1))
             && $groups2[11] != '' && $groups[11]{0} == '0' ? " and " : ", ");
         }
      }

      $output = rtrim($output, ", ");
   }

   if($dec > 0)
   {
      $output .= " point";
      for($i = 0; $i < strlen($dec); $i++) $output .= " ".convertDigit($dec{$i});
   }

   return $output;
}

function convertGroup($index)
{
   switch($index)
   {
      case 11: return " decillion";
      case 10: return " nonillion";
      case 9: return " octillion";
      case 8: return " septillion";
      case 7: return " sextillion";
      case 6: return " quintrillion";
      case 5: return " quadrillion";
      case 4: return " trillion";
      case 3: return " billion";
      case 2: return " million";
      case 1: return " thousand";
      case 0: return "";
   }
}

function convertThreeDigit($dig1, $dig2, $dig3)
{
   $output = "";

   if($dig1 == "0" && $dig2 == "0" && $dig3 == "0") return "";

   if($dig1 != "0")
   {
      $output .= convertDigit($dig1)." hundred";
      if($dig2 != "0" || $dig3 != "0") $output .= " and ";
   }

   if($dig2 != "0") $output .= convertTwoDigit($dig2, $dig3);
   else if($dig3 != "0") $output .= convertDigit($dig3);

   return $output;
}

function convertTwoDigit($dig1, $dig2)
{
   if($dig2 == "0")
   {
      switch($dig1)
      {
         case "1": return "ten";
         case "2": return "twenty";
         case "3": return "thirty";
         case "4": return "forty";
         case "5": return "fifty";
         case "6": return "sixty";
         case "7": return "seventy";
         case "8": return "eighty";
         case "9": return "ninety";
      }
   }
   else if($dig1 == "1")
   {
      switch($dig2)
      {
         case "1": return "eleven";
         case "2": return "twelve";
         case "3": return "thirteen";
         case "4": return "fourteen";
         case "5": return "fifteen";
         case "6": return "sixteen";
         case "7": return "seventeen";
         case "8": return "eighteen";
         case "9": return "nineteen";
      }
   }
   else
   {
      $temp = convertDigit($dig2);
      switch($dig1)
      {
         case "2": return "twenty-$temp";
         case "3": return "thirty-$temp";
         case "4": return "forty-$temp";
         case "5": return "fifty-$temp";
         case "6": return "sixty-$temp";
         case "7": return "seventy-$temp";
         case "8": return "eighty-$temp";
         case "9": return "ninety-$temp";
      }
   }
}
      
function convertDigit($digit)
{
   switch($digit)
   {
      case "0": return "zero";
      case "1": return "one";
      case "2": return "two";
      case "3": return "three";
      case "4": return "four";
      case "5": return "five";
      case "6": return "six";
      case "7": return "seven";
      case "8": return "eight";
      case "9": return "nine";
   }
}
;echo ' Naira</td>
                                            
                                           
                                      </tr><tr>
                                            <td colspan="2"><br><br><br> <font  style="display:block; border-top:thin solid #333; width:100%; text-align:center;">  Client Signature </font>
                                           
                                            
                                            </td>
                                            
                                           <td colspan="1">
										   </td>
                                           <td colspan="3"><br><br><br> <font  style="display:block; border-top:thin solid #333; width:100%; text-align:center;">  Rep Signature:  '; echo ucfirst($rep); ;echo '</font></td>
                                      </tr>
                                      
                                      
                                    </tbody>
                            </table>
                            
                            </div>
                            </div>
            </div>
            
            
       
            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
    
    
    
    
    
    
    <script src="js1/jquery-1.10.2.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js1/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js1/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js1/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js1/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $(\'#dataTables-example\').dataTable();
    });
    </script>
    
    
  </body>
</html>';;?>
