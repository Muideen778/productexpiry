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

	 	
	 
	 
$resultr = mysql_query("SELECT SUM(qty) AS value_sum FROM transact "); 
$rowr = mysql_fetch_assoc($resultr); 
$sumr = $rowr['value_sum'];

$results = mysql_query("SELECT SUM(qty) AS value_sum FROM expend "); 
$rows = mysql_fetch_assoc($results); 
$sums = $rows['value_sum'];



	     $sql =" SELECT * FROM client WHERE id = '$id' ";
     $result = mysql_query($sql) or die (mysql_error());
	 $row = mysql_fetch_assoc($result);



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
font-weight:bolder;
margin-right:60%;
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
            <h1><small>View Stock Summary</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Annual Summary</li>
                <li class="TabbedPanelsTab" tabindex="0">'; echo date(F) ;;echo ' Summary</li>
                <li class="TabbedPanelsTab" tabindex="0">Weekly Summary</li>
                <li class="TabbedPanelsTab" tabindex="0">Daily Summary (1-16)</li>
<li class="TabbedPanelsTab" tabindex="0">Daily Summary (17-31)</li>
</ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>STOCK</th>
                            <th>JAN</th>
                            <th>FEB</th>
                            <th>MAR</th>
                            <th>APR</th>
                            <th>MAY</th>
                            <th>JUN</th>
                            <th>JUL</th>
                            <th>AUG</th>
                            <th>SEP</th>
                            <th>OCT</th>
                            <th>NOV</th>
                            <th>DEC</th>
                            <th>TOTAL</th>
                            <th>Ratio</th>
                          </tr>
                        </thead>
                        <tbody>
                          ';  $i = 1; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '1' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '2' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '3' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '4' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '5' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '6' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '7' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '8' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '9' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '10' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '11' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '12' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
 echo $sum 
 ;echo '</td>
                            <td>'; 
  $result2 = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$it' "); 
$row2 = mysql_fetch_assoc($result2); 
$sumg = $row2['value_sum'];
 $sumt = $sumg/$sumr*100 ; echo round($sumt) ; ;echo '                              %</td>
                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL STOCK</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '5' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '6' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '7' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '8' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '9' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '10' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '11' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '12' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; echo '100%' ;echo '</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div> <a href="msum1.php"><i class="btn btn-success btn-xs">Print Version</i></a></div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
                <div class="TabbedPanelsContent">
                
                 <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
 <tr>
                            <th>S/N</th>
                            <th>INCOME/EXPENDITURE</th>
                            <th>OPENING STOCK</th>
                            <th>CLOSING STOCK</th>
                            <th>QTY SOLD</th>
                            <th>UNSTOCKED</th>
                            <th>CURRENT PRICE</th>
                            <th>TOTAL SALES(N)</th>
                            <th>Ratio</th>
                          </tr>                        </thead>
                        <tbody>
                          <tr>
                            <th colspan="2">STOCK/INCOME</th>
                            <th></th>
                            <th></th>
                            <th></th>
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
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm <= '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$suma = $rowa['value_sum'];
$ostock = $suma+$row['qty'];

echo $ostock ; ;echo '</td>
                           <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm < '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$suma = $rowa['value_sum'];

 $resultb = mysql_query("SELECT SUM(qty) AS value_sum FROM unstock WHERE mm = '$mm' AND item = '$it' "); 
$rowb = mysql_fetch_assoc($resultb); 
$sumb = $rowb['value_sum'];

$cstock = $suma+$row['qty']-$sumb;

echo $cstock ; ;echo '</td>

<td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND cat = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$suma = $rowa['value_sum'];

echo $suma ; ;echo '</td>

<td>';  
echo $sumb ; ;echo '</td>
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
                            <th></th>
                            <td></td>
                            <td></td>
                           
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(amount) AS value_sum FROM transact WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; echo '100%' ;echo '</td>
                          </tr>
                   </tbody>
                  </table>
                </div>
                <div class="TabbedPanelsContent">
                  
