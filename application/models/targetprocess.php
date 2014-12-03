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

    function insert_target($target, $username)
    {
//        echo $username;
//        echo '<br>';
//        echo $target;

        $sql = "INSERT INTO `t_target` (`username`, `target`)
                VALUES (?, ?)
                ON DUPLICATE KEY
                UPDATE
                `username` = VALUES(`username`),
                `target` = VALUES(`target`)";

        $this->my_query('user_target', $sql, array($username, $target));

    }

    function get_target($username)
    {
        $sql = "SELECT `target` FROM `t_target` WHERE `username` = ? ";
        return $this->get_result_array('user_target', $sql, $username);
    }


}



