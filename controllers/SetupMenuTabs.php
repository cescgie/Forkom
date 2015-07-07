<?php

class SetupMenuTabs {

    public function addMenu(){
        add_menu_page(
            'Info Pengajian Kota',
            'Info Pengajian Kota',
            'read',
            'dpk-forkom',
            array( $this, 'help_forkom_display_page' ),
            'dashicons-book-alt'
        );
    }

    public function setupTabs($current = 'profile_pengajian_kota'){
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
            echo "<a class='nav-tab$class' href='?page=help-forkom&tab=$tab'>$name</a>";
        }

        echo '</h2>';
    }
}