 <?php
 $arrData[0][1] = "Buruk";
   $arrData[1][1] = "Kurang";
   $arrData[2][1] = "Normal";
   $arrData[3][1] = "Lebih";

   $arrData[0][2] = 13;
   $arrData[1][2] = 36;
   $arrData[2][2] = 10;
   $arrData[3][2] = 23;

   $strXML = "<chart caption='Status Gizi Anak' yAxisMinValue='0' yAxisMaxValue='30' adjustDiv='0' numDivLines='0' bgSWF='ffffff' canvasBgAlpha='100' canvasBorderColor='ffffff' canvasBorderThickness='3'>";
   //Convert data to XML and append
   foreach ($arrData as $arSubData)
      $strXML .= "<set label='" . $arSubData[1] . "' value='" . $arSubData[2] . "' />";
   //Close <chart> element
   $strXML .= "</chart>";
?>