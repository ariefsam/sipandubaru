<?php
require "dbcon.php";
require "fungsi.php";
$id = $_GET['id'];

$umur       = $_POST['umur'];
$tanggal    = to_date($_POST['tanggal']);
$berat      = $_POST['berat'];

$queri = mysql_query("INSERT INTO pemeriksaan(tanggal,id_bayi,berat,panjang,umur) VALUES
        ('$tanggal',$id,$berat,'',$umur)");
header("Location: input_data.php?id=$id");