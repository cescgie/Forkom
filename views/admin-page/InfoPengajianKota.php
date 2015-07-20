<div>
    <h3>Profile Pengajian Kota</h3>
    <table>
        <tr>
            <td>Nama Pengajian Kota</td>
            <td>: <input type="text" name="nama_pengajian"></td>
        </tr>
        <tr>
            <td>Kota Pengajian Kota</td>
            <td>: <input type="text" name="kota_pengajian"></td>
        </tr>
        <tr>
            <td>Alamat Basecamp Pengajian</td>
            <td>: <input type="text" name="alamat_pengajian"></td>
        </tr>
    </table>
</div>
<div>
    <h3>Kegiatan Pengajian Kota</h3>
    <button class="add_more_field">Tambah Kegiatan</button>
    <table class="input_fields_kegiatan">
        <tr>
            <td>Kegiatan 1</td>
            <td><input type="text" name="kegiatan_pengajian_1"></td>
        </tr>
    </table>
</div>
<div>
    <h3>Jumlah Jamaah</h3>
    <table>
        <tr>
            <td>Bapak-bapak</td>
            <td>: <input type="text" name="jumlah_jamaah_bapak" value="0"> </td>
        </tr>
        <tr>
            <td>Ibu-ibu</td>
            <td>: <input type="text" name="jumlah_jamaah_Ibu" value="0"> </td>
        </tr>
        <tr>
            <td>Pemuda</td>
            <td>: <input type="text" name="jumlah_jamaah_pemuda" value="0"> </td>
        </tr>
        <tr>
            <td>Pemudi</td>
            <td>: <input type="text" name="jumlah_jamaah_pemudi" value="0"> </td>
        </tr>
        <tr>
            <td>Anak-anak</td>
            <td>: <input type="text" name="jumlah_jamaah_anak" value="0"> </td>
        </tr>
    </table>
</div>
<div>
    <h3>Rekomendasi Ustadz Pengajian Kota</h3>
    <button class="add_ustadz">Tambah Kegiatan</button>
    <table class="input_fields_nama_ustadz">
        <tr>
            <td>Nama Ustadz 1</td>
            <td><input type="text" name="nama_ustadz_1"></td>
        </tr>
    </table>
</div>

<script>
    jQuery(function($) {
        addMore(".add_more_field", ".input_fields_kegiatan", "kegiatan_pengajian_", "Kegiatan");
        addMore(".add_ustadz", ".input_fields_nama_ustadz", "nama_ustadz_", "Nama Ustadz");

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