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
	
	  $rep = $_SESSION['admin'];
	  $_SESSION['sn'] = $sn;
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


$reportadded="Staff Data Successfully Added!";


$sqlk = "UPDATE stock SET qty = '$qty2' WHERE item = '$item2' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());


$sql3 = "UPDATE staff SET tno = '$tno2' WHERE sn = '$sn3' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());



$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg2";
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this Staff!";

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
$id = $_POST['id'];

$discipline = $_POST['discipline'];
$qualification = $_POST['qualification'];
$designation = $_POST['designation'];
$assignment = $_POST['assignment'];
$apdate = $_POST['apdate'];
$other = $_POST['other'];
$salary = $_POST['salary'];
			  
$sql = "UPDATE staff SET rep='$rep', phone='$phone', address='$address', sex='$sex', dob='$dob', other='$other', email='$email', firstname='$firstname', surname='$surname', othername='$othername', discipline='$discipline', qualification='$qualification', designation='$designation', assignment='$assignment', apdate='$apdate', other='$other', salary='$salary', id='$id' WHERE sn = '$sn' ";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Staff Data Successfully Updated!";

header("location:profiles.php?sn=$sn ");
exit;



        }
       }
			
if(array_key_exists('sms', $_POST)){
	
	$msg = $_POST['msg'];
	$phone = $row['phone'];
	$name = $row['name'];
	$senderid = 'LumenChris' ;
	
	 $msg1 = urlencode($msg);

	if(empty($msg)){$er = 'Message box is empty' ;}	
	else{
	


$url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=moreenergy&password=mummyt&sender=$senderid&recipient=$phone&message=$msg1" ;
   
$ret = file($url);

if($ret){

$er="SMS has been sent to this Staff!";

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

.fm4{padding:20px;
color:#033;
width:35%;
float:right; 
margin-right:50px;
border:thick solid #066;
border-radius:10px;
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
          <div class="col-lg-12">
            <h1><small>Manage '; echo ucfirst($row['surname']).' '.ucfirst($row['firstname']); ;echo '\'s Profile</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Staff Profile</li>
                <li class="TabbedPanelsTab" tabindex="0">Edit Profile</li>
                <li class="TabbedPanelsTab" tabindex="0">Payment History</li>
                <li class="TabbedPanelsTab" tabindex="0">Current Pay Slip</li>
                <li class="TabbedPanelsTab" tabindex="0">Dashboard</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                          
<div class="fm1">    
<img src="upload/'; echo $row['photo'];  ;echo '" width="120" height="150" />      
<hr>     
  Staff Identification No: <b style="color:#006699; float:right;">'; echo $row['id']; ;echo ' </b>
  <hr>
  Surname: <b style="color:#006699; float:right;">'; echo ucfirst($row['surname']); ;echo '</b>
 <hr>  First Name: <b style="color:#006699; float:right;">'; echo ucfirst($row['firstname']); ;echo '</b>
 <hr>
  Other Names: <b style="color:#006699; float:right;">'; echo ucfirst($row['othername']); ;echo '</b>
 <hr>
  Sex: <b style="color:#006699; float:right;">'; echo $row['sex'] ; ;echo '</b>
<hr>  
Age: <b style="color:#006699; float:right;">'; echo $row['dob'] ; ;echo '</b>
<hr>
Phone Number: <b style="color:#006699; float:right;">'; echo $row['phone'] ; ;echo '</b>
<hr>

  E-mail: <b style="color:#006699; float:right;">'; echo $row['email']; ;echo '</b> 
<hr>
  Address: <b style="color:#006699; float:right;">'; echo $row['address']; ;echo '</b> 
<hr>
  Appointment Date: <b style="color:#006699; float:right;">'; echo $row['apdate']; ;echo '</b> 
<hr>
  Discipline: <b style="color:#006699; float:right;">'; echo $row['discipline'] ; ;echo '</b>
<hr>
  Qualification: <b style="color:#006699; float:right;">'; echo $row['qualification'] ; ;echo '</b>
<hr>
 Designation: <b style="color:#006699; float:right;">'; echo $row['designation'] ; ;echo '</b>
<hr>
 Primary Assignment: <b style="color:#006699; float:right;">'; echo $row['assignment'] ; ;echo '</b>
<hr>
 Monthly Salary: <b style="color:#006699; float:right;">'; echo $row['salary'] ; ;echo '</b>
<hr>
 Other Information: <b style="color:#006699; float:right;">'; echo $row['other'] ; ;echo '</b>
<hr>
 Registration Data/Time: <b style="color:#006699; float:right;">'; echo $row['created'] ; ;echo '</b>
<hr>



</div>










<div class="fm1"><p></p><p></p>
<h4>Send SMS to Staff</h4>        
           <font color="red"> '; echo $er ;  ;echo '</font>
<form action="" method="post" enctype="multipart/form-data" >
<p style="float:right">
<button type="submit" class="btn btn-default" name="balance">Check SMS Balance</button> </p>

<textarea name="msg" class="form-control" rows="3" placeholder="Type SMS here..."></textarea><p></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" class="btn btn-default" name="sms">Send Message</button>
              
</p>


</form>



<p></p></div>
                </div>
                </div>
                <div class="TabbedPanelsContent">
                  <h3>Edit Staff information</h3><font color="#FF0000"> '; echo $reportadded; ;echo ' </font>  
<form action="" method="post" enctype="multipart/form-data">
<div class="fm1"> <p>Personal Data </p>      
<p><input name="firstname" class="form-control" value="'; echo ucfirst($row['firstname']); ;echo '" >
</p>
<p><input name="surname" class="form-control" value="'; echo ucfirst($row['surname']); ;echo '">
</p>
<p><input name="othername" class="form-control" value="'; echo ucfirst($row['othername']); ;echo '" >
</p>
<p><label>Sex</label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline1" value="male" '; if($row['sex']=='male'){ ;echo ' checked '; } ;echo ' > Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="optionsRadiosInline2" value="female"  '; if($row['sex']=='female'){ ;echo ' checked '; } ;echo '> Female
                </label>
</p>
<p><input name="dob" class="form-control" value="'; echo $row['dob']; ;echo '" ></p>
<p><input name="phone" class="form-control" value="'; echo $row['phone']; ;echo '" ></p>
<p><input name="email" class="form-control" value="'; echo ucfirst($row['email']); ;echo '" ></p>
<p><input name="address" class="form-control" value="'; echo ucfirst($row['address']); ;echo '" ></p>

</div>

<div class="fm1"> <p>Appointment Data</p>
<p><input name="id" class="form-control"  value="'; echo ucfirst($row['id']); ;echo '" ></p>
<p><input name="apdate" class="form-control" value="'; echo $row['apdate']; ;echo '" ></p>
<p><input name="discipline" class="form-control" value="'; echo ucfirst($row['discipline']); ;echo '" ></p>
<p><input name="qualification" class="form-control" value="'; echo ucfirst($row['qualification']); ;echo '" ></p>
<p><input name="designation" class="form-control" value="'; echo ucfirst($row['designation']); ;echo '" ></p>
<p><input name="assignment" class="form-control" value="'; echo ucfirst($row['assignment']); ;echo '" ></p>
<p><input name="salary" class="form-control" value="'; echo ucfirst($row['salary']); ;echo '" placeholder="Monthly Salary" ></p>
<p>
<input name="other" class="form-control" value="'; echo ucfirst($row['other']); ;echo '" placeholder="Other Information" ></p>

<p style="float:right">
<button type="reset" class="btn btn-default">Reset Form</button>
<button type="submit" class="btn btn-default" name="edit">Edit Staff Info</button>
              
</p>  

</div>
</form>

<div class="fm4"> 
                           <b> UPLOAD/UPDATE PROFILE PHOTOGRAPH </b>
                           
                           <p><img src="upload/'; echo $row['photo'];  ;echo '" width="120" height="150" /> </p>
						   ';
   //$no==$_FILES["image"]["name"];
   if(array_key_exists('submit', $_POST)){
	// echo $_FILES["image"]["name"];

	  $name = $sn.'-'.$_FILES['image']['name'];
	  define('upload', 'upload/');
	 $success = move_uploaded_file($_FILES['image']['tmp_name'], upload.$name);
	 
$sqlw = mysql_query("UPDATE staff SET photo = '$name' WHERE sn = '$sn' LIMIT 1") or die(mysql_error());
   }
;echo '
<form method="post" enctype="multipart/form-data">
   <input class="btn btn-warning" type="file" name="image" /> <br>
   <input class="btn btn-primary" type="submit" name="submit" value="UPLOAD PHOTO">
</form> 

'; 
 if(isset($success)){
	   echo 'upload was succesful!'.'<br>'.'This is the new Image ';
;echo '     <img src="upload/'; echo $name;  ;echo '" width="150" height="180" />
     '; 	  
   }
;echo '                             </div>
                </div>
                <div class="TabbedPanelsContent">
                
                
                <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                          <font color="#FF0000"> '; echo $reportadded; ;echo ' </font>
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Payment Id</th>
                                            <th>Amount</th>
                                            <th>Purpose</th>
                                            <th>Description</th>
                                            <th>Month</th>
                                            <th>Date/Time</th>
                                            <th>Paid By</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM salary WHERE id = '$sn' ORDER BY id DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
                                            <td>'; echo ucfirst($row['amount']) ;echo '</td>
                                            
                                            <td>'; echo $row['purpose'] ;echo '</td>
                                            <td class="center">'; echo $row['des'] ;echo '</td>
                                            <td class="center">'; echo $row['month'] ;echo '</td>
       <td class="center">'; echo $row['created'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                               
                                       <tr>     <td bgcolor="#99CC66"><b>Total Advance:</b></td>
                                            
                                          <td bgcolor="#99CC66"><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td> 
                            <td> </td>
                                            <td bgcolor="#FF99CC"> <b>Current Month Advance:</b></td>
                            <td bgcolor="#FF99CC"><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM salary WHERE id = '$sn' AND month = '$mm' AND purpose = 'advance' "); 
$rowa = mysql_fetch_assoc($result); 
$sumb = $rowa['value_sum'];

echo $sumb ;
					  ;echo '                            </b></td>
                            <td bgcolor="#66FF66"><b>
                              Current Salary Due:
                            </b></td>
                            
                                            <td bgcolor="#66FF66"><b>'; $bal=$salary-$sumb; echo $bal ;;echo ' </b></td>
                                      </tr>
                                    </tbody>
                            </table>
                            
                    
                            
                          </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
                
                
                </div>
                <div class="TabbedPanelsContent">
                 <p></p> 

<table style="margin-left:200px; width:600px;" width="600" class="table table-striped table-bordered table-hover" id="dataTables-example"><tr><td colspan="4"><h3>'; echo date('F, Y') ; ;echo ' Pay Slip</h3><br>Pay Slip ID: <b>'; echo $idd.'/'.date(dm) ;  ;echo '</b></td></tr><tr><td colspan="4"><h4>Main Salary</h4></td></tr>

<tr style="font-weight:bold"><td>Month</td><td>Basic Salary</td><td>Salary Advance</td><td>Salary Due</td></tr>
<tr><td>'; echo $mm ; ;echo '</td><td>'; echo $salary ; ;echo '</td><td>'; echo $sumb ; ;echo '</td><td>'; echo $bal ; ;echo '</td></tr></table>

<table style="margin-left:200px; width:600px;" width="500" class="table table-striped table-bordered table-hover" id="dataTables-example"><tr><td colspan="4"><h4>Other Allowances</h4></td></tr>
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
                      
                      <table style="margin-left:200px; width:600px;" width="500" class="table table-striped table-bordered table-hover" id="dataTables-example"><tr><td colspan="4"><h4>Total Remuneration</h4></td></tr>
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
</p><a href="payslip.php" target="_blank">PRINT PAYSLIP</a>
                 
                </div>
                <div class="TabbedPanelsContent">
                
                
                  <div class="panel-body">
                                                    
                                           
                                            
 
                            
                            </div>
              </div>
            </div>
            </div>
            
            
       
            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:3});
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
