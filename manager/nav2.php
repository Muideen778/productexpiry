<?php

error_reporting(0);
 if($_SESSION['user']=='salesrep' || $_SESSION['user']=='cahsier'){ ?>	  <ul class='nav navbar-nav side-nav'>
<li><a href='salesall.php'><i class='fa fa-desktop'></i> &nbsp;POS</a></li>
<li><a href='mysales.php'><i class='fa fa-bar-chart-o'></i> Today's Sales</a></li>
        </ul> 
        
        <?php }elseif($_SESSION['user']=='admin'){ ?> 
        <ul class='nav navbar-nav side-nav'>
            			
            <li><a href='salesall.php'><i class='fa fa-desktop'></i> &nbsp;Check Product</a></li>
        <li><a href="stockitem.php"><i class='fa fa-desktop'></i> Manage Products</a></li>
        <li><a href="staffdetails.php"><i class='fa fa-desktop'></i> Manage Staffs</a></li>
   <li><a href="expiry.php"><i class='fa fa-book'></i> Expiry Dashboard</a></li>
   
          
        </ul> 
  <?php  } ?>
