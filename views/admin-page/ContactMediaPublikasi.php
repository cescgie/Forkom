<?php include_once( dirname(__DIR__) . '/../models/DPKEntity.php' );?>
<div>
    <h3>Contact Person</h3>
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::CP_NAMA_LENGKAP?>" value=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::CP_EMAIL?>" value=""></td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td>: <input type="tel" name="<?php echo \DPK\Model\DPKEntity::CP_TLPN?>" value=""></td>
        </tr>
    </table>
</div>
<div>
    <h3>Media Publikasi Pengajian</h3>
    <table>
        <tr>
            <td>Website</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::URL_WEBSITE?>" value=""></td>
        </tr>
        <tr>
            <td>Facebook Group</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::URL_FACEBOOK_GROUP?>" value=""></td>
        </tr>
        <tr>
            <td>Twitte</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::URL_TWITTER?>" value=""></td>
        </tr>
        <tr>
            <td>Youtube Channel</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::URL_YOUTUBE_CHANNEL?>" value=""></td>
        </tr>
    </table>
</div>