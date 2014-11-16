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

        $data['title'] = "价格管控";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('price/header_add_control');
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('price/'.$page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('price/footer_add_control');
        $this->load->view('templates/footer');
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

        $data['title'] = "初次筛选";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('price/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('price/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('price/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    /*
     * get_upset_price_seller : 获取乱价商家名单，以 json 格式返回
     * @param : null
     * return : null
     * */
    public function get_upset_price_seller() {
        $db = $this->input->post('db');
        $updatetime = $this->input->post('updatetime');
        $latestTime = $this->input->post('latestTime');

        $is_history = ($updatetime === $latestTime);

        echo json_encode($this->mprice->get_upset_price_seller_array($db, $updatetime, $is_history));
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

        echo json_encode($this->mprice->get_initial_screen_product_array($db, $updatetime));
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
            $record['min_price'] = $arr[0]['price_min'];
            $record['min_price_wap'] = $arr[0]['price_min_wap'];
        }

        echo $this->mprice->set_checked_record($db, $record);
    }

    public function upload($page = "upload")
    {
        if ( ! file_exists('application/views/price/'.$page.'.php'))
        {
            show_404();
        }

        $data['title'] = "上传价格表";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header', $data);
        $this->load->view('price/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar');
        $this->load->view('price/' . $page,$data);
        $this->load->view('templates/footer_script');
        $this->load->view('price/footer_add_' . $page);
        $this->load->view('templates/footer');
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

}