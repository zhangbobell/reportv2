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

        $res = $this->saiku->get_json_data('report_daily_cooperation_start_sellernick_num');

        echo $res;

    }

    public function init_graph($page = "init_graph")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "第一时间";
        $data['username'] = $this->session->userdata('username');


        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_' . $page);
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }

    public function init_size($page = "init_size")
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


    public function init_quality($page = "init_quality")
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


    public function init_brand($page = "init_brand")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "品牌销售";
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


}

