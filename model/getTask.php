<?php

    include("today.php");
    include("db_con.php");
    if(isset($_POST['dformat'])){
        $dformat=$_POST['dformat'];
    }else{
        $dformat=$dfToday;
    }
    
    $getQuery="SELECT * FROM uttask WHERE dformat='$dformat'";
    $getTasks=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($getTasks)>0){
        while($UTtask=mysqli_fetch_assoc($getTasks)){
            $UTtask= $UTtask['tasksubject'];
            echo $UTtask."<hr>";
        }
    }else{
        echo "empty tasks";
    }
?>