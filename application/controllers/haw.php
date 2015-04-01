<?php
/**
 * Created by IntelliJ IDEA.
 * User: zeroleaf
 * Date: 2015/4/1
 * Time: 11:23
 */
class Haw extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('saiku');
        $this->load->model('mhaw');
    }

    function index() {
        echo "hello";
        die;
        $this->render('index');
    }

    public function render($view) {
        $this->load->view('haw/' . $view);
    }

}