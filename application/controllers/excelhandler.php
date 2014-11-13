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
    public function insert_excel()
    {
        $excelName = $this->input->post('excelName');

        // 加载 excel 类
        $this->load->library('excel');
        $filePath = './public/upload/'.$excelName;
       // $filePath = './public/upload/upload.xlsx';

        $objPHPExcel = PHPExcel_IOFactory::load($filePath);

        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

        // 获取表格的总列数
        $column0 = $objPHPExcel->getActiveSheet()->getHighestColumn();
        // 表格行数的迭代器，初始化为1
        $row0 = 1;

        foreach ($cell_collection as $cell)
        {
            // 获取当前单元的列数
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            // 获取当前单元的行数
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            // 获取当前单元的内容
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

            // 表头包含第一行的数据
            if ($row == 1)
            {
                $header[] = $data_value;
            }

            // $row_array用来存放每行的数据
            if ($row == $row0)
            {
                $row_array[] = $data_value;
            }

            // 当扫描至每行最后一个单元时，将$row_array的内容放入二维数组$data中
            // 行号迭代器$row0 + 1， 并将$row_array清空，给下一次迭代使用
            if ($column == $column0 )
            {
                if($row != 1)
                    $data[] = array_combine($header, $row_array);
                $row0 = $row0 + 1;
                $row_array = array();
            }
        }


        $this->mexcel->insert_excel($data);

        echo json_encode($data);



    }


}

