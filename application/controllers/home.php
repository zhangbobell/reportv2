<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 2015/3/17
 * Time: 21:04
 */

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     *  index : 用户登录界面函数
     *  @$page='index' : 默认调用视图页面
     */
    public function index($page = 'index')
    {
        if (!file_exists('application/views/home/' . $page . '.php')) {
            show_404();
        }

        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "首页",
            'username' => $username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('home/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }
}
