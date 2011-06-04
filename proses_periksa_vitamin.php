<?php
require "dbcon.php";
require "fungsi.php";
$id = $_GET['id'];

$tanggal    = to_date($_POST['tanggal']);
$vit      = $_POST['vitamin'];

$queri = mysql_query("INSERT INTO vitamin(tanggal,id_bayi,id_vitamin) VALUES
        ('$tanggal',$id,$vit)");
header("Location: input_vitamin.php?id=$id");
?>