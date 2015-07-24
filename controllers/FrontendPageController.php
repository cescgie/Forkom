<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/models/Connection.php' );

use DPK\Model\Connection;
use DPK\Model\DPKEntity;

class FrontendPageController extends Base
{
    public function getAll(){
        Connection::select();
    }

    private function getRegional($city){

    }

    public function registerCss(){
        wp_register_style( 'dpk-styles', $this->getUrl('asset').'css/style.css' );
        wp_register_style( 'dpk-tabs-popup', $this->getUrl('asset').'css/dpk-tabs-popup.css' );

        wp_enqueue_style( 'dpk-styles' );
        wp_enqueue_style( 'dpk-tabs-popup' );
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