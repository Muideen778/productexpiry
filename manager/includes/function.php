<?php

function sqL($table,$level=2){
$sql=mysql_query("select * FROM $table " )or die(mysql_error());	
	if($level==1){ return $sql; }
	elseif($level==2){ return mysql_fetch_object($sql); }
	else{return mysql_num_rows($sql); }
}

function sqL1($table,$col1,$val1,$level=2){
$sql=mysql_query("select * from $table where $col1='$val1' " )or die(mysql_error());	
	if($level==1){ return $sql; }
	elseif($level==2){ return mysql_fetch_object($sql); }
	else{return mysql_num_rows($sql); }
}


function sqL2($table,$col1,$val1,$col2,$val2,$level=2){
$sql=mysql_query("select * from $table where $col1='$val1' and $col2='$val2' " )or die(mysql_error());	
	if($level==1){ return $sql; }
	elseif($level==2){ return mysql_fetch_object($sql); }
	else{return mysql_num_rows($sql); }
}

function sqL3($table,$col1,$val1,$col2,$val2,$col3,$val3,$level=2){
$sql=mysql_query("select * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' " )or die(mysql_error());	
	if($level==1){ return $sql; }
	elseif($level==2){ return mysql_fetch_object($sql); }
	else{return mysql_num_rows($sql); }
}


function sqL4($table,$col1,$val1,$col2,$val2,$col3,$val3,$col4,$val4,$level=2){
$sql=mysql_query("select * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' and $col4='$val4' " )or die(mysql_error());	
	if($level==1){ return $sql; }
	elseif($level==2){ return mysql_fetch_object($sql); }
	else{return mysql_num_rows($sql); }
}

function sqL5($table,$col1,$val1,$col2,$val2,$col3,$val3,$col4,$val4,$col5,$val5,$level=2){
$sql=mysql_query("select * from $table where $col1='$val1' and $col2='$val2' and $col3='$val3' and $col4='$val4' and $col5='$val5' " )or die(mysql_error());	
	if($level==1){ return $sql; }
	elseif($level==2){ return mysql_fetch_object($sql); }
	else{return mysql_num_rows($sql); }
}


function countRows($table){
$sql=mysql_query("select * FROM $table " )or die(mysql_error());	
	return mysql_num_rows($sql);
}

function trSum($table,$col){
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
  
  function trSum1($table,$col){
global $ymd ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE today = '$ymd' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
 
  
    function trSuma($table,$col){
global $yy ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE yy = '$yy' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
  
      function trSumb($table,$col,$cola,$vala){
global $yy ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE yy = '$yy' AND $cola = '$vala' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
  
      function trSuman($table,$col){
global $yy ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE yy = '$yy' "); 
$rowa = mysql_fetch_assoc($result); 
return $rowa['value_sum'];
  }
  
      function trSumbn($table,$col,$cola,$vala){
global $yy ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE yy = '$yy' AND $cola = '$vala' "); 
$rowa = mysql_fetch_assoc($result); 
return $rowa['value_sum'];
  }
  
  
  
  
        function trSumc($table,$col,$cola,$vala,$colb,$valb){
global $yy ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE yy = '$yy' AND $cola = '$vala' AND $colb = '$valb' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
  
  
  function trSum2($table,$col){
global $ymd, $rep ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE today = '$ymd' AND rep = '$rep' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
  
  
    function trSum2x($table,$col){
global $ymd, $rep ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE today = '$ymd' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }
  
  
    function trSumC1($table,$col,$prop,$va){
global $ymd, $rep ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE $prop = '$va' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }

  
     function trSumBt($table,$col,$prop,$va){
global $ymd, $rep ;
$result = mysql_query("SELECT SUM($col) AS value_sum FROM $table WHERE today between '$prop' and '$va' "); 
$rowa = mysql_fetch_assoc($result); 
return number_format($rowa['value_sum']);
  }

function userLog(){
if($_SESSION['user'] != 'admin'){
		 header("location: logout.php");  }
			return;
}




    function modalHead($name,$title){
							echo '<div class="modal fade" id="modal-'.$name.'">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times;</span></button>
                <h4 class="modal-title">'.$title.'</h4>
              </div>
              <div class="modal-body">'; return; 
						}
					 function modalFoot($name,$butt){	
					  echo '</div>
              <div class="modal-footer">
              <button type="button" class="btn btn-'.$name.'" data-dismiss="modal">Close</button>'.$butt.' 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>'; return;
					 }
						
?>