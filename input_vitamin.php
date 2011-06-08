<?php
require "loginkah.php";
require "dbcon.php";
require 'fungsi.php';
$i = tanggalan();
$id = $_GET['id'];
$bayi = get_bayi($id);
$huah = jenis_vitamin();
if ($_POST['tes']) {
    $it  = $_POST['it'];
    $tgl = $_POST['tgl'];
    $vit = $_POST['vit'];
    edit_periksa_vitamin($it, to_date($tgl), $vit);
    header("Location: input_vitamin.php?id=$id");
}
include 'header.php';
?>
        <script type="text/javascript" src="script/jquery-1.4.js"></script>
        <link type="text/css" href="development-bundle/themes/base/ui.all.css" rel="stylesheet" />
        <script type="text/javascript" src="development-bundle/ui/ui.core.js"></script>
        <script type="text/javascript" src="development-bundle/ui/ui.datepicker.js"></script>
        <script type="text/javascript" src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>
        <script type="text/javascript">
            function edit(id)
            {
                $('#data' + id).fadeOut("fast", function(){
                    $('#edit' + id).fadeIn();
                });
            }
            function batal(id)
            {
                $('#edit' + id).fadeOut("fast", function(){
                    $('#data' + id).fadeIn();
                });
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#tanggal").datepicker({
                    dateFormat:"dd MM yy"
                });
            });
        </script>
    </head>
    <body>
        <?php include 'sidebar_anak.php';?>
<div id="content">
    <div id="content-top">
        <h1>Catatan Pemberian Vitamin</h1>
                        <p class="meta"></p>
                        <div class="entry">
                            <table border="0" class="tabel">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Vitamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($huah as $h) {
                                ?>
                                    <tr id="data<?php echo $i ?>" class="ganjil">
                                        <td><?php echo from_date($h['tanggal']) ?></td>
                                        <td><?php echo nama_vitamin($h['id_vitamin']) ?></td>
                                        <td style="text-decoration: underline"><a href="#" onclick="edit(<?php echo $i ?>)" ><img alt="" src="images/edit.png" />ubah</a></td>
                                    </tr>
                                    <tr id="edit<?php echo $i ?>" style="display: none">
                                        <form action="" method="post">
                                            <input type="hidden" name="it" value="<?php echo $h['id'] ?>" />
                                            <td><input type="text" name="tgl" value="<?php echo from_date($h['tanggal']) ?>" /></td>
                                            <td>
                                                <select name="vit">
                                                <?php foreach (vitamin () as $ye) { ?>
                                                    <option value="<?php echo $ye['id'] ?>" <?php if($ye['id']==$h['id_vitamin']) echo "selected=selected"; ?> ><?php echo $ye['nama'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td valign="top"><input type="submit" name="tes" value="ubah" /> <input type="button" value="batal" onclick="batal(<?php echo $i++ ?>)" /></td>
                                    </form>
                                </tr>
                                <?php } ?>

                            </tbody>

                                            <tr class="genap">
                                                <form action="proses_periksa_vitamin.php?id=<?php echo $id ?>" method="post">
                                                    <td><input type="text" size="20" id="tanggal" name="tanggal"  /></td>
                                                    <td><select name="vitamin">
                                                            <option value="0">- Pilih Vitamin -</option>
                                                            <?php foreach (vitamin () as $v) { ?>
                                                            <option value="<?php echo $v['id'] ?>" ><?php echo $v['nama'] ?></option>
                                                            <?php } ?>
                                            </select>
                                        </td>
                                        <td style="text-decoration: underline"><input type="submit" name="submit" value="Simpan"/></td>
                                    </form>
                                </tr>
                            </table>
        </div>
</div>
</div>
<?php include 'footer.php'?>