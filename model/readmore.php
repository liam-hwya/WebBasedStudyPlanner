<?php

    require_once("auth.php");
    require_once("db_con.php");

    $postid=$_POST['postid'];
    $getQuery="SELECT * FROM utposts WHERE id='$postid'";
    $runQuery=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($runQuery)>0){
        while($utpost=mysqli_fetch_assoc($runQuery)){
            echo $utpost['utdescription'];
        }
    }    


?>