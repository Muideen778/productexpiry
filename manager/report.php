<?php

$sexpdate =" SELECT * FROM title WHERE sn = '1' ";
$resultexpdate = mysql_query($sexpdate) or die (mysql_error());
$rowexp = mysql_fetch_assoc($resultexpdate);
$expiredate = base64_decode($rowexp['pwd']);
 $softexpiredate = new DateTime($expiredate);  
   $today=new DateTime($purchase_date);  
   $interval=$today->diff($softexpiredate);
   $yearr=$interval->format('%Y');
   $mothr=$interval->format('%M');
   $dayr=$interval->format('%d'); 
   

   if($yearr < 1 AND $mothr < 1 AND $dayr >= 1){  
     echo "Less than ".$dayr." days remaining";   
             
    } elseif($yearr < 1 AND $mothr < 1 AND $dayr < 1){
   $sft="e1"; 
   }
    
    else{
     
    } 
    echo "<b>".$interval->format('%Y years %M Months %D days')." Remaining </b>";

?>