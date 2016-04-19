<?php
include_once(dirname(__DIR__) . '/../models/DPKEntity.php');
?>
<div>
    <h3>Profile Pengajian Kota</h3>
    <table>
        <tr>
            <td>Nama Pengajian Kota</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::NAMA_PENGAJIAN?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::NAMA_PENGAJIAN];?>" placeholder="Nama Pengajian"></td>
        </tr>
        <tr>
            <td>Alamat Basecamp Pengajian</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::ALAMAT_PENGAJIAN?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::ALAMAT_PENGAJIAN];?>" placeholder="Alamat"></td>
        </tr>
        <tr>
            <td>PLZ/Kota Pengajian Kota</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::PLZ_PENGAJIAN?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::PLZ_PENGAJIAN];?>" placeholder="PLZ"></td>
            <td>/ <input type="text" name="<?php echo \DPK\Model\DPKEntity::KOTA_PENGAJIAN?>"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::KOTA_PENGAJIAN];?>" placeholder="Kota"></td>
        </tr>
    </table>
</div>
<div>
    <h3>Kegiatan Pengajian Kota</h3>
    <button class="add_more_field">Tambah Kegiatan</button>
    <table class="input_fields_kegiatan">
        <?php
        $indexKegiatan = 1;
        if(empty($arrValues[\DPK\Model\DPKEntity::NAMA_USTADZ_KOTA])) {
            $arrValues[\DPK\Model\DPKEntity::NAMA_USTADZ_KOTA] = [""];
        }
        foreach($arrValues[\DPK\Model\DPKEntity::KEGIATAN_PENGAJIAN] as $key=>$value){?>
        <tr>
            <td>Kegiatan <?= $indexKegiatan;?></td>
            <td>
                <input type="text" name="<?= \DPK\Model\DPKEntity::KEGIATAN_PENGAJIAN.'_'.$indexKegiatan;?>"
                       value="<?= $value;?>" placeholder="Kegiatan <?=$indexKegiatan?>">
                <?php if($indexKegiatan > 1) echo '<a href="#" class="remove_field">Remove</a>';?>
            </td>
        </tr>
        <?php $indexKegiatan++;}?>
    </table>
</div>
<div>
    <h3>Jumlah Jamaah</h3>
    <table>
        <tr>
            <td>Bapak-bapak</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_bapak"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN][\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN.'_1'];?>"> </td>
        </tr>
        <tr>
            <td>Ibu-ibu</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_Ibu"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN][\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN.'_2'];?>"> </td>
        </tr>
        <tr>
            <td>Pemuda</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_pemuda"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN][\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN.'_3'];?>"> </td>
        </tr>
        <tr>
            <td>Pemudi</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_pemudi"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN][\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN.'_4'];?>"> </td>
        </tr>
        <tr>
            <td>Anak-anak</td>
            <td>: <input type="text" name="<?= \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_anak"
                         value="<?= $arrValues[\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN][\DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN.'_5'];?>"> </td>
        </tr>
    </table>
</div>
<div>
    <h3>Rekomendasi Ustadz Pengajian Kota</h3>
    <button class="add_ustadz">Tambah Nama Ustadz</button>
    <table class="input_fields_nama_ustadz">
        <?php
        $indexUstadz = 1;
        if(empty($arrValues[\DPK\Model\DPKEntity::NAMA_USTADZ_KOTA])) {
            $arrValues[\DPK\Model\DPKEntity::NAMA_USTADZ_KOTA] = [""];
        }
        foreach($arrValues[\DPK\Model\DPKEntity::NAMA_USTADZ_KOTA] as $key=>$value){?>
            <tr>
                <td>Nama Ustadz <?= $indexUstadz?></td>
                <td>
                    <input type="text" name="<?= \DPK\Model\DPKEntity::NAMA_USTADZ_KOTA.'_'.$indexUstadz?>"
                           value="<?= $value;?>" placeholder="Nama Ustadz <?=$indexUstadz?>">
                    <?php if($indexUstadz > 1) echo '<a href="#" class="remove_field">Remove</a>';?>
                </td>
            </tr>
            <?php $indexUstadz++;}?>
    </table>
</div>

<script>
    jQuery(function($) {
        addMore(<?= $indexKegiatan?>, ".add_more_field", ".input_fields_kegiatan", "<?= \DPK\Model\DPKEntity::KEGIATAN_PENGAJIAN?>", "Kegiatan");
        addMore(<?= $indexUstadz?>, ".add_ustadz", ".input_fields_nama_ustadz", "<?= \DPK\Model\DPKEntity::NAMA_USTADZ_KOTA?>", "Nama Ustadz");

        function addMore($index, $btn, $wrapper, $key, $label){
            var i = $index;
            $($btn).click(function(e){
                e.preventDefault();
                $($wrapper).append('<tr><td>'+$label+' '+ i +'</td><td><input type="text" name="'+ $key
                    +i+'"placeholder="'+$label+' '+i+'"/><a href="#" class="remove_field">Remove</a></td></tr>');
                i++;
            });

            $($wrapper).on("click",".remove_field", function(e){
                e.preventDefault(); $(this).parent('td').parent('tr').remove();
            });
        }
    });
</script>