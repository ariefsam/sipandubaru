    <div id="sidebar">
             <div id="kotak"><h2><span style="font-size: 20px;"><b><a href="#"><?php echo $bayi['nama'] ?></a></b></span></h2>

                            <br/><br/>
                            <ul>
                                <li class='current'><a href="biodata_anak.php?id=<?php echo $id; ?>">Biodata Anak</a></li>
                                <li><a href="catatan_periksa.php?id=<?php echo $id; ?>">Catatan Pemeriksaan</a></li>
                                <ol>
                                    <li><a href="input_berat.php?id=<?php echo $id; ?>">Berat</a></li>
                                    <li><a href="input_vitamin.php?id=<?php echo $id; ?>">Vitamin</a></li>
                                    <li><a href="input_imunisasi.php?id=<?php echo $id; ?>">Imunisasi</a></li>
                                    <li><a href="input_asi_riwayat.php">ASI dan Riwayat Kesehatan</a></li>
                                </ol>

                                <li><a href="grafik.php?id=<?php echo $id; ?>" >Grafik Perkembangan</a></li>
                                <li><a href="capaian.php" >Capaian Perkembangan</a></li>
                            </ul>
              </div>
        <div id="kotak">
            <h2>Informasi Penting</h2>
                <p>Pelayan Kesehatan yang harus diberikan bulan ini:</p>
                <ul><li>Imunisasi Polio</li>
                    <li>Vitamin A</li>
                </ul>
        </div>
    </div>