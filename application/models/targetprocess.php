<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 14-12-1
 * Time: 下午9:09
 */

class TargetProcess extends MY_model {

    function __contruct() {
        parent::__construct();
    }

    function insert_target($username, $period, $t_type, $target)
    {

        $sql = "INSERT INTO `user_target` (`username`, `period`, `t_type`, `target`)
                VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY
                UPDATE
                `username` = VALUES(`username`),
                `period` = VALUES(`period`),
                `t_type` = VALUES(`t_type`),
                `target` = VALUES(`target`)";

        return $this->my_query('db_sanqiang', $sql, array($username, $period, $t_type, $target));

    }

    function get_target($username, $period, $t_type)
    {
        $sql = "SELECT `target` FROM `user_target` WHERE `username` = ? AND `period` = ? AND `t_type` = ?";
        return $this->get_result_array('db_sanqiang', $sql, array($username, $period, $t_type));
    }


}



