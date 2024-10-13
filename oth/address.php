<?php
 echo '<center><font face="Verdana, Geneva, sans-serif" size="+2"><?php $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); echo $r['name']; ?></font>
                                            <br>No 69, Oke-Aro Street, Akure, Ondo State<br><?php echo $r['phone']; ?>, <?php echo $r['email']; ?>. <?php echo $r['website']; ?></center>' ; ;?>
