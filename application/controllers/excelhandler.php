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
    public function analyze_excel($is_insert = 0)
    {
        $excelName = $this->input->post('excelName');
        $db = $this->input->post('db');

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
        $colNum = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
        $rowNum = $sheet->getHighestRow();


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



//        foreach ($cell_collection as $cell)
//        {
//            // 获取当前单元的列数
//            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
//            // 获取当前单元的行数
//            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
//            // 获取当前单元的内容
//            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
//
//
//            // 表头包含第一行的数据
//            if ($row == 1)
//            {
//                $header[] = $data_value;
//            }
//
//            // $row_array用来存放每行的数据
//            if ($row == $row0)
//            {
//                $row_array[] = $data_value;
//
//            }
//
//            // 当扫描至每行最后一个单元时，将$row_array的内容放入二维数组$data中
//            // 行号迭代器$row0 + 1， 并将$row_array清空，给下一次迭代使用
//            if ($column == $column0 )
//            {
//                if($row != 1)
//                    $data[] = array_combine($header, $row_array);
//                $row0 = $row0 + 1;
//                $row_array = array();
//            }
//        }

        if($is_insert != 0)
            $this->mexcel->insert_excel($data, $db);
        else
            echo json_encode($data);
    }
}

