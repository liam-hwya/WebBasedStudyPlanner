<?php
    session_start();
    unset($_SESSION['UTadmin']);
    header("location:index.php");
?>