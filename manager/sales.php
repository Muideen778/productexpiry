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
	  $phn = $_SESSION['phn'];    
    $salesid = date('sihmdy');//$_SESSION['salesid'] ;
	  


include("includes/connect.inc.php");

		
	/*  $dd = date('d') ;
	  $yy = date('y');
	  $mm = date('m') ;
	 $ww = date('W');	
	  $today = date('ymd');
	*/ 	
		$item = 30;//$_SESSION['item'];
		

	 
	 		 $sqlx =" SELECT * FROM stock WHERE sn = '$item' LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 
	 $rowx = mysql_fetch_assoc($resultx);
	 $qt = $rowx['qty'];
	 $cp = $rowx['cp'];
	 $cp1 = $cp/2;
	 $cp2 = $cp*2;
if($qt==0){ $sta = 'Out-of-Stock' ; $color = 'red';}
elseif($qt>$cp && $qt<=$cp2){ $sta = 'Getting Critical' ; $color = 'blue' ;} elseif($qt>$cp1 && $qt<=$cp){ $sta = 'Critical' ; $color = 'purple';} elseif($qt>0 && $qt<=$cp1){ $sta = 'Very Critical' ; $color = '#900';} elseif($qt>$cp2){ $sta = 'OK' ; $color = 'green';} elseif($qt<0){ $sta = 'Negative' ; $color = 'black';} 
	$item2 = $rowx['item'];

if(array_key_exists('sales', $_POST)){
	

	 $dd = $_POST['dd'] ;
	 $_SESSION['d']=$dd;
	 
	  $yy = $_POST['yy'] ;
	  $_SESSION['y']=$yy;
	  
	  $mm = $_POST['mm'] ;
	  $_SESSION['m']=$mm;
	  
	   $today = $yy.$mm.$dd;
	 $ww = date('W');
	  
	 	

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
    //$salesid = date('ishmdy');
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
  
   <script type="text/javascript" src="../js/jquery.min.js"></script>
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
   <font color="green"><?php echo $er; ?></font>
                 
                   <form method="post">
                      <p> <label>Item: <?php echo $rowx['item']; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($item)){ ?>
                          <sta> <?php echo $sta ; ?></sta>
                          <p></p>
                          <?php  }  ?></strong>
                       
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
                    
                    
                    <script>

function sum()
{
    var value1= parseInt(document.getElementById("tx1").value);
    var value2=parseInt(document.getElementById("tx2").value);
    var sum=value1+value2;
    document.getElementById("result").value=sum;

}
 </script>
 
                    
                    
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