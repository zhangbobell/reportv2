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
    function insert_user($username, $email, $password,$company,$company_site,$position,$phone) {
        $insert_user = array(
            'durdatetime' => date('Y-m-d H:i:s',strtotime('+3 day')),
            'expire_time' => '1',
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'groupid' => -1,
            'group' => '维权专员',
            'is_valid' => '1',
            'company' => $company,
            'company_site' => $company_site,
            'position' => $position,
            'phone' => $phone
        );

        $sql = "INSERT INTO `etc_user`(`durdatetime`,`expire_time`,`username`,`email`, `password`, `groupid`,`group`,`is_valid`"
        .",`company`,`company_site`,`position`,`phone`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

        if(!($query =  $this->my_query('etc_privileges', $sql, $insert_user)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;

    }

    /*
     * getuid_by_username : 根据用户名返回用户ID
     * param : $username -- 用户名
     * return : 返回用户ID
     */
    function getuid_by_username($username) {

        $sql = "Select `userid` FROM `etc_user` where `username` = ? ";

        $id_arr = $this->mlogin->my_query('etc_privileges', $sql, array($username))->result_array();
//        var_dump($id_arr[0]['userid']);
//        var_dump($this->mlogin->my_query('etc_privileges', $sql, array($username))->result_array());
        return $id_arr[0]['userid'];
    }

    /*
     * proj_for_newuser : 给新注册用户添加默认数据库：九阳
     * param : $username -- 用户名 $def_proj -- 项目id
     * return : true/false -- 操作是否成功
     */
    function proj_for_newuser($uid, $def_proj) {
        $def_proj_for_newuser = array(
            'uid' => $uid,
            'def_poj' => $def_proj
        );

        $sql = "INSERT INTO `rep_competence`(`uid`,`pid`) VALUES(?,?)";

        if(!($query =  $this->my_query('etc_privileges', $sql, $def_proj_for_newuser)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;
    }

    /*
     * get_expire_time_by_username : 获取新用户是否处在试用期
     * param : $username -- 用户名
     * return : 试用期状态
     */
    function get_expire_time_by_username($username) {
        $sql = "select `expire_time` from `etc_user` where `username` = ?";

        $id_arr = $this->mlogin->my_query('etc_privileges', $sql, array($username))->result_array();
        return $id_arr[0]['expire_time'];
    }

    /*
     * expire_time_user : 新用户是否已经过了3天试用期 并且 没有购买产品
     * param : $username -- 用户名
     * return : true/false -- 是否已经过了试用期 true：已过
     */
    function expire_time_user($username) {
        $expire_time = $this->mlogin->get_expire_time_by_username($username);
        $date_dur = $this->mlogin->get_durdatetime_by_username($username);
        $groupid = $this->mlogin->get_groupid_by_username($username);
        $date_now = date('Y-m-d H:i:s');
        if(strtotime($date_now) - strtotime($date_dur) > 0 & $expire_time == '1' & $groupid == 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * get_durdatetime_by_username : 获取新用户使用截止时间
     * param : $username -- 用户名
     * return : 试用截止时间
     */
    function get_durdatetime_by_username($username) {
        $sql = "select `durdatetime` from `etc_user` where `username` = ?";

        $id_arr = $this->mlogin->my_query('etc_privileges', $sql, array($username))->result_array();
        return $id_arr[0]['durdatetime'];
    }

    /*
     * set_user_groupid : 设置用户权限
     * param : $username -- 用户名 $groupid -- 需要设置的权限
     * return :
     */
    function set_user_groupid($groupid, $username) {
        $setdata = array(
            'gropuid' => $groupid,
            'username' => $username
        );

        $sql = "update `etc_user` set `groupid` = ? where `username` = ?";

        if(!($query =  $this->my_query('etc_privileges', $sql, $setdata)))
        {
            $this->db->_error_message();
            return false;
        }
        return true;
    }

    /*
     * get_groupid_by_username : 设获取用户权限等级
     * param : $username -- 用户名
     * return : groupid
     */
    function get_groupid_by_username($username) {
        $sql = "select `groupid` from `etc_user` where `username` = ?";

        $id_arr = $this->mlogin->my_query('etc_privileges', $sql, array($username))->result_array();
        return $id_arr[0]['groupid'];
    }
}