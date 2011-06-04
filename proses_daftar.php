<?php
require 'dbcon.php';
if(!$_POST['namaAnak']) die();
$nama_anak       = $_POST['namaAnak'];
$jk              = $_POST['jk'];
$tanggal_lahir   = $_POST['thn'] . "-" . $_POST['bln'] . "-" . $_POST['tgl'];
$berat           = $_POST['berat'];
$panjang         = $_POST['panjang'];
$nama_ayah       = $_POST['nama_ayah'];
$pekerjaan_ayah  = $_POST['pekerjaan_ayah'];
$nama_ibu        = $_POST['nama_ibu'];
$pekerjaan_ibu   = $_POST['pekerjaan_ibu'];
$telp            = $_POST['phone'] . $_POST['phone2'];
$jalan           = $_POST['jalan'];
$rt              = $_POST['rt'];
$rw              = $_POST['rw'];
$desa            = $_POST['desa'];
$kecamatan       = $_POST['kecamatan'];
$kota            = $_POST['kota'];
$propinsi        = $_POST['propinsi'];


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
`nama_ibu` ,
`pekerjaan_ibu` ,
`jalan` ,
`rt` ,
`rw` ,
`desa` ,
`kecamatan` ,
`kota` ,
`propinsi`
)
VALUES (
NULL , '$nama_anak', '$tanggal_lahir', '$jk', '$berat', '$panjang', '$telp', '$nama_ayah', '$pekerjaan_ayah', '$nama_ibu', '$pekerjaan_ibu', '$jalan', '$rt', '$rw', '$desa', '$kecamatan', '$kota', '$propinsi'
)";
//echo $queri;
$y = mysql_query($queri);
$x =  mysql_insert_id();
header("Location: biodata_anak.php?id=$x");