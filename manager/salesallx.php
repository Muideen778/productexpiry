<?php 
error_reporting(0);
    session_start(); ob_start();
if(!isset($_SESSION['admin'])){
   header("location: index.php");
     exit;
	}$rep = $_SESSION['admin'];
	  $tm = $_SESSION['tm'];
	  $term = $_SESSION['term'];$year = $_SESSION['year'];
	  
	  $sender = urlencode($_SESSION['senderid']);
	  $userid = urlencode($_SESSION['userid']);
	  $pwd = $_SESSION['pwd'];
	  $phn = $_SESSION['phn'];    $salesid = $_SESSION['salesid'] ;
	  


include("includes/connect.inc.php");

		
	/*  $dd = date('d') ;
	  $yy = date('y');
	  $mm = date('m') ;
	 $ww = date('W');	
	  $today = date('ymd');
	*/ 	
		$item = $_GET['pid'];
		

	 
	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $cp = $rowx['cp'];
	 $cp1 = $cp/2;
	 $cp2 = $cp*2;
if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt>$cp && $qt<=$cp2){ $sta = 'Getting Critical' ; $color = 'blue' ;} elseif($qt>$cp1 && $qt<=$cp){ $sta = 'Critical' ; $color = 'purple';} elseif($qt>0 && $qt<=$cp1){ $sta = 'Very Critical' ; $color = '#900';} elseif($qt>$cp2){ $sta = 'OK' ; $color = 'green';} elseif($qt<0){ $sta = 'Negative' ; $color = 'black';} 
	

if(array_key_exists('sales', $_POST)){
	

	 $dd = $_POST['dd'] ;
	 $_SESSION['d']=$dd;
	 
	  $yy = $_POST['yy'] ;
	  $_SESSION['y']=$yy;
	  
	  $mm = $_POST['mm'] ;
	  $_SESSION['m']=$mm;
	  
	   $today = $yy.$mm.$dd;
	 $ww = date('W');
	  
	 	
$item2 = $_POST['item2'];
$des = $_POST['des'];

$qty = $_POST['qty'];
$price = $_POST['price'];
$cash = $_POST['cash'];
$discount = $_POST['discount'];
$other = $_POST['other'];

$amount = $qty*$price; 

 
$sqlx =" SELECT * FROM stock WHERE item = '$item2' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 $rowx = mysql_fetch_assoc($resultx);
	 
   $sprice = $rowx['sprice'] ;
     $qty1 = $rowx['qty'] ;
   $qty2 = $qty1-$qty ;	
			  
	if($qty1<1){ $erqty = 'Sorry! this item is no longer available in the store. Please contact the manager' ; } 
	elseif($qty1<$qty){	$erqty = 'Oh sorry! available quantity is less than the specified quantity. You can take '.$qty1.' units or less.' ;}
	
	else{ 	  
$sql = "INSERT INTO transact (salesid,id,phone,item,des,cat,qty,sprice,price,amount,cash,other,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$id','$phone','$item2','$des','$item2','$qty','$sprice','$price','$amount','$cash','$other','$rep','$today','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Student Data Successfully Added!";


   
$sqlk = "UPDATE stock SET qty = '$qty2' WHERE item = '$item2' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());

}

}}
		
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School Manager</title>

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
.fm1{
color:#033;
width:45%;
float:left; 
margin-right:20px;
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

sta{background-color:<?php echo $color  ;?>;
color:#FFF;
padding:3px 10px; border-radius:5px;

}

  </style>
  
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

        $(".js-calc").keyup(function(){

            var val1 = parseInt($("#qty").val());
            var val2 = parseInt($("#price").val());

            if ( ! isNaN(val1) && ! isNaN(val2))
            {
                 $("#result").text(val1 * val2);
            }
        });

    });



    </script>
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
          <img src="tlog.png" width="200"  >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     <?php    include('nav2.php') ;  ?>
     
     <?php     require('nav1.php') ;  ?>
     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

          <div class="col-lg-12">
            <h1><small>New Sales Transaction</small></h1> 
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">New Transaction</li>
                <li class="TabbedPanelsTab" tabindex="0">Recent Transactions</li>
</ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <?php $queryg=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 1 " );
$num = mysql_num_rows($queryg); 
 if($num<1){ ?>
                  <div class="fm1">
                  <iframe src="search/index.php" width="100%" height="200" style="border:none"></iframe>
                    <h3>Sales information</h3>
                    <font color="green"><?php echo $er; ?></font>
                    <table>
                      <tr>
                        <td><form id="myform" method="post">
                          <p>
                            <select name="item" class="form-control" style = 'position: relative' onchange="change()">
                              <option>Select Product</option>
                              <?php 
							$query=mysql_query("select * FROM stock ORDER BY item ASC LIMIT 0 , 200001" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
						
							?>
                              <option value="<?php echo $row['sn'] ?>" <?php if($row['sn']==$item){ echo 'selected' ; } ?>><?php echo $row['item'] ?></option>
                              <?php } ?>
                            </select>
                          </form>
                          <script>
function change(){
    document.getElementById("myform").submit();
}
                  </script></td>
                        <td>&nbsp;&nbsp;
                          <?php if(isset($item)){ ?>
                          <sta> <?php echo $sta ; ?></sta>
                          <p></p>
                          <?php  }  ?></td>
                      </tr>
                    </table>
                    <form action="" method="post" enctype="multipart/form-data" name="myFormName">
                      <p>                
                      <table width="100%">
                        <tr>
                          <td><b>Date:</b></td>
                          <td><select name="dd" class="form-control">
                            
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                            <option <?php if(!isset($_SESSION['d'])){ echo 'selected' ;} ?>><?php echo date('d'); ?></option>
                            <option <?php if(isset($_SESSION['d'])){ echo 'selected' ;} ?> ><?php echo $_SESSION['d']; ?></option>
                          </select></td>
                          <td><select name="mm" class="form-control">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option <?php if(!isset($_SESSION['m'])){ echo 'selected' ;} ?>><?php echo date('m'); ?></option>
                            <option <?php if(isset($_SESSION['m'])){ echo 'selected' ;} ?> ><?php echo $_SESSION['m']; ?></option>
                          </select></td>
                          <td><select name="yy" class="form-control">
                            
                           
                            <option value="<?php echo date('y')-1; ?>"><?php echo date('Y')-1; ?></option>
                            <option selected value="<?php echo date('y'); ?>"><?php echo date('Y'); ?></option>
                          </select></td>
                        </tr>
                      </table>
                      <p></p>
                      <p> <strong>Item:</strong>
                        <select name="item2" class="form-control" ><option><?php echo $rowx['item']; ?></option></select>
                      </p>
                      <p><table><tr><td><strong>Price:</strong>
                      <input name="price" id="price" class="js-calc form-control" value="<?php echo $rowx['price']; ?>"  placeholder="Price"><br></td><td>
                       <b>Quantity:</b>
                        <input name="qty" id="qty" class="js-calc form-control" value="1" >
                        Stock Quantity:
                        <b><?php if($rowx['qty']<1){echo "Out of Stock" ;} else{ echo $rowx['qty']; }?></b></td></tr></table>
                      </p>
                      <p><table><tr><td><strong>Cash Paid:</strong>
                      <input name="cash" id="price" class="js-calc form-control" value="<?php echo $rowx['price']; ?>"  placeholder="Price"></td><td><strong>Discount:</strong>
                      <input name="discount"  class="js-calc form-control" value="0"  placeholder="Discount"></td></tr></table>
                      </p>               
                      <p> Sub Total (N): <strong><span id="result"></span></strong> </p>
                      <p style="float:right">
                        <button type="reset" class="btn btn-default">Reset Form</button>
                        <button type="submit" class="btn btn-default" name="sales">Add Item</button>
                      </p>
                    </form>
    <script type="text/javascript">

$(function () {
    $('#myFormName').on('submit',function (e) {

              $.ajax({
                type: 'post',
                url: 'salesall.php',
                data: $('#myFormName').serialize(),
                success: function () {
                 alert("Email has been sent!");
                }
              });
          e.preventDefault();
        });
});


    </script>                    
                    <font color="red" ><strong><?php echo $erqty ; ?></strong></font>
                  </div>
                  <div class="fm1">
                    <table class="table table-striped table-bordered table-hover" >
                      <thead>
                        <tr>
                          <td colspan="2"> <form action="" method="post" enctype="multipart/form-data">
                            Bill To: <br>
                            <select name="id" style="width:100%">
                              <option value="0"></option>
                              <?php 
							$query=mysql_query("select * FROM client " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
						
							?>
                              <option value="<?php echo $row['id'] ?>" <?php if($_SESSION['id']==$row['id']){ echo 'selected' ;} ?> ><?php echo $row['surname'].' '.$row['firstname'].', '.$row['class']; ?></option>
                              <?php }  ?>
                            </select>
                            <br> <?php $qued=mysql_query("select * FROM transact2 ORDER BY sn DESC LIMIT 1 " )or die(mysql_error());
			$rod=mysql_fetch_array($qued); ?>
                            Invoice No: <b>
                              <input name="inv" value="<?php echo $rod['inv']+1 ; ?>">
                          </td> 
                          <td colspan="3">
                              </b> Send SMS &nbsp;&nbsp;&nbsp;&nbsp;<input name="sms" type="radio" value="1">Yes&nbsp;&nbsp;&nbsp;<input name="sms" type="radio" value="0" checked>No
                            <br><br><br>
                            <button type="submit" class="btn btn-default" name="out">Check Out</button></form></td>
                        </tr>
                        <tr>
                          <th>QTY</th>
                          <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                          <th>REMOVE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							
							?>
                        <tr class="odd gradeX">
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center"><?php echo $row['price'] ?></td>
                          <td class="center"><?php echo $row['amount'] ?></td>
                          <td class="center"><a href="rem.php?sn=<?php echo $row['sn'] ?>"><i class="btn btn-success btn-xs">Remove</i></a></td>
                        </tr>
                        <?php  } ?>
                        <tr>
                          <td><b>Total:</b></td>
                          <td></td>
                          <td></td>
                          <td><b>
                            <?php  

