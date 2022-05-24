<?php
  class ControllerChannelMessages extends BaseController {
    public function __construct($channel_id, $category) {
      $this->view = new View("template_view.php");
      $this->model = new ChannelMessages($channel_id, $category);
    }

    public function trigger() {
      $this->view->generate("channel_messages_view.php", $this->model->get_data());
    }
  }
?>