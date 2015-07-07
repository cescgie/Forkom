<?php

namespace DPK\Model;

class AdminPageQuery {

    public static function selectQuery(){
        global $wpdb;

        $query = "SELECT * FROM WHERE ";

        return $wpdb->get_row($query);
    }
}