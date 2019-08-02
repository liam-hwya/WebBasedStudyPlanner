<?php
    
    function userData($email,$reqData){
        include("db_con.php");
        $getquery="SELECT * FROM utusers WHERE Email='$email'";
        $userDatas=mysqli_query($con,$getquery);
        if(mysqli_num_rows($userDatas)>0){
            while($userData=mysqli_fetch_assoc($userDatas)){
                $return=$userData[$reqData];
                return $return;
            }
        }else{
            return "Empty";
        }
    }


    // $getquery="SELECT * FROM utusers WHERE Email='maymyatnoezaw@gmail.com'";
    // $getuser=mysqli_query($con,$getquery);
    // if(mysqli_num_rows($getuser)>0){
    //     while($user=mysqli_fetch_assoc($getuser)){
    //         $passions=$user['passions'];
    //         $passions=unserialize($passions) ;
    //         foreach($passions as $passion){
    //             echo $passion."<br>";
    //         }
    //     }
    // }else{  
    //     echo "nothing";
    // }
    
?>