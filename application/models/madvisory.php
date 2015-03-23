<?php
/**
 * Created by PhpStorm.
 * User: liuya
 * Date: 2015/3/17
 * Time: 11:28
 */

class MAdvisory extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * @param $insert_val
     * @return bool
     * insert advisory to database
     */
    public function insert_advisory($insert_val) {
        $config = parent::select_DB("etc_privileges");
        $this->load->database($config);

        $sql = "INSERT INTO `advisory`(`createtime`,`sales`,`business_type`,"
        ."`sales_ac`,`main_cat`,`product_positioning`,`competitiveness`,`supply`,"
        ."`superiority`,`competitors`,`shop`,`income`,`desired_cat`,`income_expect`,"
        ."`product_coincide`,`shop_independent`,`distributors`,`erp`,`suggestion`,"
        ."`applicant`,`company`,`email`,`phone`) VALUES('". date("Y-m-d H:i:s") ."',"
        ."?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        if(!($query =  $this->my_query('etc_privileges', $sql, $insert_val)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;
    }
}