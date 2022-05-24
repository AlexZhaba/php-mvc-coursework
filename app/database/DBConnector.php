<?php
  class DBConnector {
    public $conn;
    public function __construct() {
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "12345678";
      $db = "friends_notebook";
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $this->conn = $conn;
    }

    public function closeConnection() {
      mysqli_close($this->conn);
    }
    public function get_all($table_name) {
      $sql = "SELECT * FROM ".$table_name;
      $result = mysqli_query($this->conn, $sql);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $rows;
    }

    public function get_unique($table_name, $id_value, $id_name = "id") {
      $sql = "SELECT * FROM ".$table_name." WHERE ".$id_name."=".$id_value;
      $result = mysqli_query($this->conn, $sql);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $rows;
    }

    public function sql($sql) {
      $result = mysqli_query($this->conn, $sql);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $rows;
    }
    
  }
?>