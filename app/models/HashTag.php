<?php
  class Hashtag extends Model {
    public $id;
    public function __construct($id) {
      $this->id = $id;
    }
    public function get_data() {
      $db_connector = new DBConnector();
      $hashtag_data = $db_connector->get_unique("Hashtags", $this->id);
      $db_connector->closeConnection();
      return $hashtag_data[0];
    }
  }
?>