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

    public function my_task($page = 'my_task') {
        if ( ! file_exists('application/views/task/'.$page.'.php')) {
            show_404();
        }

        $username = $this->session->userdata('username');
        $authDB = $this->session->userdata('authDB');

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
            'authDB' => $authDB,
            'groupID' => $this->session->userdata('groupID'),
            'task_list' => $task_list
        );

//        $this->load->view('templates/header', $data);
//        $this->load->view('task/header_add_'.$page);
//        $this->load->view('templates/banner');
//        $this->load->view('templates/sidebar_task');
//        $this->load->view('task/'.$page);
//        $this->load->view('templates/footer_script');
//        $this->load->view('task/footer_add_'.$page);
//        $this->load->view('templates/footer');
        $this->load->view('templates/header_task', $data);
        $this->load->view('templates/sliderbar_task');
        $this->load->view('templates/banner_task');
        $this->load->view('task/task_home');
        $this->load->view('templates/footer_task');
        $this->load->view('templates/footer_task_script');
        $this->load->view('templates/footer_function_task');
        $this->load->view('templates/footer_final_task');
    }

    public function assign($page = 'assign') {
        if ( ! file_exists('application/views/task/'.$page.'.php'))
        {
            show_404();
        }

        $username = $this->session->userdata('username');
        $authDB = $this->session->userdata('authDB');

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
            'authDB' => $authDB,
            'groupID' => $this->session->userdata('groupID'),
            'task_list' => $task_list,
            'user_list' => $user_list,
            'action_type_list' => $action_type_list
        );

        $this->load->view('templates/header', $data);
        $this->load->view('task/header_add_'.$page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_task');
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