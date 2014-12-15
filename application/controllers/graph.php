<?php
/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-19
 * Time: 上午9:09
 */

class Graph extends CI_Controller
{
    // 构造函数
    function __construct()
    {
        parent::__construct();
        $this->load->library('saiku');
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
        $columns = $this->input->post('columns');

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

    // x轴：年-周     series：saiku数据
    public function sk_yw()
    {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');


        $res = $this->saiku->get_json_data($saikufile);
        $r = $this->saiku->convert_data_yw($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 无需排序
        echo json_encode($ret);
    }

    // x轴：年-月-日  series：saiku数据 & 目标
    public function sk_ymd_t()
    {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');
        $tmp = $this->input->post('attach'); // 传递period和t_type

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->saiku->convert_data($res, $columns);

        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
        }

        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->saiku->combine_data_ym($ret, (int)$target);

        echo json_encode($ret);

    }

    // saiku数据格式年月日->就行月份求和得到->年月
    // x轴：年-月     series：saiku数据月求和 & 目标
    public function sk_ym_add_t() {
        $saikufile = $this->input->post('saikufile', true);
        $columns = $this->input->post('columns', true);
        $tmp = $this->input->post('attach', true); // 传递period和t_type

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
        $ret = $this->saiku->combine_data_ym($ret, (float)$target);
        echo json_encode($ret);

    }

    // saiku数据格式年月日->就行月份均值得到->年月
    // x轴：年-月     series：saiku数据月平均 & 年目标
    public function sk_ym_avg_t() {
        $saikufile = $this->input->post('saikufile', true);
        $columns = $this->input->post('columns', true);
        $tmp = $this->input->post('attach', true); // 传递period和t_type

        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->saiku->convert_data($res, $columns);

        $nanoIdx = count($r) - 2;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->saiku->sort_data($ret[$k]->data);
        }


        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->saiku->combine_data_y($ret, (float)$target);
        echo json_encode($ret);

    }

    // 从一年的数据中获取当月的数据 结构 年-月-日
    // x轴：月-日     series：saiku当月数据 & 月目标 & 时时日目标
    public function sk_md_t() {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');
        $target = $this->input->post('attach');

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
        //    $ret[$k]->data = $this->saiku->add_data($ret[$k]->data);
        }

        $ret = $this->saiku->chose_month_data($ret);

        $ret['data'] = $this->saiku->add_data($ret['data']);

        $ret = $this->saiku->combine_data_md($ret, (int)$target);
        echo json_encode($ret);
    }

    // 绘制河流图
    // x轴：序号（按年月日时间顺序排列）series：saiku数据
    public function sk_stream()
    {
        $saikufile = $this->input->post('saikufile');
        $columns = $this->input->post('columns');
        $res = $this->saiku->get_json_data($saikufile);
        if($res == 0)
            return 0;

        $r = $this->saiku->convert_data($res, $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        echo json_encode($this->saiku->linear2stream($ret));
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



    public function debug_raw($skfile)
    {
        $res = $this->saiku->get_json_data($skfile);
        echo json_encode($res);
    }



}



