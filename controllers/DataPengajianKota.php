<?php

class DataPengajianKota {

    function __construct(){
        add_action( 'admin_menu', [$this, 'dpkAddMenu']);
    }

    /**
     * add menu 'Info Pengajian Kota' on wp-admin
     */
    public function dpkAddMenu(){
        add_menu_page(
            'Info Pengajian Kota',
            'Info Pengajian Kota',
            'read',
            'dpk-forkom',
            [$this, 'dpkSetupTabs' ],
            'dashicons-book-alt'
        );
    }

    /**
     * setup Tabs
     * @param string $current
     */
    public function dpkSetupTabs($current = 'profile_pengajian_kota'){
        $tabs = [
            'profile_pengajian_kota'    => 'Profile Pengajian Kota',
            'info_pengajian_kota'       => 'Info Pengajian Kota',
            'contact_person'            => 'Contact Person'
        ];

        echo '<div class="left-area">';
        echo '<div id="icon-themes" class="icon32"><br></div>';
        echo '<h2 class="nav-tab-wrapper">';

        foreach($tabs as $tab=>$name){
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=dpk-forkom&tab=$tab'>$name</a>";
        }

        echo '</h2>';
    }

    public function _install(){
        global $wpdb;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $table_name = $wpdb->prefix . 'data_pengajian_kota';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name(
                  `id_pengajian` int unsigned NOT NULL AUTO_INCREMENT,
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