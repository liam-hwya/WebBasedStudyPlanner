<?php
    require_once("auth.php");
    require_once("today.php");
    require_once("db_con.php");
    require_once("getuserdatas.php");
    $UTuserEmail=$_SESSION['UTuser'];
    $UTuserid=userData($UTuserEmail,'id');
    if(isset($_POST['dformat'])){
        $dformat=$_POST['dformat'];
    }else{
        $dformat=$dfToday;
    }
    
    $getQuery="SELECT * FROM uttask WHERE dformat='$dformat' AND userid='$UTuserid'";
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