<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-27
 * Time: 下午5:49
 */

class MY_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function select_DB($databaseName)
    {

        /*$db_config['hostname'] = '192.168.1.90';
        $db_config['username'] = 'data';
        $db_config['password'] = 'data2123'; */
        $db_config['hostname'] = '127.0.0.1';
        $db_config['username'] = 'root';
        $db_config['password'] = 'root';
        $db_config['database'] = $databaseName;
        $db_config['dbdriver'] = 'mysqli';
        $db_config['dbprefix'] = '';
        $db_config['pconnect'] = TRUE;
        $db_config['db_debug'] = TRUE;
        $db_config['cache_on'] = FALSE;
        $db_config['cachedir'] = '';
        $db_config['char_set'] = 'utf8';
        $db_config['dbcollat'] = 'utf8_bin';
        $db_config['swap_pre'] = '';
        $db_config['autoinit'] = TRUE;
        $db_config['stricton'] = FALSE;

        return $db_config;
    }

    /* get_result_array: 根据数据库和 SQL 语句获取到结果数组
     * @param : $db -- 选择的数据库
     *          $sql -- 要查询的语句
     *          $valArr[可选] -- 可以带入的参数
     *          $retArr[可选] -- 返回的数组中的字段
     * @return : SQL 查询结果数组
     * */
    public function get_result_array($db, $sql, $valArr = null) {
        $config= $this->select_DB($db);
        $this->load->database($config);

        $query = $this->db->query($sql, $valArr);

        return $query->result_array();
    }

    public function set_record($db, $sql, $valArr) {
        $config= $this->select_DB($db);
        $this->load->database($config);

        $this->db->query($sql, $valArr);

        if (mysql_errno() == 1062) {
            return -1;
        }

        return 0;
    }

    /*
     * my_query: 根据数据库和 SQL 语句获取到结果
     * @param: $db -- 选择的数据库
     *         $sql -- SQL 语句
     *         $valArr[可选] -- SQL 语句中的参数
     * return: object -- 查询的返回对象
     * */
    public function my_query($db, $sql, $valArr = null) {
        $config= $this->select_DB($db);
        $this->load->database($config);

        return $this->db->query($sql, $valArr);
    }
}
