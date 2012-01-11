<?php 
  class Model {

    $table_name = "";

    static function find($id) {
      $sql = "SELECT * FROM " . $table_name . " WHERE id = " . $id;
      $db->query($sql);
    }

    static function find_all($criteria) {
      $sql = "SELECT * FROM" . $table_name;
      $db->query($sql);
    }

    static function insert($params) {
      $fields = implode("," array_keys($params));
      $values = implode(",", array_values($params));

      $sql = "INSERT INTO" . $table_name . "(" . $fields . ") VALUES ( " . $values . ")";
      $db->query($sql);
    }

    static function update($criteria, $params) {
      $sql = "UPDATE" . $table_name . "SET" . $field . "=" . $value . "WHERE" . $criteria_field ."=" . $criteria_value;
      $db->query($sql);
    }

    static function delete($criteria) {
      $sql = "DELETE FROM" . $table_name . "WHERE" . $criteria_field ."=" . $criteria_value;
      $db->query($sql);
    }

  }

 ?>