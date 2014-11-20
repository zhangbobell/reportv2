<?php
/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-19
 * Time: 上午9:09
 */

class Graph extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {



    }

    public function init_graph($page = "init_graph")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }

        $this->load->library('saiku');

        $res = $this->saiku->get_json_data('report_monthly_cooperation_status_sellernick_num');

        $data['title'] = "查看报表";
        $data['username'] = $this->session->userdata('username');
        $data['json'] = $res;

        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }


}

