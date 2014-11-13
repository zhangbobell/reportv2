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
            $this->set_record("db_madebaokang", $sql, $cell);
            $this->update_crawl_item_sku($cell);
        }
    }

    public function update_crawl_item_sku($d)
    {
        $sql0 = "SELECT * FROM `crawl_item_sku` WHERE `itemnum` = ?";

        $sql1 = "INSERT INTO `crawl_item_sku` (`tag_refresh_updatetime_price`, `itemnum`, `min_price`)
                VALUES (?, ?, ?)
                ON DUPLICATE KEY
                UPDATE
                `tag_refresh_updatetime_price` = VALUES(`tag_refresh_updatetime_price`),
                `itemnum` = VALUES(`itemnum`),
                `min_price` = VALUES(`min_price`)";

        $sql2 = "INSERT INTO `crawl_item_sku` (`tag_refresh_updatetime_price`, `itemnum`, `min_price_wap`)
                VALUES (?, ?, ?)
                ON DUPLICATE KEY
                UPDATE
                `tag_refresh_updatetime_price` = VALUES(`tag_refresh_updatetime_price`),
                `itemnum` = VALUES(`itemnum`),
                `min_price_wap` = VALUES(`min_price_wap`)";

        $sql3 = "UPDATE `crawl_item_sku` SET `tag_refresh_updatetime_price` = ? , `min_price` = ?
                WHERE `itemnum` = ?";

        $sql4 = "UPDATE `crawl_item_sku` SET `tag_refresh_updatetime_price` = ? , `min_price_wap` = ?
                WHERE `itemnum` = ?";

        //echo $this->get_result_array("db_madebaokang", $sql0, );
        $config= $this->select_DB("db_madebaokang");
        $this->load->database($config);

        $query = $this->db->query($sql0, $d['itemnum']);

        if($query->num_rows() > 0)
        {
            if($d['is_wap'] == 0)
            {
                $this->set_record("db_madebaokang", $sql3, Array('tag_refresh_updatetime_price'=>$d['updatetime'],
                 'min_price'=>$d['min_price'], 'itemnum'=>(string)$d['itemnum']));
            }
            else
            {
                $this->set_record("db_madebaokang", $sql4, Array('tag_refresh_updatetime_price'=>$d['updatetime'],
                 'min_price_wap'=>$d['min_price'], 'itemnum'=>(string)$d['itemnum']));
            }
        }
        else
        {
            if($d['is_wap'] == 0)
            {
                $this->set_record("db_madebaokang", $sql1, Array('tag_refresh_updatetime_price'=>$d['updatetime'],
                    'itemnum'=>$d['itemnum'], 'min_price'=>$d['min_price']));
            }
            else
            {
                $this->set_record("db_madebaokang", $sql2, Array('tag_refresh_updatetime_price'=>$d['updatetime'],
                    'itemnum'=>$d['itemnum'], 'min_price_wap'=>$d['min_price']));
            }
        }





    }

}
