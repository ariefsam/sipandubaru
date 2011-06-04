<?php
require "dbcon.php";
require './header.php';
require 'fungsi.php';
$id = $_GET['id'];
$bayi = get_bayi($id);
$i = tanggalan();
?>
<div id="inner">
<?php include 'sidebar_anak.php';?>
<div id="content">
      <div id="content-top">

          <h1>Capaian Perkembangan <span><span style="text-align: right";><a href="biodata_anak.php?id=<?php echo $id; ?>"> Alfa Nugraha</a></span></h1>
          <br/>

          <?php $usia =34; if ($usia>=0 && $usia<3)
                    include 'capaian_03.php';
                else if($usia>=3 && $usia<6)
                     include 'capaian_36.php';
                else if($usia>=6 && $usia<9)
                     include 'capaian_69.php';
                else if($usia>=9 && $usia<12)
                    include 'capaian_912.php';
                else if($usia>=12 && $usia<18)
                     include 'capaian_1218.php';
                else if($usia>=18 && $usia<24)
                    include 'capaian_1824.php';
                 else if($usia>=24 && $usia<36)
                     include 'capaian_2436.php';
                else if($usia>=36 && $usia<48)
                    include 'capaian_3648.php';
                else if($usia>=48 && $usia<60)
                     include 'capaian_4860.php';
?>
          
        
      </div>
</div>
</div>
<?php require 'footer.php';?>