<?php
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
include("FusionCharts.php");
include 'gr_jk.php';
?>
<div id="inner">
<?php include 'sidebar_statistik.php';?>
            <div id="content">
                <div id="content-top">
                    <h1>Grafik Berdasarkan Jenis Kelamin</h1>
					 <?php
                            //Create the chart - Column 3D Chart with data contained in JK
                         echo renderChart("chart/Pie2D.swf", "", $JK, "JenisKelamin", 400, 300, false, false); ?>
                    <h1>Keterangan</h1>	
                </div>
               
            </div>
	</div>
<?php require 'footer.php';?>