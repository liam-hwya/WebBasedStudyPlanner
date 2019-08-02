<?php
    session_start();
    unset($_SESSION['UTuser']);
    header("location:../index.php");
?>