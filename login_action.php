<?php
	$con = mysql_connect('localhost', 'wfuser', '123');
	  if (!$con) {
	    die('Could not connect: ' . mysql_error());
	      }
	mysql_select_db("courses", $con);

  $email=$_POST[email];
  $password=$_POST[password];
	$sql= "SELECT * FROM users WHERE email='$email' and password='$password'";
	$result = mysql_query($sql,$con) or die('Error: ' . mysql_error());

  $count=mysql_num_rows($result);

	if ($count==123) {
	session_register("email");
  session_register("password");
  header("location:index.php");
	}
  else {
  echo "Wrong Username or Password";
  }
	mysql_close($con);
?>