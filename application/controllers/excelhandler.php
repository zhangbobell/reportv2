<?php
/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-3
 * Time: 上午10:10
 */

class excelHandler extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mexcel');

    }

    /*
     * 如果Excel文件过大导致$data内存溢出，可以讲数据库插入语句改到迭代读取Excel中
     * 即可以不用$data来保存整个Excel文件内容
     */
    public function analyze_excel($excelName)
    {


        // 加载 excel 类
        $this->load->library('excel');
        $filePath = './public/upload/'.$excelName;
//        $filePath = './public/upload/upload.xlsx';

        $objPHPExcel = PHPExcel_IOFactory::load($filePath);

        $sheet = $objPHPExcel->getActiveSheet();

        // 可以通过下面的函数获取任意位置的元素
        // 位置的取法是第几列的第几行 (c, r)
        // $sheet->getCellByColumnAndRow(c, r)->getValue()
        // 注意   r表示行数 序号从1开始
        //        c表示列数 序号从0开始

        // 获取表格的总行数和总列数
//        $colNum = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
        $rowNum = $sheet->getHighestRow();
        $colNum = 5;


        for($j=1; $j<$rowNum+1; $j++)
        {
            $rowData = array();
            for($i=0; $i<$colNum; $i++)
            {
                $cell = $sheet->getCellByColumnAndRow($i, $j)->getValue();
                if(empty($cell))
                    $cell = 0;


                if($j == 1)
                    $header[] = $cell; // 存放表头
                else
                    $rowData[] = $cell;
            }

            if($j != 1)
                $data[] = array_combine($header, $rowData);
        }


        return $data;


    }

    public function view_data()
    {
        $excelName = $this->input->post('excelName');
        $db = $this->input->post('db');
        $data = $this->analyze_excel($excelName);
        echo json_encode($data);
    }

    public function insert_data()
    {
        $excelName = $this->input->post('excelName');
        $db = $this->input->post('db');
        $data = $this->analyze_excel($excelName);
        echo $this->mexcel->insert_excel($data, $db);

    }
}

