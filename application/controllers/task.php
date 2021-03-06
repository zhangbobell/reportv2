<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 2015/1/19
 * Time: 11:26
 */

class Task extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('mtask');
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
            'apply_type' => '专家系统集成开通申请',
            'company' => $this->input->post('company', true),
            'email' =>$this->input->post('email', true),
            'applicant'=> $this->input->post('applicant', true),
            'phone' => $this->input->post('phone', true),
            'reason' => $this->input->post('reason',true)
        );

        $this->mtask->insert_sup_info($sup_info);

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('task/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
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
            'title' => "专家系统集成",
            'username' =>$username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('task/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }

    public function mailpage($prepage = 'mytask', $page = 'mailpage') {
        $email = $this->session->userdata('email');
        if($prepage == 'decision') {
            $mailtitle = '商业智能定制';
            $send_applymail = true;
            $sendfor = '平台开通';
        } else if ($prepage == 'process'){
            $mailtitle = '业务流程管理';
            $send_applymail = true;
            $sendfor = '平台开通';
        } else {
            $mailtitle = 'other';
            $send_applymail = false;
            $sendfor = '反馈问题';
        }
        $username = $this->session->userdata('username');
        $data = array(
            'title' => "联系我们",
            'mailtitle' => $mailtitle,
            'send_applymail' => $send_applymail,
            'sendfor' => $sendfor,
            'username' => $username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('task/task_header_add_'.$page);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('task/task_'.$page);

        $this->load->view('templates/task_footer');

        $this->load->view('templates/task_footer_script');
        $this->load->view('task/task_footer_script_add_'.$page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('task/task_footer_function_add_'.$page);
        $this->load->view('templates/task_footer_final');
    }

    public function summary($page = 'summary') {
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "任务概要",
            'username' => $username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('task/task_header_add_'.$page);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');

        $this->load->view('task/task_'.$page);
        $this->load->view('templates/task_footer');

        $this->load->view('templates/task_footer_script');
        $this->load->view('task/task_footer_script_add_'.$page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('task/task_footer_function_add_'.$page);
        $this->load->view('templates/task_footer_final');
    }

    public function task_list($page = 'task_list') {

        $username = $this->session->userdata('username');
        $authDB = $this->session->userdata('authDB');
        $email = $this->session->userdata('email');

        if (!$authDB || count($authDB) == 0) {
            show_error('没有授权的数据库，请登录或联系管理员');
            exit();
        }

        $firstDB = '';
        foreach($authDB as $k => $v) {
            $firstDB = $k;
            break;
        }

        $task_list = $this->mtask->get_task_list_by_username($firstDB, $username)->result_array();
        $data = array(
            'title' => "任务列表",
            'username' => $username,
            'email' => $email,
            'authDB' => $authDB,
            'groupID' => $this->session->userdata('groupID'),
            'task_list' => $task_list
        );
        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('task/task_mytask');
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
//        $this->load->view('task/task_footer_script_add_summary');
        $this->load->view('templates/task_footer_function');
//        $this->load->view('task/task_footer_function_add_summary');
        $this->load->view('templates/task_footer_final');
    }

    public function my_task($page = 'my_task') {
        if ( ! file_exists('application/views/task/'.$page.'.php')) {
            show_404();
        }

        $username = $this->session->userdata('username');
        $authDB = $this->session->userdata('authDB');
        $email = $this->session->userdata('email');

        if (!$authDB || count($authDB) == 0) {
                show_error('没有授权的数据库，请登录或联系管理员');
                exit();
        }

        $firstDB = '';
        foreach($authDB as $k => $v) {
            $firstDB = $k;
            break;
        }


        $task_list = $this->mtask->get_task_list_by_username($firstDB, $username)->result_array();


        $data = array(
            'title' => "我的任务",
            'username' => $username,
            'email' => $email,
            'authDB' => $authDB,
            'groupID' => $this->session->userdata('groupID'),
            'task_list' => $task_list
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('task/task_summary');

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('task/task_footer_script_add_summary');
        $this->load->view('templates/task_footer_function');
        $this->load->view('task/task_footer_function_add_summary');
        $this->load->view('templates/task_footer_final');
    }

    // 任务详情页面
    public function detail($db, $id = '0') {

        $task_detail = $this->mtask->get_task_detail($db, $id);
        $task_base = $this->mtask->get_task_list_by_id($db, $id)->result_array();
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');

        $data = array(
            'title' => '任务详情',
            'task_detail' => $task_detail,
            'task_base' => $task_base,
            'username' => $username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('task/task_taskdetail');
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }

    public function assign($page = 'assign') {
        if ( ! file_exists('application/views/task/'.$page.'.php'))
        {
            show_404();
        }

        $username = $this->session->userdata('username');
        $authDB = $this->session->userdata('authDB');
        $email = $this->session->userdata('email');

        if (!$authDB || count($authDB) == 0) {
            show_error('没有授权的数据库，请登录或联系管理员');
            exit();
        }

        $firstDB = '';
        foreach($authDB as $k => $v) {
            $firstDB = $k;
            break;
        }

        $task_list = $this->mtask->get_all_task_list($firstDB)->result_array();
        $user_list = $this->mtask->get_all_user('etc_privileges')->result_array();
        $action_type_list = $this->mtask->get_all_action_type($firstDB)->result_array();

        $data = array(
            'title' => "指派任务",
            'username' => $username,
            'email' => $email,
            'authDB' => $authDB,
            'groupID' => $this->session->userdata('groupID'),
            'task_list' => $task_list,
            'user_list' => $user_list,
            'action_type_list' => $action_type_list
        );

        $this->load->view('templates/header', $data);
        $this->load->view('task/header_add_'.$page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('task/'.$page);
        $this->load->view('templates/footer_script');
        $this->load->view('task/footer_add_'.$page);
        $this->load->view('templates/footer');
    }

    public function get_task_detail_by_id() {
        $db = $this->input->post('db', true);
        $taskId = $this->input->post('taskId', true);

        $taskDetail = $this->mtask->get_task_detail_by_id($db, $taskId)->result_array();

        echo json_encode($taskDetail);
    }

    public function get_task_abstract_by_id() {
        $db = $this->input->post('db', true);
        $taskId = $this->input->post('taskId', true);

        $taskAbs = $this->mtask->get_task_abstract_by_id($db, $taskId)->result_array();

        echo json_encode($taskAbs);
    }

    public function process_task() {
        $db = $this->input->post('db', true);
        $taskId = $this->input->post('taskId', true);
        $status = $this->input->post('status', true);

        $res = $this->mtask->complete_task($db, $taskId, $status);

        echo json_encode($res);
    }

    public function process_task_item() {
        $db = $this->input->post('db', true);
        $taskId = $this->input->post('taskId', true);
        $task_item_obj = $this->input->post('task_item_obj', true);
        $task_item_result = $this->input->post('task_item_result', true);

        $res = $this->mtask->complete_task_item($db, $taskId, $task_item_obj, $task_item_result);

        echo json_encode($res);
    }

    public function get_activity_abstract_by_id() {
        $db = $this->input->post('db', true);
        $actiId = $this->input->post('actiId', true);

        $actiAbs = $this->mtask->get_acti_abstract_by_id($db, $actiId)->result_array();

        echo json_encode($actiAbs);
    }

    public function get_activity_detail_by_id() {
        $db = $this->input->post('db', true);
        $actiId = $this->input->post('actiId', true);

        $actiDetail = $this->mtask->get_acti_detail_by_id($db, $actiId)->result_array();

        echo json_encode($actiDetail);
    }

    public function process_assign() {
        $db = $this->input->post('db', true);
        $actiId = $this->input->post('actiId', true);
        $username = $this->input->post('username', true);
        $actType = $this->input->post('actType', true);
        $actName = $this->input->post('actName', true);

        $res = $this->mtask->add_assign($db, $actiId, $username, $actType, $actName);

        echo json_encode($res);
    }
}