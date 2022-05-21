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
      echo "ALL GOOD";
  }

  public function closeConnection() {
    mysqli_close($this->conn);
  }
}
?>