<?php
  class User extends Model {
    public $id;
    public function __construct($id) {
      $this->id = $id;
    }
    public function get_data() {
      $db_connector = new DBConnector();
      $user_data = $db_connector->get_unique("Users", $this->id);
      $db_connector->closeConnection();
      return $user_data[0];
    }
  }
?>