<?php

require "loginkah.php";
require 'dbcon.php';
require './header.php';
require 'fungsi.php';
$i = tanggalan();
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
			<form method="post" action="cari_anak.php">
				<fieldset>
					<input type="text" name="anak" id="cari_form" size="15" value="Ketikkan Nama Anak..." onfocus="this.value=''"/>
					<input type="submit" id="cari_submit" value="Cari" />
				</fieldset>
			</form>
                    </div>

                    <table border="1" width="90%">
                        <tr class="head">
                            <th align="center">No.</th>
                            <th width="95">Nama</th>
                            <th width="60">Umur</th>
                            <th width="50">Berat Badan</th>
                            <th width="50">Tinggi Badan</th>
                            <th width="80">Nama Ayah</th>
                            <th width="95">Nama Ibu</th>
                            <th width="300">Alamat</th>
                        </tr>
                    <?php

                        $adjacent = 3;
                        $kueri_page = mysql_fetch_array(mysql_query("SELECT COUNT(*) as num FROM bayi"));
                        $kueri_page = $kueri_page[num];

                        $targetpage = "pelayanan.php";
                        $limit = 5;
                        $page = $_GET['page'];
                        if($page) $start = ($page - 1)*limit;
                        else $start = 0;
                        
                        $i = 1;
                        $sql = mysql_query("SELECT * FROM bayi LIMIT $start, $limit");
                        if ($page == 0) $page = 1;
                        $prev = $page - 1;
                        $next = $page + 1;
                        $lastpage = ceil($kueri_page/$limit);
                        $lpm1 = $lastpage -1;

                        $pagination = "";
                        if($lastpage > 1){
                            $pagination .= "<ul id=\"pagination\">";
                            if($page > 1) $pagination .= "<li><a href=\"$targetpage?page=$prev\">< Previous</a></li>";
                            else $pagination .= "<li class=\"prev-off\">< Previous</li>";

                            if($lastpage < 7 + ($adjacent*2)){
                                for($counter = 1; $counter <= $lastpage; $counter++){
                                    if($counter == $page) $pagination .= "<li class=\"aktif\">$counter</li>";
                                    else $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                }
                            } elseif ($lastpage > 5 + ($adjacent*2)) {
                                if($page < 1 + ($adjacent*2)){
                                    for($counter = 1; $counter < 4 + ($adjacent*2); $counter++){
                                        if($counter == $page) $pagination .= "<li class=\"aktif\">$counter</li>";
                                        else $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                    }
                                    $pagination .= "...";
                                    $pagination .= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                    $pagination .= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                } elseif ($lastpage - ($adjacent * 2) >  $page && $page > ($adjacent*2)){
                                    $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                    $pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
                                    $pagination.= "...";
                                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++){
					if ($counter == $page) $pagination.= "<li class=\"aktif\">$counter</li>";
					else $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                    }
                                    $pagination.= "...";
                                    $pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
                                    $pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";
                                } else {
                                    $pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
                                    $pagination.= "<li><a href=\"$targetpage?page=2\">2</a><li>";
                                    $pagination.= "...";
                                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++){
					if ($counter == $page)	$pagination.= "<li class=\"aktif\">$counter</li>";
					else $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
                                    }
                                }
                            }
                            if ($page < $counter - 1) $pagination.= "<li class=\"next\"><a href=\"$targetpage?page=$next\">Next ></a></li>";
                            else $pagination.= "<li class=\"next-off\">Next ></li>";
                            $pagination.= "</ul>\n";
                        }

                        while ($q = mysql_fetch_array($sql)) {
                   ?>
                   <tr class="ganjil">
                            <td align="center"><?php echo $i++; ?></td>
                            <td><div align="left"><a href="<?php echo "biodata_anak.php?id=$q[id]" ?>"><?php echo $q['nama']; ?></a></div></td>
                            <td><?php include "umur.php" ?></td>
                            <td><?php echo $q['berat']; ?></td>
                            <td><?php echo $q['panjang']; ?></td>
                            <td><?php echo $q['nama_ayah']; ?></td>
                            <td><?php echo $q['nama_ibu']; ?></td>
                            <td>Jalan <?php echo $q['jalan'] . " RT " . $q['rt'] . " RW " . $q['rw'] . " Desa " . $q['desa'] ?></td>
                    </tr>
                    <?php } ?>
                   </table>
                    <?=$pagination?>
                </div>
                
            </div>
	</div>
<?php require 'footer.php';?>