echo $sum ;
					  ?>
                          </b></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php   

if(array_key_exists('out', $_POST)){
	

$id = $_POST['id'];

$_SESSION['id'] = $id ;


 $dd = $_SESSION['d'] ;
	  $yy = $_SESSION['y'] ;
	  $mm = $_SESSION['m'] ;
	   $today = $yy.$mm.$dd;
	 $ww = date('W');	
	 
	  if($id=='0'){ $err = 'Please Select Student' ;} else{
	  
		     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $surname = $row['surname'];
	  $firstname = $row['firstname'];
	  $midname = $row['midname'];
	   $class = $row['class'];  $level = substr($class, 0,3);
	 $phone = $row['phone'];
 $tno = $row['tno'];
   $tno2 = $tno+1;
   
$amt = $_POST['amt'];
$inv = $_POST['inv'];
$dis = $_POST['dis'];

$sqlx = "INSERT INTO transact2 (salesid,inv,id,surname,firstname,midname,class,amount,discount,cash,rep,today,dd,mm,yy,ww,tm,term,year)
VALUES('$salesid','$inv','$id','$surname','$firstname','$midname','$class','$sum','$dis','$amt','$rep','$today','$dd','$mm','$yy','$ww','$tm','$term','$year')";
$res2 = mysql_query($sqlx) or die(mysql_error());

$tran = mysql_query("UPDATE transact SET surname = '$surname', firstname = '$firstname', id = '$id', midname = '$midname', phone = '$phone', class = '$class' WHERE salesid = '$salesid' ") or die(mysql_error());


$tran = mysql_query("UPDATE income SET surname = '$surname', firstname = '$firstname', id = '$id', midname = '$midname', phone = '$phone', class = '$class' WHERE salesid = '$salesid' ") or die(mysql_error());



$sms = $_POST['sms'];
if($sms==1){  	$senderid = 'DEIS Minna' ;
 	$msg = "Thank you ".ucfirst($name)." for buying from ".$senderid.".We appreciate your patronage,hope to see you again.Our hotline is 08032318588"  ;

 $msg2 = urlencode($msg);
 
 $url = "http://www.trenetsms.com/components/com_spc/smsapi.php?username=$userid&password=$pwd&sender=$sender&recipient=$phone&message=$msg1" ;
   
$ret = file($url);

if($ret){
	$status = "Sent" ; $er="SMS has been sent to this Student!";} else { $status = "Not Sent"; $er="SMS was not sent. You can resend it later!";}
$name=$surname.' '.$firstname.' '.$class;
	$sql5 = "INSERT INTO smsrec (recip,phone,msg,count,rep,today,category,item,status)
VALUES('$name','$phone','$msg','1','$rep','$today','Transaction','$item','$status')";
$res5 = mysql_query($sql5) or die(mysql_error());


}

      echo "<script type=\"text/javascript\">
    alert(\"Transaction Complete! ".$er." View Invoice\");
    window.location = \"salesall.php\"
    </script>";
} }
?>
                    <font color="#00CC00" size="+2"> <b><?php echo $err ; ?></b></font> </div>
                  
                  <?php  }  else{  ?>
                  <div class="fm1" style="font:Courier New">
                    <table style="font-size:12px;" >
                      <thead>
                        <tr>
                          <td colspan="5"><h3><?php $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); echo $r['name']; ?></h3><br>
                                              <?php echo $r['address']; ?><br>
                                            <?php echo $r['phone']; ?>, <?php echo $r['email']; ?>. <?php echo $r['website']; ?></td>
                        </tr>
                        <tr>
                          <td colspan="5"> <br>Student Name:
