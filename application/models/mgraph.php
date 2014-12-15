<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 14-12-15
 * Time: 下午4:11
 */

class MGraph extends MY_model {

    function __contruct() {
        parent::__construct();
    }

    /*
* convert_data 函数系列 : 对获取到的 json 进行格式转换，转换成 highcharts 所需的格式
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
    // 转换数据：日期为 年-月-日
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
    public function convert_data_yw($results, $colArr) {
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

    // 柱状图转换数据格式
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

    // 输入的数组是 年-月 结构
    // 需要添加 年目标 & 平均月目标
    public function combine_data_ym($d, $target)
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

    // 只需要添加 年目标
    public function combine_data_y($d, $target)
    {
        $start = $d[0]->data[0][0];
        $end = $d[0]->data[count($d[0]->data)-1][0];
        array_push($d,
            array(
                'name' => '目标',
                'data' => array(array($start, $target), array($end, $target))
            )
        );

        return $d;
    }

    // 输入的数组是 月-日 结构
    // 需要添加 月目标 $ 时时更新的每日目标
    public function combine_data_md($d, $target)
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
    // 从一年的数据中获取当月的数据 结构 年-月-日
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

    // 从系统时间获取当月的天数
    private function get_month_day_num()
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

    // 将折线图数据改为河流图数据
    public function linear2stream($d)
    {
        $d0 = $d;

        $l = count($d[0]->data);
        for($i=0; $i<count($d0); $i++)
        {
            for($j=0; $j<$l; $j++)
            {
                if($i == 0)
                    $d[$i]->data[$j][0] = 0;
                else
                {
                    $d[$i]->data[$j][0] = $d[$i-1]->data[$j][1];
                    $d[$i]->data[$j][1] = $d[$i]->data[$j][0] + $d0[$i]->data[$j][1];
                }
            }
        }

        return $d;
    }


}