<?php
  class Categories extends Model {
    public function get_data() {
      $db_connector = new DBConnector();
      $categories_data = $db_connector->get_all("Categories");
      $db_connector->closeConnection();
      return $categories_data;
    }
  }
?>