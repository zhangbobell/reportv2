<?php
/**
 * Created by IntelliJ IDEA.
 * User: zeroleaf
 * Date: 2015/4/1
 * Time: 15:20
 */

class Base extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected function load_db($db) {
        $db_config['hostname'] = 'tools.e-corp.cn';
        $db_config['username'] = 'zczx_data';
        $db_config['password'] = 'cos2x=2Sinxcosx';
        $db_config['database'] = $db;
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

        $this->load->database($db_config);
    }

    public function all($db, $table, array $select = null) {
        $this->load_db($db);
        if (!is_null($select)) {
            $this->db->select(join(',', $select));
        }

        $query = $this->db->get($table);
        return $query->result();
    }

}