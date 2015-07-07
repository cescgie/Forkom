<?php
function dpkSetupTabs($current = 'profile_pengajian_kota'){
    $tabs = [
        'profile_pengajian_kota'    => 'Profile Pengajian Kota',
        'info_pengajian_kota'       => 'Info Pengajian Kota',
        'contact_person'            => 'Contact Person'
    ];
    foreach($tabs as $tab=>$name){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=dpk-forkom&tab=$tab'>$name</a>";
    }
}
?>

<div class="wrap">
    <h2>Panduan Menambahkan Content FORKOM</h2>
    <div class="left-area">
        <div id="icon-themes" class="icon32"><br></div>
        <h2 class="nav-tab-wrapper">
        <?php
        $tab = 'profile_pengajian_kota';

        if(isset($_GET['tab'])){
            $tab = $_GET['tab'];
        }

        dpkSetupTabs($tab);
        ?>
        </h2>
    </div>