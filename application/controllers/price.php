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

    /*
     * get_upset_price_seller : 获取乱价商家名单，以 json 格式返回
     * @param : null
     * return : null
     * */
    public function get_upset_price_seller() {
        $db = $this->input->post('db');
        $updatetime = $this->input->post('updatetime');

        echo json_encode($this->mprice->get_upset_price_seller_array($db, $updatetime));
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

    public function read_excel() {

        // 加载 excel 类
        $this->load->library('excel');
        $filePath = 'http://localhost/abc.xlsx';

        $objPHPExcel = PHPExcel_IOFactory::load($filePath);

        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();


        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

            // 表头包含第一行的数据
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }

        $data['header'] = $header;
        $data['values'] = $arr_data;

        var_dump($data);
    }
}