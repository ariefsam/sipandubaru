<?php
require "dbcon.php";
require 'fungsi.php';
$i = tanggalan();
require './header.php';
$sql = mysql_query("SELECT * FROM bayi");
$sql2 = mysql_query("SELECT * FROM petugas");
?>
<script type="text/javascript" src="script/jquery-1.4.js"></script>
<link type="text/css" href="development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tanggal").datepicker({
            dateFormat:"dd MM yy"
        });
    });
</script>
<div id="inner">
<?php include 'sidebar_administrasi.php'?>
    <div id="content">
        <div id="content-top">
            <h1>Berita Acara</h1>
            
                <table id="daftar">
                    <form method="post" action="proses_berita_acara.php">
                        <tr class="alt"><td>No:</td><td align="left"><input type="text" name="no" /></td></tr>
                        <tr><td width=”140">Tanggal:</td><td align="left"><input type="text" name="tanggal" id="tanggal" /></td></tr>
                        <tr class="alt"><td>Waktu:</td><td align="left"><input type="text" name="waktu" id="tanggal" /></td></tr>
                        <tr><td>Pelayanan:</td>
                            <td align="left">
                                <input type="text" name="pelayanan" />
                            </td>
                        </tr>
                        <tr class="alt"><td>Fasilitas:</td>
                            <td align="left">
                                <input type="text" name="fasilitas"/>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr valign="top" class="alt"><td>Petugas:</td>
                            <td align="left">
                                <?php
                                $n = 1;
                                while ($k = mysql_fetch_array($sql2)) {
                                    echo "<input type='checkbox' name='pt" . $n . "' value='" . $k['id_petugas'] . "' />" . $k['nama_petugas'] . "<br/>";
                                    $n++;
                                } ?>
                                <input type="hidden" name="jmlh" value="<?php echo $n - 1; ?>" />
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr valign="top" class="alt"><td>Anak yang diperiksa:</td>
                            <td align="left">
                                <?php
                                $no = 1;
                                while ($q = mysql_fetch_array($sql)) {
                                    echo "<input type='checkbox' name='by" . $no . "' value='" . $q['id'] . "' />" . $q['nama'] . "<br/>";
                                    $no++;
                                } ?>
                                <input type="hidden" name="jumlah" value="<?php echo $no - 1; ?>" />
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr class="alt"><td>Keterangan:</td><td align="left"><input type="text" name="keterangan" /></td></tr>
                        <tr><td>&nbsp;</td><td align="left"><input type="submit" name="submit" value="Tambah" /><input type="reset" name="reset" value="Reset" /></td></tr>
                    </form>
                </table>
        </div>
   </div>
</div>
<?php include 'footer.php'?>