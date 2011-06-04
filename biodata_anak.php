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
           
          <h1>Biodata Anak <span><span style="text-align: 'right'";><a href="biodata_anak.php?id=<?php echo $id; ?>"> <?php echo $bayi['nama'] ?></a></span></h1>
              <fieldset>
                        <legend><strong>Data Diri Anak</strong></legend>
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
<?php require 'footer.php';?>