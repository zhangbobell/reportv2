<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-19
 * Time: 上午9:02
 */

class Saiku
{

    private static $opt = array(
        //      CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_RETURNTRANSFER => true,
        //      CURLOPT_FRESH_CONNECT   => 1,
        //      CURLOPT_TIMEOUT        => 320,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (X11; Linux x86_64; rv:14.0) Gecko/20100101 Firefox/14.0.1',
    );

    function guid()
    {

        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }

    public function exec( $url, $method = 'get', $params = array() )
    {

        $ch = curl_init();
        $opts = self::$opt;

        switch( $method ) {

            case 'get':
                $url.= '?'.http_build_query( $params );
                break;

            case 'post':
                if( count( $params ) > 0 ) {
                    $opts[CURLOPT_POST] = count( $params );
                    $opts[CURLOPT_POSTFIELDS] = http_build_query( $params );
                }
                break;
        }



        $cookie_file = TP_DIR."/saiku/saiku.cookie";

        $opts[CURLOPT_COOKIEJAR] = realpath($cookie_file);
        $opts[CURLOPT_COOKIEFILE] = realpath($cookie_file);
        $opts[CURLOPT_URL] = $url;
        // curl_setopt ($ch, CURLOPT_COOKIEJAR, realpath($cookie_file) );

        curl_setopt_array( $ch, $opts );

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);

        return array( 'response' => $result, 'info' => $info );
    }

    public function login($base, $arr) {
        $r = $this->exec($base.'session/');

        $session = json_decode($r['response'], true);

        if (count($session) === 1)
        {
            $method = 'post';
            $r = $this->exec($base. 'session/', $method, $arr);

            return $r;


            if ($r[ 'info' ][ 'http_code' ] == '200')
            {
                $r = $this->exec($base.'session/');
                $session = json_decode( $r[ 'response' ], true );

                return $session;
            }

        }

        return $session;
    }

    public function fetchRepository($base, $session, $repName) {
        $qstring = $base.$session['username'].'/repository/'.urlencode($repName);

        $r = $this->exec($qstring);
        $res = json_decode($r['response'], true);

        return $res;
    }


    public function get_json_data($saiku_file)
    {
        $base = SAIKU_URL;

        $array = array(
            'username' => SAIKU_USERNAME,
            'password' => SAIKU_PASSWORD
        );


        $session = $this->login($base, $array);

        $res = $this->fetchRepository($base, $session, $saiku_file);

        $xml = simplexml_load_string($res['xml']);
        $attr = $xml->attributes();


        // 自定义MDX，需要先建立一个QueryModel, QueryModel可以复用
        $new_query = $this->guid();
        $new_query = trim($new_query,'{}');
        $qstring = $base.$session['username'].'/query/'.$new_query;
        $r = $this->exec( $qstring, 'post', array(
                'type' => $attr->type,
                'connection' => $attr->connection, //
                'cube' => $attr->cube,
                'catalog' => $attr->catalog,
                'schema' => $attr->schema,
                'formatter' => 'flattened',
                'xml' => $res['xml']
            )
        );

        //利用建立好的QueryModel, 提交MDX并取回结果
        $qstring = $base.$session['username'].'/query/'.$new_query.'/result/flat';
        $mdx = (string)$xml->MDX;

        $r = $this->exec( $qstring, 'post', array('limit' => "0", 'mdx' => $mdx) );
        $results = json_decode( $r[ 'response' ], true);

        return $results;

    }

    // 获取所有的 saiku 文件
    function getRepositoies()
    {

    }

    /*
     * convert_data : 对获取到的 json 进行格式转换，转换成 highcharts 所需的格式
     * @param : $results -- 获取到的 json   $colArr -- 列名组成的数组
     * return : $d -- 满足格式的 json
     *
     * ps : 因为 saiku 会对结果分不同的层次进行求和，若粒度到“日”，那么就会形成 “年--月--日” 三种级别的求和
     *      本函数会返回三个粒度，$d[0] 对应年，$d[1] 对应月，$d[2] 对应日
     *
     *      依次类推，若粒度到“月”，则 $d[0] 对应年，$d[1] 对应月
     *
     * return example （以下是粒度到 “日” 的返回结果，会有年月日三个层次）:
     * [
     *      [
     *          {
     *              name: '列a',
     *              data：[[1348490000, 1]]
     *          },
     *          {
     *              name: '列b',
     *              data：[[1348490000, 1]]
     *          }
     *      ],
     *      [
     *          {
     *              name: '列a',
     *              data：[[1348490000, 1], [1348490000, 1], [1348490000, 1]]
     *          },
     *          {
     *              name: '列b',
     *              data：[[1348490000, 1], [1348490000, 1], [1348490000, 1]]
     *          }
     *      ],
     *      [
     *          {
     *              name: '列a',
     *              data：[[1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1]]
     *          },
     *          {
     *              name: '列b',
     *              data：[[1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1]]
     *          }
     *      ]
     * ]
     */
    public function convert_data($results, $colArr) {
        $d = array();
        $startIndex = $results['topOffset'];
        $endIndex = $results['height'];
        $width = $results['width'];
        $data = $results['cellset'];

        $series = $colArr;

        for ($i = $startIndex; $i < $endIndex; $i++) {
            $str = '';
            $level = 0;
            $isYear = true;
            for ($k = 0; $k < $width; $k++) {
                $cell = $data[$i][$k];

                if ($cell['type'] === 'ROW_HEADER' ) {
                    if ($cell['value'] !== 'null') {

                        if ($isYear) {
                            $str .= $cell['value'];
                            $isYear = false;
                            continue;
                        }

                        $str .= '-'. $cell['value'];
                        $level++;
                    }
                } else {
                    $properties = $cell['properties'];
                    $idx = ($properties['position'][0]);
                    $raw = isset($properties['raw']) ? $properties['raw'] : null;

                    $cellData = array(1000 * strtotime($str), (float)$raw);

                    $d[$level][$idx]->name = $series[$idx];
                    $d[$level][$idx]->data[] = $cellData;
                }
            }
        }

        return $d;
    }

