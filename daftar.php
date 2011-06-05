<?php
require "loginkah.php";
require 'dbcon.php';
require './header.php';
include("FusionCharts.php");
include 'gr_status_gizi.php';
include 'gr_kehadiran.php';
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
                <div id="kotak">
                    <h2>Informasi Penting</h2>
                    <p>Pelayan Kesehatan yang harus diberikan bulan ini:</p>
                    <ul><li>Imunisasi Polio</li>
                        <li>Vitamin A</li>
                    </ul>
                </div>
</div>
<div id="content">
    <div id="content-top">
        <form method="post" action="proses_daftar.php">
            <div><label class="ket">Nama Posyandu:</label>
              Bateng
            </div>
            <div><label class="ket">Tanggal Pendaftaran:</label>
              26 Januari 2011
            </div>
            <h2>Data Anak</h2>
            <table id="daftar">
                <tbody>
                    <tr class="head">
                    <td>Nama Anak<span id="req_9" class="req">*</span>:</td>
                    <td><input name="namaAnak" size="25" value="" maxlength="35" type="text"></td>
                  </tr>
                  <tr class="alt">
                    <td>Tanggal Lahir <span id="req_9" class="req">*</span>:</td>
                    <td>
                        <select name="tgl">
                                <?php $i = 1; for($i=1; $i<=31; $i++){ ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php }?>
                        </select>
                        <select name="bln">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                       </select>
                       <select name="thn">
                            <?php for($i=2004; $i <= 2011; $i++){ ?>
                            <option value="1"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                  </td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin <span id="req_9" class="req">*</span>:</td>
                    <td>
                        <input type="radio" value="L" name="jk" id="jk">
                        laki-laki
                        <input type="radio" value="P" name="jk" id="jk">
                        perempuan
                    </td>
                  </tr>
                  <tr class="alt">
                    <td class="left">Berat Badan Waktu Lahir:</td>
                    <td>
                        <select name="bb_1">
                           <?php for($i=0; $i <= 3; $i++){ ?>
                           <option value="1"><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <select name="bb_2">
                           <?php for($i=0; $i <= 9; $i++){ ?>
                           <option value="1"><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <span><b>.</b></span>
                        <select name="bb_2">
                           <?php for($i=0; $i <= 9; $i++){ ?>
                           <option value="1"><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <span>kg</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="left">Panjang Badan Waktu Lahir:</td>
                    <td>
                        <select name="panjang_1">
                           <?php for($i=1; $i <= 7; $i++){ ?>
                           <option value="1"><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <select name="panjang_2">
                           <?php for($i=0; $i <= 9; $i++){ ?>
                           <option value="1"><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <span>cm</span>
                   </td>
                  </tr>
                </tbody>
            </table>
            <h2>Data Orang Tua</h2>
            <table>
                <tbody>
                  <tr>
                      <td colspan="4"><b>Ayah</b></td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Nama<span id="req_9" class="req">*</span>:</td>
                      <td><input name="nama_ayah" size="30" maxlength="90" type="text"></td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                  </tr>
                  <tr class="alt">
                    <td class="left">Pekerjaan:</td>
                    <td><input type="radio" value="PNS" name="pekerjaan_ayah" id="pekerjaan_ayah">PNS</td>
                    <td><input type="radio" value="Wiraswasta" name="pekerjaan_ayah" id="pekerjaan_ayah">Wiraswasta</td>
                    <td><input type="radio" value="PegawaiSwasta" name="pekerjaan_ayah" id="pekerjaan_ayah">Pegawai Swasta</td>
                  </tr>
                  <tr class="alt">
                     <td class="left"></td>
                     <td><input type="radio" value="TidakBekerja" name="pekerjaan_ayah" id="pekerjaan_ayah"> Tidak Bekerja</td>
                     <td><input type="radio" value="LainLain" name="pekerjaan_ayah" id="pekerjaan_ayah">Lain-lain</td>
                     <td> </td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Penghasilan</td>
                      <td><input type="radio" value="min_500" name="penghasilan_ayah" id="penghasilan_ayah">< Rp 500.000</td>
                      <td colspan="2"><input type="radio" value="500_1000" name="penghasilan_ayah" id="penghasilan_ayah"> Rp 500.000 - Rp 1.000.000</td>
                  </tr>
                  <tr class="alt">
                      <td></td>
                      <td><input type="radio" value="500_1000" name="penghasilan_ayah" id="penghasilan_ayah"> Rp 500.000 - Rp 1.000.000</td>
                      <td colspan="2"><input type="radio" value="1000_2500" name="penghasilan_ayah" id="penghasilan_ayah"> Rp 1.000.000 - Rp 2.500.000</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td colspan="3"><input type="radio" value="max_2500" name="penghasilan_ayah" id="penghasilan_ayah"> > Rp 2.500.000</td>
                  </tr>
                  <tr>
                      <td colspan="4"><b>Ibu</b></td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Nama<span id="req_9" class="req">*</span>:</td>
                      <td><input name="nama_ayah" size="30" maxlength="90" type="text"></td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                  </tr>
                  <tr class="alt">
                    <td class="left">Pekerjaan:</td>
                    <td><input type="radio" value="PNS" name="pekerjaan_ayah" id="pekerjaan_ibu">PNS</td>
                    <td><input type="radio" value="Wiraswasta" name="pekerjaan_ibu" id="pekerjaan_ibu">Wiraswasta</td>
                    <td><input type="radio" value="PegawaiSwasta" name="pekerjaan_ibu" id="pekerjaan_ibu">Pegawai Swasta</td>
                  </tr>
                  <tr class="alt">
                     <td class="left"></td>
                     <td><input type="radio" value="TidakBekerja" name="pekerjaan_ibu" id="pekerjaan_ibu"> Tidak Bekerja</td>
                     <td><input type="radio" value="LainLain" name="pekerjaan_ibu" id="pekerjaan_ibu">Lain-lain</td>
                     <td> </td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Penghasilan</td>
                      <td><input type="radio" value="min_500" name="penghasilan_ibu" id="penghasilan_ibu">< Rp 500.000</td>
                      <td colspan="2"><input type="radio" value="500_1000" name="penghasilan_ibu" id="penghasilan_ibu"> Rp 500.000 - Rp 1.000.000</td>
                  </tr>
                  <tr class="alt">
                      <td></td>
                      <td><input type="radio" value="500_1000" name="penghasilan_ibu" id="penghasilan"> Rp 500.000 - Rp 1.000.000</td>
                      <td colspan="2"><input type="radio" value="1000_2500" name="penghasilan_ibu" id="penghasilan"> Rp 1.000.000 - Rp 2.500.000</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td colspan="3"><input type="radio" value="max_2500" name="penghasilan_ayah" id="penghasilan_ayah"> > Rp 2.500.000</td>
                  </tr>
                </tbody>
            </table>
            <h2>Alamat</h2>
            <table>
                <tbody>
                  <tr >
                    <td class="left">Jalan <span id="req_9" class="req">*</span>:</td>
                    <td><input name="jalan" size="25" type="text"></td>
                  </tr>
                  <tr class="alt">
                    <td>RT/RW <span id="req_9" class="req">*</span>:</td>
                    <td>
                                        <input name="rt" size="2" maxlength="2" type="text">
                                        <span> / </span>
                                        <input name="rw" size="2" maxlength="2" type="text">
                                </td>
                  </tr>
                  <tr >
                    <td>Kode Pos:</td>
                    <td><input name="kode_pos" size="6" maxlength="6" type="text"></td>
                  </tr>
                  <tr class="alt">
                    <td>Kecamatan:</td>
                    <td><input name="kecamatan" size="25" type="text"></td>
                  </tr>
                  <tr >
                    <td>Kelurahan:</td>
                    <td><input name="desa" size="25" type="text"></td>
                  </tr>
                  <tr class="alt">
                    <td>Kabupaten / Kota:</td>
                    <td><input name="kota" size="25" type="text"></td>
                  </tr>
                          <tr >
                    <td>Propinsi:</td>
                    <td><input name="propinsi" size="25" type="text"></td>
                  </tr>
                  <tr class="alt">
                    <td>No. Telepon:</td>
                    <td>
                                        <input name="phone" size="4" type="text">
                                        <span> - </span>
                                        <input name="phone2" size="9" maxlength="9" type="text">
                                </td>
                  </tr>
                </tbody>
              </table>
            <input name="submit" value="Daftar" type="submit" >
      </form>
    </div>
</div>
</div>
<?php require 'footer.php';?>