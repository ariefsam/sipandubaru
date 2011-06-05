<?php
require "loginkah.php";
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
include("FusionCharts.php");
include 'gr_status_gizi.php';
include 'gr_kehadiran.php';
?>
<div id="inner">
<?php include 'sidebar_statistik.php';?>
            <div id="content">
                <div id="content-top">
                    <h1>Grafik Jumlah Kehadiran Anak</h1>
                     <div align="right"><h3>Jumlah Kehadiran | Berdasarkan Wilayah</h3>
					 <?php
                            //Create the chart - Column 3D Chart with data contained in strXML
                         echo renderChart("chart/Column3D.swf", "", $kehadiran, "jumlahPeserta", 700, 400, false, false); ?>
					 </div>
					 <h1>Keterangan</h1>	
                </div>
               
            </div>
	</div>
<?php require 'footer.php';?>