 <?php

 $umur = 60;
   for($i = 0; $i<$umur; $i++){
          $arr_umur[$i][1] = $i;
          $arr_umur[$i][2] = $i+2.5;
          $arr_umur[$i][3] = 'Status gizi : Baik';

    }
   $strXML = "<chart bgSWF='images/grafik_kms.jpg' baseFontSize='11' canvasBgAlpha='0' numberPrefix='' xAxisName='Umur (bulan)' yAxisName='berat' yAxisMaxValue='30' xAxisMaxValue='60'decimals='1' >";
   //Convert data to XML and append
   foreach ($arr_umur as $arSubData2)
      $strXML .= "<set label='" . $arSubData2[1] . "' value='" . $arSubData2[2] . "' tooltext=' " . $arSubData2[3] . " '/>";
   $strXML .= "</chart>";
?>