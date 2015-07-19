<?php
function dpkSetupTabs($current = 'profile_pengajian_kota'){
    $tabs = [
        'info_pengajian_kota'    => 'Informasi Pengajian Kota',
        'cp_mediapublikasi'            => 'Contact Person dan Media Publikasi'
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
        $tab = 'info_pengajian_kota';

        if(isset($_GET['tab'])){
            $tab = $_GET['tab'];
        }

        dpkSetupTabs($tab);
        ?>
        </h2>

        <form name="forms" method="POST" action="">
            <?php
            if($tab == "info_pengajian_kota"){
                include_once(dirname(__DIR__) . '/views/admin-page/InfoPengajianKota.php');
            } else if($tab == "cp_mediapublikasi"){
                include_once(dirname(__DIR__) . '/views/admin-page/ContactMediaPublikasi.php');
            }
            ?>

            <input type="submit" name="save" value="Save" style="margin-top: 20px">
        </form>
    </div>