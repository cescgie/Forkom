<?php include_once( dirname(__DIR__) . '/../models/DPKEntity.php' );?>
<div>
    <h3>Profile Pengajian Kota</h3>
    <table>
        <tr>
            <td>Nama Pengajian Kota</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::NAMA_PENGAJIAN?>"></td>
        </tr>
        <tr>
            <td>Kota Pengajian Kota</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::KOTA_PENGAJIAN?>""></td>
        </tr>
        <tr>
            <td>Alamat Basecamp Pengajian</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::ALAMAT_PENGAJIAN?>""></td>
        </tr>
    </table>
</div>
<div>
    <h3>Kegiatan Pengajian Kota</h3>
    <button class="add_more_field">Tambah Kegiatan</button>
    <table class="input_fields_kegiatan">
        <tr>
            <td>Kegiatan 1</td>
            <td><input type="text" name="<?php echo \DPK\Model\DPKEntity::KEGIATAN_PENGAJIAN?>"_1"></td>
        </tr>
    </table>
</div>
<div>
    <h3>Jumlah Jamaah</h3>
    <table>
        <tr>
            <td>Bapak-bapak</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_bapak" value="0"> </td>
        </tr>
        <tr>
            <td>Ibu-ibu</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_Ibu" value="0"> </td>
        </tr>
        <tr>
            <td>Pemuda</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_pemuda" value="0"> </td>
        </tr>
        <tr>
            <td>Pemudi</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_pemudi" value="0"> </td>
        </tr>
        <tr>
            <td>Anak-anak</td>
            <td>: <input type="text" name="<?php echo \DPK\Model\DPKEntity::JUMLAH_JAMAAH_PENGAJIAN?>_anak" value="0"> </td>
        </tr>
    </table>
</div>
<div>
    <h3>Rekomendasi Ustadz Pengajian Kota</h3>
    <button class="add_ustadz">Tambah Kegiatan</button>
    <table class="input_fields_nama_ustadz">
        <tr>
            <td>Nama Ustadz 1</td>
            <td><input type="text" name="<?php echo \DPK\Model\DPKEntity::NAMA_USTADZ_KOTA?>"_1"></td>
        </tr>
    </table>
</div>

<script>
    jQuery(function($) {
        addMore(".add_more_field", ".input_fields_kegiatan", "<?php echo \DPK\Model\DPKEntity::KEGIATAN_PENGAJIAN?>", "Kegiatan");
        addMore(".add_ustadz", ".input_fields_nama_ustadz", "<?php echo \DPK\Model\DPKEntity::NAMA_USTADZ_KOTA?>", "Nama Ustadz");

        function addMore($btn, $wrapper, $key, $label){
            var i = 2;
            $($btn).click(function(e){
                e.preventDefault();
                $($wrapper).append('<tr><td>'+$label+' '+ i +'</td><td><input type="text" name="'+ $key
                    +i+'"/><a href="#" class="remove_field">Remove</a></td></tr>');
                i++;
            });

            $($wrapper).on("click",".remove_field", function(e){
                e.preventDefault(); $(this).parent('td').parent('tr').remove();
            });
        }
    });
</script>