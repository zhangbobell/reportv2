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
      // $this->_init_sk_map();
    }

    private function _init_sk_map() {
        if (($res = $this->mgraph->get_saiku_map('db_jiuyang'))) {
            foreach ($res->result_array() as $row) {
                $this->sk_map[$row['ref_name']] = $row['saikufile'];
                $this->sk_fields[$row['ref_name']] = explode(',', $row['fields']);
            }
        } else {
            echo '获取 saiku 映射表失败！';
            return;
        }
    }

    /*
     *  index : 商业智能定制界面函数
     *  @$page='index' : 默认调用视图页面
     */
    public function index($page = 'index')
    {
        if (!file_exists('application/views/process/' . $page . '.php')) {
            show_404();
        }

        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "商业智能定制",
            'username' =>$username,
            'email' => $email
        );

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('graph/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
    }

    public function sup_sucess($page = 'sup_sucess') {
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');
        $data = array(
            'title' => "提交成功",
            'username' =>$username,
            'email' => $email
        );

        $sup_info = array(
            'apply_type' => '商业智能定制开通申请',
            'company' => $this->input->post('company', true),
            'email' =>$this->input->post('email', true),
            'applicant'=> $this->input->post('applicant', true),
            'phone' => $this->input->post('phone', true),
            'reason' => $this->input->post('reason',true)
        );

        $this->mgraph->insert_sup_info($sup_info);

        $this->load->view('templates/task_header', $data);
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('graph/'.$page);
        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');
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


        $this->load->view('templates/task_header', $data);
        $this->load->view('graph/header_add_init_first');
        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('graph/' . $page, $data);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');

    }

    public function init_tendency($page = "init_tendency")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }


        $data['title'] = "趋势";
        $data['username'] = $this->session->userdata('username');




        $this->load->view('templates/task_header', $data);

        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('graph/' . $page, $data);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');

    }

    public function init_product($page = "init_product")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }


        $data['title'] = "产品渠道分布";
        $data['username'] = $this->session->userdata('username');

        $data['tag1'] = $this->mgraph->get_tag1('db_jiuyang')->result_array();


        $this->load->view('templates/task_header', $data);

        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('graph/' . $page, $data);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');

    }

    public function init_target($page = "init_target")
    {
        if ( ! file_exists('application/views/graph/'.$page.'.php'))
        {
            show_404();
        }



        $data['title'] = "目标管理";
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/task_header', $data);

        $this->load->view('templates/task_sidebar');
        $this->load->view('templates/task_banner');
        $this->load->view('graph/' . $page, $data);

        $this->load->view('templates/task_footer');
        $this->load->view('templates/task_footer_script');
        $this->load->view('graph/footer_add_' . $page);
        $this->load->view('templates/task_footer_function');
        $this->load->view('templates/task_footer_final');

    }

    public function init_customization()
    {
        if ( ! file_exists('application/views/graph/init_customization.php'))
        {
            show_404();
        }
        $this->load->view('graph/init_customization');

    }




    // 获取数据给js模块来绘图
    // x轴：年-月-日  series：saiku数据
    public function sk_ymd()
    {
        $this->_init_sk_map();

        $saikufile = $this->input->post('saikufile');
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
        $saikufile = $this->sk_map[$saikufile];

//        if(!$this->is_saiku_updated($saikufile))
//        {
//            $columns = $this->sk_fields[$saikufile];
//            $ret = $this->_sk_ymd($saikufile, $columns);
//
//            $this->write_saiku_cache($saikufile, json_encode($ret));
//
//        }
        echo $this->read_saiku_cache($saikufile);
    }

    // x轴：年-月  series：saiku数据
    public function sk_ym()
    {
        $this->_init_sk_map();

        $saikufile = $this->input->post('saikufile');
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
        $saikufile = $this->sk_map[$saikufile];

//        if(!$this->is_saiku_updated($saikufile))
//        {
//            $columns = $this->sk_fields[$saikufile];
//            $ret = $this->_sk_ym($saikufile, $columns);
//
//            $this->write_saiku_cache($saikufile, json_encode($ret));
//
//        }
        echo $this->read_saiku_cache($saikufile);


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
        $this->_init_sk_map();

        $saikufile = $this->input->post('saikufile');
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
        $saikufile = $this->sk_map[$saikufile];

//        if(!$this->is_saiku_updated($saikufile))
//        {
//            $columns = $this->sk_fields[$saikufile];
//            $ret = $this->_sk_yw($saikufile, $columns);
//            $this->write_saiku_cache($saikufile, json_encode($ret));
//        }
        echo $this->read_saiku_cache($saikufile);

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
        $this->_init_sk_map();
        $saikufile = $this->input->post('saikufile');
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
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
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
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

        var_dump($ret);


        $target = $this->get_target($tmp[0], $tmp[1]);
        $ret = $this->mgraph->combine_data_y($ret, (float)$target);
        $res['res'] = $ret;
        echo json_encode($res);

    }

    // 从一年的数据中获取当月的数据 结构 年-月-日
    // x轴：月-日     series：saiku当月数据 & 月目标 & 时时日目标
    public function sk_md_t()
    {
        $this->_init_sk_map();
        $saikufile = $this->input->post('saikufile');
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
        $saikufile = $this->sk_map[$saikufile];
        $columns = $this->sk_fields[$saikufile];
        $tmp = $this->input->post('attach', true);

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
        $this->_init_sk_map();
        $saikufile = $this->input->post('saikufile');
        $dbname = $this->input->post('db');
        $saikufile = $dbname.'_'.$saikufile;
        $saikufile = $this->sk_map[$saikufile];
//        if(!$this->is_saiku_updated($saikufile))
//        {
//
//            $columns = $this->sk_fields[$saikufile];
//
//            $res = $this->saiku->get_json_data($saikufile);
//            if($res['flag'] == 0)
//            {
//                $this->write_saiku_cache($saikufile, json_encode($res));
//
//                echo json_encode($res);
//                return;
//            }
//
//            if (count($columns) > 0 && $columns[0] != '') {
//                $r = $this->mgraph->convert_data_leaf($res['res'], $columns, false);
//            } else {
//                $r = $this->mgraph->convert_data_leaf($res['res'], $columns, true);
//            }
//
//            $res['ticks'] = $this->mgraph->getStreamXticks($r);
//            $res['res'] = $this->mgraph->linear2stream($r);
//            $this->write_saiku_cache($saikufile, json_encode($res));
//        }
        echo $this->read_saiku_cache($saikufile);
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
            echo json_encode($this->mgraph->get_tag2('db_jiuyang', $tag1)->result_array());
        }
    }

    public function get_tag3() {
        $tag1 = $this->input->post('tag1', true);
        $tag2 = $this->input->post('tag2', true);

        if ($tag2 == 'All') {
            echo json_encode('null');
        } else {
            echo json_encode($this->mgraph->get_tag3('db_jiuyang', $tag1, $tag2)->result_array());
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
        $filted = $this->mgraph->get_filtered_name('db_jiuyang', $tag1, $tag2, $tag3)->result_array();
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
//        $res['res'] = $this->mgraph->convert_data_leaf($res['res'], null, true);
//        $res['res'] = $this->mgraph->linear2stream($res['res']);
        $res['res'] = $this->mgraph->convert_data_bubble($res['res']);

        echo json_encode($res);
//        var_dump($r);
    }

    // 读取对应的缓存文件的数据
    public function read_saiku_cache($fileName)
    {

        $filePath = './public/saikuCache/'.$fileName.'.cache';

        if (file_exists($filePath) == false)
        {
            die("文件:" .$fileName. "不存在，请检查！");
        }
        else
        {
            $data = file_get_contents($filePath);
        }

        return $data;
    }

    // 将数据写入缓存cache中
    public function write_saiku_cache($fileName, $data)
    {
        $filePath = './public/saikuCache/'.$fileName.'.cache';
        if (file_exists($filePath) == false)
        {
            $fp=fopen("$filePath", "w+"); //打开文件指针，创建文件
            if ( !is_writable($filePath) )
            {
                die("文件:" .$fileName. "不可写，请检查！");
            }
            fclose($fp);  //关闭指针
        }
        if (is_writable($filePath) == false) {
            die("文件:" .$fileName. "不可写，请检查！");
        }

        file_put_contents ($filePath, $data);
    }

    // 判断cache上次修改的日期与当天日期是否相同
    public function is_saiku_updated($fileName)
    {
        $filePath = './public/saikuCache/'.$fileName.'.cache';
        if (file_exists($filePath) == false)
        {
            return false;
        }
        $changeDate = date("Y-m-d", filemtime($filePath));
        $today = date('Y-m-d');
        // compare time
        return $changeDate == $today;
    }





    // 写入第一时间的数据
    public function write_first_data()
    {
        $id = $this->input->post('id', true);
        $data = $this->input->post('data', true);
        $fileName = 'first'.$id;

        $this->write_saiku_cache($fileName, json_encode($data));

    }

    // 获取第一时间的数据
    public function get_fisrt_data()
    {
        $id = $this->input->post('id', true);

        echo $this->read_saiku_cache('first'.$id);
    }


    // 手动刷新cache（未调用，供调试使用）
    public function update_saiku_cache($name, $i)
    {

        $saikuName = 'db_jiuyang_'.$name;
        $this->_init_sk_map();

        if($i < 9)
        {
            $ret = $this->_sk_ymd($saikuName, $this->sk_fields[$saikuName]);
            if($ret['flag'] == 0)
                return false;
            $this->write_saiku_cache($saikuName, json_encode($ret));
        }
        elseif($i < 11)
        {
            $ret = $this->_sk_yw($saikuName, $this->sk_fields[$saikuName]);
            if($ret['flag'] == 0)
                return false;
            $this->write_saiku_cache($saikuName, json_encode($ret));
        }
        else
        {
            $columns = $this->sk_fields[$saikuName];

            $res = $this->saiku->get_json_data($saikuName);
            if($res['flag'] == 0)
                return false;

            if (count($columns) > 0 && $columns[0] != '') {
                $r = $this->mgraph->convert_data_leaf($res['res'], $columns, false);
            } else {
                $r = $this->mgraph->convert_data_leaf($res['res'], $columns, true);
            }

            $res['ticks'] = $this->mgraph->getStreamXticks($r);
            $res['res'] = $this->mgraph->linear2stream($r);
            $this->write_saiku_cache($saikuName, json_encode($res));
        }

        $this->mgraph->insert_updatetime($saikuName);

        return true;
    }

    public function upadate_all_saiku_cache()
    {
        $saikuname = array('report_dayly_chengjiao_zc', 'report_dayly_all_num',
            'report_up_item', 'report_up_rate', 'report_monthly_dongxiao_rate_zc',
            'report_dayly_chengjiao', 'report_dayly_wrong_price_rate_zc',
            'report_dayly_tuikuan_rate', 'report_dayly_order_close_rate',

            'report_weekly_level_new', 'report_weekly_level_num',

            'report_month_order_category_num', 'report_monthly_sellernick_sales_fee_2',
            'report_monthly_tags_up_num', 'report_monthly_sellernick_sales_fee_0'
        );

        for($i=0; $i<count($saikuname); $i++)
        {
            $count = 0;
            while(!$this->update_saiku_cache($saikuname[$i], $i))
            {

                $count++;
                if($count > 9)
                {
                    echo 'update '.$saikuname[$i].' failed.</br>';
                    break;
                }
            }
        }
        echo 'done.';
    }


}



