<?php 
    $host="localhost";
    $user="root";
    $pass="";
    //connection
    $con=mysqli_connect($host,$user,$pass) or die(mysqli_error());
    //db selection
    mysqli_select_db($con,"utime");
?>