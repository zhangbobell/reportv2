<?php

/**
 * Created by IntelliJ IDEA.
 * User: zeroleaf
 * Date: 2015/4/1
 * Time: 11:32
 */
class MHaw extends Base {

    const DB_JIUYANG        = "db_jiuyang";
    const DB_ETC_PRIVILEGES = "etc_privileges";

    const TBL_SAIKU_MAP     = "saiku_map";
    const TBL_ETC_PROJECT   = "etc_project";

    function __construct() {
        parent::__construct();
    }

    function all_saiku_map(array $select = null) {
        return parent::all(self::DB_JIUYANG, self::TBL_SAIKU_MAP, $select);
    }

    function all_etc_project(array $select = null) {
        return parent::all(self::DB_ETC_PRIVILEGES, self::TBL_ETC_PROJECT, $select);
    }



}