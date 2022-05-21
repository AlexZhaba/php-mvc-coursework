<?php
  class ControllerMain extends BaseController {
    public function __construct() {
      $this->view = new View("template_view.php");
      $this->model = new FriendList();
    }

    public function trigger() {
      $this->view->generate("main_view.php", $this->model->get_data());
    }
  }
?>