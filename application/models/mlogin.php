<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-27
 * Time: 下午5:52
 */
class Mlogin extends MY_model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * validate_user : 根据用户名和密码的组合判断是否存在该记录。
     * param : $username -- 用户名 $password -- 密码
     * return : $record -- 记录 -1 -- 不存在
     */
    function validate_user($username, $password)
    {
        $config= $this->select_DB("etc_privileges");
        $this->load->database($config);

        $sql="select `userid`, `groupid`,`email` "
            . "from `etc_user` "
            . "where `username`='$username' and `password`='$password' "
            . "LIMIT 1";
        $query = $this->db->query($sql);

        if($query->num_rows()==1)
        {
            $record = $query->result_array();
            return $record[0];
        }
        else
        {
            return -1;
        }
    }

    /*
     * get_auth_DB : 根据用户id返回该用户授权的数据库名
     * param : $userid -- 用户id
     * return : $authDB -- 用户被授权的数据库名（数组）
     */
    function get_auth_DB($userid)
    {
        $config=parent::select_DB("etc_privileges");
        $this->load->database($config);

        $sql = "SELECT `etc_project`.`projectname`, `etc_project`.`dbname` "
            . "FROM `etc_project` "
            . "LEFT JOIN `rep_competence` "
            . "ON `rep_competence`.`pid` = `etc_project`.`pid` "
            . "WHERE `rep_competence`.`uid` = '$userid' ";

        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row )
        {
            $authDB[$row['dbname']] = $row['projectname'];
        }

        return $authDB;
    }

    /*
     * insert_log_message : 插入登录信息到登录日志表中
     * param : $username -- 用户名 $logMessage -- 登录/注销信息 $ipAdddresss -- ip地址
     * return : true/false -- 操作是否成功
     */
    function insert_log_message($username, $logMessage, $ipAddress)
    {
        $config = parent::select_DB("etc_privileges");
        $this->load->database($config);

        $sql="INSERT INTO `rep_log` (`createtime`, `username`, `title`, `content`) "
            . "VALUES ('". date("Y-m-d H:i:s") ."', '$username', '$logMessage', '$ipAddress')";
        if(!($query = $this->db->query($sql)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;
    }

    /*
     * insert_user : 插入新注册用户信息到etc_user表中
     * param : $username -- 用户名 $email -- 邮箱 $password -- 用户密码
     * return : true/false -- 操作是否成功
     */
    function insert_user($username, $email, $password) {
        $insert_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'groupid' => -1,
            'group' => '维权专员',
            'is_valid' => '1'
        );

        $sql = "INSERT INTO `etc_user`(`username`,`email`, `password`, `groupid`,`group`,`is_valid`) VALUES(?,?,?,?,?,?)";

        if(!($query =  $this->my_query('etc_privileges', $sql, $insert_user)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;

    }

}