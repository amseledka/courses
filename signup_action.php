<html>  
<body>
<?php
$con = mysql_connect('localhost', 'wfuser', '123');
  if (!$con) {
    die('Could not connect: ' . mysql_error());
      }
mysql_select_db("courses", $con);

$pass = md5($_POST[password]);
$sql= "INSERT INTO users (email, password) VALUES ('$_POST[email]', '$pass')";

$result = mysql_query($sql,$con) or die('Error: ' . mysql_error());

if ($result) {
header("Location: http://localhost/index.php");
}

mysql_close($con);
?>

</body>
</html>