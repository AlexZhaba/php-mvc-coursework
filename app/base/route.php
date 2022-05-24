<?php

use PhpMyAdmin\Header;

  class Route {
    static public function start() {
      include "app/models/Channels.php";
      include "app/models/User.php";
      include "app/models/ChannelMessages.php";
      include "app/models/HashTag.php";
      include "app/models/Channel.php";
      include "app/models/Categories.php";

      $url = strtok($_SERVER["REQUEST_URI"], '?');
      switch ($url) {
        case "/": {
          include "app/controllers/controller_main.php";
          $controller = new ControllerMain;
          break;
        }

        case "/channel": {
          include "app/controllers/controller_channel_messages.php";
          // echo $_GET['id'];
          if (!isset($_GET['id']) | !is_numeric($_GET['id'])) {
            header("Location: /");
            break;
          }
          if (!isset($_GET['category'])) {
            $category = "";
          } else {
            $category = $_GET['category'];
          }
          $controller = new ControllerChannelMessages($_GET['id'], $category);
          break;
        }
        default: {
          header("Location: /");
          break;
        }
      }
      $controller->trigger();
      // print_r($url = strtok($_SERVER["REQUEST_URI"], '?'));
    }
  }
?>