<?php
require "dbcon.php";
require "fungsi.php";
require 'header.php';
$i = tanggalan();
?>
<?php include 'sidebar_anak.php';?>
<div id="content">
    <div id="content-top">
        <h1>Pemberian ASI Eksklusif</h1>
        <p>ASI Ekslusif diberikan pada anak usia 0 - 6 bulan</p>
            <table border="1">
                <tr class="head">
                    <th>Umur/bln</th>
                    <th colspan="2">Pemberian ASI</th>
                </tr>
                <tr>
                    <td>0</td>
                    <td colspan="2">Ya</td>
                   
                </tr>
                <?php for($x=1;$x<=6;$x++){ ?>
                <tr>
                    <td><?php echo $x;?></td>
                    <td><input type="radio" name="asi<?php echo$x;?>" value="ya">Ya</td>
                    <td><input type="radio" name="asi<?php echo$x;?>" value="tidak">Tidak</td>
                </tr>
                <?php }?>
            </table>
        <h1>Riwayat Kesehatan</h1>
                    <table border="1">
                <tr class="head">
                    <th>Tanggal Periksa</th>
                    <th>Penyakit yang Diderita</th>
                </tr>
                <tr>
                    <td>Jum'at, 29 Mei 2011</td>
                    <td>Demam, Batuk
                    </td>

                </tr>
                <tr>
                    <td>Jum'at, 29 Juni 2011</td>
                    <td><input type="checkbox" name="asi<?php echo$x;?>" value="demam">Demam
                    <input type="checkbox" name="asi1" value="batuk">Batuk
                    <input type="checkbox" name="asi1" value="diare">Diare
                    </td>

                </tr>
               
            </table>
     </div>
</div>
<?php include 'footer.php';?>