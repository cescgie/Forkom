<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/models/Connection.php' );

use DPK\Model\Connection;
use DPK\Model\DPKEntity;

class FrontendPageController extends Base
{

    public function getAll(){
        $results = Connection::select();
        $newResults = [];
        $index = 0;

        foreach($results as $result){
            $pageInfo = []; $pageKegiatan = []; $pageMedia = []; $pageCP = [];
            foreach($result as $key=>$value){
                if($key == DPKEntity::KOTA_PENGAJIAN || $key == DPKEntity::NAMA_PENGAJIAN ||
                   $key == DPKEntity::ALAMAT_PENGAJIAN || $key == DPKEntity::PLZ_PENGAJIAN ||
                   $key == DPKEntity::CP_EMAIL){
                    $pageInfo = array_merge($pageInfo, [$key => $value]);
                } else if($key == DPKEntity::KEGIATAN_PENGAJIAN || $key == DPKEntity::NAMA_USTADZ_KOTA){
                    $pageKegiatan = array_merge($pageKegiatan, [$key => $value]);
                } else if($key == DPKEntity::URL_WEBSITE || $key == DPKEntity::URL_FACEBOOK_GROUP ||
                          $key == DPKEntity::URL_TWITTER || $key == DPKEntity::URL_YOUTUBE_CHANNEL){
                    $pageMedia = array_merge($pageMedia, [$key => $value]);
                } else if($key == DPKEntity::CP_NAMA_LENGKAP || $key == DPKEntity::CP_EMAIL ||
                          $key == DPKEntity::CP_TLPN) {
                    $pageCP = array_merge($pageCP, [$key => $value]);
                }
            }
            $newResults = array_merge($newResults, [$index => [$pageInfo, $pageKegiatan, $pageMedia, $pageCP]]);
            $index++;
        }

        $newResults = $this->mergeEntitiy($newResults, 1);
        $newResults = $this->mergeEntitiy($newResults, 2);
        $newResults = $this->mergeEntitiy($newResults, 3);

        return $newResults;
    }

    private function mergeEntitiy($arrEntity, $tabId){
        $index = 0;

        foreach($arrEntity as $entity){
            $tmp = "";
            foreach($entity[$tabId] as $value){
                $tmp .= $value. '?';
            }
            $arrEntity[$index][$tabId] = $tmp;
            $index++;
        }
        return $arrEntity;
    }

    public function registerCss(){
        wp_register_style( 'dpk-styles', $this->getUrl('asset').'css/style.css' );
        wp_register_style( 'dpk-tabs-popup', $this->getUrl('asset').'css/dpk-tabs-popup.css' );
        wp_register_style( 'dpk-testt', $this->getUrl('asset').'css/test.css' );

        wp_enqueue_style( 'dpk-styles' );
        wp_enqueue_style( 'dpk-tabs-popup' );
        wp_enqueue_style( 'dpk-testt' );
    }

    public function registerScript(){
        wp_register_script( 'jquery.mixitup', $this->getUrl('asset').'/js/jquery.mixitup.js', [], '1.0.0', true );
        wp_register_script( 'setup-mixitup', $this->getUrl('asset').'/js/setup-mixitup.js', [], '1.0.0', true );
        wp_register_script( 'responsiveTabs', $this->getUrl('asset').'/js/jquery.responsiveTabs.js', [], '1.0.0', true );
        wp_register_script( 'setup-tabs', $this->getUrl('asset').'/js/setup-tabs.js', [], '1.0.0', true );
        wp_register_script( 'dpk-popup', $this->getUrl('asset').'/js/dpk-popup.js', [], '1.0.0', true );
        wp_register_script( 'setup-popup', $this->getUrl('asset').'/js/setup-popup.js', [], '1.0.0', true );

        wp_enqueue_script('jquery.mixitup');
        wp_enqueue_script('setup-mixitup');
        wp_enqueue_script( 'responsiveTabs' );
        wp_enqueue_script( 'setup-tabs' );
        wp_enqueue_script( 'dpk-popup' );
        wp_enqueue_script( 'setup-popup' );
    }

    public function loadFrontendView(){

        $updated = (isset($_GET['settings-updated'])) ? (bool) $_GET['settings-updated'] : false;

        $this->loadView('FrontendPageView.php', array(
            'updated' => $updated
        ));
    }
}