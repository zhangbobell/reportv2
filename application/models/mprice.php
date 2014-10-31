<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-30
 * Time: 上午1:38
 */
class MPrice extends MY_model {

    function __contruct() {
        parent::__construct();
    }

    public function get_upset_price_seller_array($db, $updatetime) {

        $sql = "SELECT `updatetime`, `sellernick`, `ratesum`,
                COUNT(IF(`zk_final_price_wap` < `price_min` OR `zk_final_price` < `price_min`, 1, 0)) as `ljnum`,
                SUM(IF(`zk_final_price_wap` < `price_min` OR `zk_final_price` < `price_min`, `zk_final_price`, 0) * `total_sold_quantity`) as `ljTotalSoldPrice`,
                SUM(IF(`zk_final_price_wap` < `price_min` OR `zk_final_price` < `price_min`, `zk_final_price`, 0) * `total_sold_quantity`) / SUM(`zk_final_price` * `total_sold_quantity`) as `ljRate`
                FROM (
                SELECT `a`.`updatetime`, `a`.`sellernick`, `a`.`ratesum`, `a`.`total_sold_quantity`, `a`.`itemid`, `b`.`itemnum`, `zk_final_price_wap`, `zk_final_price`, `price_min`
                FROM `crawl_shop_item` as `a`
                LEFT JOIN `crawl_item_sku` as `b`
                ON `b`.`itemid` = `a`.`itemid`
                LEFT JOIN `meta_sku` as `c`
                ON  `b`.`itemnum` = `c`.`itemnum`
                WHERE `a`.`updatetime` = ?) as `abc`
                GROUP BY `sellernick`";

        return $this->get_result_array($db, $sql, array($updatetime));
    }

    public function get_upset_price_product_array($db, $updatetime, $sellernick) {
        $sql = "SELECT `a`.`updatetime`, `a`.`total_sold_quantity`, `a`.`itemid`, `b`.`itemnum`, `zk_final_price_wap`, `zk_final_price`, `price_min`
                FROM `crawl_shop_item` as `a`
                LEFT JOIN `crawl_item_sku` as `b`
                ON `b`.`itemid` = `a`.`itemid`
                LEFT JOIN `meta_sku` as `c`
                ON  `b`.`itemnum` = `c`.`itemnum`
                WHERE `a`.`updatetime` = ?
                AND `a`.`sellernick` = ?
                AND (`zk_final_price_wap` < `price_min` OR `zk_final_price` < `price_min`)";

        $arr = $this->get_result_array($db, $sql, array($updatetime, $sellernick));

        foreach ($arr as $key => $row) {
            foreach($row as $k => $v) {
                if ($k == 'itemid') {
                    $arr[$key]['url'] = "<a href=\"http://item.taobao.com/item.html?id=$v\" target=\"_blank\">$v</a>";
                }
            }
        }

        return $arr;
    }

    public function set_upset_price_record($db, $sellernick, $username, $status, $msg) {
        $datetime = date("Y-m-d");
        $sql = "INSERT INTO `status_price_log` (`updatetime`, `sellernick`, `account`, `status`, `msg`)
                VALUES (?, ?, ?, ?, ?)";

        return $this->set_record($db, $sql, array($datetime, $sellernick, $username, $status, $msg));
    }

}