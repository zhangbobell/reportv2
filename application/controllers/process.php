<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 2015/3/17
 * Time: 21:08
 */

class Process extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mprocess');
    }

    /*
     *  index : 流程定制平台界面函数
     *  @$page='index' : 默认调用视图页面
     */
    public function index($page = 'index')
    {
        if (!file_exists('application/views/process/' . $page . '.php')) {
            show_404();
        }

        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "流程定制平台",
            'username' =>$username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('process/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }

    public function sup_sucess($page = 'sup_sucess') {
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "提交成功",
            'username' =>$username,
            'email' => $email
        );

        $sup_info = array(
            'apply_type' => '业务流程管理开通申请',
            'company' => $this->input->post('company', true),
            'email' =>$this->input->post('email', true),
            'applicant'=> $this->input->post('applicant', true),
            'phone' => $this->input->post('phone', true),
            'reason' => $this->input->post('reason',true)
        );

        $this->mprocess->insert_sup_info($sup_info);

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('process/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }
}