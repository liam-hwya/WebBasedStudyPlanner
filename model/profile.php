<?php
    
    include("auth.php");
    include("getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $firstName=userData($UTuser,'firstName');
    $lastName=userData($UTuser,'lastName');
    $name=$firstName." ".$lastName;
    $passions=userData($UTuser,'passions');
    $passions=unserialize($passions);
    
    echo $name."<hr>";
    foreach($passions as $passion){
        echo $passion."<br>";
    }

?>