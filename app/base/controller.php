<?php
  class BaseController {
    public $view;
    public $model;

    public function __construct() {
      $this->view = new View("template_view.php");
    }

    public function trigger() {
      
    }
  }
?>