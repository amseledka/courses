<?
  $con = mysql_connect('localhost', 'wfuser', '123');
    if (!$con) {
      die('Could not connect: ' . mysql_error());
        }
  mysql_select_db("courses", $con);
  
  $user_id = mysql_query("SELECT id FROM users WHERE email='$_SESSION[email]'", $con) or die('Error: ' . mysql_error());

  $sql= "INSERT INTO posts (title, post, user_id, date_posted) VALUES ('$_POST[title]', '$_POST[body]', '$user_id', 'date("Y-m-d")')";

  $result = mysql_query($sql,$con) or die('Error: ' . mysql_error());

  if ($result) {
  header("Location: http://localhost/index.php");
  }
  else {
    echo "somithing went wrong";
  }

mysql_close($con);
?>