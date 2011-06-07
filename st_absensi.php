<?php
require "loginkah.php";
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
include("FusionCharts.php");
include 'gr_absensi.php';
?>
<div id="inner">
<?php include 'sidebar_administrasi.php';?>
            <div id="content">
                <div id="content-top">
                    <h1>Kehadiran Petugas</h1>
					 <?php
                            //Create the chart - Column 3D Chart with data contained in JK
                         echo renderChart("chart/MSBar2D.swf", "", $Absensi, "absenPetugas", 400, 300, false, false); ?>
                    <h1>Keterangan</h1>
                </div>

            </div>
	</div>
<?php require 'footer.php';?>