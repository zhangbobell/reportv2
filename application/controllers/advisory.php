<?php
/**
 * Created by PhpStorm.
 * User: liuya
 * Date: 2015/3/17
 * Time: 11:26
 */

class Advisory extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('madvisory');
    }

    public function index($page = 'advisory') {
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "全案咨询",
            'username' =>$username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('advisory/task_header_add_'.$page);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('advisory/task_'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('advisory/task_footer_script_add_'.$page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('advisory/task_footer_function_add_'.$page);
        $this->load->view('templates/task_footer_final');
    }

    public function questionary($page = 'questionary') {
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "调查问卷",
            'username' =>$username,
            'email' => $email
        );
        $this->load->view('templates/task_header', $data);
        $this->load->view('advisory/task_header_add_advisory');
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('advisory/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('advisory/task_footer_script_add_advisory');
        $this->load->view('templates/task_footer_function');
        $this->load->view('advisory/task_footer_function_add_advisory');
        $this->load->view('templates/task_footer_final');
    }

    public function adv_sucess($page = 'adv_sucess') {
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "提交成功",
            'username' =>$username,
            'email' => $email
        );

        $sales_ac_1 = $this->input->post('sales_ac_1', true);
        $sales_ac_2 = $this->input->post('sales_ac_2', true);
        $sales_ac_3 = $this->input->post('sales_ac_3', true);
        $sales_ac_4 = $this->input->post('sales_ac_4', true);

        $main_cat_1 = $this->input->post('main_cat_1', true);
        $main_cat_2 = $this->input->post('main_cat_2', true);
        $main_cat_3 = $this->input->post('main_cat_3', true);

        $product_positioning_1 = $this->input->post('product_positioning_1', true);
        $product_positioning_2 = $this->input->post('product_positioning_2', true);
        $product_positioning_3 = $this->input->post('product_positioning_3', true);
        $product_positioning_4 = $this->input->post('product_positioning_4', true);

        $competitiveness_1 = $this->input->post('competitiveness_1', true);
        $competitiveness_2 = $this->input->post('competitiveness_2', true);
        $competitiveness_3 = $this->input->post('competitiveness_3', true);
        $competitiveness_4 = $this->input->post('competitiveness_4', true);
        $competitiveness_5 = $this->input->post('competitiveness_5', true);

        $supply_1 = $this->input->post('supply_1', true);
        $supply_2 = $this->input->post('supply_2', true);
        $supply_3 = $this->input->post('supply_3', true);
        $supply_4 = $this->input->post('supply_4', true);
        $supply_5 = $this->input->post('supply_5', true);
        $supply_6 = $this->input->post('supply_6', true);
        $supply_7 = $this->input->post('supply_7', true);
        $supply_8 = $this->input->post('supply_8', true);
        $supply_9 = $this->input->post('supply_9', true);
        $supply_10 = $this->input->post('supply_10', true);

        $superiority_1 = $this->input->post('superiority_1', true);
        $superiority_2 = $this->input->post('superiority_2', true);
        $superiority_3 = $this->input->post('superiority_3', true);

        $competitors_1 = $this->input->post('competitors_1', true);
        $competitors_2 = $this->input->post('competitors_2', true);
        $competitors_3 = $this->input->post('competitors_3', true);

        $aDoor = $_POST['formDoor'];
        if(empty($aDoor))
        {
            $suggestion = "未选择类型";
        }
        else
        {
            $N = count($aDoor);

            for($i=0; $i < $N; $i++)
            {
                if($i < $N - 1) {
                    $aDoor[$i+1] = $aDoor[$i] . ";".$aDoor[$i+1];
                } else {
                    $aDoor[$i+1] = $aDoor[$i] . " ".$aDoor[$i+1];
                }

            }
            $suggestion = $aDoor[$i];
        }

        $insert_val = array(

            'sales' => $this->input->post('sales', true),

            'business_type' => $this->input->post('optionsRadios',true),

            'sales_ac' => "1:".(string)$sales_ac_1.";2:".(string)$sales_ac_2.";3:".(string)$sales_ac_3.";4:".(string)$sales_ac_4,
            'main_cat' => "1:".(string)$main_cat_1.";2:".$main_cat_2.";3:".$main_cat_3,

            'product_positioning' => "1:".(string)$product_positioning_1.";2:".(string)$product_positioning_2
                .";3:".(string)$product_positioning_3.";4:".(string)$product_positioning_4,

            'competitiveness' => "1:".(string)$competitiveness_1.";2:".(string)$competitiveness_2.";3:"
                .(string)$competitiveness_3.";4:".(string)$competitiveness_4.";5:".(string)$competitiveness_5,

            'supply' => "1:".(string)$supply_1.";2:".(string)$supply_2.";3:".(string)$supply_3.";4:"
                .(string)$supply_4.";5:".(string)$supply_5.";6:".(string)$supply_6.";7:".(string)$supply_7
                .";8:".(string)$supply_8.";9:".(string)$supply_9.";10:".(string)$supply_10,

            'superiority' => "1:".(string)$superiority_1.";2:".(string)$superiority_2.";3:".(string)$superiority_3,

            'competitors' => "1:".(string)$competitors_1.";2:".(string)$competitors_2.";3:".(string)$competitors_3,

            'shop' => $this->input->post('shop', true),

            'income' => $this->input->post('income', true),

            'desired_cat' => $this->input->post('desired_cat', true),

            'income_expect' => $this->input->post('income_expect', true),

            'product_coincide' => $this->input->post('product_coincide', true),

            'shop_independent' => $this->input->post('shop_independent', true),

            'distributors' => $this->input->post('distributors', true),

            'erp' => $this->input->post('erp', true),

            'suggestion' => $suggestion,

            'applicant' => $this->input->post('applicant', true),

            'company' => $this->input->post('company', true),

            'email' => $this->input->post('email', true),

            'phone' => $this->input->post('phone', true)

        );

        $this->madvisory->insert_advisory($insert_val);

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('advisory/task_'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }
}