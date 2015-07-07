<?php
/*
Plugin Name: HelpForkom
Plugin URI: http://www.forkom-jerman.org
Description: Tatacara Update Content Web FORKOM
Author: FORKOM Jerman
Version: 1.0
Author URI: http://www.forkom-jerman.org
*/

add_action('admin_menu', 'register_helpforkom_page');

function register_helpforkom_page(){
    add_menu_page(
        'Cara Update Content', 'Cara Update Content', 'read', 'HelpForkom', 'display_page', 'dashicons-book-alt'
    );
}

function display_page(){
    echo '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link type="text/css" rel="stylesheet" href="css/responsive-tabs.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>


    <!--Horizontal Tab-->
    <div id="horizontalTab">
        <ul>
            <li><a href="#tab-1">Upload Image</a></li>
            <li><a href="#tab-2">Posting Tulisan</a></li>
            <li><a href="#tab-3">Add Gallery</a></li>
            <li><a href="#tab-4">Posting Video</a></li>
            <li><a href="#tab-5">Post Event</a></li>
        </ul>

        <div id="tab-1">
            <h1>Upload Image ke Google Drive Wordpress Media</h1>
            <ol>
                <li>
                    <h3>Menu Media &#8594; Google Drive WP Media &#8594; Upload</h3>
                    <a href="/helpforkom/src/Upload/1.PNG"><img src="/helpforkom/src/Upload/1.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Select Folder "Images"(Untuk Image Umum) / "Flyer"(Khusus Flyer FORKOM) &#8594; Click Browse &#8594; Pilih Image &#8594; Click Open</h3>
                    <a href="/helpforkom/src/Upload/2.PNG"><img src="/helpforkom/src/Upload/2.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Pastikan Image sudah masuk &#8594; Click Upload to Google Drive </h3>
                    <a href="/helpforkom/src/Upload/3.PNG"><img src="/helpforkom/src/Upload/3.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Tunggu sampai image selesai diupload</h3>
                    <a href="/helpforkom/src/Upload/4.PNG"><img src="/helpforkom/src/Upload/4.PNG" width="50%"></a>
                </li>
            </ol>
        </div>
        <div id="tab-2">
            <h1>Post Tulisan</h1>
            <ol>
                <li>
                    <h3>Add New Post &#8594; Isikan Judul Tulisan &#8594; Isikan Content Tulisan</h3>
                    <a href="/helpforkom/src/Tulisan/1.PNG"><img src="/helpforkom/src/Tulisan/1.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Sesuaikan Categories Tulisan &#8594; Click Set featured Image</h3>
                    <a href="/helpforkom/src/Tulisan/2.PNG"><img src="/helpforkom/src/Tulisan/2.PNG" height="50%"></a>
                </li>
                <li>
                    <h3>Pilih Image yang sesuai &#8594; Set featured Image</h3>
                    <a href="/helpforkom/src/Tulisan/3.PNG"><img src="/helpforkom/src/Tulisan/3.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Pastikan image sudah terpasang pada Featured Image</h3>
                    <a href="/helpforkom/src/Tulisan/4.PNG"><img src="/helpforkom/src/Tulisan/4.PNG" height"50%"></a>
                </li>
            </ol>
        </div>
        <div id="tab-3">
            <h1>Menambahkan Galeri pada Post Tulisan</h1>
            <ol>
                <li>
                    <h3>Click Add Media</h3>
                    <a href="/helpforkom/src/Galeri/1.PNG"><img src="/helpforkom/src/Galeri/1.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Pilih Create Gallery &#8594; Pilih Foto &#8594; Create new gallery</h3>
                    <a href="/helpforkom/src/Galeri/2.PNG"><img src="/helpforkom/src/Galeri/2.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Pastikan semua foto sudah terpilih &#8594; Pilih Gallery Type: "TagDiv Slide Gallery" &#8594; Insert gallery</h3>
                    <a href="/helpforkom/src/Galeri/3.PNG"><img src="/helpforkom/src/Galeri/3.PNG" width="50%"></a>
                </li>
            </ol>
		</div>
        <div id="tab-4">
            <h1>Post Video Ceramah / Film Pendek</h1>
            <ol>
                <li>
                    <h3>Add New Post &#8594; Tulisakan Judul Dengan Format [Pengajian Kota] - [Judul Video] &#8594; Isi Keterangan &#8594; Rubah Format Video</h3>
                    <a href="/helpforkom/src/Video/1.PNG"><img src="/helpforkom/src/Video/1.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Pilih Categories &#8594; Masukkan Video Pada Kolom Featured Video &#8594; Publish</h3>
                    <a href="/helpforkom/src/Video/2.PNG"><img src="/helpforkom/src/Video/2.PNG" height="50%"></a>
                </li>
            </ol>
        </div>
        <div id="tab-5">
            <h1>Post Event</h1>
            <ol>
                <li>
                    <h3>Add New Event &#8594; Tulisakan Judul Dengan Format [Pengajian Kota] - [Judul Event] &#8594; Isi Keterangan &#8594; Sesuaikan Event Type Categories</h3>
                    <a href="/helpforkom/src/Video/1.PNG"><img src="/helpforkom/src/Event/1.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Aktifkan Button All Day Event (Jika Event Setiap Hari) &#8594; Isi Event Start Date & Event Date &#8594; Pilih Location and Venue, pilih terlebih dahulu "Select a saved location", jika tidak ada baru isikan Detail Alamat</h3>
                    <a href="/helpforkom/src/Video/2.PNG"><img src="/helpforkom/src/Event/2.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Menambahkan Latitude&Longitude &#8594; <a href="http://itouchmap.com/latlong.html">Click Disini</a> &#8594; Masukan alamat lengkap &#8594; Copy Latitude dan Longitude</h3>
                    <a href="/helpforkom/src/Event/3.PNG"><img src="/helpforkom/src/Event/3.PNG" width="50%"></a>
                </li>
                <li>
                    <h3>Tambahkan Image jika ada &#8594; Pilih Organizer, cek terlebih dahulu "Select a saved organizer", jika tidak ditemukan baru tambahkan CP organizer &#8594; Pilih event click Nr 3, atau Nr 2 jika ingin dilinkan dengan Website terkait</h3>
                    <a href="/helpforkom/src/Event/4.PNG"><img src="/helpforkom/src/Event/4.PNG" width="50%"></a>
                </li>
            </ol>
        </div>

    </div>

    <!-- jQuery with fallback to the 1.* for old IE -->
    <!--[if lt IE 9]>
        <script src="js/jquery-1.11.0.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
        <script src="js/jquery-2.1.0.min.js"></script>
    <!--<![endif]-->

    <!-- Responsive Tabs JS -->
    <script src="js/jquery.responsiveTabs.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var $tabs = $("#horizontalTab");
            $tabs.responsiveTabs({
                startCollapsed: "accordion",
                collapsible: "accordion",
                setHash: true,
                activate: function(e, tab) {
                    $(".info").html("Tab <strong>" + tab.id + "</strong> activated!");
                }
            });
        });
    </script>
</body>
</html> ';
}

?>