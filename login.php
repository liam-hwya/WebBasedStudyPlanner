<?php
    session_start();
    if(isset($_SESSION['UTuser'])){
        header("location:index.php");
    }
    require_once("model/db_con.php");
    require_once("model/getuserdatas.php");
    function securer($pass){
        $pass=md5($pass);
        $pass=sha1($pass);
        $pass=crypt($pass,$pass);
        return $pass;
    }
    if(isset($_POST['Login'])){
        $email=$_POST['utuserEmail'];
        $password=$_POST['utuserPasswor'];
        $enteredPass=securer($password);
        $getpass=userData($email,'pass');
        if($getpass!=""){
            if($enteredPass===$getpass){
                $_SESSION['UTuser']=$email;
                header("location:index.php");
            }else{
                echo "wrong";
            }
        }else{
            echo "undefined email";
        }
    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/signup.css">

</head>
<body>
            <img src="assets/icons/utime.png" alt="" class="plegma_logo">
            <span class="utime_name_text">Sign Up</span>
    <form method="post">
    
        <input type="text" name="utuserEmail" class="loginInputBox" placeholder="Email">
        <input type="password" name="utuserPasswor" class="loginInputBox" placeholder="Password">
        <input type="submit" name="Login" value="Login" class="loginBtn">


    </form>
</body>
</html>