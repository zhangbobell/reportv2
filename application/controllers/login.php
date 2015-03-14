<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-27
 * Time: 下午5:50
 */

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('captcha');
    }

    /*
     *  index : 用户登录界面函数
     *  @$page='index' : 默认调用视图页面
     */
    public function index($page = 'index')
    {
        if ( ! file_exists('application/views/login/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = "用户登录";

        $this->load->view('login/'.$page, $data);
//        $this->load->view('login/login_footer');

    }

    /*
     *  reg_success : 用户注册成功
     *  @$page='reg_success' : 注册成功页面
     */
    public function reg_success($page = 'reg_success') {
        if ( ! file_exists('application/views/login/'.$page.'.php'))
        {
            show_404();
        }
        $username = $this->input->post('username', true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $data['title'] = "注册成功";
        $data['username'] = $username;

        $this->load->model("mlogin");
        $this->mlogin->insert_user($username,$email,md5($password));

        $this->load->view('login/'.$page,$data);
    }

    /*
     *  register : 用户注册
     *  @$page='register' : 注册页面
     */
    public function register($page = 'register') {
        if ( ! file_exists('application/views/login/'.$page.'.php'))
        {
            show_404();
        }
        $data['title'] = "用户注册";
        $this->load->view('login/'.$page,$data);
    }

    /*
     *  logout : 用户退出
     *  @$page='logout' : 退出跳转页面
     */
    public function logout($page = 'logout') {
        if (!file_exists("application/views/login/$page.php")) {
            show_404();
        }

        $data['title'] = "注销登录";

        $this->load->model("mlogin");
        //插入日志文件
        $this->mlogin->insert_log_message($this->session->userdata('username'), "logout", $this->input->ip_address());

        $this->session->sess_destroy();

        $this->load->view("login/$page", $data);
    }

    /*
     * get_captcha : 生成验证码函数
     * @param : null
     * @return : $cap['image'] - 生成的验证码图像代码
     */
    public function get_captcha()
    {
        if($this->session->userdata('captcha') != "")
        {
            $this->del_captcha();
        }

        $vals = array(
            'word' => rand(1000, 10000),
            'img_path' => IMG_DIR.'/captcha/',
            'img_url' => IMG_DIR.'/captcha/',
            'img_width' => '100',
            'img_height' => '30',
            'font_path' => PUB_DIR.'/fonts/texb.ttf'
        );

        $cap = create_captcha($vals);
        $this->session->set_userdata('captcha',$cap['word']);
        $this->session->set_userdata('captcha_url',$cap['time']);

        echo $cap['image'];
    }

    /*
     * del_captcha : 删除验证码文件，用于登录成功以后，以便及时清理空间
     * param : null
     * return : null
     */
    public function del_captcha()
    {
        $path = IMG_DIR.'/captcha/'.$this->session->userdata('captcha_url').'.jpg';
        $this->load->helper('file');
        unlink($path);
    }

    /*
     * validate : 登录ajax操作目的函数，验证输入的验证码，用户名和密码，并echo出不同类型的值表示不同的状态。
     *            若登录成功，则还要进行删除验证码和设置session的操作。
     * param : none
     * return : none
     */
    public function validate()
    {
        define("CAPTCHA_ERROR", "2");
        define("PASSWORD_ERROR", "1");
        define("LOGIN_SUCCESS", "0");

//        $captcha = $this->input->post('captcha', true);
        $username = $this->input->post('username', true);
        $password =  $this->input->post('password', true);

        //验证输入的验证码字段
        // 新版暂无验证码字段
        /*if($captcha != $this->session->userdata('captcha') )
        {
            echo CAPTCHA_ERROR;
            return;
        }*/

        $this->load->model("mlogin");

        //验证用户名密码
        $record = $this->mlogin->validate_user($username, md5($password));
        if($record==-1)
        {
//            echo PASSWORD_ERROR;

            redirect('login/index');
        }
        else
        {
//            echo LOGIN_SUCCESS;

            //删除验证码
//            $this->del_captcha();
//            $this->session->unset_userdata('captcha');
//            $this->session->unset_userdata('captcha_url');

            //设置session数据
            $authDB =  $this->mlogin->get_auth_DB($record['userid']);
            $userdata = array(
                'username'  => $username,
                'email' => $record['email'],
                'authDB'    => $authDB,
                'groupID'   => $record['groupid'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userdata);

            //插入日志文件
            $this->mlogin->insert_log_message($username, "login", $this->input->ip_address());

            redirect('task/my_task');
        }
    }
}
