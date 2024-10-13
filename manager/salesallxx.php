<?php
 
error_reporting(0);
    session_start();
if(!isset($_SESSION['admin'])){
   header("location: index.php");
     exit;
	}
	
	
	
	  $rep = $_SESSION['admin'];
	  
	   $salesid = $_SESSION['salesid'] ;
	  


include("includes/connect.inc.php");

		
	  $dd = $_POST['dd'] ;
	  $yy = $_POST['yy'] ;
	  $mm = $_POST['mm'] ;
	   $todayy = $yy.$mm.$dd;
	 $ww = date('W');	
	 
	  $today = date('ymd');
	 	
	if($_POST){	$item = $_POST['item']; }
		
	/*			$item2 = $_POST['item2'];
		
	 	    $sqls =" SELECT * FROM stock WHERE item = '$item' LIMIT 1";
     $results = mysql_query($sqls) or die (mysql_error());
	 $rows = mysql_fetch_assoc($results);		

*/
			 

if(array_key_exists('sales', $_POST)){	 
	 
	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $cp = $rowx['cp'];
	 $cp1 = $cp/2;
	 $cp2 = $cp*2;
if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt>$cp && $qt<=$cp2){ $sta = 'Getting Critical' ; $color = 'blue' ;} elseif($qt>$cp1 && $qt<=$cp){ $sta = 'Critical' ; $color = 'purple';} elseif($qt>0 && $qt<=$cp1){ $sta = 'Very Critical' ; $color = '#900';} elseif($qt>$cp2){ $sta = 'OK' ; $color = 'green';} elseif($qt<0){ $sta = 'Negative' ; $color = 'black';} 
	


	

	 
	 	
$item2 = $_POST['item2'];
$des = $_POST['des'];

$qty = $_POST['qty'];
$price = $_POST['price'];
$other = $_POST['other'];
$amount = $qty*$price; 


   
	$senderid = 'LumenChris' ;
	
	

	$msg = "Thank you ".ucfirst($name)." for buying ".$item2." from ".$senderid.".We appreciate your patronage,hope to see you again.Our hotline is 08034100823"  ;

 $msg2 = urlencode($msg);

			  
$sql = "INSERT INTO transact (salesid,id,name,phone,item,des,cat,qty,price,amount,balance,other,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$id','$name','$phone','$item2','$des','$item2','$qty','$price','$amount','$amount','$other','$rep','$todayy','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){


$reportadded="Customer Data Successfully Added!";



$sqlx =" SELECT * FROM stock WHERE item = '$item2' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 $rowx = mysql_fetch_assoc($resultx);
	 
   $qty1 = $rowx['qty'] ;
   $qty2 = $qty1-$qty ;	
   
$sqlk = "UPDATE stock SET qty = '$qty2' WHERE item = '$item2' LIMIT 1" ;
$resk = mysql_query($sqlk) or die(mysql_error());


  



}}
		
		
if(array_key_exists('new', $_POST)){
	

$na = $_POST['na'];

$pn = $_POST['pn'];

			  
$sql = "INSERT INTO client (name,phone,today,rep)
VALUES('$na','$pn','$today','$rep')";
$res2 = mysql_query($sql) or die(mysql_error());

if($res2){
	


$reportnew="Customer Data Successfully Added!";




   			}}

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

