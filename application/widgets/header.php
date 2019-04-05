<?php
  class header extends Widget {
    public function display($args = array()) {
      $args['menu_items'] = ENV['menu_items'];
      $this->view('widgets/header', $args);
    }
  }
?>