<table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>STOCK</th>
                            <th>WEEK 1</th>
                            <th>WEEK 2</th>
                            <th>WEEK 3</th>
                            <th>WEEK 4</th>
                            <th style="color:#F00">WEEK 5 <br>CURRENT WK</th>
                            
                            <th>TOTAL</th>
                            <th>Ratio</th>
                          </tr>
                        </thead>
                        <tbody>
                          ';  $i = 1; $ww = date('W') ; $ww1 = $ww-1; $ww2 = $ww-2; $ww3 = $ww-3; $ww4 = $ww-4;
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            <td>'; $ww4 = $ww-4;  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww4' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; $ww4 = $ww-4;  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww3' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww2' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww1' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td style="color:#F00" class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$it' AND ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];
 echo $sum 
 ;echo '</td>
                            <td>'; 
  $result2 = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE item = '$it' AND ww >= '$ww4' "); 
$row2 = mysql_fetch_assoc($result2); 
$sumg = $row2['value_sum'];
 $sumt = $sumg/$sumr*100 ; echo round($sumt) ; ;echo '                              %</td>
                          </tr>
                          ';  } ;echo '                          <tr class="odd gradeX">
                            <td class="center" colspan="2">TOTAL STOCK</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td style="color:#F00" class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww = '$ww' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                           
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE ww >= '$ww4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>'; echo '100%' ;echo '</td>
                          </tr>
                        </tbody>
                      </table>
                      
                      <div> <a href="wsum.php"><i class="btn btn-success btn-xs">Print Version</i></a></div>
                  </div>
                <div class="TabbedPanelsContent">
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>STOCK</th>
                            
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>12</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                          </tr>
                        </thead>
                        <tbody>
                          ';  $i = 1; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '1' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '2' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '3' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '4' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '5' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '6' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '7' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '8' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '9' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '10' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '11' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '12' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '13' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '14' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '15' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '16' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                          </tr>
                          ';  } ;echo '                          <tr class="omm = \'$mm\' AND dd gradeX">
                            <td class="center" colspan="2">TOTAL STOCK</td>
                           
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '1' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '2' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '3' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '4' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '5' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '6' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '7' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '8' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '9' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '10' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '11' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '12' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '13' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '14' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '15' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '16' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

</tr>
                         
                                        
                                        
                                        
                                        
                                        
                                        
                        </tbody>
                      </table>
                     <div> <a href="dsum.php"><i class="btn btn-success btn-xs">Print Version</i></a></div>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
<div class="TabbedPanelsContent">
  <div class="panel-body">
    <div class="table-responsive">
     <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>INCOME</th>
                            
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
                        </thead>
                        <tbody>
                          ';  $i = 1; 
							$query=mysql_query("select * FROM stock ORDER BY item ASC " )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$it=$row['item'];
							$e = $i++ ;
							;echo '                          <tr class="odd gradeX">
                            <td class="center">'; echo $e ;echo '</td>
                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                            
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '17' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '18' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '19' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '20' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '21' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '22' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '23' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '24' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '25' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '26' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '27' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '28' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '29' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '30' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '31' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND item = '$it' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                          </tr>
                          ';  } ;echo '                          <tr class="omm = \'$mm\' AND dd gradeX">
                            <td class="center" colspan="2">TOTAL STOCK</td>
                           
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '17' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '18' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '19' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td>';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '20' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '21' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
                            <td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '22' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '23' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '24' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '25' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '26' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '27' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '28' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '29' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '30' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' AND dd = '31' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>
<td class="center">';  $result = mysql_query("SELECT SUM(qty) AS value_sum FROM transact WHERE mm = '$mm' "); 
$rowa = mysql_fetch_assoc($result); 
$sum = $rowa['value_sum'];

echo $sum ; ;echo '</td>

</tr>
                         

                        </tbody>
                      </table>
                      <div> <a href="dsum2.php"><i class="btn btn-success btn-xs">Print Version</i></a></div>
    </div>
    <!-- /.table-responsive -->
    <strong>'; echo date('l, d F, Y h:iA')  ; ;echo '</strong></div>
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
