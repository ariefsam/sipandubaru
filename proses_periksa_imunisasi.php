<?php
require "dbcon.php";
require "fungsi.php";
$id = $_GET['id'];

$tanggal    = to_date($_POST['tanggal']);
$imunisasi      = $_POST['imunisasi'];

$queri = mysql_query("INSERT INTO imunisasi(tanggal,id_bayi,id_imunisasi) VALUES
        ('$tanggal',$id,$imunisasi)");
header("Location: input_imunisasi.php?id=$id");
?>