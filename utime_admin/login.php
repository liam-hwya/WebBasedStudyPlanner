   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
            
   <?php
        session_start();
        require_once("../model/db_con.php");
        if(isset($_POST['login'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
            
            $getadminQuery="SELECT * FROM utadmin WHERE email='$email'";
            $getamdin=mysqli_query($con,$getadminQuery);
            if(mysqli_num_rows($getamdin)>0){
                while($admin=mysqli_fetch_assoc($getamdin)){
                    if($email==$admin['email'] && $password==$admin['password']){
                        $_SESSION['UTadmin']=$admin['email'];
                        header("location:index.php");
                    }else{
                        echo "<div class='loginerror'>Wrong Password</div>";
                    }
                }
            }else{
                echo "<div class='loginerror'>Wrong Email</div>";
            }
        }
   ?>

    <form method="post">
    
        <input type="email" name="email" class="loginInputBox" placeholder="Email">
        <input type="password" name="password" class="loginInputBox" placeholder="Password">
        <input type="submit" name="login" value="Login" class="loginBtn">


    </form>
</body>
</html>