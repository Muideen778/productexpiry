<?php
 
    session_start();
if(!isset($_SESSION['admin'])){
   header("location: index.php");
     exit;
	}
	
	  $rep = $_SESSION['admin'];
	  $sn = $_SESSION['sn'];
	  $sn3 = $sn ;
	  
	  
	  


include("includes/connect.inc.php");

	 $today = date('ymd');	
	 $dd = date('d') ;	
	 $mm = date('m') ;	
	 $yy = date('y') ;	
	 $ww = date('W') ;	
	 


			 
		     $sql =" SELECT * FROM staff WHERE sn = '$sn' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $idd = $row['id'];
	 	 $address3 = $row['address'];
	 $phone3 = $row['phone'];
	  $salary = $row['salary'];

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
   
	$senderid = 'LumenChris' ;
	
	

	$msg = "Thank you ".ucfirst($name)." for buying ".$item2." from ".$senderid.".We appreciate your patronage,hope to see you again.Our hotline is 08034100823"  ;

 $msg2 = urlencode($msg);

$sql = "INSERT INTO income (sn,id,name,phone,item,des,cat,amount,rep,today,dd,mm,yy,ww)
VALUES('$sn','$id','$name','$phone','$item2','$des','$item2','$amount','$rep','$today','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

			  
$sql = "INSERT INTO transact (id,name,phone,item,des,cat,qty,price,amount,balance,other,rep,today,dd,mm,yy,ww)
VALUES('$id','$name','$phone','$item2','$des','$item2','$qty','$price','$amount','$amount','$other','$rep','$today','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Added!";


$sqlk = "UPDATE stock SET qty = '$qty2' WHERE item = '$item2' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());


$sql3 = "UPDATE staff SET tno = '$tno2' WHERE sn = '$sn3' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());



$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg2";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";

$status = "Sent" ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item2','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


  
}
else{ $status = "Not Sent"  ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item2','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());
 }



}}
		
		

if(array_key_exists('edit', $_POST)){
	
	  $rep = $_SESSION['admin'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$othername = $_POST['othername'];
$phone = $_POST['phone'];

$address = $_POST['address'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$dob = $_POST['dob'];

$discipline = $_POST['discipline'];
$qualification = $_POST['qualification'];
$designation = $_POST['designation'];
$assignment = $_POST['assignment'];
$apdate = $_POST['apdate'];
$other = $_POST['other'];
$salary = $_POST['salary'];
			  
$sql = "UPDATE staff SET rep='$rep', phone='$phone', address='$address', sex='$sex', dob='$dob', other='$other', email='$email', firstname='$firstname', surname='$surname', othername='$othername', discipline='$discipline', qualification='$qualification', designation='$designation', assignment='$assignment', apdate='$apdate', other='$other', salary='$salary' WHERE sn = '$sn' ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Updated!";

header("location:profiles.php?sn=$sn ");
exit;



        }
       }
			
if(array_key_exists('sms', $_POST)){
	
	$msg = $_POST['msg'];
	$phone = $row['phone'];
	$name = $row['name'];
	$senderid = 'Trenet' ;
	
	 $msg1 = urlencode($msg);

	if(empty($msg)){$er = 'Message box is empty' ;}	
	else{
	


$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg1" ;
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this customer!";

$status = "Sent" ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


  
}
else{ $status = "Not Sent"  ;

	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());
 }


        }
	
	
} 

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

    <title>Millennium Publishers</title>

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

hr{margin-top:0px;}

form input{
	font-weight:bolder;
	
}

sta{background-color:'; echo $color  ;;echo ';
color:#FFF;
padding:3px 10px; border-radius:5px;

}

  </style>
</head>

  <body onload="window.print()">

    <div id="wrapper">

      <!-- Sidebar -->

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            
       <table ><tr>     <td bgcolor="#99CC66"></td>
                                            
                                          <td bgcolor="#99CC66"><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];


					  ;echo '                            </b></td> 
                            <td> </td>
                                            <td bgcolor="#FF99CC"> </td>
                            <td bgcolor="#FF99CC"><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' AND month = '$mm' AND purpose = 'advance' "); 
$rowa = mysql_fetch_assoc($result); 
$sumb = $rowa['value_sum'];


					  ;echo '                            </b></td>
                            <td bgcolor="#66FF66"></td>
                            
                                            <td bgcolor="#66FF66"><b>'; $bal=$salary-$sumb;;echo ' </b></td>
                                      </tr>
                                    </tbody>
                            </table>     

          <p></p> 

<table style=" width:600px;" width="600" class="table table-striped table-bordered table-hover" id="dataTables-example"><tr><td colspan="4"><h3>'; echo date('F, Y') ; ;echo ' Pay Slip</h3><br>
Name: '; echo ucfirst($row['surname']).' '.ucfirst($row['firstname']).' '.ucfirst($row['othername']); ;echo '<br>Pay Slip ID: <b>'; echo $idd.'/'.date(m) ;  ;echo '</b></td></tr><tr><td colspan="4"><h4>Main Salary</h4></td></tr>

<tr style="font-weight:bold"><td>Month</td><td>Basic Salary</td><td>Salary Advance</td><td>Salary Due</td></tr>
<tr><td>'; echo $mm ; ;echo '</td><td>'; echo $salary ; ;echo '</td><td>'; echo $sumb ; ;echo '</td><td>'; echo $bal ; ;echo '</td></tr></table>

<table style=" width:600px;" width="500" class="table table-striped table-bordered table-hover" id="dataTables-example"><tr><td colspan="4"><h4>Other Allowances</h4></td></tr>
<tr style="font-weight:bold"><td>Transportation</td><td>Bonuses</td><td>Sales Commision</td><td>Total Allowance</td></tr>
<tr><td>';      $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' AND month = '$mm' AND purpose = 'transport' "); 
$rowa = mysql_fetch_assoc($result); 
$sumc = $rowa['value_sum'];

echo $sumc ;
					  ;echo ' </td><td>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' AND month = '$mm' AND purpose = 'bonus' "); 
$rowa = mysql_fetch_assoc($result); 
$sumd = $rowa['value_sum'];

echo $sumd ;
					  ;echo '</td><td>';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' AND month = '$mm' AND purpose = 'comm' "); 
$rowa = mysql_fetch_assoc($result); 
$sume = $rowa['value_sum'];

echo $sume ;
					  ;echo '</td><td>'; $ball = $sumc+$sumd+$sume; echo $ball ; ;echo '</td></tr></table>
                      
                      <table style="width:600px;" width="500" class="table table-striped table-bordered table-hover" id="dataTables-example"><tr><td colspan="4"><h4>Total Remuneration</h4></td></tr>
<tr style="font-weight:bold"><td>Total Allowance</td><td>Total Advance</td><td>Balance</td><td>Remark</td></tr>
<tr><td>';      

echo $ball+$salary ;
					  ;echo ' </td><td>';     
echo $sum ;
					  ;echo '</td><td>';    

echo $bal ;
					  ;echo '</td><td></td></tr><tr><td colspan="4"><b>
                    <p>';


echo 'Total Allowance:'.' '.ucwords(convertNumber($ball+$salary)).'<br><br>';

echo 'Total Salary Due:'.' '.ucwords(convertNumber($bal));



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
;echo ' </b></td></tr></table>
</p>
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
