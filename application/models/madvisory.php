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
        ."'$insert_val[sales]','$insert_val[business_type]','$insert_val[sales_ac]','$insert_val[main_cat]',"
        ."'$insert_val[product_positioning]','$insert_val[competitiveness]','$insert_val[supply]','$insert_val[superiority]',"
        ."'$insert_val[competitors]','$insert_val[shop]','$insert_val[income]','$insert_val[desired_cat]',"
        ."'$insert_val[income_expect]','$insert_val[product_coincide]','$insert_val[shop_independent]','$insert_val[distributors]',"
        ."'$insert_val[erp]','$insert_val[suggestion]','$insert_val[applicant]','$insert_val[company]',"
        ."'$insert_val[email]','$insert_val[phone]')";

        if(!($query = $this->db->query($sql)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;
    }
}