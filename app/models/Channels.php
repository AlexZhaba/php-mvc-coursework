<?php
  class Channels extends Model {
    public function get_data() {
      $db_connector = new DBConnector();
      $channels = $db_connector->get_all("Channels");
      $db_connector->closeConnection();
      return $channels;
    }
  }
?>