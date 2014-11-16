<?php
/**
 * Created by PhpStorm.
 * User: hui.ZH
 * Date: 2014/11/13
 * Time: 20:01
 */
class MManagement extends MY_model
{

    function __contruct()
    {
        parent::__construct();
    }

    /*
     * function: 获取当前数据库中的所有用户的数据信息
     *
     */
    public function get_init_user($db) {
        $sql = "SELECT
                `etc_user`.`userid`,
                `etc_user`.`username`,
                `etc_user`.`group`,
                `etc_user`.`is_valid`,
                `etc_project`.`projectname`
                FROM `etc_user`
                LEFT JOIN `rep_competence` ON `rep_competence`.`uid` = `etc_user`.`userid`
                LEFT JOIN `etc_project` ON `etc_project`.pid = `rep_competence`.`pid`";

        return $this->my_query($db, $sql)->result_array();
    }

    /*
     * function：将用户插入数据库
     * 首先判断该用户名是否已经存在，不存在则插入，否则返回false
     */
    public function add_user($db, $username, $password, $group, $is_valid) {
        $sql1 = "SELECT `etc_user`.`userid`
                FROM `etc_user`
                WHERE `etc_user`.`username` = ?
                ";
        $is_exist = $this->my_query($db, $sql1, array($username))->result_array();
        if(!$is_exist){
            $sql = "INSERT INTO `etc_user` (`username`, `password`, `groupid`, `is_valid`)
                    VALUES(?, ?, ?, ?)";
            return $this->my_query($db, $sql, array($username, $password, $group, $is_valid));
        }
        else
            return false;
    }

    /*
     * function: get_all_project()获取所有的项目名称，以及他们的pid
     * @param: null
     * @return: null
     */
    public function get_all_project(){
        $db = "etc_privileges";
        $sql = "SELECT DISTINCT `pid`,`projectname`
                FROM  `etc_project`";

        return $this->my_query($db, $sql)->result_array();
    }

    /*
     *function：插入用户之后获取新插入用户的uid，来为下一步将用户跟项目的对应关系插入到表rep_competence中
     */
    public function get_uid($db, $username){
        $sql = "SELECT DISTINCT `userid`
                FROM  `etc_user`
                WHERE `username` = ? ";

        $arr = $this->my_query($db, $sql, array($username))->result_array();

        return $arr[0]['userid'];
    }

    /*
     *function: 将用户跟其所负责的项目关系插入到事实表rep_competence中
     *
     */
    public function insert_user_project($db, $uid, $auth_project, $date){
        $sql = "INSERT INTO `rep_competence` (`uid`, `pid`, `updatetime`)
                VALUES(?, ?, ?)";

        return $this->my_query($db, $sql, array($uid, $auth_project, $date));
    }

    /*
     * function: 判断用户输入的用户名称是否已存在与数据库中
     * @para: $projectname
     * @return：存在系统中该用户名称的pid的个数
     */
    public function check_user_name($db, $username){
        $sql = "SELECT `etc_user`.`userid`
                FROM `etc_user`
                WHERE `etc_user`.`username` = ?
                ";
        return $this->my_query($db, $sql, array($username))->num_rows();
    }

    /*
     * function: 获取当前数据库中的项目数据信息
     *
     */
    public function get_init_project($db){
        $sql = "
                SELECT DISTINCT `etc_project`.`pid`,`etc_project`.`projectname`,`etc_project`.`dbname`,`etc_project`.`is_valid`
                FROM `etc_project`
                ";
        return $this->my_query($db, $sql)->result_array();
    }

    /*
     * function：将项目插入数据库
     * 首先判断该项目是否已经存在，不存在则插入，存在则返回false
     */
    public function add_project($db, $projectname, $projectdb, $is_valid, $pid){
        $sql = "SELECT *
                FROM `etc_project`
                WHERE `etc_project`.`projectname` = ?
                ";

        $is_exist = $this->my_query($db, $sql, array($projectname))->result_array();

        if(!$is_exist){
            $sql = "INSERT INTO `etc_project` (`projectname`, `dbname`, `pid`, `is_valid`)
                    VALUES(?, ?, ?, ?)";
            return $this->my_query($db, $sql, array($projectname, $projectdb, $pid, $is_valid));
        }
        else
            return false;
    }

    /*
     * function: 判断用户输入的项目名称是否已存在与数据库中
     * @para: $projectname
     * @return：存在于系统中该项目名称的pid的个数
     */
    public function check_project_name($db, $projectname){
        $sql = "SELECT `etc_project`.`pid`
                FROM `etc_project`
                WHERE `etc_project`.`projectname` = ?";

        return $this->my_query($db, $sql, array($projectname))->num_rows();
    }

