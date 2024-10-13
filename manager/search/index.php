<?php
session_start();
if(isset($_POST['barcode'])){
    $_SESSION['searchtype']="barcode";
}

if(isset($_POST['search'])){
    if(!empty($_SESSION['searchtype'])){
    unset($_SESSION['searchtype']); 
    }  
}
if(isset($_POST['searchb'])){
    $searchitem=$_POST['searchitem'];
 include('../searchbarcode.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>jQuery Search Autocomplete</title>

    <style type="text/css" title="currentStyle">
                @import "css/grid_sytles.css";
                @import "css/themes/smoothness/jquery-ui-1.8.4.custom.css";  
    </style>
    

    <!-- jQuery libs -->
    <script  type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script  type="text/javascript" src="js/jquery-ui-1.7.custom.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script  type="text/javascript" src="js/jquery-search.js"></script>
	
</head>
<body>

<div id="container" style="width:100%; margin:0px;">
    <div id="dataTable">

        <div class="ui-grid ui-widget ui-widget-content ui-corner-all">
       
            <div class="ui-grid-header ui-widget-header ui-corner-top clearfix">
           
            
<?php if(!empty($_SESSION['searchtype'])){ ?>
    <form method="POST">
    <input type="text" name="searchitem" class="form-control" autocomplete="off" placeholder="Search Items using Barcode."
  onmouseover="this.focus();" autofocus style="width:100%; margin:0px;"
    
     />
     <input type="submit" name="searchb" style="display:none;">
     </form>
     <?php if(!empty($seracherror)){ ?>
     <br>
     <font style="float: left; font-size:14px; opacity:1.5; color:red;"> <?=$seracherror;?></font>
              <?php }}else{ ?>
               
              <input type="text" class="form-control" autocomplete="off" placeholder="Search Items by Name or Desc. or using Barcode"  
             autofocus id="searchData" style="width:100%; margin:0px;"
             
     />
             
              <?php } ?>
              
               <form method="post"><button type="submit" name="search"><i style="font-size:14px" class="fa">&#xf002;</i></button><button type="submit" name="barcode"><i style="font-size:14px" class="fa">&#xf02a;</i> </button></form>
           
            </div>
             

              <div class="ui-grid-footer ui-widget-header ui-corner-bottom">
                <div id="results"></div>
                </div>
          
         <!--   <div class="ui-grid-footer ui-widget-header ui-corner-bottom">
                <div class="grid-results">Results  </div>
            </div> --->
        </div>
    </div>

</div>

</body>
</html>