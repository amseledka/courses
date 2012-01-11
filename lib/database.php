<?php 
class Database {
  
  $con = "";
  $error = "";
  $select_db = "";
  $query = "";
  $close = "";
  
  protected static $db; 

  private function __construct() {}
  private function __clone() {}
  private function __wakeup() {}
  
  public static function getInstance() {
        if ( is_null(self::$db) ) {
            self::$db = new Databases;
        }
        return self::$db;
    }
  function  connection() {
    $con
    if (!$con) {
      die $error;
    }
    $select_db
  }
  function query($sql) {
      $query or die($error);
    }
}
?>

