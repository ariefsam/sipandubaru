<?php
    $tgl1 = $q['tgl_lahir'];
    $tgl2 = date("Y/m/d/ h:m:s");
    $a = datediff($tgl1, $tgl2);
    echo $a[years].' tahun '.$a[months].' bulan ';
?>