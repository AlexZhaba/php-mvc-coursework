<?php
  class Channel extends Model {
    public $id;
    public function __construct($id) {
      $this->id = $id;
    }
    public function get_data() {
      $db_connector = new DBConnector();
      $channel_data = $db_connector->get_unique("Channels", $this->id);
      $db_connector->closeConnection();
      if (count($channel_data) == 0) {
        return null;
      }
      if ($channel_data[0]["isLike"] == 0) {
        header("Location: /");
      }
      return $channel_data[0];
    }
  }
?>