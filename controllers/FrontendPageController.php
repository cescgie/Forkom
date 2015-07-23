<?php

namespace DPK\Controller;


class FrontendPageController extends Base
{

    public function registerCss(){
        wp_register_style( 'dpk-styles', $this->getUrl('asset').'/css/styles.css' );
        wp_register_style( 'dpk-tabs-popup', $this->getUrl('asset').'/css/dpk-tabs-popup.css' );

        wp_enqueue_style( 'dpk-styles' );
        wp_enqueue_style( 'dpk-tabs-popup' );
    }

    public function registerScript(){
        wp_register_script( 'responsiveTabs', $this->getUrl('asset').'/js/jquery.responsiveTabs.js' ,array(), '1.0.0', true );
        wp_register_script( 'setup-tabs', $this->getUrl('asset').'/js/setup-tabs.js' ,array(), '1.0.0', true );
        wp_register_script( 'dpk-popup', $this->getUrl('asset').'/js/dpk-popup.js' ,array(), '1.0.0', true );
        wp_register_script( 'setup-popup', $this->getUrl('asset').'/js/setup-popup.js' ,array(), '1.0.0', true );

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