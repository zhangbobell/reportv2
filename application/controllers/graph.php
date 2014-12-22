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



        $data['title'] = "趋势";
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

        $data['title'] = "产品渠道分布";
        $data['username'] = $this->session->userdata('username');

        $data['tag1'] = $this->mgraph->get_tag1('db_sanqiang')->result_array();

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

    // x轴：年-月  series：saiku数据
    public function sk_ym()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];

        $ret = $this->_sk_ym($saikufile, $columns);

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

    // 获取所有“月”的数据
    private  function _sk_ym($saikufile, $columns) {
        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
            return $res;

        $r = $this->mgraph->convert_data($res['res'], $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 2;
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

    // x轴：年-月 (求和)  series：saiku数据 & 目标
    public function sk_ymd_t()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $tmp = $this->input->post('attach'); // 传递period和t_type

        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        $r = $this->mgraph->convert_data($res['res'], $columns);

        $nanoIdx = count($r) - 2;
        $ret = $r[$nanoIdx];

        $ret = $this->mgraph->chose_year_data($ret);

//        var_dump($ret);

        $ret['data'] = $this->mgraph->add_data($ret['data']);
//        // 对数据进行排序
//        foreach($columns as $k => $v) {
//            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
//            $ret[$k]->data = $this->mgraph->add_data($ret[$k]->data);
//        }

        $target = $this->get_target($tmp[0], $tmp[1]);
//        $ret = array($ret);
        $ret = $this->mgraph->combine_data_ym($ret, (int)$target);
        $res['res'] = $ret;
        echo json_encode($res);

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
        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        $r = $this->mgraph->convert_data($res['res'], $columns);

        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];

        // 对数据进行排序
        foreach($columns as $k => $v) {
            $ret[$k]->data = $this->mgraph->sort_data($ret[$k]->data);
        }
        $ret = $this->mgraph->chose_month_data($ret);


        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->mgraph->combine_data_y($ret, (float)$target);
        $res['res'] = $ret;
        echo json_encode($res);

    }

    // 从一年的数据中获取当月的数据 结构 年-月-日
    // x轴：月-日     series：saiku当月数据 & 月目标 & 时时日目标
    public function sk_md_t() {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $tmp = $this->input->post('attach');

        $res = $this->saiku->get_json_data($saikufile);

        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        $r = $this->mgraph->convert_data($res['res'], $columns);
//        var_dump($r);
        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];
        $ret = $this->mgraph->chose_month_data($ret);
        $ret['data'] = $this->mgraph->add_data($ret['data']);
//        var_dump($ret);
//        $ret = array($ret);



        $target = $this->get_target($tmp[0], $tmp[1]);

        $ret = $this->mgraph->combine_data_md($ret, (int)$target);
        $res['res'] = $ret;
        echo json_encode($res);
    }

    // 绘制河流图
    // x轴：序号（按年月日时间顺序排列）series：saiku数据
    public function sk_stream()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        $r = $this->mgraph->convert_data($res['res'], $columns);

        // 取到最小粒度的下标，即数据中最后一个
        $nanoIdx = count($r) - 1;
        $ret = $r[$nanoIdx];
        $res['res'] = $this->mgraph->linear2stream($ret);

        echo json_encode($res);
    }

    public function sk_stream_leaf()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];

        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        if (count($columns) > 0 && $columns[0] != '') {
            $r = $this->mgraph->convert_data_leaf($res['res'], $columns, false);
        } else {
            $r = $this->mgraph->convert_data_leaf($res['res'], $columns, true);
        }


        $res['res'] = $this->mgraph->linear2stream($r);

        echo json_encode($res);
    }

    public function object_to_array($obj){
        $arr = array();
        $_arr = is_object($obj)? get_object_vars($obj) :$obj;
        foreach ($_arr as $key => $val){
            $val=(is_array($val)) || is_object($val) ? $this->object_to_array($val) :$val;
            $arr[$key] = $val;
        }
        return $arr;

    }

    public function sk_stream_bubble()
    {
        $saikufile = $this->input->post('saikufile');
        $saikufile = $this->sk_map[$saikufile];


        $res = $this->saiku->get_json_data($saikufile);
//        $string = file_get_contents("http://localhost/reportv2/public/upload/report_daily_sellernick_up_item_num.json");
//        $res = json_decode($string);
//
//        $res = $this->object_to_array($res);

        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        $res['res'] = $this->mgraph->convert_data_bubble($res['res']);
//        $res['res'] = $this->mgraph->shai($res['res']);


       //  = $this->mgraph->linear2stream($r);

        echo json_encode($res);
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
//        var_dump($target);
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
            $row['name'] = $val[0] == 'No' ? '30天前招商家' : '30天新招商家';
            $row['curTag'] = '0 销量商家数量';
            $row['curValue'] = $val[2];
            $row['prevTag'] = '0 销量商家占比';
            $row['prevValue'] = 1 - $val[3];

            $arr[] = $row;
        }

        $res['res'] = $arr;

        echo json_encode($res);
    }



    public function test()
    {
        $d = array(
            array(
                'name' => 'a',
                'data' => array(array(97,36,79), array(38,23,33),array(57,86,31))),
            array(
                'name' => 'b',
                'data' => array(array(25,10,87))),
            array('name' => 'c',
                'data' => array(array(47,47,21), array(30,77,82)))
            );
        $data = array(
            'flag' => 1,
            'res' => $d
        );

        echo json_encode($data);
    }

    public function get_tag2() {
        $tag1 = $this->input->post('tag1', true);

        if ($tag1 == 'All') {
            echo json_encode('null');
        } else {
            echo json_encode($this->mgraph->get_tag2('db_sanqiang', $tag1)->result_array());
        }
    }

    public function get_tag3() {
        $tag1 = $this->input->post('tag1', true);
        $tag2 = $this->input->post('tag2', true);

        if ($tag2 == 'All') {
            echo json_encode('null');
        } else {
            echo json_encode($this->mgraph->get_tag3('db_sanqiang', $tag1, $tag2)->result_array());
        }
    }

    public function redraw_bubble()
    {
        $saikufile = $this->input->post('saikufile', true);
        $saikufile = $this->sk_map[$saikufile];
        $tag1 = $this->input->post('tag1', true);
        $tag2 = $this->input->post('tag2', true);
        $tag3 = $this->input->post('tag3', true);

        $res = $this->saiku->get_json_data($saikufile);
        if($res['flag'] == 0)
        {
            echo json_encode($res);
            return;
        }

        $res['res'] = $this->mgraph->convert_data_bubble($res['res']);
        $res['res'] = $this->_filter($res['res'], $tag1, $tag2, $tag3);

        echo json_encode($res);
    }

    private function _filter($res, $tag1, $tag2, $tag3) {
        $filted = $this->mgraph->get_filtered_name('db_sanqiang', $tag1, $tag2, $tag3)->result_array();
        $tr_filted = array();
        $temp = array();

        foreach($filted as $item) {
            foreach($item as $v) {
                $tr_filted[$v] = $v;
            }
        }

        foreach($res as $item) {
            if(isset($tr_filted[$item['name']])) {
                $temp[] = $item;
            }
        }

        return $temp;
    }

    public function debug_raw($skfile)
    {

        $res = $this->saiku->get_json_data($skfile);
        $res['res'] = $this->mgraph->convert_data_leaf($res['res'], null, true);
//        $r = $this->mgraph->convert_data_bubble($res['res']);

        echo json_encode($res);
//        var_dump($r);
    }



}



