<?php
/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-19
 * Time: 上午9:09
 */

class Graph extends CI_Controller
{
    private $sk_map;
    private $sk_fields;

    // 构造函数
    function __construct()
    {
        parent::__construct();
        $this->load->library('saiku');
        $this->load->model('mgraph');


        if (($res = $this->mgraph->get_saiku_map('db_sanqiang'))) {
            foreach ($res->result_array() as $row) {
                $this->sk_map[$row['ref_name']] = $row['saikufile'];
                $this->sk_fields[$row['ref_name']] = explode(',', $row['fields']);
            }
        } else {
            echo '获取 saiku 映射表失败！';
            return;
        }
    }

    // 绘制页面
    public function init_first($page = "init_first")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "第一时间";
        $data['username'] = $this->session->userdata('username');


        $this->load->view('templates/header', $data);
        $this->load->view('graph/header_add_init_first');
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
        $this->load->view('templates/banner');
        $this->load->view('templates/sidebar_report');
        $this->load->view('graph/' . $page, $data);
        $this->load->view('templates/footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/footer');
    }


    // 获取数据给js模块来绘图
    // x轴：年-月-日  series：saiku数据
    public function sk_ymd()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];

        $ret = $this->_sk_ymd($saikufile, $columns);

        echo json_encode($ret);
    }

    public function get_data_daily_last() {
        $saikufile = $this->input->post('saikufile', true);
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];

        $ret = $this->_sk_ymd($saikufile, $columns);

        $ret = $this->_get_last($ret);

        echo json_encode($ret);
    }

    // 获取所有“日”的数据
    private  function _sk_ymd($saikufile, $columns) {
        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
            return $res;

        $r = $this->mgraph->convert_data($res['res'], $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
        }

        $res['res'] = $ret;

        return $res;
    }

    // x轴：年-周     series：saiku数据
    public function sk_yw()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];

        $ret = $this->_sk_yw($saikufile, $columns);

        echo json_encode($ret);
    }

    // 取年周的数据（只取最新的）
    public function get_data_weekly_last() {

        $saikufile = $this->input->post('saikufile', true);
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];

        $ret = $this->_sk_yw($saikufile, $columns);

        $ret = $this->_get_last($ret);

        echo json_encode($ret);
    }

    private function _sk_yw($saikufile, $columns) {
        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
            return $res;

        $r = $this->mgraph->convert_data_yw($res['res'], $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];
        $res['res'] = $ret;

        // 无需排序
        return $res;
    }

    // 根据年周或年月日的返回的数据，取最近两组的数据
    private function _get_last($ret) {
        if ($ret['flag'] == 0) {
            return $ret;
        }

        $arr = array();
        foreach($ret['res'] as $val) {
            $lastIdx = count($val->data) - 1;
            $row['name'] = $val->name;
            $row['curTag'] = $val->data[$lastIdx][0];
            $row['curValue'] = $val->data[$lastIdx][1];
            $row['prevTag'] = $val->data[$lastIdx - 1][0];
            $row['prevValue'] = $val->data[$lastIdx - 1][1];

            $arr[] = $row;
        }

        $ret['res'] = $arr;

        return $ret;
    }

    // x轴：年-月-日  series：saiku数据 & 目标
    public function sk_ymd_t()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $tmp = $this->input->post('attach'); // 传递period和t_type

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->mgraph->convert_data($res, $columns);

        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
        }

        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->mgraph->combine_data_ym($ret, (int)$target);

        echo json_encode($ret);

    }

    // saiku数据格式年月日->就行月份求和得到->年月
    // x轴：年-月     series：saiku数据月求和 & 目标
    public function sk_ym_add_t() {
        $saikufile = $this->input->post('saikufile', true);
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $tmp = $this->input->post('attach', true); // 传递period和t_type

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->mgraph->convert_data($res, $columns);
        //
        $nanoIdx = count($r) - 2;
        $ret = $r[$nanoIdx];

        // 对数据进行排序和求和
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
            $ret[$k]->data = $this->mgraph->add_data($ret[$k]->data);
        }

        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->mgraph->combine_data_ym($ret, (float)$target);
        echo json_encode($ret);

    }

    // saiku数据格式年月日->就行月份均值得到->年月
    // x轴：年-月     series：saiku数据月平均 & 年目标
    public function sk_ym_avg_t() {
        $saikufile = $this->input->post('saikufile', true);
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $tmp = $this->input->post('attach', true); // 传递period和t_type

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->mgraph->convert_data($res, $columns);

        $nanoIdx = count($r) - 2;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
        }


        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->mgraph->combine_data_y($ret, (float)$target);
        echo json_encode($ret);

    }

    // 从一年的数据中获取当月的数据 结构 年-月-日
    // x轴：月-日     series：saiku当月数据 & 月目标 & 时时日目标
    public function sk_md_t() {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $target = $this->input->post('attach');

        $res = $this->saiku->get_json_data($saikufile);

        if($res == 0)
            return 0;

        $r = $this->mgraph->convert_data($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
        //    $ret[$k]->data = $this->mgraph->add_data($ret[$k]->data);
        }

        $ret = $this->mgraph->chose_month_data($ret);

        $ret['data'] = $this->mgraph->add_data($ret['data']);

        $ret = $this->mgraph->combine_data_md($ret, (int)$target);
        echo json_encode($ret);
    }

    // 绘制河流图
    // x轴：序号（按年月日时间顺序排列）series：saiku数据
    public function sk_stream()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->mgraph->convert_data($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        echo json_encode($this->mgraph->linear2stream($ret));
    }

    // 提交目标至db
    public  function submit_target()
    {
        $target = $this->input->post('target', true);
        $username = $this->input->post('user', true);
        $period = $this->input->post('period', true);
        $t_type = $this->input->post('t_type', true);

        $this->load->model('targetprocess');

        echo $this->targetprocess->insert_target($username, $period, $t_type, $target);

    }
    // 从db中获取目标
    private function get_target($period, $t_type)
    {
        $username = $this->session->userdata('username');
        $this->load->model('targetprocess');
        $target = $this->targetprocess->get_target($username, $period, $t_type);
        $tar = $target[0]['target'];
        return $tar;
    }

    /**
     * 获取 0 销量商家数量
     *
     */
    public function get_zero_sales_num() {
        $saikufile = $this->input->post('saikufile', true);
        $saikufile = $this->sk_map[$saikufile];

        $res = $this->saiku->get_json_data($saikufile);
        $res['res'] = $this->mgraph->convert2table($res['res']);


        if ($res['flag'] == 0) {
            return $res;
        }

        $arr = array();
        foreach($res['res'] as $val) {
            $row['name'] = $val[0] == 'No' ? '非30天新招商家' : '30天新招商家';
            $row['curTag'] = '0 销量商家数量';
            $row['curValue'] = $val[2];
            $row['prevTag'] = '0 销量商家占比';
            $row['prevValue'] = 1 - $val[3];

            $arr[] = $row;
        }

        $res['res'] = $arr;

        echo json_encode($res);
    }

    public function debug_raw($skfile)
    {
        $res = $this->saiku->get_json_data($skfile);
        $res['res'] = $this->mgraph->convert2table($res['res']);
        echo json_encode($res);
    }



}



