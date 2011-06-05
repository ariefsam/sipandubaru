 <?php
   $arrJK[0][1] = "Perempuan";
   $arrJK[1][1] = "Laki-Laki";

   $arrJK[0][2] = 13;
   $arrJK[1][2] = 36;
   
   $JK = "<chart  xAxisName='Umur' yAxisName='Berat' yAxisMinValue='0' yAxisMaxValue='30' adjustDiv='0' numDivLines='0' bgSWF='ffffff' canvasBgAlpha='100' canvasBorderColor='ffffff' canvasBorderThickness='3'>";
   //Convert data to XML and append
   foreach ($arrJK as $arSubData2)
      $JK .= "<set label='" . $arSubData2[1] . "' value='" . $arSubData2[2] . "' />";
   //Close <chart> element
   $JK .= "</chart>";
?>