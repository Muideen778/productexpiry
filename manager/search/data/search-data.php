<?php
 session_start(); ob_start();
include("../../../includes/connect.inc.php");

    /* The search input from user ** passed from jQuery .get() method */
    $searchitem = $_GET["searchData"];
    
					// $word = explode(" ",$searchitem);
					// $searchitem1 = $word[0]; $searchitem2 = $word[1]; $searchitem3 = $word[2];
					 
	if($_SESSION['frame']==1){$frame='salesall.php';} elseif($_SESSION['frame']==2){$frame='enterinvoice.php'; }elseif($_SESSION['frame']==3){$frame='returnitem.php'; }elseif($_SESSION['frame']==4){$frame='unstockitem.php'; }
	
  /* If connection to database, run sql statement. */
    if ($con) {

        /* Fetch the users input from the database and put it into a
         valuable $fetch for output to our table. */
//$fetch = mysql_query("SELECT core.sn as id, core.salutation as salute, file.staff_id as regnum, core.sname as sname, core.fname as fname, core.mname as mname, core.post as post, core.faculty as faculty, core.dept as dept FROM core inner join file WHERE (core.sname REGEXP '^$searchitem' OR core.fname REGEXP '^$searchitem' OR core.mname REGEXP '^$searchitem' OR core.faculty REGEXP '^$searchitem' OR core.dept REGEXP '^$searchitem') and core.sn = file.staff_id ");
if(is_numeric($searchitem)){
$fetch =  mysql_query("select * from stock where barcode='$searchitem'");
$barcd=true;
}else{
  $fetch =  mysql_query("select * from stock where item like '%".$searchitem."%' or cat like '%".$searchitem."%' or barcode like '%".$searchitem."%' limit 0,50");

}
$num=mysql_num_rows($fetch);


        /*
           Retrieve results of the query to and build the table.
           We are looping through the $fetch array and populating
           the table rows based on the users input.
         */
		 $Result1 = '<table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                <thead>
                 
                     
                         <th class="ui-state-default">Item</th>
                        <th class="ui-state-default">Category</th>
                        <th class="ui-state-default">Price</th>
						<th class="ui-state-default">Qty</th>
                    </tr>   
                </thead>
                <tbody>';
		  $sResults = '';
		  $x = 0;
        while ( $row = mysql_fetch_object( $fetch ) ) {
			$x = $x + 1;
			 if($row->qty==0){ $col = 'bgcolor="#FF0000"'; } else{ $col = '';}
			
			$sResults .= '<tr '.$col.'>';
          //  $sResults .= '<td>' . $x . '</td>';
			$sResults .= '<td><a target="_parent" href="../'.$frame.'?process='.sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'&pid='.$row->sn .'&dt='.  date('r').sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'">' .strtoupper($row->item) . '</a></td>';
            $sResults .= '<td>' . ucwords($row->cat) . '</td>';
			$sResults .= '<td>' . $row->unitprice . '</td>';
			$sResults .= '<td>' . $row->qty . '</td>';
            
		  //  $sResults .= '<td><a target="_blank"  href="../salesall?process='.sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'&pid='.$row->sn .'&dt='.  date('r').sha1(session_id()).sha1(session_id()).sha1(session_id()).sha1(session_id()).'">CLICK HERE</a></td>';
			 $sResults .='</a></tr>';
			
			

        }

    }
	
	 $Result2 = '</tbody>
                
            </table>';
			

    /* Free connection resources. */
    mysql_close($conn);

    /* Toss back the results to populate the table. */
    echo $Result1;
	 echo $sResults;
	  echo $Result2;
	
	echo '<tr><td colspan="4"><b>Count: '.$x.'</b></td></tr>';  

?>