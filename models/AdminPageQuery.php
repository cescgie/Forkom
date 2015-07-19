<?php

namespace DPK\Model;

class AdminPageQuery {

    public static function selectQuery(){
        global $wpdb;

        $query = "SELECT * FROM WHERE ";

        return $wpdb->get_row($query);
    }

    public function getCurrentPengajianKota(){
        global $current_user;
        get_currentuserinfo();

        $arr = explode('_', $current_user->user_login);
        return $arr[1];
    }
}