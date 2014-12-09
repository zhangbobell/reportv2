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
        if($res == 0)
            return 0;

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

    // saiku数据格式年月
    public function get_chart_data_m0() {
//        $saikufile = $this->input->post('saikufile');
//        $columns = $this->input->post('columns');
//        $tmp = $this->input->post('attach'); // 传递period和t_type


        $saikufile = 'report_monthly_cooperation_num';
        $columns = array('销售额');
        $tmp = array('1', '2');

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->saiku->convert_data($res, $columns);

        //
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序和求和
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
          //  $ret[$k]->data = $this->saiku->add_data($ret[$k]->data);
        }


        $target = $this->get_target($tmp[0], $tmp[1]);

        $ret = $this->saiku->combine_data($ret, (int)$target);

        echo json_encode($ret);

    }

    // saiku数据格式年月日->就行月份求和得到->年月
    public function get_chart_data_m1() {
        $saikufile = $this->input->post('saikufile', true);
        $columns = $this->input->post('columns', true);
        $tmp = $this->input->post('attach', true); // 传递period和t_type

//
//        $saikufile = 'sanqiang_report_daily_order';
//        $columns = array('销售额');
//        $tmp = array('1', '2');

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->saiku->convert_data($res, $columns);

        //
        $nanoIdx = count($r) - 2;
        $ret = $r[$nanoIdx];

        // 对数据进行排序和求和
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
            $ret[$k]->data = $this->saiku->add_data($ret[$k]->data);
        }


        $target = $this->get_target($tmp[0], $tmp[1]);

        $ret = $this->saiku->combine_data($ret, (int)$target);

        echo json_encode($ret);

    }

//    public function get_chart_data_m2() {
//        $saikufile = $this->input->post('saikufile');
//        $columns = $this->input->post('columns');
//        $target = $this->input->post('attach');
////        $saikufile = 'report_daily_cooperation_start_sellernick_num';
////        $columns = array('销售额');
//
//
//        $res = $this->saiku->get_json_data($saikufile);
//
//        if($res == 0)
//            return 0;
//
//        $r = $this->saiku->convert_data($res, $columns);
//
//        // 取到最小粒度的下标，即数据中最后一个
//        $nanoIdx = count($r) - 1;
//        $ret = $r[$nanoIdx];
//
//        // 对数据进行排序
//        foreach($columns as $k => $v) {
//            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
//        //    $ret[$k]->data = $this->saiku->add_data($ret[$k]->data);
//        }
//
//        $ret = $this->saiku->chose_month_data($ret);
//
//        $ret['data'] = $this->saiku->add_data($ret['data']);
//
//        $ret = $this->saiku->combine_data_m($ret, (int)$target);
//        echo json_encode($ret);
//    }


    //周
    public function test()
    {

//        $saikufile ='report_weekly_cooperation_end_sellernick_num';
        $saikufile ='';
        $columns = array('追灿招募');



        $res = $this->saiku->get_json_data($saikufile);
        $r = $this->saiku->convert_data_week($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
        }

      //  echo json_encode($ret);
    }

    public function submit_target()
    {
        $target = $this->input->post('target', true);
        $username = $this->input->post('user', true);
        $period = $this->input->post('period', true);
        $t_type = $this->input->post('t_type', true);

        $this->load->model('targetprocess');

        echo $this->targetprocess->insert_target($username, $period, $t_type, $target);

    }

    public function get_target($period, $t_type)
    {

        $username = $this->session->userdata('username');
        $this->load->model('targetprocess');
//        $period = '0';
//        $t_type = '0';
        $target = $this->targetprocess->get_target($username, $period, $t_type);
        $tar = $target[0]['target'];
        return $tar;
    }



}



