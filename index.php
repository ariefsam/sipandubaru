<?php
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
include("FusionCharts.php");
include 'gr_status_gizi.php';
include 'gr_kehadiran.php';
$i = tanggalan();
?>
<div id="inner">
            <div id="sidebar">
                <div id="kotak"><h2>Selamat Datang</h2>
                                <p>Sistem ini akan membantu anda melakukan pendataan pelayanan pada Posyandu.</p>
                                <p>Untuk mengisi berita acara, silahkan masuk ke menu <a href="administrasi.php">ADMINISTRASI POSYANDU</a></p>
                                <p>Untuk mendaftarkan anak yang belum terdaftar, masuk ke menu<a href="daftar.php">DAFTARKAN ANAK</a></p>
                </div>
                <div id="kotak"><h2>Informasi Penting</h2>
                                <p>Pelayan Kesehatan yang harus diberikan bulan ini:</p>
                                <ul><li>Imunisasi Polio</li>
                                    <li>Vitamin A</li>
                                </ul>
                </div>
            </div>
            <div id="content">
                <div id="content-top">
                    <h1>Persentase Status Gizi Anak</h1>
                    <div id="chart_kecil">
                       <?php
                            //Create the chart - Column 3D Chart with data contained in strXML
                         echo renderChart("chart/Pie2D.swf", "", $strXML, "statusGizi", 400, 300, false, false); ?>
                    </div>
                </div>
                <div id="content-top">
                    <h1>Kehadiran Peserta Posyandu</h1>
                    <div id="chart_kecil"><?php
                            //Create the chart - Column 3D Chart with data contained in strXML
                         echo renderChart("chart/Column3D.swf", "", $kehadiran, "jumlahPeserta", 700, 400, false, false); ?>
                    </div>
                </div>
            </div>
	</div>
<?php require 'footer.php';?>