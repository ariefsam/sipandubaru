<?php
require "dbcon.php";
require 'fungsi.php';
include("FusionCharts.php");
$id = $_GET['id'];
$bayi = get_bayi($id);
$data = get_berat_tinggi($id);
if ($_POST['tes']) {
    $id_data = $_POST['id_data'];
    $tgl = $_POST['tanggal_periksa'];
    $brt = $_POST['berat'];
    $umur = $_POST['umur'];
    edit_berat_tinggi($id_data, to_date($tgl), $brt, $umur);
    header("Location: input_berat.php?id=$id");
}
require 'header.php';
$i = tanggalan();
?>
<head>
        <script type="text/javascript" src="script/FusionCharts.js"></script>
        <script type="text/javascript" src="script/jquery-1.4.js"></script>
        <link type="text/css" href="development-bundle/themes/base/ui.all.css" rel="stylesheet" />
        <script type="text/javascript" src="development-bundle/ui/ui.core.js"></script>
        <script type="text/javascript" src="development-bundle/ui/ui.datepicker.js"></script>
        <script type="text/javascript" src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>
        <script type="text/javascript">
            function edit(i){
                $('#data' + i).fadeOut("fast", function(){
                    $('#edit' + i).fadeIn()
                });
            }
            function batal(id){
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
                    <h1>Catatan Berat Badan</h1>
                    <div class="entry">
                        <table border="1">
                            <tr class="head">
                                <th>Umur/bln</th>
                                <th>Tanggal Periksa</th>
                                <th>Berat Badan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($data as $d) {
                            ?>
                                <tr class="ganjil" id="data<?php echo $i ?>">
                                    <td><div align="center"><?php echo $d['umur'] ?></div></td>
                                    <td><?php echo from_date($d['tanggal']) ?></td>
                                    <td><?php echo $d['berat'] ?> kg</td>

                                    <td style="text-decoration: underline"><a href="#" onclick="edit(<?php echo $i ?>)"><img alt="" src="images/edit.png" />ubah</a></td>
                                </tr>

                                <tr class="ganjil" id="edit<?php echo $i ?>" style="display:none">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_data" value="<?php echo $d['id'] ?>" />
                                        <td><div align="center"><input size ="1" type="text" name="umur" value="<?php echo $d['umur'] ?>" /></div></td>
                                        <td><input type="text" size="13" name="tanggal_periksa" value="<?php echo from_date($d['tanggal']) ?>" /></td>
                                        <td><input size ="1" type="text" name="berat" value="<?php echo $d['berat'] ?>" /> kg</td>
                                        <td valign="top"><input type="submit" name="tes" value="ubah" /> <input type="button" value="batal" onclick="batal(<?php echo $i++ ?>)" /></td>
                                    </form>
                                </tr>

                            <?php
                                $i++;
                            }
                            ?>
                            <tr class="genap">
                                <form action="proses_berat.php?id=<?php echo $id ?>" method="post">
                                    <td><div align="center"><input type="text" size="2" name="umur" /></div></td>
                                    <td><input type="text" size="13" id="tanggal" name="tanggal"  /></td>
                                    <td><input type="text" size="3" name="berat" /></td>


                                    <td style="text-decoration: underline"><input type="submit" value="Simpan" name="submit" /></td>
                                </form>
                            </tr>
                        </table>
                    </div>
                </div>
<?php include 'footer.php'?>