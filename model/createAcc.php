<?php

    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $Email=$_POST['Email'];
    $password=$_POST['password'];
    $passions=json_decode($_POST['passions']);
    echo $firstName.",".$lastName.",".$Email.",".$password."======";
    foreach($passions as $passion){
        echo $passion.",";
    }
?>