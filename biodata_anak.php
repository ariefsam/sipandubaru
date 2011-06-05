<?php
require "loginkah.php";
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
           
          <h1>Biodata Anak <div id="nama_anak";><a href="biodata_anak.php?id=<?php echo $id; ?>"> <?php echo $bayi['nama'] ?></a></div></h1>
          <a href="edit_biodata.php?id=<?php echo $id; ?>">Edit biodata </a>    <!-- // ini tambahin fungsinya rip. bikin aja di file edit_biodata.php -->
          <fieldset>
                        <legend><strong>Data Diri Anak</strong></legend>
                        <table border="0" width="100%">

                            <tr>
							<td width="140">Nama Anak</td>
							<td>: <?php echo $bayi['nama'] ?></td></tr>
                            <tr>
							<td>Tanggal Lahir</td>
							<td>: <?php echo from_date($bayi['tgl_lahir']) ?></td></tr>
                            <tr>
							<td>Jenis Kelamin </td>
							<td>: <?php echo jenis_kelamin($bayi['jenis_kelamin']) ?></td></tr>

                            <tr><td>Kondisi saat lahir</td><td></td></tr>
                            <tr>
							<td>&nbsp;&nbsp;a. Berat Badan</td>
							<td>: <?php echo $bayi['berat'] ?> kg</td></tr>
                            <tr>
							<td>&nbsp;&nbsp;b. Panjang Badan</td>
							<td>: <?php echo $bayi['panjang'] ?> cm</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr>
							<td>Alamat</td>
							<td align=”left”>: Jalan <?php echo $bayi['jalan'] . " RT/RW " . $bayi['rt'] . "/" . $bayi['rw'] . " Desa " . $bayi['desa'] ?> </td></tr>

                            <tr><td>No.Tlp </td>
							<td>: <?php echo $bayi['telp'] ?></td></tr>

                        </table>

                    </fieldset><br/>
          <fieldset>
                        <legend> <strong>Data Orangtua</strong><br /></legend>
                        <table width="100%">
                            <strong>Ayah</strong>

                            <tr><td width="140">Nama</td><td>: <?php echo $bayi['nama_ayah'] ?></td></tr>
                            <tr><td width="140">Pekerjaan</td><td>: <?php echo $bayi['pekerjaan_ayah'] ?></td></tr>
                        </table>
                        <table width="100%">
                            <strong>Ibu</strong>

                            <tr>
							<td width="140">Nama</td>
							<td>: <?php echo $bayi['nama_ibu'] ?></td></tr>
                            <tr>
							<td width="140">Pekerjaan </td>
							<td>: <?php echo $bayi['pekerjaan_ibu'] ?></td></tr>
                        </table>
                    </fieldset>
					<div align="right"><a href="edit_biodata.php?id=<?php echo $id; ?>">Edit</a></div>
      </div>
</div>
</div>
<?php require 'footer.php';?>