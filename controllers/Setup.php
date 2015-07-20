<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/controllers/Base.php' );

class DataPengajianKota extends Base {

    function __construct(){
        parent::__construct();
        add_action( 'admin_menu', [$this, 'dpkAddMenu']);
    }

    /**
     * add menu 'Info Pengajian Kota' on wp-admin
     */
    public function dpkAddMenu(){
        if($this->checkUserLogin('pengajian_kota')){
            add_menu_page(
                'Info Pengajian Kota',
                'Info Pengajian Kota',
                'read',
                'dpk-forkom',
                [$this, 'general' ],
                'dashicons-book-alt'
            );
        } else if($this->checkUserLogin('administrator')){
            add_menu_page(
                'Info Pengajian Kota',
                'Info Pengajian Kota',
                'read',
                'dpk-forkom',
                [$this, 'adminPage' ],
                'dashicons-book-alt'
            );
        }
    }

    public function adminPage(){
        echo "TODO: admin page view...";
    }

    public function general(){
        $updated = (isset($_GET['settings-updated'])) ? (bool) $_GET['settings-updated'] : false;

        $this->loadView('AdminPageView.php', array(
            'updated' => $updated
        ));
    }

    public function _install(){
        global $wpdb;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $table_name = $wpdb->prefix . 'data_pengajian_kota';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name(
                  `id_pengajian` int unsigned NOT NULL AUTO_INCREMENT,
                  `user_login` VARCHAR(100) NOT NULL DEFAULT '',
                  `nama_pengajian` VARCHAR(100) NOT NULL DEFAULT '',
                  `kota_pengajian` VARCHAR(100) NOT NULL DEFAULT '',
                  `alamat_pengajian` VARCHAR(255) NOT NULL DEFAULT '',
                  `cp_nama_lengkap` VARCHAR(100) NOT NULL DEFAULT '',
                  `cp_email` VARCHAR(100) NOT NULL DEFAULT '',
                  `cp_tlpn` VARCHAR(100) NOT NULL DEFAULT '',
                  `kegiatan_pengajian` TEXT NOT NULL DEFAULT '',
                  `jumlah_jamaah_pengajian` TEXT NOT NULL DEFAULT '',
                  `website_pengajian` VARCHAR(100) NOT NULL DEFAULT '',
                  `facebook_group` VARCHAR(100) NOT NULL DEFAULT '',
                  `twitter` VARCHAR(100) NOT NULL DEFAULT '',
                  `youtube_channel` VARCHAR(100) NOT NULL DEFAULT '',
                  PRIMARY KEY (`id_pengajian`)
                 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        dbDelta( $sql );
    }

    public static function _uninstall(){

    }
}