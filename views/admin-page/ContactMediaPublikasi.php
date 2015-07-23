<?php
include_once( dirname(__DIR__) . '/../models/DPKEntity.php' );
?>
<div>
    <h3>Contact Person</h3>
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::CP_NAMA_LENGKAP?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::CP_NAMA_LENGKAP];?>"
                         placeholder="Nama Lengkap"></td>
        </tr>
        <tr>
            <td>E-Mail</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::CP_EMAIL?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::CP_EMAIL];?>"
                         placeholder="E-Mail"></td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>: <input type="tel" name="<?= \DPK\Model\DPKEntity::CP_TLPN?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::CP_TLPN];?>"
                         placeholder="Telefon"></td>
        </tr>
    </table>
</div>
<div>
    <h3>Media Publikasi Pengajian</h3>
    <table>
        <tr>
            <td>Website</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_WEBSITE?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_WEBSITE];?>"
                         placeholder="URL Website"></td>
        </tr>
        <tr>
            <td>Facebook Group</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_FACEBOOK_GROUP?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_FACEBOOK_GROUP];?>"
                         placeholder="URL Facebook Group"></td>
        </tr>
        <tr>
            <td>Twitte</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_TWITTER?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_TWITTER];?>"
                         placeholder="URL Twitter"></td>
        </tr>
        <tr>
            <td>Youtube Channel</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_YOUTUBE_CHANNEL?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_YOUTUBE_CHANNEL];?>"
                         placeholder="URL Youtube Channel"></td>
        </tr>
    </table>
</div>