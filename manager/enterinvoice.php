<?php 


               error_reporting(0);             
                            
    session_start(); ob_start();
	
	
$_SESSION['frame']=2;

include("includes/connect.inc.php");
userLog();
include("includes/sales2.php");
/////REMOVE/*
/*
$query=mysql_query("select * FROM stock " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
						if(strlen($row['cat']) > 18){ 
						$ss = $row['sn'];
                            $catt = str_replace(" ","-",$row['cat']); 
							mysql_query("update stock set cat='$catt' where sn='$ss' ");
							
                              } } */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Manager</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/select2.min.css">
  
  
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

}

  </style>
  
  <script src='../js/jquery.min.js'></script>
                      <script type="text/javascript">
    $(document).ready(function(){

        $(".js-calc").keyup(function(){
			 var val5 = parseInt($("#cost").val());
            var val1 = parseInt($("#upp").val());
            var val2 = parseInt($("#packno").val());
			 var val3 = parseInt($("#qty2").val());
			  var val4 = parseInt($("#price2").val());
			  
			   var val8 = parseInt($("#qtyx").val());
			  var val9 = parseInt($("#totalcost").val());
			  
         if ( ! isNaN(val1) && ! isNaN(val2))
            {
                 $("#result").text(val1 * val2);
            }
			
			
			         if ( ! isNaN(val8) && ! isNaN(val9))
            {
                var e = val9 / val8  ;
				var ucostx = Math.trunc(e * 1) / 1;	
			$("#ucostx").text( ucostx );
			
					var b = (val9 / val8) + (val9 / val8) * 40/100 ;
		var upricex = Math.trunc(b * 10) / 10;
    $("#upricex").text(upricex);
	
		var c = b * val8 ;
var uprofitx = Math.trunc(c * 1) / 1;

	$("#uprofitx").text( uprofitx );
            }
			
			
			         if ( ! isNaN(val1) && ! isNaN(val2) && ! isNaN(val5))
            {
				
				var e = val5 / (val1 * val2) ;
				var ucost = Math.trunc(e * 1) / 1;	
			$("#ucost").text( ucost );
			
				var f = val5 / val2 ;
var pcost = Math.trunc(f * 1) / 1;
		$("#pcost").text( pcost );
		var b = (val5 / (val1 * val2)) + (val5 / (val1 * val2)) * 40/100 ;
		var uprice = Math.trunc(b * 10) / 10;
    $("#uprice").text(uprice);
	
		var a = (val5 / val2) + (val5 / val2) * 25/100 ;
var pprice = Math.trunc(a * 1) / 1;
    $("#pprice").text(pprice);
	
	var c = b * (val1 * val2) ;
var uprofit = Math.trunc(c * 1) / 1;

	$("#uprofit").text( uprofit );
	
		var d = a * val2 ;
var pprofit = Math.trunc(d * 1) / 1;
	$("#pprofit").text( pprofit );
            }
			
		

        });
		
		
		
		
		
		

    });



    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkYes.checked ? "block" : "none";   
		
        var kYes = document.getElementById("kYes");
        var dvPass = document.getElementById("dvPass");
        dvPass.style.display = kYes.checked ? "block" : "none";
		}
		
		

    </script>
    
      
    <script>
        $(document).ready(function() {
            // $('#test').load('localpage.htm'); works!
			 $("#test").html('<img src="loadingg.gif" />');
            $('#test').load('salesx.php'); // does not work!
        });
		
		setInterval(function(){
    document.getElementById("updatetime").innerHTML = (new Date()).toLocaleTimeString();
}, 1000);

    </script>
    
          <script type="text/JavaScript">

<!--

function BrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}

//-->

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


        <?php    include('prodnav.php') ;       require('nav1.php') ; ?>    
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

          <div class="col-lg-12">
            
           
       
              
            <div class="col-lg-6">
              <div style="font-size:18px; font-weight:bold">RE-STOCK BY INVOICE</div> 
                  <iframe src="search/index.php" width="100%" height="200px" style="border:dash"></iframe>


