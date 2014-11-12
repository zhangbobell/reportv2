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
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                `updatetime` = VALUES(`updatetime`),
                `sellernick` = VALUES(`sellernick`),
                `account` = VALUES(`account`),
                `status` = VALUES(`status`),
                `msg` = VALUES(msg)";

        return $this->set_record($db, $sql, array($datetime, $sellernick, $username, $status, $msg));
    }

    public function get_initial_screen_product_array($db, $updatetime) {
        $sql = "SELECT `updatetime`, `sellernick`, `itemid`, `itemnum`, `zk_final_price`, `zk_final_price_wap`, `is_reviewed_item`
                FROM `crawl_item_sku`
                WHERE `updatetime` = '?' AND (`is_reviewed_item` = '0' OR `is_reviewed_item` is null)";

        $arr = $this->get_result_array($db, $sql, array($updatetime));
        foreach ($arr as $key => $row) {
            foreach($row as $k => $v) {
                if ($k == 'itemid') {
                    $arr[$key]['url'] = "<a href=\"http://item.taobao.com/item.html?id=$v\" target=\"_blank\">$v</a>";
                }
                if ($k == 'is_reviewed_item' && ($v = '0' || $v = 'null')) {
                    $arr[$key]['is_reviewed_item'] = "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-edit\"></span> 编辑</button>";
                }
            }
        }

        return $arr;
    }

    public function set_checked_record($db, $record) {
        $sql = "INSERT INTO `crawl_item_sku` (`updatetime`, `sellernick`, `itemnum`, `itemid`, `is_reviewed_item`)
                VALUES(?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                `sellernick` = VALUES(`sellernick`),
                `itemnum` = VALUES(`itemnum`),
                `is_reviewed_item` = VALUES(`is_reviewed_item`)";

        return $this->set_record($db, $sql, $record);
    }

    /*
     * refresh_meta_item: 将爬取的商品信息更新到最新的 meta_item 表中
     * @param : $db -- 数据库名
     * @return : null
     * */
    public function refresh_meta_item($db) {
        $sql = "SELECT `updatetime`, `uid`, `sellernick`, `itemid`, `title`, `zk_final_price`, `zk_final_price_wap`, `total_sold_quantity`
                FROM `crawl_shop_item`
                WHERE `updatetime` = ?";

        // 获取到最新的爬取时间
        $latest_time = $this->_latest_crawl_item_time($db);

        $lasted_crawl = $this->my_query($db, $sql, array($latest_time));
        foreach ($lasted_crawl->result_array() as $row) {
            $res = $this->_insert_to_meta_item($db, $row);
            if ($res === false)
                return false;
        }
        return true;
    }

    /*
     * _lasted_crawl_item_time: 获取爬取商品的最新的日期
     * @param : $db -- 数据库名
     * @return : string -- 最新的日期
     * */
    private function _latest_crawl_item_time($db) {
        $sql = "SELECT max(`updatetime`) as `latest` FROM `crawl_shop_item`";
        $query_arr = $this->my_query($db, $sql)->result_array();

        return $query_arr[0]['latest'];
    }

    /*
     * _insert_to_meta_item: 将记录插入到 meta_item 表中
     * @param : $db -- 数据库名 $valArr -- 需要填充的数组
     * return : boolean -- 执行的结果
     * */
    private function _insert_to_meta_item($db, $valArr) {
        // 得到创建记录的时间
        $createtime = date("Y-m-d");

        $sql = "INSERT INTO `crawl_item_sku` (`createtime`, `updatetime`, `uid`, `sellernick`, `itemid`, `title`, `zk_final_price`, `zk_final_price_wap`, `total_sold_quantity`)
                VALUES ('$createtime', ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                `updatetime` = VALUES(`updatetime`),
                `uid` = VALUES(`uid`),
                `sellernick` = VALUES(`sellernick`),
                `title` = VALUES(`title`),
                `zk_final_price` = VALUES(`zk_final_price`),
                `zk_final_price_wap` = VALUES(`zk_final_price_wap`),
                `total_sold_quantity` = VALUES(`total_sold_quantity`)";

        return $this->my_query($db, $sql, $valArr);
    }

    public function test_insert($db) {
        $sql = "INSERT INTO `crawl_item_sku` (`updatetime`, `itemid`) VALUES('2014-11-11', '". rand() ."')";

        return $this->my_query($db, $sql);
    }
}