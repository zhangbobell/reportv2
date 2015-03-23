<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 2015/1/19
 * Time: 11:28
 */

class MProcess extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert_sup_info($insert_info) {

        $sql="INSERT INTO `supply_info`(`createtime`,`apply_type`,`company`,"
            ."`email`,`applicant`,`phone`,`reason`) VALUES ('". date("Y-m-d H:i:s") ."',"
            ."?,?,?,?,?,?)";

        if(!($query =  $this->my_query('etc_privileges', $sql, $insert_info)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;
    }

}