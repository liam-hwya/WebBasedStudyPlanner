<?php

    //date time
    $dateYM = date('Y-m');
    $TimeStamp = strtotime($dateYM . '-01');
    if ($TimeStamp === false) {
        $dateYM = date('Y-m');
        $TimeStamp = strtotime($dateYM . '-01');
    }
    $todayDate=date('F, Y', $TimeStamp);
    $dfToday="d".date('Ymd');
    $forDformat=date('Ymd');
    $todayDformat="d".$forDformat;
    $nextDformat=date('Ymd');
    $nextD=$nextDformat+1;
    $nextdformat="d".$nextD;

?>