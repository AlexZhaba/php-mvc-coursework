<?php
  class View {
    public $template_view;

    public function __construct($template_view) {
      $this->template_view = $template_view;
    }

    public function generate($content_view, $data = null) {
      include "app/views/templates/".$this->template_view;
    }
  }
?>