<?php
include_once( dirname(__DIR__) . '/models/DPKRegional.php' );
include_once( dirname(__DIR__) . '/models/DPKEntity.php' );
include_once( dirname(__DIR__) . '/controllers/FrontendPageController.php' );

$controller = new \DPK\Controller\FrontendPageController();

?>
<div class="dpk-controls">
    <div style="margin-bottom: 15px;">
        <label class="dpk-label">Search</label>
        <input type="text" id="dpk-input" placeholder="Search ..."/>
    </div>

    <div>
        <label class="dpk-label">Filter:</label>

        <button class="filter" data-filter="all">All</button>
        <button class="filter" data-filter=".<?= \DPK\Model\DPKRegional::REGION_1?>">Jerman Barat</button>
        <button class="filter" data-filter=".<?= \DPK\Model\DPKRegional::REGION_2?>">Jerman Selatan</button>
        <button class="filter" data-filter=".<?= \DPK\Model\DPKRegional::REGION_3?>">Jerman Timur</button>
        <button class="filter" data-filter=".<?= \DPK\Model\DPKRegional::REGION_4?>">Jerman Utara</button>
    </div>

</div>
<div class="dpk-container">
    <?php
    $getData = $controller->getAll();
    foreach($getData as $results){
        ?>
        <div class="mix <?= \DPK\Model\DPKRegional::getRegional($results[0][\DPK\Model\DPKEntity::KOTA_PENGAJIAN]);?>">
            <h5 class="pengajian_kota"><?= $results[0][\DPK\Model\DPKEntity::KOTA_PENGAJIAN]; ?></h5>
            <h5><?= $results[0][\DPK\Model\DPKEntity::NAMA_PENGAJIAN]; ?></h5>
            <p><?= $results[0][\DPK\Model\DPKEntity::ALAMAT_PENGAJIAN].', '.
                $results[0][\DPK\Model\DPKEntity::PLZ_PENGAJIAN].' '.
                $results[0][\DPK\Model\DPKEntity::KOTA_PENGAJIAN]; ?></p>
            <p><?= $results[0][\DPK\Model\DPKEntity::CP_EMAIL]; ?></p>
            <button display-detail="#show-detail<?= strtolower($results[0][\DPK\Model\DPKEntity::NAMA_PENGAJIAN]);?>"
                    tab-1=""
                    tab-2=""
                    tab-3=""
                    class="button">Show Detail</button>
        </div>
        <?php
    }
    ?>

    <div class="gap"></div>
    <div class="gap"></div>
</div>
<div id="show-detail" class="dpk-popup-modal">
    <div class="dpk-popup-modal-header group">
        <button class="dpk-popup-modal-close"><span class="text">&times;</span></button>
    </div>
    <div class="dpk-popup-modal-body">
        <div id="horizontalTab">
            <ul>
                <li><a href="#tab-1">Kegiatan</a></li>
                <li><a href="#tab-2">Media</a></li>
                <li><a href="#tab-3">Contact Person</a></li>
            </ul>

            <div id="tab-1"> </div>
            <div id="tab-2"></div>
            <div id="tab-3"></div>
        </div>
    </div>
</div>