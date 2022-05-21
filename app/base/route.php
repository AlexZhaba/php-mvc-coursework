<?php
  class Route {
    static public function start() {
      include "app/controllers/controller_main.php";
      include "app/models/FriendList.php";

      $controller = new ControllerMain;
      $controller->trigger();
    }
  }
?>