<?php

    session_start();
    if(!$_SESSION['UTuser']){
        header("location:../utime.php");
    }

?>