<?php  if(isset($pid) && !empty($rowx['item'])){  $em = mysql_query(" SELECT * FROM stock WHERE sn = '$pid' "); $rx = mysql_fetch_assoc($em); 	 
$itemstatus = $rx['qty']*100/$rx['uptimum'];
?>
	
<font color="green"><?php echo $er; ?></font>
                  <table class="table table-bordered" >
                  <tr><td>Item:<br><font size="+1"><?php echo strtoupper($rowx['item']); ?></font><br><?php echo $rowx['des'].' | <b>'.$rowx['cat'].'</b>'; ?></td>
                  <td>Avail. Qty:<br><font size="+1"><?php echo number_format($rx['qty']); ?></font>
                  </td>
                  <td bgcolor="<?php echo $color  ;?>" style="color:#FFF">Status: <?php echo number_format($itemstatus); ?>%<br><font size="+1"><?php echo $sta; ?></font></td>
                  </tr></table>
                  
                   <form method="post">
                   <strong><?php echo $erqty; ?></strong>
                      <table class="table table-bordered" >
                  <tr><td>
                   <p>Restock By &nbsp;&nbsp;&nbsp; <label><input type="radio"  id="chkYes" name="chkwork" onclick="ShowHideDiv()"  checked value="1" > Pack Qty </label> &nbsp;&nbsp;&nbsp;<label><input type="radio"  id="kYes" name="chkwork" onclick="ShowHideDiv()" value="0"> Unit Qty </label></p>
                   
                   
                 <div id="dvPassport" style="display: block">
                  <div class="col-lg-3" >No of Packs:<br><input name="packno" class="js-calc form-control" id="packno" type="text" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"  placeholder="Packs"></div>
                      
                      <div class="col-lg-3" >
                       Units/Pack:<br>
                        <input name="upp" type="text" id="upp" class="js-calc form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" required ></div>
                     <div class="col-lg-3" >Total Units:<br><textarea style="resize: none;"  id="result" class="form-control" rows="1" disabled></textarea></div>
                    
                    

                     <div class="col-lg-3" >Cost Price:<br> <input name="cost" type="text" id="cost" class="js-calc form-control" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"></div>
                      
                     <div class="clearfix"></div><br>
                       <div class="col-lg-3" >Unit S.Price:<br> <input name="unitprice" type="text"  class="js-calc form-control" value="<?php echo $rx['unitprice']; ?>" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"></div>
                      
                      <div class="col-lg-3" >
                       Pack S.Price:<br>
                        <input name="packprice" type="text"  required class="form-control" value="<?php echo $rx['packprice']; ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" ></div>
                     <div class="col-lg-3" >Expiry Date:<br><input name="expiry" class="form-control" rows="1" placeholder="MM/YY" value="<?php echo $rx['xm'].'/'.$rx['xy']; ?>" required ></div><div class="col-lg-3" > Uptimum Qty:<br>
                        <input name="uptimum" type="number"  class="js-calc form-control" value="<?php echo $rx['uptimum']; ?>" required >  </div>
                      <p>&nbsp; </p>  <div class="col-lg-6" ><table class="table table-bordered" >
                  <tr><td>UCP<br><span id="ucost"></span></td><td>SUSP<br><span id="uprice"></span></td><td>EUP<br><span id="uprofit"></span></td></tr></table></div>
                        
                        <div class="col-lg-6" ><table class="table table-bordered" >
                  <tr><td>PCP<br><span id="pcost"></span></td><td>SPSP<br><span id="pprice"></span></td><td>EPP<br><span id="pprofit"></span></td></tr></table></div>
                       
                        
                        
                  <?php if($_SESSION['mode'] != 2){ ?>   <div class="col-lg-12" ><br> <button type="submit" class="btn btn-warning" name="StockItem"  style="width:100%">Restock by Pasck</button></div> <?php  }?>
                  
                   </div>
                  
                  
</form>





                    

                     <div id="dvPass" style="display: none"> 
                     <form method="post">
                       <div class="col-lg-9" >Total Units:<br><input name="qtyx" type="text" id="qtyx" class="js-calc form-control" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" >  </div>
                    
                     <div class="col-lg-3" >Cost Price:<br> <input name="totalcost" type="text" id="totalcost" class="js-calc form-control" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" ></div>
                      
                     <div class="clearfix"></div><br>
                       <div class="col-lg-4" >Unit S.Price:<br> <input name="unitprice" type="text"  class="js-calc form-control" value="<?php echo $rx['unitprice']; ?>" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"></div>
                      

                     <div class="col-lg-4" >Expity Date:<br><input name="expiry" class="form-control" rows="1" placeholder="MM/YY" value="<?php echo $rx['xm'].'/'.$rx['xy']; ?>" required></div><div class="col-lg-4" > Uptimum Qty:<br>
                        <input name="uptimum" type="text"  class="js-calc form-control" value="<?php echo $rx['uptimum']; ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" required >  </div>
                      <p>&nbsp; </p>  <div class="col-lg-12" ><table class="table table-bordered" >
                  <tr><td>UCP<br><span id="ucostx"></span></td><td>SUSP<br><span id="upricex"></span></td><td>EUP<br><span id="uprofitx"></span></td></tr></table></div>
                        
                    
                        
                        
                  <?php if($_SESSION['mode'] != 2){ ?>   <div class="col-lg-12" ><br> <button type="submit" class="btn btn-primary" name="StockItemUnit"  style="width:100%">Restock by Unit </button></div> <?php  }?>
                  
                   </div>
                  
                  
                  
                  
                  
                  
                  
                    </form>
                       </td></tr></table>  
               <?php  }?>
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="col-lg-6">
                   <div id="updatetime" style="float:right; font-size:18px"></div>
                   <form method="post">
              <?php $quer=mysql_query("select * FROM stockup2 WHERE salesid = '$salesid' " )or die(mysql_error());
							$rg=mysql_fetch_array($quer); $disc = $rg['discount'];  ?>
          <table class="table table-bordered" >
                  <tr  <?php if($_SESSION['mode']==2){?> bgcolor="pink" <?php } ?> ><td>Vendor:<br> <select name="vendor" class="form-control select2" required > 
                                               <option value="">Select Vendor</option>
                        <?php  
							$query=mysql_query("select * FROM supply ORDER BY id DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['id'];
							?>
							
						               <option <?php if($rg['id']==$row['id']){echo 'selected';} ?> value="<?php echo $row['id'];?>"><?php echo $row['name'] ?> </option>
                         <?php } ?></select></td>
                  <td>Invoice Amount:<br> <input class="form-control" name="cash" required value="<?php if(isset($rg['cash'])){ echo $rg['cash']; } else{echo $sum; } ?>"></td>
                 
                   <td>Invoice No:<br> <input class="form-control" name="inv" required  value="<?php if(isset($rg['inv'])){ echo $rg['inv']; } ?>"></td>
                
                  <?php  if($_SESSION['mode']==2){?>  <td bgcolor="green"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="NewTransaction">New<br>Invoice</button></td><?php } else{ ?>  <td bgcolor="grey"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="checkout">Close<br>Invoice</button></td>  <?php } ?>
                  </tr></table>  
                  
                  </form>
                  
                  <table class="table table-bordered"><tr><td>
                    <table class="table table-striped table-hover" bgcolor="#CFC" >
                      <thead>
                       
                        <tr>
                          <th>QTY</th>
                          <th>ITEM</th>
                          <th>COST</th>
                          <th>AMOUNT</th>
                          <th>REMOVE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							$query=mysql_query("select * FROM stockup WHERE salesid = '$salesid' " )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                     <form method="post">   <tr class="odd gradeX">
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo number_format($row['unitcost']); ?></td>
                          <td class="center">₦<?php echo number_format($row['totalcost']); ?></td>
                          <td class="center"><?php if($row['status']!=1){?><button type="submit" class="btn btn-danger btn-xs" name="RemoveStock" value="<?php echo $row['sn'] ?>"  >Remove</button> <?php }  ?></td>
                        </tr></form>
                        <?php  } ?>
                        <tr>
                          <th colspan="3"> Total Amount</th>
                      
                          <th colspan="2">₦<?php echo number_format($sum) ;  ?>      </td></tr></table></th></tr></tbody></table>
                    
              
                 
                
            </div>
                    
                    <div class="col-lg-12">
                    <form method="post">
                    <table class="table table-bordered" >
                  <tr>
                  <td bgcolor="blue"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="NewTransaction">New<br> Invoice</button></td>
                  <td bgcolor="red"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="reset">Reset<br> Invoice</button></td>
                 
                  </form>
                    <td bgcolor="green"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="" data-toggle="modal" data-target="#modal-vendor">Enter Vendor</button></td>
                    <td bgcolor="purple"><button type="button" style="width:100%; height:50px" class="btn btn-default" name="" data-toggle="modal" data-target="#modal-edititem">Edit <br> Item</button></td>
              
                  </tr></table>  </form>
                 
                  </div>
                  <div class="col-lg-12">
                  <table class="table table-bordered" >
                  <tr><td><strong>TERM DESCRIPTION</strong><hr>
                 <ul><li> <strong>UCP</strong> = Unit Cost Price
                 <li> <strong>SUSP</strong> = Suggested Unit Selling Price
                 <li> <strong>EUP</strong> = Expected Profit Based on Suggested Unit Selling Price
                  
                 <li> <strong>UPP</strong> = Unit Pack Price
                 <li> <strong>SPSP</strong> = Suggested Pack Selling Price
                 <li> <strong>EPP</strong> = Expected Profit Based on Suggested Pnit Selling Price
                 </ul> 
                  </td></tr></table>
                  </div>
                  
                  
               

 <script type="text/javascript">
     $(window).load(function(){
         $('#modal-edititem').modal('show');
      });
</script>


                      
<?php include('modal.php'); ?>            
            
            
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- JavaScript -->
   <script src="js1/select2.full.min.js"></script>
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>

    
    
    
    
    
    
    <script src="js1/jquery-1.10.2.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js1/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js1/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js1/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js1/sb-admin.js"></script>
      <script src="js1/select2.full.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>
    
    
  </body>
</html>