<?php
if(isset($_POST['submit'])){
$dbhost=$_POST['dbhost'];
$dbuname=$_POST['dbuname'];
$dbpass=$_POST['dbpass'];
$path_to_file = 'includes/connect.inc.php';
$file_contents = file_get_contents($path_to_file);
$file_contents = str_replace("dbhost", $dbhost, $file_contents);
$file_contents = str_replace("dbuname", $dbuname, $file_contents);
$file_contents = str_replace("dbpass", $dbpass, $file_contents);
file_put_contents($path_to_file, $file_contents);


$con=mysql_connect("$dbhost","$dbuname","");
if(!$con){
die("could not connect to db :" . mysql_error());
}
$db = mysql_select_db("expirysystem");
if(!$db){
  $sql = 'CREATE DATABASE expirysystem';
  if (mysql_query($sql, $con)) {
   // echo "Database my_db created successfully\n";
   $con = mysqli_connect($dbhost, $dbuname, $dbpass, 'expirysystem');

$filename = 'expirysystem.sql';
$handle = fopen($filename, 'r+');
$contents = fread($handle, filesize($filename));

$sql = explode(";", $contents);
foreach ($sql as $query) {
	$result = mysqli_query($con, $query);
	if ($result) {
		$exportres=true;
	}
}

fclose($handle);
if ($exportres==true) {
  echo "<script language='javascript'> alert ('Database created successful');</script> "; 
  echo "<script language='javascript'> window.location.replace('../index.php');</script> ";  
}

} else {
    echo 'Error creating database: ' . mysql_error() . "\n";
}
}else{
  echo "<script language='javascript'> alert ('Database created successful');</script> "; 
  echo "<script language='javascript'> window.location.replace('http://localhost/ronexpos/');</script> ";  

}
}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ronex POS setup</title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Setup Database</div>
    <div class="content">
      <form  method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Host</span>
            <input type="text" placeholder="Enter your name" name="dbhost" required>
          </div>
        
          <div class="input-box">
            <span class="details">DB Username</span>
            <input type="text" placeholder="Enter your username" name="dbuname" required>
          </div>
         
          <div class="input-box">
            <span class="details">DB Password</span>
            <input type="text" placeholder="Enter your password" name="dbpass" >
          </div>
        
        </div>
       
        <div class="button">
          <input type="submit" name="submit" value="Continue">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
