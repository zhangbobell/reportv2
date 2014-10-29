<?php
/**
 * Created by PhpStorm.
 * User: zhangbobell
 * Date: 14-10-27
 * Time: 下午5:49
 */

class MY_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function select_DB($databaseName)
    {

        /*$db_config['hostname'] = '192.168.1.90';
        $db_config['username'] = 'data';
        $db_config['password'] = 'data2123';*/
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
}