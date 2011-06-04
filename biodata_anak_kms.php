<?php
require "dbcon.php";
require "fungsi.php";
$id = $_GET['id'];
$bayi = get_bayi($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Biodata Anak</title>
        <link type="text/css" href="css/template.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="tengah">
            <div id="header">
                <div class="menu1" onClick="location.href='index.php'">BERANDA</div>
                <div class="menu2" onClick="location.href='daftar.php'">DAFTARKAN ANAK</div>
                <div class="menu3" onClick="location.href='beranda.php'">DATA STATISTIK</div>
                <div class="menu4" onClick="location.href='berita_acara.php'">ADMINISTRASI</div>
                <div class="menu5" onClick="location.href='petunjuk.php'">PETUNJUK</div>
            </div>
            <div id="sidebar">
                <div id="side">
                            <span style="font-size: 20px;"><b><a href="#"><?php echo $bayi['nama'] ?></a></b></span>
                            <br/><br/>
                            <ul>
                                <li class='current'><a href="biodata_anak.php?id=<?php echo $id; ?>">Biodata Anak</a></li>
                                <li><a href="#">Catatan Pemeriksaan</a></li>
                                <ol>
                                    <li><a href="input_data.php?id=<?php echo $id; ?>">Berat</a></li>
                                    <li><a href="input_vitamin.php?id=<?php echo $id; ?>">Vitamin</a></li>
                                    <li><a href="input_imunisasi.php?id=<?php echo $id; ?>">Imunisasi</a></li>
                                    <li><a href="#">ASI dan Riwayat Kesehatan</a></li>
                                </ol>
                                
                                <li><a href="grafik.php?id=<?php echo $id; ?>" >Grafik Perkembangan</a></li>
                                <li><a href="#" >Capaian Perkembangan</a></li>
                            </ul>
                </div>
            </div>

            <!-- content -->
            <div id="contentsidebar">
                <div class="title">Daftar Anak Posyandu Bateng</div>
                <div class="post">

                    <br/>
                    <fieldset>
                        <legend> <p><strong>Data Pribadi Anak</strong></p></legend>
                        <table border="0">

                            <tr><td width=”140">Nama Anak</td><td>:</td><td><?php echo $bayi['nama'] ?></td></tr>
                            <tr><td>Tanggal Lahir</td><td>:</td><td> <?php echo from_date($bayi['tgl_lahir']) ?></td></tr>
                            <tr><td>Jenis Kelamin </td><td>:</td><td> <?php echo jenis_kelamin($bayi['jenis_kelamin']) ?></td></tr>

                            <tr><td>Kondisi saat lahir</td><td></td><td></td></tr>
                            <tr><td>&nbsp;&nbsp;a. Berat Badan</td><td>:</td><td> <?php echo $bayi['berat'] ?> kg</td></tr>
                            <tr><td>&nbsp;&nbsp;b. Panjang Badan</td><td>:</td><td> <?php echo $bayi['panjang'] ?> cm</td></tr>
                            <tr><td></td><td></td><td></td></tr>
                            <tr><td>Alamat</td><td>:</td><td align=”left”>Jalan <?php echo $bayi['jalan'] . " RT/RW " . $bayi['rt'] . "/" . $bayi['rw'] . " Desa " . $bayi['desa'] ?> </td></tr>

                            <tr><td>No.Tlp </td><td>:</td><td> <?php echo $bayi['telp'] ?></td></tr>

                        </table>

                    </fieldset><br/>
                    <fieldset>
                        <legend> <strong>Data Orangtua</strong><br /></legend>
                        <table>
                            <strong>Ayah</strong>

                            <tr><td width=”140”>Nama</td><td>:</td><td><?php echo $bayi['nama_ayah'] ?></td></tr>
                            <tr><td width=”140”>Pekerjaan</td><td>:</td><td><?php echo $bayi['pekerjaan_ayah'] ?></td></tr>
                        </table>
                        <table>
                            <strong>Ibu</strong>

                            <tr><td width=”140”>Nama</td><td>:</td><td><?php echo $bayi['nama_ibu'] ?></td></tr>
                            <tr><td width=”140”>Pekerjaan </td><td>:</td><td><?php echo $bayi['pekerjaan_ibu'] ?></td></tr>
                        </table>
                    </fieldset>
                </div>
            </div>
            <div id="footer"><p>Copyright (c) 2011 sipandu.com. All rights reserved.<br />
                    Design by <a href="index.php"> SiPandu</a> Development Team.</p></div>
        </div>
    </body>
</html>