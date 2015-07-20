<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/models/Connection.php' );
use DPK\Model\Connection;

class AdminPageController extends Base{

    public function getRequest(){
        if($this->isPengajianExist()){
            Connection::select();
        }
    }

    public function postRequest($arrData){
        $kegiatan_pengajian = "";
        $nama_ustadz = "";
        $jumlah_jamaah_pengajian = "";
        $newArrData = ['user_login' => $this->getCurrentUser()];

        foreach($arrData as $key=>$value){
            if(strpos($key, 'kegiatan_pengajian') !== false){
                $kegiatan_pengajian .= $value . '__';
                $newArrData = array_merge($newArrData, ['kegiatan_pengajian' => $kegiatan_pengajian]);
            } else if(strpos($key, 'nama_ustadz') !== false){
                $nama_ustadz .= $value . '__';
                $newArrData = array_merge($newArrData, ['nama_ustadz_kota' => $nama_ustadz]);
            } else if(strpos($key, 'jumlah_jamaah_') !== false){
                $jumlah_jamaah_pengajian .= $value . '__';
                $newArrData = array_merge($newArrData, ['jumlah_jamaah_pengajian' => $jumlah_jamaah_pengajian]);
            } else if(strpos($key, 'save') === false){
                $newArrData = array_merge($newArrData, [$key => ($value == "" ? '-' : $value)]);
            }
        }
        try{
            Connection::insert($newArrData);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function putRequest($arrData){

    }

    public function getCurrentUser(){
        global $current_user;
        get_currentuserinfo();
        return $current_user->user_login;
    }

    public function isPengajianExist(){
        $results = Connection::select('Count(*) as total', "user_login='". $this->getCurrentUser() ."'");
        if($results[0]->total > 0){
            return true;
        }
        return false;
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