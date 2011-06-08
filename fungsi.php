<?php

function cek_radio($a,$b){
    if($a==$b) echo " checked";
    else echo "";
}

function cek_option($a,$b){
    if($a==$b) echo " selected";
    else echo "";
}

function pecah_tanggal($date)
{
    $pecah = explode("-", $date);
    $data = array(
        "tgl" => $pecah[2],
        "bln" => $pecah[1],
        "thn" => $pecah[0],
        "tanggal" => $pecah[2],
        "bulan" => $pecah[1],
        "tahun" => $pecah[0],
        "0" => $pecah[2],
        "1" => $pecah[1],
        "2" => $pecah[0],
    );
    return $data;
}

function datediff($tgl1, $tgl2) {
    $tgl1 = strtotime($tgl1);
    $tgl2 = strtotime($tgl2);
    $diff_secs = abs($tgl1 - $tgl2);
    $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
    $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
    return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
}
function highlight_kriteria_cari($hasil_cari, $kriteria_cari, $cetak_tebal='bold') {
        $start_tag = "<span style=' font-weight: $cetak_tebal'>";
        $end_tag = '</span>';
        $highlight_cari = $start_tag . $kriteria_cari . $end_tag;
        return eregi_replace($kriteria_cari, $highlight_cari, $hasil_cari);
}
function get_bayi($id){
    $queri = mysql_fetch_array(mysql_query("SELECT * FROM bayi WHERE id=$id"));
    return $queri;
}

function jenis_kelamin($jk){
    if($jk=="L")
    {
        return "Laki-laki";
    }
    else
        return "Perempuan";
}

