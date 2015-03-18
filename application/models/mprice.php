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

    /*
     * get_upset_price_seller_array : 获取乱价商家名单
     * @param : $db -- 数据库  $updatetime -- 更新时间 $is_history -- 是否是查询历史记录
     * */
    public function get_upset_price_seller_array($db, $updatetime, $is_history) {

        $sql = "SELECT `a`.`updatetime`, `a`.`sellernick`, `ljNum`, `totalNum`, (`ljnum`/`totalnum`) as `ljRate`, `logTime`, `status`
                FROM (
                    SELECT `updatetime`, `sellernick`, `auction_id`,
                    COUNT(IF((`price_wap` < `min_price_wap` OR `price` < `min_price`), `auction_id`, null )) AS `ljnum`,
                    COUNT(`auction_id`) AS `totalnum`
                    FROM `dim_auction`
                    WHERE `updatetime` = ?
                    GROUP BY `sellernick`
                ) AS `a`
                LEFT JOIN (
                    SELECT MAX(`updatetime`) as `logTime`, `sellernick`, `status`
                    FROM `fact_price_log`
                    WHERE `status` = '1'
                    GROUP BY `sellernick`
                ) AS `b`
                ON `a`.`sellernick` = `b`.`sellernick`
                WHERE `auction_id` != '-1'
                AND `ljnum` > 0";

        $sql_old = "SELECT `a`.`updatetime`, `a`.`sellernick`, `ljNum`, `totalNum`, (`ljnum`/`totalnum`) as `ljRate`, `logTime`, `status`
                     FROM (
                         SELECT `updatetime`, `sellernick`, `auction_id`,
                         COUNT(IF((`price_wap` < `min_price_wap` OR `price` < `min_price`), `auction_id`, null )) AS `ljnum`,
                         COUNT(`auction_id`) AS `totalnum`
                         FROM (
                                SELECT `raw_crawl_shop_item`.`updatetime`, `raw_crawl_shop_item`.`sellernick`, `dim_auction`.`auction_id`,`dim_auction`.`itemnum`, `raw_crawl_shop_item`.`zk_final_price` AS `price`, `raw_crawl_shop_item`.`zk_final_price_wap` AS `price_wap`, `min_price`, `min_price_wap`
                                FROM `raw_crawl_shop_item`
                                LEFT JOIN `dim_auction`
                                ON `raw_crawl_shop_item`.`auction_id` = `dim_auction`.`auction_id`
                                WHERE `raw_crawl_shop_item`.`updatetime`= ?
                          ) as c
                         GROUP BY `sellernick`
                     ) AS `a`
                     LEFT JOIN (
                         SELECT MAX(`updatetime`) as `logTime`, `sellernick`, `status`
                         FROM `fact_price_log`
                         WHERE `status` = '1'
                         GROUP BY `sellernick`
                     ) AS `b`
                     ON `a`.`sellernick` = `b`.`sellernick`
                     WHERE `auction_id` != '-1'
                     AND `ljnum` > 0";

        if ($is_history) {
            $arr = $this->get_result_array($db, $sql_old, array($updatetime));
        } else {
            $arr = $this->get_result_array($db, $sql, array($updatetime));
        }


        foreach ($arr as $key => $row) {
            foreach($row as $k => $v) {
                if ($k == 'status' && ($v == '1')) {
                    $arr[$key]['status'] = "<span class=\"glyphicon glyphicon-ok\"></span> ";
                } else {
                    $arr[$key]['status'] = "";
                }
            }
        }

        return $arr;
    }

    public function get_upset_price_product_array($db, $updatetime, $sellernick) {
        $sql = "SELECT `sellernick`, `auction_id`, `itemnum`, `price`,`min_price`, `price_wap`, `min_price_wap`, `is_reviewed_item`
                FROM `dim_auction`
                WHERE `updatetime` = ?
                AND `sellernick` = ?
                AND (`price_wap` < `min_price_wap` OR `price` < `min_price`)";

        $arr = $this->get_result_array($db, $sql, array($updatetime, $sellernick));

        foreach ($arr as $key => $row) {
            foreach($row as $k => $v) {
                if ($k == 'auction_id') {
                    $arr[$key]['url'] = "<a href=\"http://item.taobao.com/item.html?id=$v\" target=\"_blank\">$v</a>";
                }
                if ($k == 'is_reviewed_item' && ($v == '1')) {
                    $arr[$key]['is_reviewed_item'] = "<span class=\"glyphicon glyphicon-check\"></span> ";
                } else {
                    $arr[$key]['is_reviewed_item'] = "";
                }
            }
        }

        return $arr;
    }

    public function set_upset_price_record($db, $sellernick, $username, $status, $msg) {

        // 时间问题待定，目前不修改原有的时间
        $datetime = date("Y-m-d");
        $sql = "INSERT INTO `fact_price_log` (`updatetime`, `sellernick`, `account`, `status`, `msg`)
                VALUES (?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                `sellernick` = VALUES(`sellernick`),
                `account` = VALUES(`account`),
                `status` = VALUES(`status`),
                `msg` = VALUES(msg)";

        return $this->my_query($db, $sql, array($datetime, $sellernick, $username, $status, $msg));
    }

    public function get_initial_screen_product_array($db, $updatetime, $startIndex, $pageSize, $orderBy, $isAsc) {
        $sql = "SELECT `updatetime`, `sellernick`, `auction_id`, `itemnum`, `recent_sold_quantity`, `price`, `price_wap`, `is_reviewed_item`
                FROM `dim_auction`
                WHERE `updatetime` = ?
                AND `recent_sold_quantity` > '0'
                AND `sellernick` IN (
                    SELECT `sellernick`
                    FROM `dim_seller_list`
                    WHERE `status` > '0'
                ) ";

        if ($orderBy != '' && $isAsc == 'true') {
            $sql .="ORDER BY $orderBy ASC ";
        } else if ($orderBy != '' && $isAsc == 'false') {
            $sql .="ORDER BY $orderBy DESC ";
        }

        $sql .= "LIMIT ?, ?";

        $arr = $this->get_result_array($db, $sql, array($updatetime, $startIndex, $pageSize));
        foreach ($arr as $key => $row) {
            foreach($row as $k => $v) {
                if ($k == 'auction_id') {
                    $arr[$key]['url'] = "<a href=\"http://item.taobao.com/item.html?id=$v\" target=\"_blank\">$v</a>";
                }
                if ($k == 'is_reviewed_item' && ($v == '1')) {
                    $arr[$key]['is_reviewed_item'] = "<span class=\"glyphicon glyphicon-check\"></span> ";
                } else {
                    $arr[$key]['is_reviewed_item'] = "";
                }
            }
        }

        return $arr;
    }

    public function set_checked_record($db, $record) {
        $sql = "INSERT INTO `dim_auction` (`updatetime`, `sellernick`, `itemnum`, `auction_id`, `is_reviewed_item`, `min_price`, `min_price_wap`)
                VALUES(?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                `sellernick` = VALUES(`sellernick`),
                `itemnum` = VALUES(`itemnum`),
                `is_reviewed_item` = VALUES(`is_reviewed_item`),
                `min_price` = VALUES(`min_price`),
                `min_price_wap` = VALUES(`min_price_wap`)";

        $res = $this->_set_refresh_time($db, 'TAG_REFRESH_UPDATETIME_ITEM', $record['min_price_time'], '改动货号价格最新日期');
        $res = $res && $this->_set_refresh_log_time($db, 'SYS_LOG_UPDATETIME_ITEM', '改动货号写入最新日期');
        $res = $res && $this->my_query($db, $sql, array($record['updatetime'], $record['sellernick'], $record['itemnum'], $record['itemid'], $record['is_reviewed_item'], $record['min_price'], $record['min_price_wap']));

        return $res;
    }

    /*
     * refresh_meta_item: 将爬取的商品信息更新到最新的 meta_item 表中
     * @param : $db -- 数据库名
     * @return : null
     * */
    public function refresh_meta_item($db) {
        $sql = "SELECT `updatetime`, `uid`, `sellernick`, `itemid`, `title`, `zk_final_price`, `zk_final_price_wap`, `total_sold_quantity`, `biz30day`
                FROM `raw_crawl_shop_item`
                WHERE `updatetime` = ?";

        // 获取到最新的爬取时间
        $latest_time = $this->latest_crawl_item_time($db);

        $lasted_crawl = $this->my_query($db, $sql, array($latest_time))->result_array();
        foreach ($lasted_crawl as $key => $row) {
            array_unshift($lasted_crawl[$key], date("Y-m-d"));

            foreach($row as $k => $v) {
                if ($k == 'title') {
                    $lasted_crawl[$key][$k] = str_replace('?', '', $v);;
                }
            }
        }

        $res = $this->_insert_to_meta_item($db, $lasted_crawl, 1000);

        $res = $res && $this->_set_refresh_time($db, 'TAG_REFRESH_UPDATETIME_PRICE', $latest_time, '爬虫抓取最新时间');
        $res = $res && $this->_set_refresh_log_time($db, 'SYS_LOG_UPDATETIME_PRICE', '最新价格刷入时间');

        return $res;
    }

    /*
     * _lasted_crawl_item_time: 获取爬取商品的最新的日期
     * @param : $db -- 数据库名
     * @return : string -- 最新的日期
     * */
    public function latest_crawl_item_time($db) {
        $sql = "SELECT max(`updatetime`) as `latest` FROM `raw_crawl_shop_item`";
        $query_arr = $this->my_query($db, $sql)->result_array();

        return $query_arr[0]['latest'];
    }

    /*
     * _insert_to_meta_item: 将记录插入到 meta_item 表中
     * @param : $db -- 数据库名 $valArr -- 需要填充的数组 $n -- 批量操作条数
     * return : boolean -- 执行的结果
     * */
    private function _insert_to_meta_item($db, $valArr, $n) {
        $sql = "INSERT INTO `dim_auction` (`createtime`, `updatetime`, `seller_id`, `sellernick`, `auction_id`, `auction_title`, `price`, `price_wap`, `total_sold_quantity`, `recent_sold_quantity`)
                VALUES ?
                ON DUPLICATE KEY UPDATE
                `updatetime` = VALUES(`updatetime`),
                `seller_id` = VALUES(`seller_id`),
                `sellernick` = VALUES(`sellernick`),
                `auction_title` = VALUES(`auction_title`),
                `price` = VALUES(`price`),
                `price_wap` = VALUES(`price_wap`),
                `total_sold_quantity` = VALUES(`total_sold_quantity`),
                `recent_sold_quantity` = VALUES(`recent_sold_quantity`)";

        return $this->batch_insert($db, $sql, $valArr, $n);
    }

    public function test_insert($db) {
        $sql = "INSERT INTO `dim_auction` (`updatetime`, `auction_id`) VALUES('2014-11-11', '". rand() ."')";

        return $this->my_query($db, $sql);
    }

    public function get_upset_history($db, $sellernick) {
        $sql = "SELECT `updatetime`, `account`, `status`, `msg`
                FROM `fact_price_log`
                WHERE `sellernick` = ?
                ORDER BY `updatetime` DESC";

        $arr = $this->my_query($db, $sql, array($sellernick))->result_array();
        foreach ($arr as $key => $row) {
            foreach($row as $k => $v) {
                if ($k == 'status' && ($v == '1')) {
                    $arr[$key]['status'] = "乱价已沟通";
                } else if ($k == 'status' && ($v == '2')) {
                    $arr[$key]['status'] = "未授权";
                } else if ($k == 'status' && ($v == '0')) {
                    $arr[$key]['status'] = "误判";
                }
            }
        }

        return $arr;
    }

    public function get_unreviewed_count($db, $updatetime) {
        $sql = "SELECT COUNT(`is_reviewed_item`) AS `count_item`
                FROM `dim_auction`
                WHERE `is_reviewed_item` = '0'
                AND `updatetime` = ?";

        return $this->my_query($db, $sql, $updatetime)->result_array();
    }

    public function get_min_price($db, $itemnum) {
        $sql = "SELECT `updatetime`, sum(if(`is_wap` = '0', `min_price`, 0)) as `min_price`,
                sum(if(`is_wap` = '1', `min_price`, 0)) as `min_price_wap`
                FROM (
                    SELECT `updatetime`, `itemnum`, `min_price`, `is_wap`
                    FROM (
                        SELECT `updatetime`, `itemnum`, `min_price`, `is_wap`
                        FROM `raw_brand_up_sku`
                        WHERE
                        `itemnum` = ?
                        ORDER BY `updatetime` desc
                    ) AS `a`
                    GROUP BY `itemnum`, `is_wap`
                ) AS `b`";

        return $this->my_query($db, $sql, array($itemnum))->result_array();
    }

    private function _set_refresh_time($db, $ruleName, $updatetime, $comment) {
        $sql = "INSERT INTO `etc_rule` (`name`, `type`, `rule`,`comment`)
                VALUES (?, 'updatetime', ?, ?)
                ON DUPLICATE KEY UPDATE
                `rule` = VALUES(`rule`),
                `comment` = VALUES(`comment`)";

        return $this->my_query($db, $sql, array($ruleName, $updatetime, $comment));
    }

    private function _set_refresh_log_time($db, $ruleName, $comment) {
        $logTime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `etc_rule` (`name`, `type`, `rule`,`comment`)
                VALUES (?, 'updatetime', ?, ?)
                ON DUPLICATE KEY UPDATE
                `rule` = VALUES(`rule`),
                `comment` = VALUES(`comment`)";

        return $this->my_query($db, $sql, array($ruleName, $logTime, $comment));
    }

    public function get_meta_item_count($db, $updatetime) {
        $sql = "SELECT COUNT(`auction_id`) AS `item_count`
                FROM `dim_auction`
                WHERE `updatetime` = ?
                AND `recent_sold_quantity` > '0'
                AND `sellernick` IN (
                    SELECT `sellernick`
                    FROM `dim_seller_list`
                    WHERE `status` > '0'
                )";

        return $this->my_query($db, $sql, array($updatetime))->result_array();
    }

    public function get_available_datetime($db) {
        $sql = "SELECT `updatetime` FROM `dim_auction` GROUP BY `updatetime` ORDER BY `updatetime` ASC";

        return $this->my_query($db, $sql)->result_array();
    }
}