    public function delete_project($db, $projectid){
        $sql_del_project = "
                DELETE
                FROM `etc_project`
                WHERE `etc_project`.`pid` = ?
                ";

        $res_del_project = $this->my_query($db, $sql_del_project, $projectid);
        //??????此处为什么不能写  return $this->my_query($db, $sql, array($projectid));

        //删除所有与该项目有关联的用户信息
        $sql_del_rep_competence = "
                DELETE
                FROM `rep_competence`
                WHERE `rep_competence`.`pid` = ?";
        $res_del_rep_competence = $this->my_query($db, $sql_del_rep_competence, $projectid);

        return $res_del_project && $res_del_rep_competence;
    }

    public function show_project($db, $projectid){
        $sql = "SELECT *
                FROM `etc_project`
                WHERE `pid` = ?";
        $arr = $this->my_query($db, $sql, $projectid)->result_array();
        //此时的$arr是一个二维的数组，因为我们只是了选取pid等于特定值的数据，也就是说我们的二位数组里只有一个一维数组
        //如果直接返回$arr,则后续取出对象数据需要用d[0].pid的形式
        //否则直接用d.pid的形式
        return $arr[0];
    }

    public function update_project($db, $projectname, $projectdb, $is_valid, $pid, $updatetime){
        $sql = "UPDATE `etc_project`
                SET `projectname` = ?,
                `dbname` = ?,
                `is_valid` = ?,
                `updatetime` = ?
                WHERE `pid` = ?";
        return $this->my_query($db, $sql, array($projectname, $projectdb, $is_valid, $updatetime, $pid));
    }


    public function get_all_user(){
        $db = "etc_privileges";
        $sql = "SELECT DISTINCT `userid`,`username`
                FROM  `etc_user`";

        return $this->my_query($db, $sql)->result_array();
    }

    public function delete_user($db, $userid){
        $sql_del_user = "DELETE
                         FROM `etc_user`
                         WHERE `etc_user`.`userid` = ?
                         ";

        $res_del_user = $this->my_query($db, $sql_del_user, $userid);

        //删除所有与该项目有关联的用户信息
        $sql_del_rep_competence = "DELETE
                                   FROM `rep_competence`
                                   WHERE `rep_competence`.`uid` = ?";
        $res_del_rep_competence = $this->my_query($db, $sql_del_rep_competence, $userid);

        return $res_del_user && $res_del_rep_competence;
    }

    public function show_user($db, $userid){
        $sql = "SELECT DISTINCT`etc_user`.*,`rep_competence`.pid,`etc_project`.`projectname`
                FROM `etc_user`
                LEFT JOIN `rep_competence` ON `rep_competence`.uid = `etc_user`.userid
                LEFT JOIN `etc_project` ON `etc_project`.pid = `rep_competence`.`pid`
                WHERE `userid` = ?";
        return $this->my_query($db, $sql, $userid)->result_array();
    }

    public function update_user_changepassword($db, $username, $password, $groupid, $is_valid, $uid){
        //更新用户信息
        $sql_update_user = "UPDATE `etc_user`
                            SET `username` = ?,
                            `password` = ?,
                            `groupid` = ?,
                            `is_valid` = ?
                            WHERE `userid` = ?";

        $res_update_user = $this->my_query($db, $sql_update_user, array($username, $password, $groupid, $is_valid, $uid));

        //删除以前的用户项目对应关系
        $sql_delete_rep_competence ="DELETE
                                     FROM `rep_competence`
                                     WHERE `uid` = ?";
        $res_delete_rep_competence = $this->my_query($db, $sql_delete_rep_competence, $uid);

        return $res_delete_rep_competence  && $res_update_user;
    }

    public function update_user_holdpassword($db, $username, $groupid, $is_valid, $uid){
        //更新用户信息
        $sql_update_user = "UPDATE `etc_user`
                        SET `username` = ?,
                        `groupid` = ?,
                        `is_valid` = ?
                        WHERE `userid` = ?";

        $res_update_user = $this->my_query($db, $sql_update_user, array($username, $groupid, $is_valid, $uid));

        //删除以前的用户项目对应关系
        $sql_delete_rep_competence ="DELETE
                                 FROM `rep_competence`
                                 WHERE `uid` = ?";
        $res_delete_rep_competence = $this->my_query($db, $sql_delete_rep_competence, $uid);

        return $res_delete_rep_competence  && $res_update_user;
    }
}
