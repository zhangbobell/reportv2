<?php
/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-3
 * Time: 下午1:46
 */
class MExcel extends MY_model {

    function __contruct() {
        parent::__construct();
    }

    public function insert_excel($data)
    {

        $sql = "INSERT INTO `meta_sku` (`updatetime`, `itemnum`, `min_price`, `is_wap`, `msg`)
                VALUES (?, ?, ?, ?, ?)";

        foreach($data as $cell)
        {
            // $bool=$this->db->insert($tableName, $cell);
            //   var_dump($bool);
            $this->set_record("db_madebaokang", $sql, $cell);
        }

       //

    }
}
