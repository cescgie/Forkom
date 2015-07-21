<?php

include_once( dirname(__DIR__) . '/controllers/AdminPageController.php' );
include_once( dirname(__DIR__) . '/models/DPKEntity.php' );

$controller = new \DPK\Controller\AdminPageController();

if($_POST){
    if($controller->isPengajianExist()){
        $controller->putRequest($_POST);
    } else{
        $controller->postRequest($_POST);
    }
}

$arrValues = $controller->getRequest($_GET['tab']);
?>

<div class="wrap">
    <h2>Data Pengajian <?php $explode = explode('_', $controller->getCurrentUser()); echo strtoupper($explode[1]);?></h2>
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
            if($tab == \DPK\Model\DPKEntity::TAB_CP_MEDKOM){
                $path = $controller->getPath('admin_page') . 'ContactMediaPublikasi.php';
            }
            include_once($path);
            ?>

            <input type="submit" name="save" value="Save" style="margin-top: 20px">
        </form>
    </div>