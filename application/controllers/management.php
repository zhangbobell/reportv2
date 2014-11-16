<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-28
 * Time: 下午7:57
 */

class Management extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mmanagement');
    }

    /*
     * management_user() ： 用户管理
     * @param : null
     * return : null
     */
    public function user($page = "user"){
        if ( ! file_exists('application/views/management/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = "用户管理";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
     * get_management_user : 获取用户的信息，以 json 格式返回
     * @param : null
     * */
    public function get_init_user() {
        $db = $this->input->post('db');

        echo json_encode($this->mmanagement->get_init_user($db));
    }

    /*
     * user_add : 加载添加用户的主界面
     * @param : null
     * return : null
     * */
    public function user_add($page = "user_add") {
        if ( ! file_exists('application/views/management/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = "添加用户";
        $data['username'] = $this->session->userdata('username');

        $data['all_project'] = $this->mmanagement->get_all_project();

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
    * function：添加用户
    */
    public function add_user() {
        $db = 'etc_privileges';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $groupid = $this->input->post('group');
        $auth_project = $this->input->post('auth_project');
        $is_valid = $this->input->post('is_valid');

        $res = $this->mmanagement->add_user($db, $username, md5($password), $groupid, $is_valid);

        //当插入用户是其他错误时（插入的用户已经存在），显示不同的警告提示
        if (!$res) {
            echo 3;
            return;  //直接返回函数，无须进行下面处理
        }

        $uid = $this->mmanagement->get_uid($db, $username);
        $tag = true;
        $date = date('Y-m-d H:i:s');  //获取当前的时间
        for($i=0; $i<count($auth_project); $i++){
            $tag = $tag && $this->mmanagement->insert_user_project($db, $uid, $auth_project[$i], $date);
        }

        echo ($res && $tag);
    }

    /*
    * function：获取用户的id
    */
    public function check_user_name(){
        $db = 'etc_privileges';
        $username = $this->input->post('username');

        echo $this->mmanagement->check_user_name($db, $username);
    }

    public function user_delete($page = "user_delete"){
        if ( ! file_exists('application/views/management/'.$page.'.php')){
            show_404();
        }
        $data['title'] = "删除项目";
        $data['username'] = $this->session->userdata('username');
        $data['all_user'] = $this->mmanagement->get_all_user();

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    public function delete_user(){
        $db = "etc_privileges";
        $userid = $this->input->post('userid');

        $tag = true;
        for($i=0; $i<count($userid); $i++){
            $tag = $tag &&
                $this->mmanagement->delete_user($db, $userid[$i]);
        }

        if ($tag){
            $res = json_encode($this->mmanagement->get_all_user());
            echo $res;
        } else {
            echo $tag;
        }
    }

    public function user_edit($page = "user_edit"){
        if ( ! file_exists('application/views/management/'.$page.'.php')){
            show_404();
        }
        $data['title'] = "编辑用户";
        $data['username'] = $this->session->userdata('username');
        $data['all_user'] = $this->mmanagement->get_all_user();
        $data['all_project'] = $this->mmanagement->get_all_project();

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
    * function：选择所要展示的用户信息
    */
    public function chose_user(){
        $db = "etc_privileges";
        $userid = $this->input->post('userid');

        echo json_encode($this->mmanagement->show_user($db, $userid));
    }

    /*
     * function：修改数据库中的项目
     */
    public function update_user(){
        $db = "etc_privileges";
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $groupid = $this->input->post('group');
        $pid = $this->input->post('auth_project');
        $is_valid = $this->input->post('is_valid');
        $uid = $this->input->post('uid');
        $tag = $this->input->post('tag');

        if($tag == 'true'){//修改密码
            $res = $this->mmanagement->update_user_changepassword($db, $username, md5($password), $groupid, $is_valid, $uid);
        }else {//不修改密码
            $res = $this->mmanagement->update_user_holdpassword($db, $username, $groupid, $is_valid, $uid);
        }

        $tag = true;
        $date = date('Y-m-d H:i:s');
        for($i=0; $i<count($pid); $i++){
            $tag = $tag &&
                $this->mmanagement->insert_user_project($db, $uid, $pid[$i], $date);
        }

        echo $res;
    }

    /*
    * management_project() ：加载项目管理界面
    * @param : null
    * return : null
    */
    public function project($page = "project"){
        if ( ! file_exists('application/views/management/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = "项目管理";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
    * function：获取数据库中的项目
    */
    public function get_init_project(){
        $db = "etc_privileges";

        echo json_encode($this->mmanagement->get_init_project($db));
    }

    /*
     * function:加载增加项目界面
     */
    public function project_add($page = "project_add"){
        if ( ! file_exists('application/views/management/'.$page.'.php')){
            show_404();
        }
        $data['title'] = "增加项目";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
     * function：增加项目
     */
    public function add_project(){
        $db = "etc_privileges";
        $projectname = $this->input->post('projectname');
        $projectdb = $this->input->post('projectdb');
        $is_valid = $this->input->post('is_valid');
        $pid = abs(crc32(crc32($this->input->post('projectName', TRUE)) . date('YmdHis')));

        $res = $this->mmanagement->add_project($db, $projectname, $projectdb, $is_valid, $pid);
        if(!$res){
            echo 3;
            return;
        }
        echo $res;
    }

    /*
    * function：获取数据库中的项目id
    */
    public function check_project_name(){
        $db = "etc_privileges";
        $projectname = $this->input->post('projectname');

        $res = $this->mmanagement->check_project_name($db, $projectname);
        echo $res;
    }

    public function project_delete($page = "project_delete"){
        if ( ! file_exists('application/views/management/'.$page.'.php')){
            show_404();
        }
        $data['title'] = "删除项目";
        $data['username'] = $this->session->userdata('username');
        $data['all_project'] = $this->mmanagement->get_all_project();

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
     * function：删除数据库中的项目
     */
    public function delete_project(){
        $db = "etc_privileges";
        $projectid = $this->input->post('projectid');

        $tag = true;
        for($i=0; $i<count($projectid); $i++){
            $tag = $tag &&
                $this->mmanagement->delete_project($db, $projectid[$i]);
        }

        if ($tag){
            $res = json_encode($this->mmanagement->get_all_project());
            echo $res;
        } else {
            echo $tag;
        }
    }

    public function project_edit($page = "project_edit"){
        if ( ! file_exists('application/views/management/'.$page.'.php')){
            show_404();
        }
        $data['title'] = "编辑项目";
        $data['username'] = $this->session->userdata('username');
        $data['all_project'] = $this->mmanagement->get_all_project();

        $this->load->view('templates/header', $data);
        $this->load->view('management/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('management/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('management/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
     * function：展示数据库中的项目
     */
    public function chose_project(){
        $db = "etc_privileges";
        $projectid = $this->input->post('projectid');

        echo json_encode($this->mmanagement->show_project($db, $projectid));
    }

    /*
     * function：修改数据库中的项目
     */
    public function update_project(){
        $db = "etc_privileges";
        $projectname = $this->input->post('projectname');
        $projectdb = $this->input->post('projectdb');
        $is_valid = $this->input->post('is_valid');
        $pid = $this->input->post('pid');
        $updatetime = date('Y-m-d H:i:s');

        echo $this->mmanagement->update_project($db, $projectname, $projectdb, $is_valid, $pid, $updatetime);
    }
}