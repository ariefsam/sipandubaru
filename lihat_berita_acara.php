<?php
require "loginkah.php";
require "dbcon.php";
require "./header.php";
require 'fungsi.php';
$i = tanggalan();
$id = $_GET['id'];
$brt = get_berita($id);
$bayi = get_relasi1($id);
$petugas = get_relasi2($id);
?>
<div id="inner">
<?php include 'sidebar_administrasi.php'?>
         <div id="content">
        <div id="content-top">
            <h1>Pilih Berita Acara</h1>
                <table id="daftar">
                    <tr><td width=”140">Tanggal:</td><td align="left"><?php echo from_date($brt['tanggal']) ?></td></tr>
                    <tr class="alt"><td>Waktu:</td><td align="left"><?php echo $brt['waktu'] ?></td></tr>
                    <tr valign="top"><td>Pelayanan:</td><td align="left"><?php echo $brt['pelayanan'] ?></td></tr>
                    <tr class="alt"><td>Fasilitas:</td><td align="left"><?php echo $brt['fasilitas'] ?></td></tr>
                    <tr valign="top"><td>Petugas:</td>
                        <td align="left">
                            <ol>
                                <?php foreach ($petugas as $p){ ?>
                                <li><?php echo nama_petugas($p['id_petugas']) ?></li>
                                <?php } ?>
                            </ol>
                        </td>
                    </tr>
                    <tr valign="top" class="alt"><td>Anak: </td>
                        <td align="left">
                            <ol>
                                <?php foreach ($bayi as $b){ ?>
                                <li><?php echo nama_bayi($b['id_bayi']) ?></li>
                                <?php } ?>
                            </ol>
                        </td>
                    </tr>
                    <tr><td>Keterangan:</td><td align="left"><?php echo $brt['keterangan']?></td></tr>
                    <tr><td><a href="daftar_acara.php"><< Kembali</a></td><td>&nbsp;</td></tr>
                </table>
        </div>
</div>
</div>
    <?php include 'footer.php'?>