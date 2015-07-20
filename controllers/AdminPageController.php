<?php

namespace DPK\Controller;

use DPK\Model\Connection;

class AdminPageController extends Base{

    public function getRequest(){
        Connection::select();
    }

    public function postRequest($postData){

    }

    public function isPengajianExist(){

    }

    public function setupTabs($currTab){
        $current = 'profile_pengajian_kota';

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