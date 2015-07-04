<?php
/*
Plugin Name: Help Forkom
Plugin URI: http://www.forkom-jerman.org
Description: Tatacara Update Content Web FORKOM
Author: FORKOM Jerman
Version: 1.0
Author URI: http://www.forkom-jerman.org
*/

class help_forkom{
    public function __construct(){
        add_action( 'admin_menu', array( $this, 'help_forkom_add_menu' )  );
    }

    function help_forkom_add_menu(){
        add_menu_page(
            'Cara Update Content',
            'Cara Update Content',
            'read',
            'help-forkom',
            array( $this, 'help_forkom_display_page' ),
            'dashicons-book-alt'
        );
    }

    function help_forkom_settings_tabs($current = 'upload_image'){
        $tabs = [
            'upload_image'       => 'Upload Image',
            'posting_tulisan'    => 'Posting Tulisan',
            'add_gallery'        => 'Add Gallery',
            'posting_video'      => 'Posting Video',
            'posting_event'         => 'Posting Event'
        ];

        echo '<div class="left-area">';
        echo '<div id="icon-themes" class="icon32"><br></div>';
        echo '<h2 class="nav-tab-wrapper">';

        foreach($tabs as $tab=>$name){
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            echo "<a class='nav-tab$class' href='?page=help-forkom&tab=$tab'>$name</a>";
        }

        echo '</h2>';
    }

    function help_forkom_display_page(){ ?>
        <div class ="wrap">
            <h2>Panduan Menambahkan Content FORKOM</h2>

            <?php
            if(isset($_GET['tab'])){
                $this->help_forkom_settings_tabs($_GET['tab']);
            } else{
                $this->help_forkom_settings_tabs('upload_image');
            }


            $tab = 'upload_image';
            if(isset($_GET['tab'])){
                $tab = $_GET['tab'];
            }

            switch($tab){
                case 'upload_image' :
                    ?>
                    <h1>Upload Image ke Google Drive Wordpress Media</h1>
                    <ol>
                        <li>
                            <h3>Menu Media &#8594; Google Drive WP Media &#8594; Upload</h3>
                            <a href="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/1.png"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/1.png" width="50%"></a>
                        </li>
                        <li>
                            <h3>Select Folder "Images"(Untuk Image Umum) / "Flyer"(Khusus Flyer FORKOM) &#8594; Click Browse &#8594; Pilih Image &#8594; Click Open</h3>
                            <a href="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/2.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/2.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Pastikan Image sudah masuk &#8594; Click Upload to Google Drive </h3>
                            <a href="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/3.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/3.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Tunggu sampai image selesai diupload</h3>
                            <a href="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/4.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Upload/4.PNG" width="50%"></a>
                        </li>
                    </ol>
                    <?php
                    break;
                case 'posting_tulisan' :
                    ?>
                    <h1>Post Tulisan</h1>
                    <ol>
                        <li>
                            <h3>Add New Post &#8594; Isikan Judul Tulisan &#8594; Isikan Content Tulisan</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Tulisan/1.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Tulisan/1.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Sesuaikan Categories Tulisan &#8594; Click Set featured Image</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Tulisan/2.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Tulisan/2.PNG" height="50%"></a>
                        </li>
                        <li>
                            <h3>Pilih Image yang sesuai &#8594; Set featured Image</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Tulisan/3.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Tulisan/3.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Pastikan image sudah terpasang pada Featured Image</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Tulisan/4.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Tulisan/4.PNG" height"50%"></a>
                        </li>
                    </ol>
                    <?php
                    break;
                case 'add_gallery' :
                    ?>
                    <h1>Menambahkan Galeri pada Post Tulisan</h1>
                    <ol>
                        <li>
                            <h3>Click Add Media</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Galeri/1.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Galeri/1.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Pilih Create Gallery &#8594; Pilih Foto &#8594; Create new gallery</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Galeri/2.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Galeri/2.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Pastikan semua foto sudah terpilih &#8594; Pilih Gallery Type: "TagDiv Slide Gallery" &#8594; Insert gallery</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Galeri/3.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Galeri/3.PNG" width="50%"></a>
                        </li>
                    </ol>
                    <?php
                    break;
                case 'posting_video' :
                    ?>
                    <h1>Post Video Ceramah / Film Pendek</h1>
                    <ol>
                        <li>
                            <h3>Add New Post &#8594; Tulisakan Judul Dengan Format [Pengajian Kota] - [Judul Video] &#8594; Isi Keterangan &#8594; Rubah Format Video</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Video/1.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Video/1.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Pilih Categories &#8594; Masukkan Video Pada Kolom Featured Video &#8594; Publish</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Video/2.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Video/2.PNG" height="50%"></a>
                        </li>
                    </ol>
                    <?php
                    break;
                case 'posting_event' :
                    ?>
                    <h1>Post Event</h1>
                    <ol>
                        <li>
                            <h3>Add New Event &#8594; Tulisakan Judul Dengan Format [Pengajian Kota] - [Judul Event] &#8594; Isi Keterangan &#8594; Sesuaikan Event Type Categories</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Video/1.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Event/1.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Aktifkan Button All Day Event (Jika Event Setiap Hari) &#8594; Isi Event Start Date & Event Date &#8594; Pilih Location and Venue, pilih terlebih dahulu "Select a saved location", jika tidak ada baru isikan Detail Alamat</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Video/2.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Event/2.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Menambahkan Latitude&Longitude &#8594; <a href="http://itouchmap.com/latlong.html">Click Disini</a> &#8594; Masukan alamat lengkap &#8594; Copy Latitude dan Longitude</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Event/3.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Event/3.PNG" width="50%"></a>
                        </li>
                        <li>
                            <h3>Tambahkan Image jika ada &#8594; Pilih Organizer, cek terlebih dahulu "Select a saved organizer", jika tidak ditemukan baru tambahkan CP organizer &#8594; Pilih event click Nr 3, atau Nr 2 jika ingin dilinkan dengan Website terkait</h3>
                            <a href="<?php echo plugin_dir_url( __FILE__ );?>/src/Event/4.PNG"><img src="<?php echo plugin_dir_url(__FILE__);?>/src/Event/4.PNG" width="50%"></a>
                        </li>
                    </ol>
                    <?php
                    break;
            }
            ?>
        </div>
    <?php
    }
}

new help_forkom();
?>