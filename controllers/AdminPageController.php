<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/models/DPKEntity.php' );
include_once( dirname(__DIR__) . '/models/Connection.php' );

use DPK\Model\Connection;
use DPK\Model\DPKEntity;

class AdminPageController extends Base{

    /**
     * select all data from database
     * display to control forms
     */
    public function getRequest($currTab){
        $arrData = [];
        if($this->isPengajianExist()){
            if($currTab == DPKEntity::TAB_CP_MEDKOM){
                $select = DPKEntity::CP_NAMA_LENGKAP.', '.DPKEntity::CP_EMAIL.', '.DPKEntity::CP_TLPN.', '.
                    DPKEntity::URL_WEBSITE.', '.DPKEntity::URL_FACEBOOK_GROUP.', '.DPKEntity::URL_TWITTER.', '.DPKEntity::URL_YOUTUBE_CHANNEL;
            } else {
                $select = DPKEntity::NAMA_PENGAJIAN.', '.DPKEntity::KOTA_PENGAJIAN.', '.DPKEntity::ALAMAT_PENGAJIAN.','.
                    DPKEntity::KEGIATAN_PENGAJIAN.', '.DPKEntity::JUMLAH_JAMAAH_PENGAJIAN.', '.DPKEntity::NAMA_USTADZ_KOTA;
            }
            $results = Connection::select($select, DPKEntity::USER_LOGIN. "='". $this->getCurrentUser() ."'");

            foreach($results[0] as $key=>$value){
                if($key == DPKEntity::JUMLAH_JAMAAH_PENGAJIAN || $key == DPKEntity::NAMA_USTADZ_KOTA || $key == DPKEntity::KEGIATAN_PENGAJIAN){
                    $explode = explode('__', $value);
                    $tmpArr = [];

                    for($i=0; $i<count($explode); $i++){
                        if($explode[$i] != ""){
                            $tmpArr = array_merge($tmpArr, [$key.'_'.($i+1) => $explode[$i]]);
                        }
                    }
                    $arrData = array_merge($arrData, [$key => $tmpArr]);
                } else {
                    $arrData = array_merge($arrData, [$key => $value]);
                }
            }
        } else {
            if($currTab == DPKEntity::TAB_CP_MEDKOM){
                $arrData = [DPKEntity::CP_NAMA_LENGKAP => '', DPKEntity::CP_EMAIL => '', DPKEntity::CP_TLPN => '',
                            DPKEntity::URL_WEBSITE => '', DPKEntity::URL_FACEBOOK_GROUP => '',
                            DPKEntity::URL_TWITTER => '', DPKEntity::URL_YOUTUBE_CHANNEL => ''];
            } else {
                $arrData = [DPKEntity::NAMA_PENGAJIAN => '', DPKEntity::KOTA_PENGAJIAN => '', DPKEntity::ALAMAT_PENGAJIAN => '',
                    DPKEntity::KEGIATAN_PENGAJIAN => [''], DPKEntity::JUMLAH_JAMAAH_PENGAJIAN => [''],
                    DPKEntity::NAMA_USTADZ_KOTA => ['']];
            }
        }
        return $arrData;
    }

    /**
     * convert kegiatan_pengajian_# => kegiatan_pengajian = VAL1__VAL2__
     * convert nama_ustadz_kota_# => nama_ustadz_kota = VAL1__VAL2__
     * convert jumlah_jamaah_pengajian_# => jumlah_jamaah_pengajian = VAL1__VAL2__
     *
     * add information to database
     * @param $arrData
     */
    public function postRequest($arrData){
        $kegiatan_pengajian = "";
        $nama_ustadz = "";
        $jumlah_jamaah_pengajian = "";
        $newArrData = [DPKEntity::USER_LOGIN => $this->getCurrentUser()];

        foreach($arrData as $key=>$value){
            if(strpos($key, DPKEntity::KEGIATAN_PENGAJIAN) !== false){
                $kegiatan_pengajian .= $value . '__';
                $newArrData = array_merge($newArrData, [DPKEntity::KEGIATAN_PENGAJIAN => $kegiatan_pengajian]);
            } else if(strpos($key, DPKEntity::NAMA_USTADZ_KOTA) !== false){
                $nama_ustadz .= $value . '__';
                $newArrData = array_merge($newArrData, [DPKEntity::NAMA_USTADZ_KOTA => $nama_ustadz]);
            } else if(strpos($key, DPKEntity::JUMLAH_JAMAAH_PENGAJIAN) !== false){
                $jumlah_jamaah_pengajian .= $value . '__';
                $newArrData = array_merge($newArrData, [DPKEntity::JUMLAH_JAMAAH_PENGAJIAN => $jumlah_jamaah_pengajian]);
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

    /**
     * convert kegiatan_pengajian_# => kegiatan_pengajian = VAL1__VAL2__
     * convert nama_ustadz_kota_# => nama_ustadz_kota = VAL1__VAL2__
     * convert jumlah_jamaah_pengajian_# => jumlah_jamaah_pengajian = VAL1__VAL2__
     *
     * update information to database
     * @param $arrData
     */
    public function putRequest($arrData){
        $kegiatan_pengajian = "";
        $nama_ustadz = "";
        $jumlah_jamaah_pengajian = "";
        $newArrData = [];

        foreach($arrData as $key=>$value){
            if(strpos($key, DPKEntity::KEGIATAN_PENGAJIAN) !== false){
                $kegiatan_pengajian .= $value . '__';
                $newArrData = array_merge($newArrData, [DPKEntity::KEGIATAN_PENGAJIAN => $kegiatan_pengajian]);
            } else if(strpos($key, DPKEntity::NAMA_USTADZ_KOTA) !== false){
                $nama_ustadz .= $value . '__';
                $newArrData = array_merge($newArrData, [DPKEntity::NAMA_USTADZ_KOTA => $nama_ustadz]);
            } else if(strpos($key, DPKEntity::JUMLAH_JAMAAH_PENGAJIAN) !== false){
                $jumlah_jamaah_pengajian .= $value . '__';
                $newArrData = array_merge($newArrData, [DPKEntity::JUMLAH_JAMAAH_PENGAJIAN => $jumlah_jamaah_pengajian]);
            } else if(strpos($key, 'save') === false){
                $newArrData = array_merge($newArrData, [$key => ($value == "" ? '-' : $value)]);
            }
        }
        try{
            Connection::update($newArrData, [DPKEntity::USER_LOGIN => $this->getCurrentUser()]);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * get current user login
     * @return mixed
     */
    public function getCurrentUser(){
        global $current_user;
        get_currentuserinfo();
        return $current_user->user_login;
    }

    /**
     * check if pengajian already have some info in database
     * check by user_login
     * @return bool
     */
    public function isPengajianExist(){
        $results = Connection::select('Count(*) as total', DPKEntity::USER_LOGIN. "='". $this->getCurrentUser() ."'");
        if($results[0]->total > 0){
            return true;
        }
        return false;
    }

    /**
     * setup tabs of control forms
     * @param $currTab
     * @return string
     */
    public function setupTabs($currTab){
        $current = 'info_pengajian_kota';

        $tabs = [
            DPKEntity::TAB_INFO         => 'Informasi Pengajian Kota',
            DPKEntity::TAB_CP_MEDKOM    => 'Contact Person dan Media Publikasi'
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