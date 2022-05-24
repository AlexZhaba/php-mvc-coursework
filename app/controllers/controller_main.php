<?php
  class ControllerMain extends BaseController {
    public function __construct() {
      $this->view = new View("template_view.php");
      $this->model = new Channels();
    }

    public function trigger() {
      $this->view->generate("channels_view.php", $this->model->get_data());
    }
  }
?>