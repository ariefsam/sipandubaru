<?php
$id_bayi = $_GET['id'];
$bayi = get_bayi($id_bayi);
$data = get_berat_tinggi($id);

$queri = mysql_query("SELECT * FROM pemeriksaan where id_bayi=$id_bayi");
$umur = 60;



for($a=0; $a<=36; $a++)
{
    $arrData[$a][1] = $a;
    
        if($data[$a]['berat']){

            $arrData[$a][2] = $data[$a]['berat'];
            $arrData[$a][3] = "Bagus";
        }
        else
        {
           $arrData[$a][2] = "";
           $arrData[$a][3] = "";
        }
    

}

print_r($arrData);

//while($q = mysql_fetch_array($queri)){
//      $arr_umur[$i][1] = $q['berat'];
//      $arr_umur[$i][2] = $i+2.5;
//      $arr_umur[$i][3] = 'Status gizi : Baik';
//      $i++;
//}
$strXML = "<chart bgSWF='images/grafik_kms.jpg' baseFontSize='11' canvasBgAlpha='0' numberPrefix='' xAxisName='Umur (bulan)' yAxisName='berat' yAxisMaxValue='30' xAxisMaxValue='60'decimals='1' >";
//Convert data to XML and append
foreach ($arrData as $arSubData2)
  $strXML .= "<set label='" . $arSubData2[1] . "' value='" . $arSubData2[2] . "' tooltext=' " . $arSubData2[3] . " '/>";
$strXML .= "</chart>";
?>