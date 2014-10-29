<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-28
 * Time: 下午7:57
 */

class Price extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /* control : 价格管控主界面
     * @param : page=['control']
     * return : null
     * */
    function control($page = 'control') {
        if ( ! file_exists('application/views/price/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = "价格管控";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('price/'.$page);
        $this->load->view('templates/footer');
    }
}