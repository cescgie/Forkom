<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/models/Connection.php' );
use DPK\Model\Connection;

class AdminPageController extends Base{

    public function getRequest(){
        Connection::select();
    }

    public function postRequest($postData){

    }

    public function isPengajianExist(){
        var_dump(Connection::getCurrentPengajianKota());
    }

    public function setupTabs($currTab){
        $current = 'info_pengajian_kota';

        $tabs = [
            'info_pengajian_kota'    => 'Informasi Pengajian Kota',
            'cp_mediapublikasi'      => 'Contact Person dan Media Publikasi'
        ];

        if($currTab != ""){
            $current = $currTab;
        }

        foreach($tabs as $tab=>$name){
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=dpk-forkom&tab=$tab'>$name</a>";
        }

        return $current;
    }
}