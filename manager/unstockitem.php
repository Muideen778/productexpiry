<?php 
error_reporting(0);
    session_start(); ob_start();
	
	
$_SESSION['frame']=4;
$tr_type = 4;

include("includes/connect.inc.php");
userLog();
include("includes/sales4.php");


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

            var val1 = parseInt($("#qty").val());
            var val2 = parseInt($("#price").val());
			 var val3 = parseInt($("#qty2").val());
			  var val4 = parseInt($("#price2").val());
			   var val5 = parseInt($("#qtyx").val());

         if ( ! isNaN(val1) && ! isNaN(val2))
            {
                 $("#result").text(val1 * val2);
            
			}
			
			         if ( ! isNaN(val3) && ! isNaN(val2))
            {
                 $("#result2").text(val3 * val4);
				 
				  $("#totalqty").text(val3 * <?php echo $pqty; ?>);
				 
				 //   $("#res").text('<?php echo $error; ?>');
            }
			
			if ( ! isNaN(val5) && ! isNaN(val1))
            {
			 
			 if ( val5 < val1)
            {
                 $("#resx").text('<?php echo $error; ?>');
			}
			if ( val5 > val1)
            {
                 $("#resx").text('');
			}
			if ( val5 < (<?php echo $pqty; ?>*val3))
            {
                 $("#resy").text('<?php echo $error; ?>');
			}
			
			if ( val5 > (<?php echo $pqty; ?>*val3))
            {
                 $("#resy").text('');
			}
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
              <div style="font-size:18px; font-weight:bold">UN-STOCK ITEM FROM STORE</div> 
                  <iframe src="search/index.php" width="100%" height="150" style="border:none"></iframe>


<?php  if(isset($pid) && !empty($rowx['item'])){  $em = mysql_query(" SELECT * FROM stock WHERE sn = '$pid' "); $rx = mysql_fetch_assoc($em);?>
<?php if($_SESSION['mode'] != 2){ ?>	
<font color="green"><?php echo $er; ?></font>
                  <table class="table table-bordered" >
                  <tr><td>Item:<br><font size="+1"><?php echo strtoupper($rowx['item']); ?></font><br><?php echo $rowx['des'].' | <b>'.$rowx['cat'].'</b>'; ?></td>
                  <td>Avail. Qty:<br><font size="+1"><?php echo number_format($rx['qty']); ?></font></td>
                  <td bgcolor="<?php echo $color  ;?>" style="color:#FFF">Status:<br><font size="+1"><?php echo $sta; ?></font></td>
                  </tr></table>
                  
                   <form method="post">
                   
                      <table class="table table-bordered" >
                  <tr><td><?php echo $erqty; ?>
                    <p>Un-Stock By &nbsp;&nbsp;&nbsp; <label><input type="radio"  id="chkYes" name="chkwork" onclick="ShowHideDiv()"  checked value="1" > Unit Qty </label> &nbsp;&nbsp;&nbsp;<label><input type="radio"  id="kYes" name="chkwork" onclick="ShowHideDiv()" value="0"> Pack Qty </label></p>
                   <p><font color="red"><em><span id="resx"></span><span id="resy"></span></em></font></p>
                   <div class="col-lg-10" > Reason for unstocking<input name="ureason" type="text"  class="form-control" required ></div>
                 <div id="dvPassport" style="display: block"> <div class="col-lg-3" >Unit Price:<br><strong style="font-size:18px">₦<?php echo number_format($rowx['unitprice']); ?></strong></div>
                      <input name="price" id="price" type="hidden" value="<?php echo $rowx['unitprice']; ?>"  placeholder="Price">
                      <div class="col-lg-3" >
                       Quantity:<br>
                        <input name="qty" type="number" id="qty" class="js-calc form-control" value="1"  >
                         <input type="hidden" id="qtyx" class="js-calc" value="<?php echo $rx['qty']; ?>"  >
                         </div>
                     <div class="col-lg-3" >Stock Worth:<br><textarea id="result" style="resize: none;" readonly class="form-control" rows="1"></textarea></div><div class="col-lg-3" ><br> <button type="submit" class="btn btn-primary" name="sales" <?php if($qt==0){echo 'disabled'; } ?> >Unstock Item</button></div></div>
                     
                 <div id="dvPass" style="display: none">
                       <div class="col-lg-3" >Pack Price:<br><strong style="font-size:18px">₦<?php echo number_format($rowx['packprice']); ?></strong><br>units: <?php echo $rowx['pqty']; ?></div>
                      <input name="price" id="price2" type="hidden" value="<?php echo $rowx['packprice']; ?>"  placeholder="Price">
                      <div class="col-lg-3" >
                       Pack Qty:<br>
                        <input name="qty2" type="number" id="qty2" class="js-calc form-control" value="1"><em>Total Qty:<span id="totalqty"></span></em></div>
                     <div class="col-lg-3" >Stock Worth:<br><textarea id="result2" class="form-control" rows="1"></textarea></div><div class="col-lg-3" ><br> <button type="submit" class="btn btn-warning" name="sales2" <?php if($qt==0 || $qt<$pu){echo 'disabled'; } ?>>Unstock Pack</button></div></div>
                    </form>
                       </td></tr></table> 
               <?php } else{echo "Click <b>Reset Transaction</b> to add or remove more items from the current invoice. <br><br> Click <b>New Trasaction</b> to start new sales";}  }?>
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="col-lg-6">
                   <div id="updatetime" style="float:right; font-size:18px"></div>
                 
                  
                  <table class="table table-bordered"><tr><td>
                    <table class="table table-striped table-hover" >
                      <thead>
                       
                        <tr>
                          <th>QTY</th>
                          <th>ITEM</th>
                          <th>PRICE</th>
                          <th>AMOUNT</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
							$query=mysql_query("select * FROM unstock WHERE salesid = '$salesid' ORDER BY sn ASC LIMIT 0 , 200" )or die(mysql_error());
							
							while($row=mysql_fetch_array($query)){
							
							
							?>
                     <form method="post">   <tr class="odd gradeX">
                          <td class="center"><?php echo $row['qty'] ?></td>
                          <td><?php echo ucfirst($row['item']) ?></td>
                          <td class="center">₦<?php echo $row['price'] ?></td>
                          <td class="center">₦<?php echo $row['amount'] ?></td>
                          <!--<td class="center"><?php if($row['status']!=1){?><button type="submit" class="btn btn-danger btn-xs" name="RemoveItem" value="<?php echo $row['sn'] ?>"  >Remove</button> <?php }  ?></td>
              -->
                        </tr></form>
                        <?php  } ?>
                        <tr>
                          <td colspan="5"><b>Sub-Total: <?php  
							  
echo number_format($sum) ;
					  ?>
                          </b></td>
                          
                           
                        </tr> 
                      </tbody>
                    </table>
                    </td></tr></table>
            </div>
                    
                    <div class="col-lg-12">
                    <form method="post">
                    <table class="table table-bordered" >
                  <tr>
                  <td bgcolor="blue"><button type="submit" style="width:100%; height:50px" class="btn btn-default" name="NewTransaction">New Set<br> Un-stocking</button></td>
                

                  </tr></table>  </form>
                    <?php   

 ?>
               
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