<?php
  error_reporting(0);

     $tr1 = mysql_query(" SELECT * FROM transact2 ") or die (mysql_error());
     $tra = mysql_num_rows($tr1); 
	 
     $tr2 = mysql_query("SELECT * FROM client ") or die (mysql_error());
     $trb = mysql_num_rows($tr2);    

$q=mysql_query("select * FROM title WHERE sn = '1' " );
			$r=mysql_fetch_array($q);
			$username = $r['username'];
			$password = $r['pwd'];
			$senderid = $r['senderid'];
			$phn = $r['phone'];
			$nick = $r['nick'];
			$website = $r['website'];
			
?>

<ul class="nav navbar-nav navbar-right navbar-user"><li> <a href="#"><font color="#00FF00" size="+2" face="impact">PRODUCT EXPIRY SYSTEM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</font></a></li>
           
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ucfirst($rep) ; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile2.php"><i class="fa fa-user"></i> Profile</a></li>
              
                
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
