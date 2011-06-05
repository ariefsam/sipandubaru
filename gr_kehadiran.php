<?php 
// kehadiran peserta
   $nama_bulan = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agt","Sept","Okt","Nov","Des");
   for($i = 0; $i<13; $i++){
          $arr_kehadiran[$i][1] = $nama_bulan[$i];
          $arr_kehadiran[$i][2] = $i+35;
    }
   $kehadiran = "<chart caption='Tahun 2011' baseFontSize='$x' xAxisName='Bulan' yAxisName='Jumlah' yAxisMinValue='0' yAxisMaxValue='50' adjustDiv='0' numDivLines='0' bgSWF='ffffff' canvasBgAlpha='100' canvasBorderColor='ffffff' canvasBorderThickness='3' labelDisplay='ROTATE'>";
   foreach ($arr_kehadiran as $arSubData1)
      $kehadiran .= "<set label='" . $arSubData1[1] . "' value='" . $arSubData1[2] . "' />";
   //Close <chart> element
   $kehadiran .= "</chart>";
   ?>