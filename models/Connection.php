<?php

namespace DPK\Model;

class Connection {

    public static function select($select = '*', $where = '1'){
        global $wpdb;
        $table = $wpdb->prefix . 'data_pengajian_kota';

        $query = "SELECT $select FROM $table WHERE $where";

        return $wpdb->get_results($query);
    }

    public static function update(){

    }

    public static function insert($keysValues){
        global $wpdb;
        $table = $wpdb->prefix . 'data_pengajian_kota';

        $wpdb->insert($table, (array)$keysValues);

        if ( !empty($wpdb->error) ){
            dead_db();
            var_dump($wpdb->last_query );
        }
    }

    public static function delete(){}
}