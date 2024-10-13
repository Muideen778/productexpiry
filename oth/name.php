<?php
 echo '<?php $q=mysql_query("select * FROM title LIMIT 1 " );
			$r=mysql_fetch_array($q); echo $r['name']; ?>' ;  ;?>
