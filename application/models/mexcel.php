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

    public function insert_excel($data, $db)
    {


        $sql = "INSERT INTO `up_sku` (`updatetime`, `itemnum`, `min_price`, `is_wap`, `msg`)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY
                UPDATE
                `updatetime` = VALUES(`updatetime`),
                `itemnum` = VALUES(`itemnum`),
                `min_price` = VALUES(`min_price`),
                `is_wap` = VALUES(`is_wap`),
                `msg` = VALUES(`msg`)";


        foreach($data as $cell)
        {
            $this->my_query($db, $sql, $cell);
            $this->update_meta_item($cell, $db);
        }

        $this->_set_refresh_time($db, 'TAG_REFRESH_UPDATETIME_PRICE_ITEMNUM', $cell['updatetime'], '调整底价时间');
        $this->_set_refresh_log_time($db, 'SYS_LOG_UPDATETIME_PRICE_ITEMNUM','底价刷入时间');


    }

    public function update_meta_item($d, $db)
    {
        $datetime = date("Y-m-d");

        $sql0 = "SELECT * FROM `meta_item` WHERE `itemnum` = ?";

        $sql1 = "INSERT INTO `meta_item` (`itemnum`, `min_price`)
                VALUES (?, ?)
                ON DUPLICATE KEY
                UPDATE
                `itemnum` = VALUES(`itemnum`),
                `min_price` = VALUES(`min_price`)";

        $sql2 = "INSERT INTO `meta_item` (`itemnum`, `min_price_wap`)
                VALUES (?, ?)
                ON DUPLICATE KEY
                UPDATE
                `itemnum` = VALUES(`itemnum`),
                `min_price_wap` = VALUES(`min_price_wap`)";

        $sql3 = "UPDATE `meta_item` SET `min_price` = ?
                WHERE `itemnum` = ?";

        $sql4 = "UPDATE `meta_item` SET `min_price_wap` = ?
                WHERE `itemnum` = ?";

        //echo $this->get_result_array($db, $sql0, );
//        $config= $this->select_DB($db);
//        $this->load->database($config);

        $query = $this->my_query($db, $sql0, $d['itemnum']);

        if($query->num_rows() > 0)
        {
            if($d['is_wap'] == 0)
            {
                $this->set_record($db, $sql3, Array('min_price'=>$d['min_price'], 'itemnum'=>(string)$d['itemnum']));
            }
            else
            {
                $this->set_record($db, $sql4, Array('min_price_wap'=>$d['min_price'], 'itemnum'=>(string)$d['itemnum']));
            }
        }
//        else
//        {
//            if($d['is_wap'] == 0)
//            {
//                $this->set_record($db, $sql1, Array('itemnum'=>$d['itemnum'], 'min_price'=>$d['min_price']));
//            }
//            else
//            {
//                $this->set_record($db, $sql2, Array('itemnum'=>$d['itemnum'], 'min_price_wap'=>$d['min_price']));
//            }
//        }
    }

    private function _set_refresh_time($db, $ruleName, $updatetime, $comment) {
        $sql = "INSERT INTO `etc_rule` (`name`, `type`, `rule`,`comment`)
                VALUES (?, 'updatetime', ?, ?)
                ON DUPLICATE KEY UPDATE
                `rule` = VALUES(`rule`)";

        return $this->my_query($db, $sql, array($ruleName, $updatetime, $comment));
    }

    private function _set_refresh_log_time($db, $ruleName, $comment) {
        $logTime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `etc_rule` (`name`, `type`, `rule`,`comment`)
                VALUES (?, 'updatetime', ?, ?)
                ON DUPLICATE KEY UPDATE
                `rule` = VALUES(`rule`)";

        return $this->my_query($db, $sql, array($ruleName, $logTime, $comment));
    }

}
