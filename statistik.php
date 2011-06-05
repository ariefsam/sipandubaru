<?php
require "loginkah.php";
require 'dbcon.php';
require 'fungsi.php';
$i = tanggalan();
include("FusionCharts.php");
include 'gr_status_gizi.php';
include 'gr_kehadiran.php';
require './header.php';
include 'gr_jk.php';
?>
<div id="inner">
<?php include 'sidebar_statistik.php';?>
    <div id="content">
        <div id="content-top">
            <h1>Data Statistik</h1>
            <div id="grafik_kecil">
                <h3><a href="st_jk.php"> Grafik Berdasarkan Jenis Kelamin</a></h3><br/>
				<?php
                    //Create the chart - Column 3D Chart with data contained in strXML
                 echo renderChart("chart/Pie2D.swf", "", $JK, "jk", 320, 270, false, false); ?>
            </div>
            <div id="grafik_kecil">
                <h3><a href="st_status_gizi.php">Grafik Status Gizi Anak</a></h3><br/>
                <?php
                    //Create the chart - Column 3D Chart with data contained in strXML
                 echo renderChart("chart/Pie2D.swf", "", $strXML, "statusGizi", 320, 270, false, false); ?>
            </div>
            <div id="grafik_kecil">
                <h3><a href="st_kehadiran_wl.php">Grafik Jumlah Kehadiran Anak</a></h3><br/>
                <?php
                    //Create the chart - Column 3D Chart with data contained in strXML
                 echo renderChart("chart/Column2D.swf", "", $kehadiran, "jumlahPeserta", 330, 280, false, false); ?>
            </div>
       </div>
    </div>
</div>
<?php require 'footer.php';?>