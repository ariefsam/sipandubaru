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
$telp            = $_POST['phone'] . $_POST['phone2'];
$jalan           = $_POST['jalan'];
$rt              = $_POST['rt'];
$rw              = $_POST['rw'];
$desa            = $_POST['desa'];
$kecamatan       = $_POST['kecamatan'];
$kota            = $_POST['kota'];
$propinsi        = $_POST['propinsi'];
$kode_pos        = $_POST['kode_pos'];


$queri = "INSERT INTO `sipandu`.`bayi` (
`id` ,
`nama` ,
`tgl_lahir` ,
`jenis_kelamin` ,
`berat` ,
`panjang` ,
`telp` ,
`nama_ayah` ,
`pekerjaan_ayah` ,
penghasilan_ayah,
`nama_ibu` ,
`pekerjaan_ibu` ,
penghasilan_ibu,
`jalan` ,
`rt` ,
`rw` ,
`desa` ,
`kecamatan` ,
`kota` ,
`propinsi`,
kode_pos
)
VALUES (
NULL ,
'$nama_anak',
'$tanggal_lahir',
'$jk',
'$berat',
0,
'$telp',
'$nama_ayah',
'$pekerjaan_ayah',
'$penghasilan_ayah',
'$nama_ibu',
'$pekerjaan_ibu',
'$penghasilan_ibu',
'$jalan',
'$rt',
'$rw',
'$desa',
'$kecamatan',
'$kota',
'$propinsi',
'$kode_pos')";
//echo "<br />" . $queri;
$y = mysql_query($queri);
$x =  mysql_insert_id();
header("Location: biodata_anak.php?id=$x");