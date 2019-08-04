<?php

    session_start();
    $dayPgStatus=$_POST['dayPgStatus'];
    $monthPgStatus=$_POST['monthPgStatus'];
    $_SESSION['dayPgStatus']=$dayPgStatus;
    $_SESSION['monhtPgStatus']=$monthPgStatus;
    echo $_SESSION['dayPgStatus'];

?>