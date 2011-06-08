<?php
require "loginkah.php";
require 'dbcon.php';
//print_r($_POST);
if(!$_POST['namaAnak']) die();
$nama_anak       = $_POST['namaAnak'];
$jk              = $_POST['jk'];
$tanggal_lahir   = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
$berat           = $_POST['bb_1'] . "." . $_POST['bb_2'];
$nama_ayah       = $_POST['nama_ayah'];
$pekerjaan_ayah  = $_POST['pekerjaan_ayah'];
$penghasilan_ayah= $_POST['penghasilan_ayah'];
$nama_ibu        = $_POST['nama_ibu'];
$pekerjaan_ibu   = $_POST['pekerjaan_ibu'];
$penghasilan_ibu = $_POST['penghasilan_ibu'];
$telp            = $_POST['phone'];
$jalan           = $_POST['jalan'];
$rt              = $_POST['rt'];
$rw              = $_POST['rw'];
$desa            = $_POST['desa'];
$kecamatan       = $_POST['kecamatan'];
$kota            = $_POST['kota'];
$propinsi        = $_POST['propinsi'];
$kode_pos        = $_POST['kode_pos'];
$id              = $_POST['id'];


$queri = "UPDATE `bayi` set
`nama` = '$nama_anak',
`tgl_lahir` = '$tanggal_lahir',
`jenis_kelamin` = '$jk',
`berat` = '$berat',
`panjang` = 0,
`telp` = '$telp',
`nama_ayah` = '$nama_ayah',
`pekerjaan_ayah` = '$pekerjaan_ayah',
penghasilan_ayah = '$penghasilan_ayah',
`nama_ibu` = '$nama_ibu',
`pekerjaan_ibu` = '$pekerjaan_ibu',
penghasilan_ibu = '$penghasilan_ibu',
`jalan` = '$jalan',
`rt` = '$rt',
`rw` = '$rw',
`desa` = '$desa',
`kecamatan` = '$kecamatan',
`kota` = '$kota',
`propinsi` = '$propinsi',
kode_pos = '$kode_pos'

WHERE id=$id";


//echo "<br />" . $queri;
$y = mysql_query($queri);

header("Location: biodata_anak.php?id=$id");