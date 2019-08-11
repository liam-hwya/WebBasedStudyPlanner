<?php

    require_once("auth.php");
    require_once("db_con.php");
    $thisPostid=$_POST['postid'];
    $mentQuery="SELECT * FROM utcomment WHERE postid='$thisPostid'";
    $getments=mysqli_query($con,$mentQuery);
    $mentCount=mysqli_num_rows($getments);
    if($mentCount>1){
        $thisMentCount=$mentCount." Comments";
    }else{
        $thisMentCount=$mentCount." Comment";
    }

    echo "<img src='assets/icons/message.png'>".$thisMentCount;

?>
