<?php
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
                <h3>Grafik Berdasarkan Jenis Kelamin</h3>
				<?php
                    //Create the chart - Column 3D Chart with data contained in strXML
                 echo renderChart("chart/Pie2D.swf", "", $JK, "jk", 310, 280, false, false); ?>
            </div>
            <div id="grafik_kecil">
                <h3>Grafik Status Gizi Anak</h3>
                <?php
                    //Create the chart - Column 3D Chart with data contained in strXML
                 echo renderChart("chart/Pie2D.swf", "", $strXML, "statusGizi", 205, 200, false, false); ?>
            </div>
            <div id="grafik_kecil">
                <h3>Grafik Jumlah Kehadiran Anak</h3>
                <?php
                    //Create the chart - Column 3D Chart with data contained in strXML
                 echo renderChart("chart/Column3D.swf", "", $kehadiran, "jumlahPeserta", 220, 220, false, false); ?>
            </div>
       </div>
    </div>
</div>
<?php require 'footer.php';?>