function get_berat_tinggi($id){
    $data = array();
    $queri = mysql_query("SELECT * FROM pemeriksaan WHERE id_bayi=$id order by umur");
    if(mysql_num_rows($queri)>0){
        while ($q = mysql_fetch_array($queri)){
            $data[] = $q;
        }
    }
    return $data;
}
function edit_berat_tinggi($id,$tgl,$brt,$umur){
    $query = mysql_query("UPDATE pemeriksaan SET tanggal='$tgl',berat=$brt,umur=$umur WHERE id=$id");
    if($query) return 1;
    else return 0;
}
function vitamin(){
    $data = array();
    $as = mysql_query("SELECT * FROM jenis_vitamin order by id asc");
    if( mysql_num_rows($as)>0){
        while ($q = mysql_fetch_array($as)) {
            $data[] = $q;
        }
    }
    return $data;
}
function nama_vitamin($id){
    $tes = mysql_fetch_array(mysql_query("SELECT * FROM jenis_vitamin WHERE id=$id order by id asc"));
    return $tes['nama'];
}
function jenis_vitamin(){
    $data = array();
    $as = mysql_query("SELECT * FROM vitamin order by id");
    if( mysql_num_rows($as)>0){
        while ($q = mysql_fetch_array($as)) {
            $data[] = $q;
        }
    }
    return $data;
}
/*
function edit_vitamin($id_vitamin, $nama, $ditemukan){
    $queri = mysql_query("UPDATE jenis_vitamin SET nama='$nama', ditemukan_pada='$ditemukan' WHERE id=$id_vitamin");
    if($queri) return 1;
    else return 0;
}
*/
function edit_periksa_vitamin($id,$tanggal,$vitamin){
    $query = mysql_query("UPDATE vitamin SET tanggal='$tanggal', id_vitamin=$vitamin WHERE id=$id");
    if($query) return 1;
    else return 0;
}
function from_date($date){
    $data = explode("-", $date);
    $bulan = array(
        "error",
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    return $data[2] . " " . $bulan[intval($data[1])] . " " . $data[0];
}

function to_date($string){
    $data = explode(" ", $string);
    $bulan = array(
        "Januari"   => "01",
        "Februari"  => "02",
        "Maret"     => "03",
        "April"     => "04",
        "Mei"       => "05",
        "Juni"      => "06",
        "Juli"      => "07",
        "Agustus"   => "08",
        "September" => "09",
        "Oktober"   => "10",
        "November"  => "11",
        "Desember"  => "12"
    );
    return $data[2] . "-" . $bulan[$data[1]] . "-" . $data[0];
}
function periksa_imunisasi(){
    $data = array();
    $kueri = mysql_query("SELECT * FROM imunisasi order by id");
    if(mysql_num_rows($kueri) > 0){
        while($k = mysql_fetch_array($kueri)){
            $data[] = $k;
        }
    }
    return $data;
}
function nama_imun($id){
    $imun = mysql_fetch_array(mysql_query("SELECT * FROM jenis_imunisasi WHERE id=$id order by id asc"));
    return $imun["nama"];
}
/*
function edit_imunisasi($id_imunisasi, $nama, $kegunaan){
    $queri = mysql_query("UPDATE jenis_imunisasi SET nama='$nama', kegunaan='$kegunaan' WHERE id=$id_imunisasi");
    if($queri) return 1;
    else return 0;
}
*/
function edit_input_imunisasi($imun, $id_imun, $tanggal)
{
    $queri = mysql_query("UPDATE imunisasi SET id_imunisasi='$imun' , tanggal='$tanggal' WHERE id=$id_imun");
    if($queri) return 1;
    else return 0;
}

function imunisasi(){
    $data = array();
    $as = mysql_query("SELECT * FROM jenis_imunisasi order by id asc");
    if( mysql_num_rows($as)>0){
        while ($q = mysql_fetch_array($as)) {
            $data[] = $q;
        }
    }
    return $data;
}
function get_berita($id){
    $query = mysql_fetch_array(mysql_query("SELECT * FROM berita WHERE id_berita=$id"));
    return $query;
}
function get_petugas($id){
    $query = mysql_fetch_array(mysql_query("SELECT * FROM petugas WHERE id_petugas=$id"));
    return $query;
}
function get_relasi1($id){
    $data = array();
    $query = mysql_query("SELECT * FROM bayi_berita WHERE id_berita=$id");
    if(mysql_num_rows($query)>0){
        while($q = mysql_fetch_array($query)){
            $data[] = $q;
        }
    }
    return $data;
}
function get_relasi2($id){
    $d = array();
    $queri = mysql_query("SELECT * FROM petugas_berita WHERE id_berita=$id");
    if(mysql_num_rows($queri)>0){
        while($q = mysql_fetch_array($queri)){
            $d[] = $q;
        }
    }
    return $d;
}
function nama_bayi($id){
    $b = mysql_fetch_array(mysql_query("SELECT * FROM bayi WHERE id=$id order by id asc"));
    return $b['nama'];
}
function nama_petugas($id){
    $p = mysql_fetch_array(mysql_query("SELECT * FROM petugas WHERE id_petugas=$id order by id_petugas asc"));
    return $p['nama_petugas'];
}
function tanggalan(){
    //$month=date("m");
    //$year=date("Y");
    //$day=date("d");
    //$endDate=date("t",mktime(0,0,0,$month,$day,$year));
    //echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year));
    $hari=date(w,time());
    $tanggal=date(d,time());
    $bulan=date(m,time());
    $tahun=date(Y,time());

    switch ($hari) {
        case 0: $hari="Minggu"; break;
        case 1: $hari="Senin"; break;
        case 2: $hari="Selasa"; break;
        case 3: $hari="Rabu"; break;
        case 4: $hari="Kamis"; break;
        case 5: $hari="Jum'at"; break;
        case 6: $hari="Sabtu"; break;
    }
    switch ($bulan) {
        case 01: $bulan="Januari"; break;
        case 02: $bulan="Februari"; break;
        case 03: $bulan="Maret"; break;
        case 04: $bulan="April"; break;
        case 05: $bulan="Mei"; break;
        case 06: $bulan="Juni"; break;
        case 07: $bulan="Juli"; break;
        case 08: $bulan="Agustus"; break;
        case 09: $bulan="September"; break;
        case 10: $bulan="Oktober"; break;
        case 11: $bulan="November"; break;
        case 12: $bulan="Desember"; break;
    }
    echo "$hari, $tanggal $bulan $tahun";
}