<b>                            <?php $query=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 1 " )or die(mysql_error());
$rowt=mysql_fetch_array($query) ; echo $rowt['surname'].' '.$rowt['firstname'].', '.$rowt['class'];; ?></b>
                            <br>
                            Invoice No:
                            <?php  echo $rowt['inv']; ?>
                            <br>
                            Date: <?php echo date(d.'-'.m.'-'.Y); ?><br></td>
                        </tr>
                      <td colspan="6"><strong>Sales Invoice</strong></td>
      <tr>
                                        <th width="49">S/N</th>
                                        <th width="46">Item</th>
                                        <th width="48">Qty</th>
                                        <th width="52">Price</th>
                                        <th width="51">Amount</th>
                                      </tr>
                      <tbody>
                        <?php 
		 $i = 1 ;
							$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
						 $e = $i++ ;	
							?>
                        <tr>
                          <td class="center"><?php echo $e ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td><?php echo $row['qty'] ?></td>
                          <td class="center"><?php echo $row['price'] ?></td>
                          <td class="center"><?php echo $row['amount'] ?></td>
                        </tr>
                        <?php  } ?>
                        <tr>
                          <td colspan="4"><b>Sub-Total:<br>
                            Discount:<br>
                            Total Amount:</b></td>
                          <td><b>NGN
                            <?php     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo $sum2 ;
					  ?>
                            <br>
                            NGN <?php $result = mysql_query("SELECT SUM(discount) AS value_sum FROM transact WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum3 = $rowa['value_sum'];

echo $sum3 ;  ;
					  ?> <br>
                            NGN <?php $sum4=$sum2-$sum3 ; echo $sum4   ;
					  ?></b><br>
                            <br></td>
                        </tr>
                        <tr>
                          <td colspan="5"></td>
                        </tr>
                        <tr>
                          <td colspan="5"><p>Paid: <b>NGN <?php $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum5 = $rowa['value_sum'];

echo $sum5 ;
					  ?></b><br>
                            Change: NGN
                            <?php $ch = $sum5-$sum4; if($ch>0){echo $ch; } else{ echo '0.00';} ?>
                            <br>
                            Balance: NGN
                            <?php $bal = $sum4-$sum5; if($bal>0){echo $bal; } else{ echo '0.00';} ?>
                            <br>
                            Served by: <?php echo ucfirst($rep); ?><br>
                            <br>
                            God bless you. Please call again<br>
                          </p></td>
                        </tr>
                      </tbody>
                    </table>
                    <div style="float:left"><a href="profileinv.php?sn=<?php echo $rowt['sn'] ?>"><i class="btn btn-warning btn-xs">Print Invoice</i></a></div>
                    <div style="float:right"><a href="modify.php?sn=<?php echo $rowt['sn'] ?>"><i class="btn btn-primary btn-xs">Modify Transastion</i></a></div>
                  </div>
                  <?php  }  ?>
                </div>
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body"> <font color="green"> <?php echo $reportadded; ?></font>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Cash Paid</th>
                            <th>Balance</th>
                            <th>Date</th>
                            <th>Term</th>
                            <th>Sold By</th>
                            <th>Remark</th>
                            <th>Invoice No</th>
                            <th>Invoice</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;
							$query=mysql_query("select * FROM transact2 ORDER BY sn DESC LIMIT 0, 20" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							$e=$i++ ;
							?>
                          <tr class="odd gradeX">
                            <td class="center"><?php echo $e ?></td>
                            <td><a href="profilei.php?id=<?php echo $row['id'] ?>"><i class="btn btn-success btn-xs"><?php echo ucfirst($row['surname']).' '.ucfirst($row['firstname']).' '.ucfirst($row['class']) ?></i></a></td>
                            <td class="center"><?php $sales = $row['salesid'];  $result = mysql_query("SELECT SUM(amount-discount) AS value_sum FROM transact WHERE salesid = '$sales' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo $sum2 ; ?></td>
                            <td><?php $sales = $row['salesid'];  $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact WHERE salesid = '$sales' "); 
$rowa = mysql_fetch_assoc($result); 
$sum3 = $rowa['value_sum'];

echo $sum3 ; ?></td>
                            <td><?php echo $sum2-$sum3 ?></td>
                            <td class="center"><?php echo $row['dd'].'-'.$row['mm'].'-'.$row['yy'] ?></td>
                            <td class="center"><?php echo $row['term'].' '.$row['year'] ?></td>
                            <td class="center"><?php echo ucfirst($row['rep']) ?></td>
                            <td class="center"><?php if($sum2-$sum3<=0){ ?>
                              <i class="btn btn-primary btn-xs">Cleared</i>
                              <?php } elseif($sum2-$sum3>0){ ?>
                              <i class="btn btn-danger btn-xs">Owing</i>
                              <?php }?></td>
                            <td><?php echo $row['inv'] ?></td>
                            <td><a href="profileinv.php?sn=<?php echo $row['inv'] ?>"><i class="btn btn-warning btn-xs">Invoice</i></a></td>
                          </tr>
                          <?php  } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
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
        $('#dataTables-example').dataTable();
    });
    </script>
    
    
  </body>
</html>