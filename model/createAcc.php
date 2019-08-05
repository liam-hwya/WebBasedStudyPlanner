<?php
    session_start();
    require_once("db_con.php");

    function securer($pass){
        $pass=md5($pass);
        $pass=sha1($pass);
        $pass=crypt($pass,$pass);
        return $pass;
    }

    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $Email=$_POST['Email'];
    $pw=$_POST['password'];
    $pass=securer($pw);
    $passions=json_decode($_POST['passions']);
    $passions=serialize($passions);
    $school="";
    $profilePicture="nopp.png";
    $query="INSERT INTO utusers (firstname,lastName,Email,pass,passions,school,profilePicture) VALUES('$firstName','$lastName','$Email','$pass','$passions','$school','$profilePicture')";
    $signuped=mysqli_query($con,$query);
    if($signuped){
        $_SESSION['UTuser']=$Email;
    }else{
        header("location:../index.php");
    }

?>