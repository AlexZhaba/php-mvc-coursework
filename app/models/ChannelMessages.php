<?php
  class ChannelMessages extends Model {
    public $channel_id;
    public $category;
    public $channel;
    public function __construct($channel_id, $category) {
      $this->channel_id = $channel_id;
      $this->category = $category;
    }

    public function get_data() {
      $db_connector = new DBConnector();
      $this->channel = new Channel($this->channel_id);
      if ($this->category == "") {
        $pure_messages = $db_connector->get_unique("Messages", $this->channel_id, "channel_id");
      } else {
        $pure_messages = $db_connector->sql('SELECT * FROM Messages where hashtag_id=
        (SELECT hashtag_id from Categories_hashtags_relations where category_id=
        (SELECT id from Categories where name="'.$this->category.'"))');
      }
      if ($this->channel->get_data() == null) {
        header('Location: /');
        return;
      }
      foreach ($pure_messages as &$message) {
        $user = new User($message["user_id"]);
        if (!is_null($message["hashtag_id"])) {
          $hashtag = new Hashtag($message["hashtag_id"]);
          $message["hashtag"] = $hashtag->get_data();
        }
        $message["user"] = $user->get_data();
      }

      $db_connector->closeConnection();

      $result["messages"] = $pure_messages;
      $result["channel"] = $this->channel->get_data();

      $categories = new Categories();
      $result["categories"] = $categories->get_data();
      $result["activeCategory"] = $this->category;
      return $result;
    }
  }
?>