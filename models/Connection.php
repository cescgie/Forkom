<?php

namespace DPK\Model;

class Connection {

    public static function select($select = '*', $where = '1'){
        global $wpdb;
        $table = $wpdb->prefix . 'data_pengajian_kota';

        $query = "SELECT $select FROM $table WHERE $where";

        return $wpdb->get_row($query);
    }

    public static function update(){

    }

    public static function insert($keysValues){
        global $wpdb;
        $table = $wpdb->prefix . 'data_pengajian_kota';

        $wpdb->insert($table, $keysValues);
    }

    public static function delete(){}

    public static function getCurrentPengajianKota(){
        global $current_user;
        get_currentuserinfo();

        $arr = explode('_', $current_user->user_login);
        return $arr[1];
    }
}