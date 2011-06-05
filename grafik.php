<?php
require "loginkah.php";
require "dbcon.php";
require "fungsi.php";
include("FusionCharts.php");
$id = $_GET['id'];
$bayi = get_bayi($id);
include 'header.php';
include 'gr_perkembangan.php';
?>

    <body>
       <div id="content">
    <div id="content-grafik">
        <h1>Grafik Perkembangan</h1> <div id="nama_anak">Alfa Nugraha</div>
        Kembali
        <div style='overflow:auto; width:ancho; height:700px; width: 960px;'>
            <?php
                  echo renderChart("chart/Line.swf", "", $strXML, "statusGizi",  1331,700, false, false); ?>
                    </div>
    </div>
            </div>
           <?php include 'footer.php';?>
