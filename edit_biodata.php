<?php
require "loginkah.php";
require 'dbcon.php';
require './header.php';
include("FusionCharts.php");
include 'gr_status_gizi.php';
include 'gr_kehadiran.php';
require 'fungsi.php';
$bayi = get_bayi($_GET['id']);
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
        <form method="post" action="proses_edit_biodata.php">
            <input type="hidden" name="id" value="<?php echo $bayi['id']?>" />
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
                    <td><input name="namaAnak" size="25" value="<?php echo $bayi['nama']?>" maxlength="35" type="text"></td>
                  </tr>
                  <tr class="alt">
                    <td>Tanggal Lahir <span id="req_9" class="req">*</span>:</td>
                    <?php $tgl = pecah_tanggal($bayi['tgl_lahir']);?>
                    <td>
                        <select name="tgl">
                                <?php $i = 1; for($i=1; $i<=31; $i++){ ?>
                            <option value="<?php echo $i;?>" <?php cek_option($tgl['tgl'], $i)?>><?php echo $i;?></option>
                                <?php }?>
                        </select>
                        <select name="bln">
                            <option value="1"<?php cek_option($tgl['bln'], 1)?>>Januari</option>
                            <option value="2"<?php cek_option($tgl['bln'], 2)?>>Februari</option>
                            <option value="3"<?php cek_option($tgl['bln'], 3)?>>Maret</option>
                            <option value="4"<?php cek_option($tgl['bln'], 4)?>>April</option>
                            <option value="5"<?php cek_option($tgl['bln'], 5)?>>Mei</option>
                            <option value="6"<?php cek_option($tgl['bln'], 6)?>>Juni</option>
                            <option value="7"<?php cek_option($tgl['bln'], 7)?>>Juli</option>
                            <option value="8"<?php cek_option($tgl['bln'], 8)?>>Agustus</option>
                            <option value="9"<?php cek_option($tgl['bln'], 9)?>>September</option>
                            <option value="10"<?php cek_option($tgl['bln'], 10)?>>Oktober</option>
                            <option value="11"<?php cek_option($tgl['bln'], 11)?>>November</option>
                            <option value="12"<?php cek_option($tgl['bln'], 12)?>>Desember</option>
                       </select>
                       <select name="thn">
                            <?php for($i=2004; $i <= 2011; $i++){ ?>
                            <option value="<?php echo $i?>"<?php cek_option($tgl['tahun'], $i)?>><?php echo $i;?></option>
                            <?php }?>
                        </select>
                  </td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin <span id="req_9" class="req">*</span>:</td>
                    <td>
                        <input type="radio" value="L"<?php cek_radio($bayi['jenis_kelamin'], "L")?> name="jk" id="jk">
                        laki-laki
                        <input type="radio" value="P"<?php cek_radio($bayi['jenis_kelamin'], "P")?> name="jk" id="jk">
                        perempuan
                    </td>
                  </tr>
                  <tr class="alt">
                    <td class="left">Berat Badan Waktu Lahir:</td>
                    <?php $berat = explode(".", $bayi['berat']); if($berat[1]=="") $berat[1]=0;?>
                    <td>
                        <select name="bb_1">
                           <?php for($i=0; $i <= 8; $i++){ ?>
                            <option value="<?php echo $i;?>"<?php cek_option($berat[0], $i)?>><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <span><b>.</b></span>
                        <select name="bb_2">
                           <?php for($i=0; $i <= 9; $i++){ ?>
                           <option value="<?php echo $i;?>"<?php cek_option($berat[1], $i)?>><?php echo $i;?></option>
                           <?php }?>
                        </select>
                        <span>kg</span>
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
                      <td><input name="nama_ayah" size="30" maxlength="90" value="<?php echo $bayi['nama_ayah']?>" type="text"></td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                  </tr>
                  <tr class="alt">
                    <td class="left">Pekerjaan:</td>
                    <td><input type="radio" value="PNS"<?php cek_radio($bayi['pekerjaan_ayah'], "PNS")?> name="pekerjaan_ayah" id="pekerjaan_ayah">PNS</td>
                    <td><input type="radio" value="Wiraswasta"<?php cek_radio($bayi['pekerjaan_ayah'], "Wiraswasta")?> name="pekerjaan_ayah" id="pekerjaan_ayah">Wiraswasta</td>
                    <td><input type="radio" value="PegawaiSwasta"<?php cek_radio($bayi['pekerjaan_ayah'], "PegawaiSwasta")?> name="pekerjaan_ayah" id="pekerjaan_ayah">Pegawai Swasta</td>
                  </tr>
                  <tr class="alt">
                     <td class="left"></td>
                     <td><input type="radio" value="TidakBekerja"<?php cek_radio($bayi['pekerjaan_ayah'], "TidakBekerja")?> name="pekerjaan_ayah" id="pekerjaan_ayah"> Tidak Bekerja</td>
                     <td><input type="radio" value="LainLain"<?php cek_radio($bayi['pekerjaan_ayah'], "LainLain")?> name="pekerjaan_ayah" id="pekerjaan_ayah">Lain-lain</td>
                     <td> </td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Penghasilan</td>
                      <td><input type="radio" value="1"<?php cek_radio($bayi['penghasilan_ayah'], "1")?> name="penghasilan_ayah" id="penghasilan_ayah">< Rp 500.000</td>
                      <td colspan="2"><input type="radio" value="2"<?php cek_radio($bayi['penghasilan_ayah'], "2")?> name="penghasilan_ayah" id="penghasilan_ayah"> Rp 500.000 - Rp 1.000.000</td>
                  </tr>
                  <tr class="alt">
                      <td></td>
                      <td><input type="radio" value="3"<?php cek_radio($bayi['penghasilan_ayah'], "3")?> name="penghasilan_ayah" id="penghasilan_ayah"> Rp 500.000 - Rp 1.000.000</td>
                      <td colspan="2"><input type="radio" value="4"<?php cek_radio($bayi['penghasilan_ayah'], "4")?> name="penghasilan_ayah" id="penghasilan_ayah"> Rp 1.000.000 - Rp 2.500.000</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td colspan="3"><input type="radio" value="5"<?php cek_radio($bayi['penghasilan_ayah'], "5")?> name="penghasilan_ayah" id="penghasilan_ayah"> > Rp 2.500.000</td>
                  </tr>
                  <tr>
                      <td colspan="4"><b>Ibu</b></td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Nama<span id="req_9" class="req">*</span>:</td>
                      <td><input name="nama_ibu" value="<?php echo $bayi['nama_ibu']?>" size="30" maxlength="90" type="text"></td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                  </tr>
                  <tr class="alt">
                    <td class="left">Pekerjaan:</td>
                    <td><input type="radio" value="PNS"<?php cek_radio($bayi['pekerjaan_ibu'], "PNS")?> name="pekerjaan_ibu" id="pekerjaan_ibu">PNS</td>
                    <td><input type="radio" value="Wiraswasta"<?php cek_radio($bayi['pekerjaan_ibu'], "Wiraswasta")?> name="pekerjaan_ibu" id="pekerjaan_ibu">Wiraswasta</td>
                    <td><input type="radio" value="PegawaiSwasta"<?php cek_radio($bayi['pekerjaan_ibu'], "PegawaiSwasta")?> name="pekerjaan_ibu" id="pekerjaan_ibu">Pegawai Swasta</td>
                  </tr>
                  <tr class="alt">
                     <td class="left"></td>
                     <td><input type="radio" value="TidakBekerja"<?php cek_radio($bayi['pekerjaan_ibu'], "TidakBekerja")?> name="pekerjaan_ibu" id="pekerjaan_ibu"> Tidak Bekerja</td>
                     <td><input type="radio" value="LainLain"<?php cek_radio($bayi['pekerjaan_ibu'], "LainLain")?> name="pekerjaan_ibu" id="pekerjaan_ibu">Lain-lain</td>
                     <td> </td>
                  </tr>
                  <tr class="alt">
                      <td class="left">Penghasilan</td>
                      <td><input type="radio" value="1" name="penghasilan_ibu"<?php cek_radio($bayi['penghasilan_ibu'], "1")?> id="penghasilan_ibu">< Rp 500.000</td>
                      <td colspan="2"><input type="radio" value="2"<?php cek_radio($bayi['penghasilan_ibu'], "2")?> name="penghasilan_ibu" id="penghasilan_ibu"> Rp 500.000 - Rp 1.000.000</td>
                  </tr>
                  <tr class="alt">
                      <td></td>
                      <td><input type="radio" value="3"<?php cek_radio($bayi['penghasilan_ibu'], "3")?> name="penghasilan_ibu" id="penghasilan"> Rp 500.000 - Rp 1.000.000</td>
                      <td colspan="2"><input type="radio" value="4"<?php cek_radio($bayi['penghasilan_ibu'], "4")?> name="penghasilan_ibu" id="penghasilan"> Rp 1.000.000 - Rp 2.500.000</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td colspan="3"><input type="radio" value="5"<?php cek_radio($bayi['penghasilan_ibu'], "5")?> name="penghasilan_ibu" id="penghasilan_ayah"> > Rp 2.500.000</td>
                  </tr>
                </tbody>
            </table>
            <h2>Alamat</h2>
            <table>
                <tbody>
                  <tr >
                    <td class="left">Jalan <span id="req_9" class="req">*</span>:</td>
                    <td><input name="jalan" size="25" type="text" value="<?php echo $bayi['jalan']?>" /></td>
                  </tr>
                  <tr class="alt">
                    <td>RT/RW <span id="req_9" class="req">*</span>:</td>
                    <td>
                                        <input name="rt" size="2" maxlength="2" type="text" value="<?php echo $bayi['rt']?>" />
                                        <span> / </span>
                                        <input name="rw" size="2" maxlength="2" type="text" value="<?php echo $bayi['rw']?>" />
                                </td>
                  </tr>
                  <tr >
                    <td>Kode Pos:</td>
                    <td><input name="kode_pos" size="6" maxlength="6" type="text" value="<?php echo $bayi['kode_pos']?>" /></td>
                  </tr>
                  <tr class="alt">
                    <td>Kecamatan:</td>
                    <td><input name="kecamatan" size="25" type="text" value="<?php echo $bayi['kecamatan']?>" /></td>
                  </tr>
                  <tr >
                    <td>Kelurahan:</td>
                    <td><input name="desa" size="25" type="text"  value="<?php echo $bayi['desa']?>" /></td>
                  </tr>
                  <tr class="alt">
                    <td>Kabupaten / Kota:</td>
                    <td><input name="kota" size="25" type="text" value="<?php echo $bayi['kota']?>"></td>
                  </tr>
                          <tr >
                    <td>Propinsi:</td>
                    <td><input name="propinsi" size="25" type="text"  value="<?php echo $bayi['propinsi']?>"></td>
                  </tr>
                  <tr class="alt">
                    <td>No. Telepon:</td>
                    <td>
                        <input name="phone" size="10" type="text" value="<?php echo $bayi['telp']?>">
                             
                  </tr>
                </tbody>
              </table>
            <input name="submit" value="Update" type="submit" >
      </form>
    </div>
</div>
</div>
<?php require 'footer.php';?>