<?php
/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-19
 * Time: 上午9:09
 */

class Graph extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('saiku');
    }

    public function index()
    {

        $this->load->library('saiku');

        $res = $this->saiku->get_json_data('sanqiang_report_daily_order');

        print_r(json_encode($res));

    }

    public function init_first($page = "init_first")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "第一时间";
        $data['username'] = $this->session->userdata('username');


        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_init_graph');
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    public function init_tendency($page = "init_tendency")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "渠道规模";
        $data['username'] = $this->session->userdata('username');


        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_init_graph');
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }


    public function init_product($page = "init_product")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "渠道质量";
        $data['username'] = $this->session->userdata('username');


        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_init_graph');
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }




    public function init_target($page = "init_target")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "目标管理";
        $data['username'] = $this->session->userdata('username');


        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_init_graph');
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    public function get_chart_data()
    {
        $saikufile = $this->input->post('saikufile');
//        $saikufile = 'report_monthly_cooperation_status_sellernick_num';


        //$res = json_decode($this->saiku->get_json_data('report_daily_cooperation_start_sellernick_num'));
        $res = $this->saiku->get_json_data($saikufile);


        $h = $res['height'];
        $w = $res['width'];

        $columnName = array();

        for($i=0; $i<$w; $i++)
        {
            $columnName[] = $res['cellset'][0][$i]['value'];
        }


        $h_notnull = $h - 1;

        $data = array();
       // $time = array();

        for($i=1; $i<$h; $i++)
        {
            $temp = '';

            for($j=0; $j<$w; $j++)
            {
                if($res['cellset'][$i][$j]['value'] != 'null')
                {
                    if($j != $w-1 && $j != $w-2)
                    {
                        $temp = $temp.$res['cellset'][$i][$j]['value'].'-';
                    }
                    elseif($j == $w-2)
                    {
                        $temp = $temp.$res['cellset'][$i][$j]['value'];
                    }

                    else
                    {
                        $data[] = array( strtotime($temp)*1000, (int)$res['cellset'][$i][$j]['value']);

                       //$time[] = $temp;
                    }
                }

                else
                {
                    $h_notnull--;
                    break;
                }
            }

        }


        usort($data, function($a, $b) {
            $al = $a[0];
            $bl = $b[0];
            if ($al == $bl)
                return 0;
            return ($al < $bl) ? -1 : 1;
        });



        echo json_encode($data);
//        print_r($data);

    }

    public function get_chart_data_m() {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');
//        $saikufile ='report_monthly_cooperation_active_rate';
//        $columns = array('B2B 平台', '供销平台');



        $res = $this->saiku->get_json_data($saikufile);
        $r = $this->saiku->convert_data($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
        }

        echo json_encode($ret);
    }

    //按月
    public function get_chart_data_m1() {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');

//        $saikufile = 'sanqiang_report_daily_order';
//        $columns = array('销售额');

        $res = $this->saiku->get_json_data($saikufile);
        $r = $this->saiku->convert_data($res, $columns);

        //
        $nanoIdx = count($r) - 2;
        $ret = $r[$nanoIdx];

        // 对数据进行排序和求和
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
            $ret[$k]->data = $this->saiku->add_data($ret[$k]->data);
        }

        $ret = $this->saiku->combine_data($ret, 7000000);

        echo json_encode($ret);

    }

    public function get_chart_data_m2() {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');
        $target = $this->input->post('attach');
//        $saikufile = 'report_daily_cooperation_start_sellernick_num';
//        $columns = array('销售额');


        $res = $this->saiku->get_json_data($saikufile);
        $r = $this->saiku->convert_data($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
        //    $ret[$k]->data = $this->saiku->add_data($ret[$k]->data);
        }

        $ret = $this->saiku->chose_month_data($ret);

        $ret['data'] = $this->saiku->add_data($ret['data']);

        $ret = $this->saiku->combine_data_m($ret, (int)$target);
        echo json_encode($ret);





    }


}



