 <?php
   $arrAbs[0][1] = "Petugas 1";
   $arrAbs[1][1] = "Petugas 2";
   $arrAbs[2][1] = "Petugas 3";
   $arrAbs[3][1] = "Petugas 4";
   $arrAbs[4][1] = "Petugas 5";
   $arrAbs[5][1] = "Petugas 6";

   $arrAbs[0][2] = "9";
   $arrAbs[1][2] = "12";
   $arrAbs[2][2] = "12";
   $arrAbs[3][2] = "10";
   $arrAbs[4][2] = "11";
   $arrAbs[5][2] = "10";

   $Absensi = "<chart caption='Absensi Petugas' baseFontSize='15' canvasBgAlpha='0' xAxisName='Kehadiran' yAxisName='Petugas' yAxisMinValue='0' yAxisMaxValue='20' adjustDiv='0' numDivLines='0'  canvasBorderColor='ffffff' canvasBorderThickness='3'>";
   //Convert data to XML and append
   foreach ($arrAbs as $arSubData3)
      $Absensi .= "<set label='" . $arSubData3[1] . "' value='" . $arSubData3[2] . "' />";
   //Close <chart> element
   $Absensi.= "</chart>";
?>