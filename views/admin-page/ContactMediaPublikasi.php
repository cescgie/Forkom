<?php
include_once( dirname(__DIR__) . '/../models/DPKEntity.php' );
?>
<div>
    <h3>Contact Person</h3>
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::CP_NAMA_LENGKAP?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::CP_NAMA_LENGKAP];?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::CP_EMAIL?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::CP_EMAIL];?>"></td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>: <input type="tel" name="<?= \DPK\Model\DPKEntity::CP_TLPN?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::CP_TLPN];?>"></td>
        </tr>
    </table>
</div>
<div>
    <h3>Media Publikasi Pengajian</h3>
    <table>
        <tr>
            <td>Website</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_WEBSITE?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_WEBSITE];?>"></td>
        </tr>
        <tr>
            <td>Facebook Group</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_FACEBOOK_GROUP?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_FACEBOOK_GROUP];?>"></td>
        </tr>
        <tr>
            <td>Twitte</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_TWITTER?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_TWITTER];?>"></td>
        </tr>
        <tr>
            <td>Youtube Channel</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::URL_YOUTUBE_CHANNEL?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::URL_YOUTUBE_CHANNEL];?>"></td>
        </tr>
    </table>
</div>