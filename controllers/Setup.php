<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/controllers/Base.php' );
include_once( dirname(__DIR__) . '/controllers/AdminPageController.php' );
include_once( dirname(__DIR__) . '/models/DPKEntity.php' );

use DPK\Model\DPKEntity;

class Setup extends Base {

    function __construct(){
        parent::__construct();
        add_action( 'admin_menu', [$this, 'dpkAddMenu']);

        // register frontend shortcode
        $frontendController = new FrontendPageController();
        $frontendController->registerCss();
        $frontendController->registerScript();
        add_shortcode( 'datapengajiankota', [$frontendController, 'loadFrontendView'] );
    }

    public function dpkAddMenu(){
        $adminController = new AdminPageController();

        if($this->checkUserLogin('pengajian_kota')){
            add_menu_page(
                'Info Pengajian Kota',
                'Info Pengajian Kota',
                'read',
                'dpk-forkom',
                [$adminController, 'loadCPPengajianView' ],
                'dashicons-book-alt'
            );
        } else if($this->checkUserLogin('administrator')){
            add_menu_page(
                'Info Pengajian Kota',
                'Info Pengajian Kota',
                'read',
                'dpk-forkom',
                [$adminController, 'loadAdministratorPage' ],
                'dashicons-book-alt'
            );
        }
    }

    public function _install(){
        global $wpdb;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $table_name = $wpdb->prefix . 'data_pengajian_kota';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name(
                  `". DPKEntity::ID_PENGAJIAN ."` int unsigned NOT NULL AUTO_INCREMENT,
                  `". DPKEntity::USER_LOGIN ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::NAMA_PENGAJIAN ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::ALAMAT_PENGAJIAN ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::PLZ_PENGAJIAN ."` VARCHAR(10) NOT NULL DEFAULT '',
                  `". DPKEntity::KOTA_PENGAJIAN ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::KEGIATAN_PENGAJIAN ."` VARCHAR(255) NOT NULL DEFAULT '',
                  `". DPKEntity::NAMA_USTADZ_KOTA ."` VARCHAR(255) NOT NULL DEFAULT '',
                  `". DPKEntity::JUMLAH_JAMAAH_PENGAJIAN ."` VARCHAR(255) NOT NULL DEFAULT '',
                  `". DPKEntity::CP_NAMA_LENGKAP ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::CP_EMAIL ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::CP_TLPN ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::URL_WEBSITE ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::URL_FACEBOOK_GROUP ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::URL_TWITTER ."` VARCHAR(100) NOT NULL DEFAULT '',
                  `". DPKEntity::URL_YOUTUBE_CHANNEL ."` VARCHAR(100) NOT NULL DEFAULT '',
                  PRIMARY KEY (`id_pengajian`)
                 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        dbDelta( $sql );
    }

    public static function _uninstall(){

    }
}