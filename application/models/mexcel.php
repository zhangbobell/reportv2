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
