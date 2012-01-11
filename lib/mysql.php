<?php 
class Mysql extends Database {
  $con = "mysql_connect('localhost', 'wfuser', '123');";
  $error = "mysql_error();";
  $select_db = "mysql_select_db("courses", $con);";
  $query = "mysql_query($sql,$con);";
  $close = "mysql_close($con);";
}
 ?>
 