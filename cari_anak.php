<?php
require 'dbcon.php';
require './header.php';
require 'fungsi.php';
$i = tanggalan();
$sql = mysql_query("SELECT * FROM bayi");
?>
<div id="inner">
            <div id="sidebar">
                <div id="kotak"><h2>Pelayanan</h2>
                    <ul>
                        <li><a href="daftar.php">Daftarkan Anak</a></li>
                        <li><a href="pelayanan.php">Peserta Posyandu</a></li>
                    </ul>
                </div>
                <div id="kotak"><h2>Informasi Penting</h2>
                                <p>Pelayan Kesehatan yang harus diberikan bulan ini:</p>
                                <ul><li>Imunisasi Polio</li>
                                    <li>Vitamin A</li>
                                </ul>
                </div>
            </div>
            <div id="content">
                <div id="content-top">
                    <h1>Daftar Peserta Posyandu</h1>
                    <div id="search">
                        <form method="post" action="cari_anak.php" name="formsearch">
				<fieldset>
					<input type="text" name="anak" id="cari_form" size="15" value="<?php echo $_POST['anak']?>" onfocus="this.value='<?php echo $_POST['anak']?>'"/>
					<input type="submit" id="cari_submit" value="Cari" />
				</fieldset>
			</form>
                    </div>
<?php
    $anak = $_POST['anak'];

//    $hal = $_GET['hal'];
//    if(!isset($_GET['hal'])){
//            $page = 1;
//    } else {
//            $page = $_GET['hal'];
//    }
//
//    $hasil_max = 3;
//    $dari = (($page * $hasil_max) - $hasil_max);

    $cari_anak = mysql_query("SELECT * FROM bayi WHERE nama LIKE '%$anak%'"); //LIMIT $dari,$hasil_max
    $jml_cari = mysql_result(mysql_query("SELECT COUNT(*) FROM bayi WHERE nama LIKE '%$anak%'"),0);
    if(empty($anak)){
        echo "<br/>Silahkan masukkan kata pencarian";
    } elseif(mysql_num_rows($cari_anak)=="0"){
        echo "<br/>$jml_cari Hasil pencarian untuk kata kunci '$anak'"; ?>
        <div>Jika anak belum terdaftar silahkan <a href="daftar.php">daftarkan anak</a></div>
<?php
    } else {
        echo "<br/>$jml_cari Hasil pencarian untuk kata kunci '$anak'";
        while ($temu = mysql_fetch_array($cari_anak)){
            ?>
                <br/>
                <table>
                    <tr><td><a href="<?php echo "biodata_anak.php?id=$temu[id]" ?>"><?php echo highlight_kriteria_cari($temu['nama'],$anak); ?></a></td><td>&nbsp;</td></tr>
                    <tr><td>Nama Ayah:</td><td><?php echo $temu['nama_ayah'] ?></td></tr>
                    <tr><td>Nama Ibu:</td><td><?php echo $temu['nama_ibu'] ?></td></tr>
                </table>
<!--                <ul id="pagination">
                        <li class="prev-off">< Previous</li>
                        <li class="aktif">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="next"><a href="#">Next ></a></li>
                    </ul>-->
            <?php
            //echo highlight_kriteria_cari($temu['nama'],$anak)."<br/>";
            //echo "Nama Ayah:".$temu['nama_ayah']."</br>"."Nama Ibu:".$temu['nama_ibu']."<hr/>";
        }
//        $hal_total = ceil($jml_cari / $hasil_max);
//            if($jml_cari > $hasil_max){
//                echo "<br /><center><b>Halaman $hal</b><br />";
//                if($hal > 1){
//                        $prev = ($page - 1);
//                        echo "<a href=cari_anak.php?hal=$prev&cari_anak=$anak><b>Sebelumnya</b></a> << ";
//                }
//                for($i = 1; $i <= $hal_total; $i++){
//                        if(($hal) == $i){
//                                echo "$i ";
//                        } else {
//                                        echo "<a href=cari_anak.php?hal=$i&cari_anak=$anak><b>$i</b></a> ";
//                        }
//                }
//                if($hal < $hal_total){
//                        $next = ($page + 1);
//                        echo ">> <a href=cari_anak.php?hal=$next&cari_anak=$anak><b>Berikutnya</b></a>";
//                }
//                echo "</center>";
//            }
    }
?>
  
                    
                </div>

            </div>
	</div>
<?php require 'footer.php';?>