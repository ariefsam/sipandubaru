<?php
require "loginkah.php";
require "dbcon.php";
require 'fungsi.php';
$i = tanggalan();
$id = $_GET['id'];
$bayi = get_bayi($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Data Pemeriksaan</title>
        <link type="text/css" href="css/template.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="tengah">
            <div id="header">
                <div class="menu1" onClick="location.href='index.php'">BERANDA</div>
                <div class="menu2" onClick="location.href='daftar.php'">DAFTARKAN ANAK</div>
                <div class="menu3" onClick="location.href='beranda.php'">DATA STATISTIK</div>
                <div class="menu4" onClick="location.href='berita_acara.php'">ADMINISTRASI</div>
                <div class="menu5" onClick="location.href='beranda.php'">PETUNJUK</div>
            </div>
            <div id="sidebar">
                <div id="side">
                    <span style="font-size: 20px;"><b><a href="#"><?php echo $bayi['nama'] ?></a></b></span>
                    <br/><br/>
                    <ul>
                        <li><a href="biodata_anak.php?id=<?php echo $id; ?>">Biodata Anak</a></li>
                                <li><a href="#">Catatan Pemeriksaan</a></li>
                                <ol>
                                    <li><a href="input_data.php?id=<?php echo $id; ?>">Berat</a></li>
                                    <li><a href="input_vitamin.php?id=<?php echo $id; ?>">Vitamin</a></li>
                                    <li><a href="input_imunisasi.php?id=<?php echo $id; ?>">Imunisasi</a></li>
                                    <li><a href="#">ASI dan Riwayat Kesehatan</a></li>
                                </ol>
                                <li class="current"><a href="data_periksa.php?id=<?php echo $id; ?>" >Data Pemeriksaan</a></li>
                                <li><a href="grafik.php?id=<?php echo $id; ?>" >Grafik Perkembangan</a></li>
                                <li><a href="#" >Capaian Perkembangan</a></li>
                    </ul>
                </div>
            </div>
<div id="contentsidebar">
    <div class="post">
        <h2 class="title">Catatan Pemberian Imunisasi</h2>
        <div class="entry">
            <table border="1">
                <tr class="head">
                    <th>Umur/bln</th>
                    <th>Jenis Imunisasi</th>
                    <th>Tgl. diberikan Imunisasi</th>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">0</div></td>
                    <td>HB0, Polio 0 </td>
                    <td>26 Juni 2010</td>
                </tr>

                <tr class="genap">
                    <td><div align="center">1</div></td>
                    <td>BCG, Polio 1 </td>
                    <td>26 Juli 2010</td>
                </tr>

                <tr class="ganjil">
                    <td><div align="center">2</div></td>
                    <td>DPT/HB1, Polio 2 </td>
                    <td>26 Agustus 2010</td>
                </tr>

                <tr class="genap">
                    <td><div align="center">3</div></td>
                    <td>DPT/HB2, Polio 3 </td>
                    <td>26 September 2010</td>
                </tr>

                <tr class="ganjil">
                    <td><div align="center">4</div></td>
                    <td>DPT/HB3, Polio 4 </td>
                    <td>26 Oktober 2010</td>
                </tr>

                <tr class="genap">
                    <td><div align="center">9</div></td>
                    <td>Campak</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="post">
        <h2 class="title">Catatan Pemberian Vitamin A</h2>
        <p class="meta"></p>
        <div class="entry">
            <table border="1">
                <tr class="head">
                    <th width="20">Umur/bln</th>
                    <th width="210">Dosis</th>
                    <th colspan="2" width="140">Tgl. diberikan</th>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">6 - 11</div></td>
                    <td >1 kapsul biru di bulan Februari <u>atau</u> Agustus </td>
                    <td colspan="2"><div align="center">26 Desember 2010 </div></td>
                </tr>
                <tr class="genap">
                    <td><div align="center">12 - 23 </div></td>
                    <td rowspan="4"><br /><br /> 1 kapsul merah setiap bulan Februari <u>dan</u> Agustus </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">24 - 35</div></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="genap">
                    <td><div align="center">36 - 47 </div></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">48 - 59 </div></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="post">
        <h2 class="title">Catatan Berat Badan dan Tinggi Badan</h2>
        <p class="meta"></p>
        <div class="entry">
            <table border="1">
                <tr class="head">
                    <th>Umur/bln</th>
                    <th>Tanggal Periksa</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">0</div></td>
                    <td>26 Juni 2010</td>
                    <td>3,8 kg</td>
                    <td>52 cm</td>
                </tr>
                <tr class="genap">
                    <td><div align="center">1</div></td>
                    <td>26 Juli 2010</td>
                    <td>4,0 kg</td>
                    <td>53 cm</td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">2</div></td>
                    <td>26 Agustus 2010</td>
                    <td>4,3 kg</td>
                    <td>54 cm</td>
                </tr>
                <tr class="genap">
                    <td><div align="center">3</div></td>
                    <td>26 September 2010</td>
                    <td>4,6 kg</td>
                    <td>55 cm</td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">4</div></td>
                    <td>26 Oktober 2010</td>
                    <td>4,8 kg</td>
                    <td>56 cm</td>
                </tr>
                <tr class="genap">
                    <td><div align="center">5</div></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">6</div></td>
                    <td>26 Desember 2010</td>
                    <td>5,2 kg</td>
                    <td>58 cm</td>
                </tr>
                <tr class="genap">
                    <td><div align="center">7</div></td>
                    <td>26 Januari 2011</td>
                    <td>5,5 kg</td>
                    <td>59 cm</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="post">
        <h2 class="title">Catatan Pemberian ASI Ekslusif</h2>
        <p class="meta"></p>
        <div class="entry">
            <table border="1">
                <tr class="head">
                    <th>Umur/bln</th>
                    <th>Tanggal Periksa</th>
                    <th>Pemberian ASI Ekslusif</th>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">0</div></td>
                    <td>26 Juni 2010</td>
                    <td><div align="center">Ya</div></td>
                </tr>
                <tr class="genap">
                    <td><div align="center">1</div></td>
                    <td>26 Juli 2010</td>
                    <td><div align="center">Ya</div></td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">2</div></td>
                    <td>26 Agustus 2010</td>
                    <td><div align="center">Ya</div></td>
                </tr>
                <tr class="genap">
                    <td><div align="center">3</div></td>
                    <td>26 September 2010</td>
                    <td><div align="center">Ya</div></td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">4</div></td>
                    <td>26 Oktober 2010</td>
                    <td><div align="center">Ya</div></td>
                </tr>
                <tr class="genap">
                    <td><div align="center">5</div></td>
                    <td>-</td>
                    <td><div align="center">-</div></td>
                </tr>
                <tr class="ganjil">
                    <td><div align="center">6</div></td>
                    <td>26 Desember 2010</td>
                    <td><div align="center">Ya</div></td>
                </tr>
                <tr class="genap">
                    <td><div align="center">7</div></td>
                    <td>26 Januari 2011</td>
                    <td><div align="center">Ya</div></td>
                </tr>
            </table>
        </div>
    </div>
</div>
            <div id="footer"><p>Copyright (c) 2011 sipandu.com. All rights reserved.<br />
                    Design by <a href="index.php"> SiPandu Development Team</a>.</p></div>
        </div>
</body>
</html>
