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

    public function insert_excel($data, $tableName)
    {
        $config = $this->select_DB("test");
        $this->load->database($config);

        foreach($data as $cell)
        {
            $bool=$this->db->insert($tableName, $cell);
         //   var_dump($bool);
        }
    }
}
