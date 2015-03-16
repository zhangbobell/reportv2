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
        $this->load->model('mprice');
    }

    /* control : 价格管控主界面
     * @param : page=['control']
     * return : null
     * */
    public function control($page = 'control') {
        if ( ! file_exists('application/views/price/'.$page.'.php'))
        {
            show_404();
        }

        $data = array(
            'title' => "价格管控",
            'username' => $this->session->userdata('username'),
            'authDB' => $this->session->userdata('authDB'),
            'groupID' => $this->session->userdata('groupID')
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('price/header_add_' . $page);
        $this->load->view('templates/task_sidebar_mytask');
        $this->load->view('templates/task_banner');
        $this->load->view('price/' . $page);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('price/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }

    /* control : 初次筛选商品主界面
     * @param : page=['init_screen']
     * return : null
     * */
    public function init_screen($page = 'init_screen') {
        if ( ! file_exists('application/views/price/'.$page.'.php'))
        {
            show_404();
        }

        $data = array(
            'title' => "初次筛选",
            'username' => $this->session->userdata('username'),
            'authDB' => $this->session->userdata('authDB'),
            'groupID' => $this->session->userdata('groupID')
        );


        $this->load->view('templates/task_header', $data);
        $this->load->view('price/header_add_' . $page);
        $this->load->view('templates/task_sidebar_mytask');
        $this->load->view('templates/task_banner');
        $this->load->view('price/' . $page);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('price/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');

    }

    /*
     * get_upset_price_seller : 获取乱价商家名单，以 json 格式返回
     * @param : null
     * return : null
     * */
    public function get_upset_price_seller() {
        $db = $this->input->post('db');
        $updatetime = $this->input->post('updatetime');
//        $latestTime = $this->input->post('latestTime');

//        $is_history = ($updatetime === $latestTime);

        echo json_encode($this->mprice->get_upset_price_seller_array($db, $updatetime, false));
    }

    /*
     * get_upset_price_product : 获取乱价商家名单，以 json 格式返回
     * @param : null
     * return : null
     * */
    public function get_upset_price_product() {
        $db = $this->input->post('db');
        $updatetime = $this->input->post('updatetime');
        $sellernick = $this->input->post('sellernick');

        echo json_encode($this->mprice->get_upset_price_product_array($db, $updatetime, $sellernick));
    }

    /*
     * set_upset_price_reult : 写入商家的乱价判定结果
     * @param : null
     * return : null
     **/
    public function set_upset_price_result() {
        $db = $this->input->post('db');
        $sellernick = $this->input->post('sellernick');
        $username = $this->session->userdata('username');
        $status = $this->input->post('status');
        $msg = $this->input->post('msg');

        echo $this->mprice->set_upset_price_record($db, $sellernick, $username, $status, $msg);
    }

    /*
     * get_init_screen_product : 获取初次筛选的产品名单
     * @param : null
     * return : null
     **/
    public function get_init_screen_product() {
        $db = $this->input->post('db');
        $updatetime = $this->input->post('updatetime');
        $requestPage = $this->input->post('requestPage');
        $pageSize = $this->input->post('pageSize') + 0;
        $startIndex = $requestPage * $pageSize;
        $orderBy = $this->input->post('orderBy');
        $isAsc = $this->input->post('isAsc');

        echo json_encode($this->mprice->get_initial_screen_product_array($db, $updatetime, $startIndex, $pageSize, $orderBy, $isAsc));
    }

    public function set_checked_record() {
        $db = $this->input->post('db');
        $record = array(
            'updatetime' => date("Y-m-d"),
            'sellernick' => $this->input->post('sellernick'),
            'itemnum' => $this->input->post('itemnum'),
            'itemid' => $this->input->post('itemid'),
            'is_reviewed_item' => $this->input->post('is_reviewed_item'),
            'min_price' => null,
            'min_price_wap' => null
        );

        $arr = $this->mprice->get_min_price($db, $record['itemnum']);
        if (count($arr) != 0) {
            $record['min_price'] = $arr[0]['min_price'];
            $record['min_price_wap'] = $arr[0]['min_price_wap'];
            $record['min_price_time'] = $arr[0]['updatetime'];
        }

        echo ($this->mprice->set_checked_record($db, $record));
    }

    public function upload($page = "upload")
    {
        if ( ! file_exists('application/views/price/'.$page.'.php'))
        {
            show_404();
        }

        $data = array(
            'title' => "上传价格表",
            'username' => $this->session->userdata('username'),
            'authDB' => $this->session->userdata('authDB'),
            'groupID' => $this->session->userdata('groupID')
        );


        $this->load->view('templates/task_header', $data);
        $this->load->view('price/header_add_' . $page);
        $this->load->view('templates/task_sidebar_mytask');
        $this->load->view('templates/task_banner');
        $this->load->view('price/' . $page);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('price/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }

    public function refresh_meta_item() {
        $db = $this->input->post('db');

        echo $this->mprice->refresh_meta_item($db);
    }

    public function  get_upset_history() {
        $db = $this->input->post('db');
        $sellernick = $this->input->post('sellernick');

        echo json_encode($this->mprice->get_upset_history($db, $sellernick));
    }

    public function get_unreviewed_count() {
        $db = $this->input->post('db');
        $updatetime = $this->input->post('updatetime');

        $res = $this->mprice->get_unreviewed_count($db, $updatetime);
        echo $res[0]['count_item'];
    }

    public function get_latest_crawl_time() {
        $db = $this->input->post('db');

        echo $this->mprice->latest_crawl_item_time($db);
    }

    public function get_meta_item_count() {
        $db = $this->input->post('db', true);
        $updatetime = $this->input->post('updatetime', true);

        $res = $this->mprice->get_meta_item_count($db, $updatetime);

        echo $res[0]['item_count'];
    }

    public function get_available_datetime() {
        $db = $this->input->post('db');

        echo json_encode($this->mprice->get_available_datetime($db));
    }
}