<?php 
  class Database {
    function __construct() {
        $con = mysql_connect('localhost', 'wfuser', '123');
        if (!$con) {
          die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("courses", $con);
    }

    function query($query) {
      mysql_query($query);
    }

  }

  $db = new Database();


  $sql= "INSERT INTO users (email, password) VALUES ('$_POST[email]', '$pass')";

  $result = mysql_query($sql,$con) or die('Error: ' . mysql_error());

  if ($result) {
  header("Location: http://localhost/index.php");
  }

  mysql_close($con);
 ?>