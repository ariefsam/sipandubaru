<?php
require "loginkah.php";
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
$sql = mysql_query("SELECT * FROM bayi");
$i = tanggalan();
?>
<div id="inner">
<?php include 'sidebar_administrasi.php';?>
    <div id="content">
        <div id="content-top">
            <h1>Administrasi Posyandu</h1>
            <p>Halaman ini berisi semua catatan mengenai pelaksaan kegiatan Posyandu.
                Untuk menambahkan berita acara hari ini dapat menggunakan menu <a href="berita_acara.php">
               Tambah Berita Acara</a>. Untuk melihat catatan sebelumnya dapat menggunakan menu <a href="berita_acara.php">Tambah Berita Acara</a></p>
        </div>

    </div>
</div>
<?php require 'footer.php'; ?>