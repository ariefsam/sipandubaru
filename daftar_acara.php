<?php
require "loginkah.php";
require 'dbcon.php';
require 'fungsi.php';
require './header.php';
$sql = mysql_query("SELECT * FROM berita");
$i = tanggalan();
?>
<div id="inner">
<?php include 'sidebar_administrasi.php';?>
    <div id="content">
        <div id="content-top">
            <h1>Daftar Berita Acara</h1>
         <table border="1">
    <tr>
        <td>tanggal</td>
    </tr>
    <?php while($q = mysql_fetch_array($sql)) {?>
    <tr>
        <td>
            <a href="<?php echo "lihat_berita_acara.php?id=$q[id_berita]"?> "><?php echo from_date($q['tanggal']) ?></a>
        </td>
    </tr>
    <?php } ?>
</table><br/>
<a href="berita_acara.php">tambah berita</a>
        </div>

    </div>
</div>
<?php require 'footer.php'; ?>

