<?php
require "dbcon.php";
require 'fungsi.php';
$i = tanggalan();
$id = $_GET['id'];
$bayi = get_bayi($id);
$imuni = periksa_imunisasi();
if ($_POST['submit']) {
    $id_imun = $_POST['id'];
    $imuns = $_POST['imunisasi'];
    $tanggal = $_POST['tanggal'];
    edit_input_imunisasi($imuns, $id_imun, to_date($tanggal));
    header("Location: input_imunisasi.php?id=$id");
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
                    <h1>Catatan Pemberian Imunisasi</h1>
                    <table border="1">
                <tr class="tbheading">
                    <th>Tanggal Diberikan</th>
                    <th>Imunisasi</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                foreach ($imuni as $imu) {
                ?>
                    <tr class="ganjil" id="data<?php echo $i ?>">
                        <td><?php echo from_date($imu['tanggal']) ?></td>
                        <td><?php echo nama_imun($imu['id_imunisasi']) ?></td>
                        <td style="text-decoration: underline"><a href="#" onclick="edit(<?php echo $i ?>)"><img alt="" src="images/edit.png" />ubah</a></td>
                    </tr>

                    <tr id="edit<?php echo $i ?>" style="display: none">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $imu['id'] ?>" />
                        <td><input type="text" name="tanggal" value="<?php echo from_date($imu['tanggal']) ?>" /></td>
                        <td><select name="imunisasi">
                                <?php foreach (imunisasi() as $imun) { ?>
                                <option value="<?php echo $imun['id']; ?>" <?php if($imun['id']==$imu['id_imunisasi']) echo "selected=selected";?>>
                                <?php echo $imun["nama"]; ?></option>
                                <?php } ?>
                        </select></td>
                    <td valign="top"><input type="submit" name="submit" value="ubah" /> <input type="button" value="batal" onclick="batal(<?php echo $i++ ?>)" /></td>
                            </form>
                            </tr>
                 <?php  }?>

                        <tr class="genap">
                        <form action="proses_periksa_imunisasi.php?id=<?php echo $id ?>" method="POST">
                            <td><input type="text" size="20" id="tanggal" name="tanggal"  /></td>
                            <td><select name="imunisasi">
                                    <option value="0">- Pilih Imunisasi -</option>
                                    <?php foreach ( imunisasi() as $imunis) { ?>
                                    <option value="<?php echo $imunis['id']; ?>" ><?php echo $imunis['nama']; ?></option>
                                    <?php } ?>
                        </select>
                    </td>

                    <td style="text-decoration: underline"><input type="submit" value="Simpan" /></td>
                </form>
                </tr>
            </table>
    </div>
</div>
<?php include 'footer.php';?>