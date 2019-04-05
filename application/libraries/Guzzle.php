<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// require_once COMMONPATH."/third_party/PHPExcel.php";
require_once APPPATH."../vendor/autoload.php";

class Guzzle extends GuzzleHttp\Client {
    public function __construct() {
        parent::__construct();
    }
}
