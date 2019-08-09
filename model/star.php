<?php
    require_once("auth.php");
    require_once("db_con.php");
    require_once("../model/getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $UTuserid=userData($UTuser,'id');
    $postid=$_POST['postid'];
    $todo=$_POST['todo'];

    if($todo=="add"){
        $addQuery="INSERT INTO utstar (postId,userId) VALUES('$postid','$UTuserid')";
        $add=mysqli_query($con,$addQuery);
        if($add){
            $getQuery="SELECT * FROM utstar WHERE postId='$postid'";
            $getStarcount=mysqli_query($con,$getQuery);
            $starCount=mysqli_num_rows($getStarcount);
            if($starCount>1){
                $thisStarcount=$starCount." Stars";
            }else{
                $thisStarcount=$starCount." Star";
            }
        }
        echo "<img src='assets/icons/star.png'>".$thisStarcount;
    }else{
        $delQuery="DELETE FROM utstar WHERE postId='$postid' AND userId='$UTuserid'";
        $del=mysqli_query($con,$delQuery);
        if($del){
            $getQuery="SELECT * FROM utstar WHERE postId='$postid'";
            $getStarcount=mysqli_query($con,$getQuery);
            $starCount=mysqli_num_rows($getStarcount);
            if($starCount>1){
                $thisStarcount=$starCount." Stars";
            }else{
                $thisStarcount=$starCount." Star";
            }
        }
        echo "<img src='assets/icons/star.png'>".$thisStarcount;
    }
?>