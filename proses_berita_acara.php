<?php
require "dbcon.php";
require "fungsi.php";

$id       = $_POST['no'];
$tanggal  = $_POST['tanggal'];
$t        = to_date($tanggal);
$w        = $_POST['waktu'];
$p        = $_POST['pelayanan'];
$f        = $_POST['fasilitas'];
$k        = $_POST['keterangan'];
$j        = $_POST['jumlah'];
$n        = $_POST['jmlh'];
$queri = mysql_query("INSERT INTO berita(id_berita,tanggal,waktu,pelayanan,fasilitas,keterangan) VALUES($id,'$t','$w','$p','$f','$k')");

for($z = 1; $z <= $n; $z++)
{
   $pt = $_POST['pt'.$z];
   if (!empty($pt))
   {
      $quer = mysql_query("INSERT INTO petugas_berita(id_petugas,id_berita) VALUES($pt,$id)");
   }
}

for($i = 1; $i <= $j; $i++)
{
   $by = $_POST['by'.$i];
   if (!empty($by))
   {
      $query = mysql_query("INSERT INTO bayi_berita(id_bayi,id_berita) VALUES($by,$id)");
   }
}
header("Location: lihat_berita_acara.php?id=$id");
?>
