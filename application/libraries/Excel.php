<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-31
 * Time: 上午10:22
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel/PHPExcel.php";

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}