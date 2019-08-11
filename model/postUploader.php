<?php

    include_once("auth.php");
    include_once("db_con.php");
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
    $category=$_POST['category'];
    $userid=$_POST['userid'];
    $date=date('Y-m-d');
    $starcount=0;

    $uploadQuery="INSERT INTO utposts (userid,title,utdescription,starcount,category,utdate) 
                VALUES('$userid','$title','$description','$starcount','$category','$date')";
    $runQuery=mysqli_query($con,$uploadQuery);
    if($runQuery){
        echo true;
    }else{
        echo false;
    }

?>