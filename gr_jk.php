 <?php
   $arrJK[0][1] = "Perempuan";
   $arrJK[1][1] = "Laki-Laki";
   $jumlah_laki = mysql_fetch_array(mysql_query("SELECT * FROM bayi WHERE jenis_kelamin='L'"));
   $jumlah_perempuan = mysql_fetch_array(mysql_query("SELECT * FROM bayi WHERE jenis_kelamin='P'"));

   $arrJK[0][2] = $jumlah_perempuan[0];
   $arrJK[1][2] = $jumlah_laki[0];
   $JK = "<chart caption='Peserta Posyandu Bulan Ini' xAxisName='Umur' baseFontSize='12' yAxisName='Berat' yAxisMinValue='0' yAxisMaxValue='30' adjustDiv='0' numDivLines='0' bgSWF='ffffff' canvasBgAlpha='100' canvasBorderColor='ffffff' canvasBorderThickness='3'>";
   //Convert data to XML and append
   foreach ($arrJK as $arSubData2)
      $JK .= "<set label='" . $arSubData2[1] . "' value='" . $arSubData2[2] . "' />";
   //Close <chart> element
   $JK .= "</chart>";
?>