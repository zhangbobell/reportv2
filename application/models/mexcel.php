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
        $res = true;
        $res = $res && $this->_insert_up_sku($db, $data); // 插入到 up_sku 表
        $res = $res && $this->_update_meta_item($db, $data);// 更新 meta_item 里面的价格

        $res = $res && $this->_set_refresh_time($db, 'TAG_REFRESH_UPDATETIME_PRICE_ITEMNUM', $data[0]['updatetime'], '调整底价时间');
        $res = $res && $this->_set_refresh_log_time($db, 'SYS_LOG_UPDATETIME_PRICE_ITEMNUM','底价刷入时间');

        return $res;
    }

    private function _insert_up_sku($db, $data) {
        $sql = "INSERT INTO `raw_brand_up_sku` (`updatetime`, `itemnum`, `min_price`, `is_wap`, `msg`)
                VALUES ?
                ON DUPLICATE KEY
                UPDATE
                `updatetime` = VALUES(`updatetime`),
                `itemnum` = VALUES(`itemnum`),
                `min_price` = VALUES(`min_price`),
                `is_wap` = VALUES(`is_wap`),
                `msg` = VALUES(`msg`)";

        return $this->batch_insert($db, $sql, $data);
    }

    private function _update_meta_item($db, $data) {
        $sql = "INSERT INTO `dim_auction` (`auction_id`, `itemnum`, `min_price`, `min_price_wap`)
                VALUES ?
                ON DUPLICATE KEY
                UPDATE
                `min_price` = VALUES(`min_price`),
                `min_price_wap` = VALUES(`min_price_wap`)";

        $trans_data = $this->_transform_table($db, $data);

        return $this->batch_insert($db, $sql, $trans_data);
    }

    /*
     * _transform_table : 根据上传的表格，变换二维数组到以下格式： itemid -- itemnum -- min_price -- min_price_wap
     * */
    private function  _transform_table($db, $data) {
        $wap_price = array();
        $pc_price = array();

        foreach($data as $row) {
            if ($row['is_wap'] == 0) {
                $pc_price[$row['itemnum']] = $row['min_price'];
            } else {
                $wap_price[$row['itemnum']] = $row['min_price'];
            }
        }

        $id_map = $this->_get_itemid_map($db, $data);

        foreach($id_map as $key => $row) {
            $itemnum = $row['itemnum'];

            if (array_key_exists($itemnum, $pc_price)) {
                $id_map[$key]['min_price'] = $pc_price[$itemnum];
            } else {
                $id_map[$key]['min_price'] = null;
            }

            if (array_key_exists($itemnum, $wap_price)) {
                $id_map[$key]['min_price_wap'] = $wap_price[$itemnum];
            } else {
                $id_map[$key]['min_price_wap'] = null;
            }
        }

        return $id_map;
    }

    /*
     * _get_itemid_map : 从 meta_item 表中获取到 itemid 和 itemnum 的一一对应关系
     *
     * */
    private function _get_itemid_map($db, $data) {

        $itemnum_arr = array();
        foreach($data as $row) {
            $itemnum_arr[] = $row['itemnum'];
        }
        $itemnums = implode("', '", array_values($itemnum_arr));

        $sql = "SELECT `auction_id`, `itemnum` FROM `dim_auction` WHERE `itemnum` in ('$itemnums')";
        $itemids = $this->my_query($db, $sql);

        return $itemids->result_array();
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