sta{background-color:'; echo $color  ;;echo ';
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
          <img src="tlog.png" width="220" >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


     ';    include('nav2.php') ;  ;echo '     
     ';     require('nav1.php') ;  ;echo '     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

          <div class="col-lg-12">
            <h1><small><a href="salesid.php">New Transaction</a></small></h1> 
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
<li class="TabbedPanelsTab" tabindex="0">Recent Transactions</li>
                <li class="TabbedPanelsTab" tabindex="0">New Transaction</li>
</ul>
              <div class="TabbedPanelsContentGroup">
<div class="TabbedPanelsContent">
                
                
              <!-- /.panel-heading -->
                        
                <div class="panel-body">
                                                    
                          <font color="#FF0000"> </font>
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
                                            <th>Sold By</th>
                                            <th>Pay Cash</th>
                                            <th>Invoice No</th>
                                            <th>Invoice</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; $i=1;
							$query=mysql_query("select * FROM transact2 ORDER BY sn DESC LIMIT 0 , 30" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							$e=$i++ ;
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $e ;echo '</td>
                                            <td>'; echo ucfirst($row['name']) ;echo '</td>
                                            
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                   <td>'; echo $row['cash'] ;echo '</td>
                                    <td>'; echo $row['amount']-$row['cash'] ;echo '</td>         <td class="center">'; echo $row['dd'].'-'.$row['mm'].'-'.$row['yy'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                            <td class="center">'; if($row['amount']-$row['cash']!=0){ ;echo '                              <a href="paydebt.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">Pay Cash</i></a>
                              '; };echo '</td>
                              <td>'; echo $row['inv'] ;echo '</td>
                              <td> <a href="profileinv.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-warning btn-xs">Invoice</i></a></td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            
                                            <td> </td>
                                          <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact2 WHERE today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td> 
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(cash) AS value_sum FROM transact2 WHERE today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            <td><b>
                              ';     $result = mysql_query("SELECT SUM(amount-cash) AS value_sum FROM transact2 WHERE today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ;
					  ;echo '                            </b></td>
                            
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                             <td> </td>
                                      </tr>
                                    </tbody>
                            </table>
                            
                    
                            
                          </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
                
                
                </div>
                <div class="TabbedPanelsContent">
                
                
                '; $queryg=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' AND today = '$today' ORDER BY sn ASC LIMIT 1 " );
$num = mysql_num_rows($queryg); 
 if($num<1){ ;echo '                
                  <div class="fm1">
                    <h3>Sales information</h3>
                    <font color="#FF0000"></font>
                    <table><tr><td>
                                        <form id="myform" method="post">
                      <p>
                        <select name="item" class="form-control" style = \'position: relative\' onchange="change()">
                        <option>Select Product</option>
                 '; if(isset($item)){ ;echo '       <option selected>'; echo $item; ;echo '</option>  '; } ;echo '                        
                        '; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
						
							;echo '                            <option value="'; echo $row['sn'] ;echo '" '; if($row['sn']==$item){ echo 'selected' ; } ;echo '>'; echo $row['item'] ;echo '</option>
                            '; } ;echo '                        </select>
                        
                        </form>

<script>
function change(){
    document.getElementById("myform").submit();
}
</script>
 </td><td>    &nbsp;&nbsp;                  
                   '; if(isset($item)){ ;echo '   <sta> '; echo $sta ; ;echo '</sta> </p>   ';  }  ;echo '</td></tr></table>
                                       
                    <form action="" method="post" enctype="multipart/form-data"><p>
                    <table width="100%">
                        <tr><td><b>Date:</b></td><td><select name="dd" class="form-control">
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
                        <option selected>'; echo date('d'); ;echo '</option>
                        
                        </select></td><td>
                        <select name="mm" class="form-control">
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
                        <option selected>'; echo date('m'); ;echo '</option>
                        </select></td><td>
                        <select name="yy" class="form-control">
                        <option value="10">2010</option>
                        <option value="11">2011</option>
                        <option value="12">2012</option>
                        <option value="13">2013</option>
                        <option value="14">2014</option>
                        <option selected value="'; echo date('y'); ;echo '">'; echo date('Y'); ;echo '</option>
                        </select>
                        </td></tr></table></p>
                      <p>
 						<strong>Item:</strong><input name="item2" class="form-control" value="'; echo $rowx['item']; ;echo '" placeholder="Item" >
                      </p>
                     
                     
                        <strong>Price:</strong><input name="price" id="price" class="js-calc form-control" value="'; echo $rowx['price']; ;echo '"  placeholder="Price">
                      </p>
                       <p>
                        Quantity:<input name="qty" id="qty" class="js-calc form-control" value="1" >
                      Stock Quantity: '; if($rowx['qty']<1){echo "Out of Stock" ;} else{ echo $rowx['qty']; };echo '</p>
                      <p>
                      <p>
                        Sub Total (N):  <strong><span id="result"></span></strong>
                      </p>
                      <p style="float:right">
                        <button type="reset" class="btn btn-default">Reset Form</button>
                        <button type="submit" class="btn btn-primary" name="sales">Add Item</button>
                      </p>
                    </form>
    
                  </div>
                  
                  <div class="fm1">
                 
                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                           <tr>
                                    <td colspan="2">
                                 <form action="" method="post" enctype="multipart/form-data">   Bill To: <br>
                                     <select name="id" style="width:100%">
                       
                
                        <option></option>
                        '; 
							$query=mysql_query("select * FROM client ORDER BY name ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
						
							;echo '                            <option value="'; echo $row['id'] ;echo '" >'; echo $row['name'] ;echo '</option>
                            '; }     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE salesid = '$salesid' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];  ;echo '                        
                                    </select><br>
                                    Tendered Amount(N):<input name="amt" value="'; echo $sum ; ;echo '">
                                    </td>
                                    
                                    <td colspan="3">'; $qued=mysql_query("select * FROM transact2 ORDER BY sn DESC LIMIT 1 " )or die(mysql_error());
			$rod=mysql_fetch_array($qued); ;echo '                                   Invoice No: <b><input name="inv" value="'; echo $rod['inv']+1 ; ;echo '"></b> <br><br>
                                   <button type="submit" class="btn btn-primary" name="out">Check Out</button></form></td>
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
                                     '; 
							$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' ORDER BY sn ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['qty'] ;echo '</td>
                                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                                            <td class="center">'; echo $row['price'] ;echo '</td>
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                   
                                    <td class="center">               <a href="rem.php?sn='; echo $row['sn'] ;echo '"><i class="btn btn-success btn-xs">Remove</i></a>
                          </td>
                                      </tr>
                                         ';  } ;echo '                                         
                                                                                 <tr>
                                            <td><b>Total:</b></td>
                                            <td> </td>
                                            <td> </td>
                                           
                                          <td><b>
                              ';  

echo $sum ;
					  ;echo '                            </b></td> 
                         
                            
                                            <td> </td>
                                      </tr>
                                      
                               

                                    </tbody>
                            </table>
';   

if(array_key_exists('out', $_POST)){
	

$id = $_POST['id'];


 $dd = date('d') ;
	  $yy = date('y') ;
	  $mm = date('m') ;
	   $todayy = $yy.$mm.$dd;
	 $ww = date('W');	
	 
	  $today = date('ymd');
	  
	  
		     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);
	 
	 $name = $row['name'];
 $tno = $row['tno'];
   $tno2 = $tno+1;
   
$amt = $_POST['amt'];
$inv = $_POST['inv'];

$sqlx = "INSERT INTO transact2 (salesid,inv,id,name,amount,cash,rep,today,dd,mm,yy,ww)
VALUES('$salesid','$inv','$id','$name','$sum','$amt','$rep','$todayy','$dd','$mm','$yy','$ww')";
$res2 = mysql_query($sqlx) or die(mysql_error());


$sql3 = "UPDATE client SET tno = '$tno2' WHERE id = '$id3' LIMIT 1" ;
$res3 = mysql_query($sql3) or die(mysql_error());

$tran = 'Transaction Complete! Refresh Page to view and Print Invoice (F5)' ;


}

;echo '
 <font color="#00CC00"> '; echo $tran ; ;echo '</font>
                  </div>
                  
                  
                  <div class="fm1">
                 <font color="#00CC00"> '; echo $reportnew ; ;echo '</font>
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Add New Customer</th></tr></thead>
                                            <tbody>
                                             <form action="" method="post" enctype="multipart/form-data">
                                             <tr>
                                            <td><input name="na" placeholder="Name"></td>
                                            <td><input name="pn" placeholder="Phone Number"></td>
                                            <td> <button type="submit" class="btn btn-primary" name="new">Add Customer</button></form></td>
                                            </tr></tbody></table>
                  
                  </div>
                 ';  }  else{  ;echo '                  
                  <div class="fm1">
                  <table style="font-size:10px;" >
                                    <thead>
                                        <tr>
                                            <td colspan="5"><strong><font size="2">'; $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); echo $r['name']; ;echo '</font></strong><br>
                                              '; echo $r['address']; ;echo '<br>
                                            '; echo $r['phone']; ;echo ', '; echo $r['email']; ;echo '. '; echo $r['website']; ;echo '<br><br>
                                            </td>
                                            
                                            
                                      </tr>
                                      
                                       <tr>
                                            <td colspan="5">
                                              Customer Name: '; $query=mysql_query("select * FROM transact2 WHERE salesid = '$salesid' AND today = '$today' ORDER BY sn ASC LIMIT 1 " )or die(mysql_error());
$rowt=mysql_fetch_array($query) ; echo $rowt['name']; ;echo '<br>
                                              
Invoice No: 
                                              ';  echo $rowt['inv']; ;echo ' 
TN: '; echo $rowt['sn']; ;echo '<br>
Date: '; echo date(d.'-'.m.'-'.Y); ;echo '<br>
                                            
                                           
                                            
                                            </td>
                                            
                          

                                          
                                      </tr>
                                      <td colspan="6">
                                        <strong>Sales Invoice</strong>
                                      </td>
                                      
                                       <tr>
                                            <th width="49">S/N</th>
                                            <th width="46">Item</th>
                                            <th width="48">Qty</th>
                                            <th width="52">Price</th>
                                            <th width="51">Amount</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
		 $i = 1 ;
							$query=mysql_query("select * FROM transact WHERE salesid = '$salesid' AND today = '$today' ORDER BY sn ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
						 $e = $i++ ;	
							;echo '							
							
                           
                            

                                  <tr>
                                            <td class="center">'; echo $e ;echo '</td>
                                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                                            <td>'; echo $row['qty'] ;echo '</td>
                                            <td class="center">'; echo $row['price'] ;echo '</td>
                                            <td class="center">'; echo $row['amount'] ;echo '</td>
                                           
                                      </tr>
                                         ';  } ;echo '                                         
                                        <tr>
                                            <td colspan="4"><b>Sub-Total:<br>
                                            Discount:<br>
                                            
                                           
                                            
                                            Total Amount:</b></td>
                                            
                                           <td><b>NGN ';     $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE salesid = '$salesid' AND today = '$today' "); 
$rowa = mysql_fetch_assoc($result); 
$sum2 = $rowa['value_sum'];

echo $sum2 ;
					  ;echo '<br>NGN 0<br>NGN '; echo $sum2 ;
					  ;echo '</b></td>
                                          
                                      </tr>
                                      
                                      <tr>
                                            <td colspan="5"> </td>
                                            
                                           
                                      </tr><tr>
                                            
                                            
                                          
                                           <td colspan="5">
                                             <p>Paid:  <b>NGN '; echo $sum2 ;
					  ;echo '</b><br>
                                             Change: NGN 0<br>
                                             Balance: NGN '; echo $rowt['amount']-$rowt['cash']; ;echo '<br>                                             
Served by: '; echo ucfirst($rep); ;echo '<br>
                                               <br>
                                               God bless you. Please call again<br>
                                        </p></td>
                                      </tr>
                                      
                                      
                                    </tbody>
                            </table>
                            
                          <div style="float:left"><a href="profileinv.php?sn='; echo $rowt['sn'] ;echo '"><i class="btn btn-warning btn-xs">Print Invoice</i></a></div>   
                           
                           <div style="float:right"><a href="modify.php?sn='; echo $rowt['sn'] ;echo '"><i class="btn btn-primary btn-xs">Modify Transastion</i></a></div> 
                  </div>
                  
                 ';  }  ;echo '                </div>
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
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:1});
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
