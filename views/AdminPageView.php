<?php

include_once( dirname(__DIR__) . '/controllers/AdminPageController.php' );

$controller = new \DPK\Controller\AdminPageController();

if($_POST){
    echo "<pre>";
    var_dump($_POST);
}
?>

<div class="wrap">
    <h2>Data Pengajian Kota</h2>
    <div class="left-area">
        <div id="icon-themes" class="icon32"><br></div>
        <h2 class="nav-tab-wrapper">
        <?php
        $tab = $controller->setupTabs($_GET['tab']);
        ?>
        </h2>

        <form name="forms" method="POST" action="">
            <?php
            $path = $controller->getPath('admin_page') . 'InfoPengajianKota.php';
            if($tab == "cp_mediapublikasi"){
                $path = $controller->getPath('admin_page') . 'ContactMediaPublikasi.php';
            }
            include_once($path);
            ?>

            <input type="submit" name="save" value="Save" style="margin-top: 20px">
        </form>
    </div>