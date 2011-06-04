<?php
require 'dbcon.php';
require './header.php';
require 'fungsi.php';
$i = tanggalan();
?>
<div id="inner">
<?php include 'sidebar_anak.php';?>
    <div id="content">
        <div id="content-judul">
            <h1>Catatan Pemeriksaan</h1>
        </div>
        <div id="content-judul">
        <h1><a href="input_berat.php">>> Berat Badan</a></h1>
        </div>
        <div id="content-judul">
        <h1><a href="input_vitamin.php">>> Pemberian Vitamin</a></h1>
        </div>
        <div id="content-judul">
        <h1><a href="input_imunisasi.php">>> Pemberian Imunisasi</a></h1>
        </div>
        <div id="content-judul">
        <h1><a href="input_ASI.php">> ASI dan Riwayat Kesehatan</a></h1>
        </div>
    </div>

    </div>
<?php require 'footer.php';?>