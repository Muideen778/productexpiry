<?php
  
 $sqld =" SELECT * FROM transact WHERE today = '$today' LIMIT 0, 1000 ";
     $resultd = mysql_query($sqld) or die (mysql_error());
     $lumd = mysql_num_rows($resultd); 
	 
	  $sql9 =" SELECT * FROM client WHERE today = '$today' LIMIT 0, 1000 ";
     $result9 = mysql_query($sql9) or die (mysql_error());
     $lum9 = mysql_num_rows($result9);    
;echo '
 <ul class="nav navbar-nav navbar-right navbar-user"><li> <a href="#"><font color="#FFFFFF" size="+1">'; $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); echo $r['name']; ;echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a></li>
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> New Transactions <span class="badge">'; echo $lumd ; ;echo '</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">'; echo $lumd ; ;echo ' New Transactions</li>
                
                
                    '; 
							$query2=mysql_query("select * FROM transact WHERE today = '$today' ORDER BY sn DESC LIMIT 0 , 5" )or die(mysql_error());
							while($row2=mysql_fetch_array($query2)){
							$id2=$row2['id2'];
							
							;echo '                            
                <li class="message-preview">
                  <a href="profilei.php?id='; echo $row2['id'] ;echo '">
                    <span class="avatar"></span>
                    <span class="name">'; echo $row2['name'] ; ;echo '</span>
                    <span class="message">'; echo $row2['item'].'.'.' '.$row2['des'].'.'.' '.'Qty:'.$row2['qty'].'  '.'Price:'.$row2['price'].' '.' '.'<b>'.'N'.$row2['amount'].'</b>' ; ;echo '  </span>
                    <span class="time"><i class="fa fa-clock-o"></i> '; echo $row2['created'] ; ;echo '</span>
                  </a>
                </li>
                <li class="divider"></li>
                
                ';   }  ;echo '               
          
                <li><a href="transact3.php">View Transactions <span class="badge">'; echo $lumd ; ;echo '</span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> New Customers <span class="badge">'; echo $lum9 ; ;echo '</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                                  '; 
							$query3=mysql_query("select * FROM client WHERE today = '$today' ORDER BY id DESC LIMIT 0 , 10" )or die(mysql_error());
							while($row3=mysql_fetch_array($query3)){
											
							;echo '                <li><a href="profilei.php?id='; echo $row3['id'] ;echo '"><span class="label label-success">'; echo $row3['id'] ; ;echo '</span> '; echo ucfirst($row3['name']) ; ;echo ' </a></li>
                
                '; }  ;echo '                
                <li class="divider"></li>
                <li><a href="clients.php">View All Customers</a></li>
              </ul>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '; echo ucfirst($rep) ; ;echo ' <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile2.php"><i class="fa fa-user"></i> Profile</a></li>
              
                
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>';;?>
