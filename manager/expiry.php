<?php
error_reporting(0);
 
    session_start();
	if(!isset($_SESSION['admin'])){
    header("location: index.php");
      exit;
	}
	
	
	 if($_GET){ 
      if(isset($_GET['xm'])){
        @$xm = $_GET['xm'];
		@$xy = $_GET['xy'];
      }
    }else{
		$xm = abs(date('m'));	$xy = date('Y');
	}
		  
 $month = date("F", mktime(0, 0, 0, $xm, 10));
	
	  

include("includes/connect.inc.php");
userLog();
	 $today = date('ymd');	
	  $dd = date('d') ;
	  $yy = date('y') ;
	  $mm = date('m') ;
	  $ww = date('W') ;	
	 
	 

	     $sqlx =" SELECT * FROM stock WHERE xm = '$xm' ORDER by sn ASC LIMIT 1 ";
     $resultx = mysql_query($sqlx) or die (mysql_error());
	 $rowx = mysql_fetch_assoc($resultx);
	 
	 		$sm = $rowx['xm'] ;
			$sy = $rowx['xy'] ;
			
			$sm = $xm ;
			$sy = $xy ;



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

td a{background-color:#606;
color:#FFF;
padding:3px 10px; border-radius:5px;

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


     ';    include('reportnav.php') ;  ;echo '     
     ';     require('nav1.php') ;  ;echo '     
         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Manage Expiry Dates: '.$month.' '.$xy.'</small></h1>
            
              
            <div id="TabbedPanels1" class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Expiry Dashboard</li>
<li class="TabbedPanelsTab" tabindex="0">Expiry in '.$month.' '.$xy.'</li>
              </ul>
              <div class="TabbedPanelsContentGroup">
          <div class="TabbedPanelsContent">
                
                
                
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="">
                                    <thead>
                                        <tr style="color:#60C">
                                            <th>Month</th>
                                            <th>'; $y = date('Y')-1; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y'); echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+1; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+2; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+3; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+4; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+5; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+6; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+7; echo $y ;;echo '</th>
                                            <th>'; $y = date('Y')+8; echo $y ;;echo '</th>
                                            
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$i = 1 ;
							while($i<=12){
							$e = $i++;
              
							if ($e<10){
							$e='0'.$e;
              
							}
							
						;
							;echo '							
						
                          

                                  <tr class="odd gradeX">
                                            <td class="center">'; 
                                            if($e=="01"){echo "JANUARY";}  
                                            if($e=="02"){echo "FEBRUARY";} 
                                            if($e=="03"){echo "MARCH";} 
                                            if($e=="04"){echo "APRIL";} 
                                            if($e=="05"){echo "MAY";} 
                                            if($e=="06"){echo "JUNE";}
                                            if($e=="07"){echo "JULY";}  
                                            if($e=="08"){echo "AUGUST";} 
                                            if($e=="09"){echo "SEPTEMBER";} 
                                            if($e=="10"){echo "OCTOBER";} 
                                            if($e=="11"){echo "NOVEMBER";} 
                                            if($e=="12"){echo "DECEMBER";} 
                                            
                                            ; ;echo '</td>
                                            <td>'; $y = date('Y')-1; $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')-1; echo $y ;;echo '" >'; echo $num ; ;echo '</a> ';  } ;echo '</td>
     <td>'; $y = date('Y');  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y'); echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
                                             <td>'; $y = date('Y')+1;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+1; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     <td>'; $y = date('Y')+2;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+2; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     <td>'; $y = date('Y')+3;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+3; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
    <td>'; $y = date('Y')+4;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+4; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     <td>'; $y = date('Y')+5;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+5; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     <td>'; $y = date('Y')+6;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+6; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     <td>'; $y = date('Y')+7;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('Y')+7; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     <td>'; $y = date('Y')+8;  $sql =" SELECT * FROM stock WHERE xm = '$e' AND xy = '".substr( $y, -2)."' LIMIT 0, 1000 ";
     $result = mysql_query($sql) or die (mysql_error());
     $num = mysql_num_rows($result); if($num>0){ ;echo ' <a href="expiry.php?xm='; echo $e ;;echo '&&xy='; $y = date('y')+8; echo $y ;;echo '" >'; echo $num ; ;echo '</a> '; } ;echo '</td>
     
     
                                            
                                      </tr>
                                         ';  } ;echo '                                    </tbody>
                            </table>
                            
                            </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
                </div>
<div class="TabbedPanelsContent">
 <div class="panel-body">
                                                    
                         
                           <div class="table-responsive">
                          
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sales Id</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Amount</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Stocked By</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     '; 
							$query=mysql_query("select * FROM stock WHERE xm = '$sm' AND xy = '$sy' ORDER BY sn DESC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							
							;echo '							
							
                           
                            

                                  <tr class="odd gradeX">
                                            <td class="center">'; echo $row['sn'] ;echo '</td>
                                            <td>'; echo ucfirst($row['item']) ;echo '</td>
                                             <td>'; echo ucfirst($row['des']) ;echo '</td>
                                             <td>'; echo ucfirst($row['qty']) ;echo '</td>
                                            <td>'; echo ucfirst($row['unitcost']) ;echo '</td>
                                             <td class="center">'; echo $row['qty']*$row['unitcost'] ; ;echo '</td>
                                             <td>'; echo $row['xm'] ;echo '</td>
                                            <td class="center">'; echo $row['xy'] ;echo '</td>
                                            <td class="center">'; echo ucfirst($row['rep']) ;echo '</td>
                                      </tr>
                                         ';  } ;echo '                                    </tbody>
                            </table>
                            
                            </div>
                            
                            <!-- /.table-responsive -->
                        
                </div>
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
