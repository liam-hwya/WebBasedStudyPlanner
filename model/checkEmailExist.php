<?php

    require_once("db_con.php");

        $email=$_POST['email'];
        $getquery="SELECT * FROM utusers WHERE Email='$email'";
        $userDatas=mysqli_query($con,$getquery);
        if(mysqli_num_rows($userDatas)>0){
            echo false;
        }else{
            echo true;
        }
?>