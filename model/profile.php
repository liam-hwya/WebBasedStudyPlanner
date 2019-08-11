<?php
    
    require_once("auth.php");
    require_once("getuserdatas.php");
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
<hr>
<a href="model/logout.php">Logout</a>