// 转换数据：日期为 年-周
    public function convert_data_week($results, $colArr) {
        $d = array();
        $startIndex = $results['topOffset'];
        $endIndex = $results['height'];
        $width = $results['width'];
        $data = $results['cellset'];

        $series = $colArr;

        for ($i = $startIndex; $i < $endIndex; $i++) {
            $str = '';
            $level = 0;
            $isYear = true;
            for ($k = 0; $k < $width; $k++) {
                $cell = $data[$i][$k];

                if ($cell['type'] === 'ROW_HEADER' ) {
                    if ($cell['value'] !== 'null') {

                        if ($isYear) {
                            $str .= $cell['value'];
                            $isYear = false;
                            continue;
                        }

                        $str .= '年'. $cell['value'];
                        $level++;
                    }
                } else {
                    $properties = $cell['properties'];
                    $idx = ($properties['position'][0]);
                    $raw = isset($properties['raw']) ? $properties['raw'] : null;

                    $cellData = array($str.'周', (float)$raw);

                    $d[$level][$idx]->name = $series[$idx];
                    $d[$level][$idx]->data[] = $cellData;
                }
            }
        }

        return $d;
    }
    /*
     * 柱状图转换数据格式
     */
    public function convert_data_bar($results, $colArr) {
        $d = array();
        $startIndex = $results['topOffset'];
        $endIndex = $results['height'];
        $width = $results['width'];
        $data = $results['cellset'];

        $series = $colArr;

        for ($i = $startIndex ; $i < $endIndex; $i++) {
            $str = '';
            $level = 0;
            $isYear = true;
            for ($k = 0; $k < $width; $k++) {
                $cell = $data[$i][$k];

                if ($cell['type'] === 'ROW_HEADER' ) {
                    if ($cell['value'] !== 'null') {

                        if ($isYear) {
                            $str .= $cell['value'];
                            $isYear = false;
                            continue;
                        }

                        $str .= '-'. $cell['value'];
                        $level++;
                    }
                } else {
                    $properties = $cell['properties'];
                    $idx = ($properties['position'][0]);
                    $raw = isset($properties['raw']) ? $properties['raw'] : null;

                    $cellData = (float)$raw;

                    $d[$level][$idx]->name = $series[$idx];
                    $d[$level][$idx]->data[] = $cellData;
//                    $d[$level][$idx]->date[] = convert_int_to_string(1000 * strtotime($str));
                    $d[$level][$idx]->date[] = $str;
                }
            }
        }

        return $d;
    }
    /*
     * sort_data : 对数据中的日期进行排序
     * @param : $data -- 要排序的数据，必须是一个 php 数组
     * return ： 排序好的数据
     *
     * ps : 参数示例：
     *      [[1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1]]
     *
     * */
    public function sort_data($data) {
        usort($data, function($a, $b) {
            $al = $a[0];
            $bl = $b[0];
            if ($al == $bl)
                return 0;
            return ($al < $bl) ? -1 : 1;
        });

        return $data;
    }

    /*
     * add_data : 对数组中的数据进行累加
     * @param : $data -- 要累加的数据，必须是一个 php 数组
     * return ： 累加好的数据
     *
     * ps : 参数示例：
     *      [[1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1], [1348490000, 1]]
     *
     * */
    public function add_data($data)
    {
        $tmp = 0;

        for($i=0; $i<count($data); $i++)
        {
            $tmp = $tmp + $data[$i][1];
            $data[$i][1] = $tmp;
        }
        return $data;
    }


    /*
    * combine_data : 添加相同子结构的数组（目标数组）
    * @param : $data -- 要处理的数据，必须是一个 php 数组
    *          $target -- 是一个数值，表示目标值
    * $d 结构：
    *
          [
                {
                    name: "销售额",
                    data: [
                                [
                                    1388505600000,
                                    634696.85
                                ],
                                [
                                    1391184000000,
                                    938359.85
                                ],
                                [
                                    1393603200000,
                                    1280103.65
                                ]
                          ]
                }
          ]
    *
    * return ： 处理好的数据
    *
    *
    * */
    public function combine_data($d, $target)
    {
        $start = $d[0]->data[0][0];
        $end = $d[0]->data[count($d[0]->data)-1][0];
        array_push($d,
            array(
                'name' => '年度目标',
                'data' => array(array($start, $target), array($end, $target))
            ),
            array(
                'name' => '平均月目标',
                'data' => array(array($start, 0), array($end, $target))
            )
        );

        return $d;
    }

    public function combine_data_m($d, $target)
    {
        $m_num = $this->get_month_day_num();
        $str1 = date('m').'/1/'.date('Y');
        $str2 = date('m').'/'.$m_num.'/'.date('Y');
        $start = strtotime($str1) * 1000;
        $end = strtotime($str2) * 1000;

        $num = count($d['data']);

        $incre_data = $target / $m_num;



        $tar = array();

        for ($i=0; $i<$num; ++$i)
        {
            if($d['data'][$i][1] < ($incre_data * ($i + 1)))
                $tar[] =array($d['data'][$i][0], $d['data'][$i][1]);
            else
                $tar[] =array($d['data'][$i][0], $incre_data * ($i + 1));
        }


        $tar[] = array($end, $target);

        return array($d,
                    array(
                        'name' => '月目标',
                        'data' => array(array($start, $target), array($end, $target))
                    ),
                    array(
                        'name' => '每日目标',
                        'data' => $tar
                    )
        );



    }

    public function chose_month_data($d)
    {
        $str1 = date('m').'/1/'.date('Y');
        $str2 = date('m').'/'.$this->get_month_day_num().'/'.date('Y');
        $start = strtotime($str1) * 1000;
        $end = strtotime($str2) * 1000;

        $num = count($d[0]->data);
        $arr = array();

        for ($i=0; $i<$num; $i++)
        {
            if( $d[0]->data[$i][0] >= $start && $d[0]->data[$i][0] <= $end)
            {
                $arr[] = $d[0]->data[$i];
            }
        }

        return array(
            'name' => $d[0]->name,
            'data' => $arr
        );
    }

    public function get_month_day_num()
    {
        $str_month = date('m');
        $y = date('Y') * 1;

        switch ($str_month)
        {
            case '1': case '3': case '5': case '7': case '8': case '10': case '12':
                return 31;
                break;
            case '4': case '6': case '9': case '11':
                return 30;
                break;
            case '2':
                if($y % 100 == 0)
                {
                    if($y % 400 == 0)
                        return 29;
                    else
                        return 28;
                }
                if($y % 4 == 0 && $y % 100 != 0)
                    return 29;
                else
                    return 28;
                break;
        }

    }

}


