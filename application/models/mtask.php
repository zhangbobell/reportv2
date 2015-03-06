<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 2015/1/19
 * Time: 11:28
 */

class MTask extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_task_list_by_username($db, $username) {
//        $sql = "SELECT `action_id`, `action_name`
//                FROM `meta_action`
//                LEFT JOIN `etc_privileges`.`etc_user` AS `a`
//                ON `meta_action`.`username`=`a`.`username`
//                WHERE `meta_action`.`username` = ?";

        $sql = "SELECT `createtime`, `due_date`, `task_id`, `task_cat`, `task_title`, `task_desc`, `creator`
                FROM `dim_bpm_activity`
                WHERE `assignee` = ?";

        return $this->my_query($db, $sql, array($username));
    }

    public function get_task_detail_by_id($db, $id) {
        $sql = "SELECT `raw_activity_tag`.`createtime`, `raw_activity_tag`.`updatetime`, `activity_target`, `meta_action`.`action_type`, `action_type_category`, `action_type_detail`, `action_tag`
                FROM `raw_activity_tag`
                LEFT JOIN `meta_action`
                ON `raw_activity_tag`.`action_id` = `meta_action`.`action_id`
                LEFT JOIN `dim_action_type`
                ON `meta_action`.`action_type` = `dim_action_type`.`action_type`
                WHERE `raw_activity_tag`.`action_id` = ?";

        return $this->my_query($db, $sql, array($id));
    }

    public function get_task_abstract_by_id($db, $id) {
        $sql = "SELECT `activity_name`, `activity_comment`, `action_status`, `meta_activity`.`username`
                FROM `meta_activity`
                LEFT JOIN `raw_activity_tag`
                ON `raw_activity_tag`.`activity_id` = `meta_activity`.`activity_id`
                LEFT JOIN `meta_action`
                ON `raw_activity_tag`.`action_id` = `meta_action`.`action_id`
                WHERE `raw_activity_tag`.`action_id` = ?
                LIMIT 1";

        return $this->my_query($db, $sql, array($id));
    }

    public function complete_task($db, $id, $status) {
        $sql = "UPDATE `meta_action`
                SET `action_status` = ?,
                    `updatetime` = '" . date("Y-m-d") . "'
                WHERE `action_id` = ?";

        return $this->my_query($db, $sql, array($status, $id));
    }

    public function complete_task_item($db, $id, $obj, $res) {
        $sql = "UPDATE `raw_activity_tag`
                SET `action_tag` = ?
                WHERE `action_id` = ?
                AND `activity_target` = ?";

        return $this->my_query($db, $sql, array($res, $id, $obj));
    }

    public function get_all_task_list($db) {
        $sql = "SELECT `activity_id`, `activity_name`, `activity_comment`
        FROM `meta_activity`";

        return $this->my_query($db, $sql);
    }

    public function get_acti_abstract_by_id($db, $id) {
        $sql = "SELECT `activity_comment`
                FROM `meta_activity`
                WHERE `activity_id` = ?";

        return $this->my_query($db, $sql, array($id));
    }

    public function get_acti_detail_by_id($db, $id) {
        $sql = "SELECT `createtime`, `updatetime`, `activity_tag`, `activity_type`, `activity_target`
                FROM `raw_activity_tag`
                WHERE `activity_id` = ?";

        return $this->my_query($db, $sql, array($id));
    }

    public function get_all_user($db) {
        $sql = "SELECT `username`
                FROM `etc_privileges`.`etc_user`
                WHERE `is_valid` = '1'";

        return $this->my_query($db, $sql);
    }

    public function get_all_action_type($db) {
        $sql = "SELECT `action_type`
                FROM `dim_action_type`";

        return $this->my_query($db, $sql);
    }

    public function add_assign($db, $actiId, $username, $actType, $actName) {

        $action_id = date('YmdHis');

        // 插入 action 维度表
        $sql = "INSERT INTO `meta_action`
                (`createtime`, `updatetime`, `action_id`, `action_status`, `action_type`, `action_name`, `username`)
                VALUES('". date("Y-m-d") ."', '". date("Y-m-d") ."', ?, ?, ?, ?, ?)";

        $res = $this->my_query($db, $sql, array($action_id, '未完成', $actType,  $actName, $username));


        // 更新主表
        $sql = "UPDATE `raw_activity_tag` SET `action_id` = ? WHERE `activity_id` = ?";

        $res = $res && $this->my_query($db, $sql, array($action_id, $actiId));

        return $res;
    }

    public function get_task_detail($db, $id) {
        $sql = "Select `target` FROM `raw_activity_tag` where `task_id` = ? ";

        return $this->mtask->my_query($db, $sql, array($id))->result_array();
    }
}