<?php 
error_reporting(0);
session_start();
	$con=mysql_connect('localhost','root','Ronextec112..');
if(!$con){
die("could not connect to db :" . mysql_error());
}
$db = mysql_select_db('expirysystem');
if(!$db){
die("could not select db:" . mysql_error());
}
?>

                      <?php 
							$query=mysql_query("select * FROM stock ORDER BY item ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($pid==$row['sn']){echo 'selected';} ?> value="<?php echo $row['sn'];?>" ><?php echo $row['item'].' / '.$row['cat'] ;?></option><?php }  ?>