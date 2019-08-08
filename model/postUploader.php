<?php

    include_once("auth.php");
    include_once("db_con.php");
    $title=$_POST['title'];
    $description=mysql_real_escape_string($_POST['description']);
    $category=$_POST['category'];
    $userid=$_POST['userid'];
    $starcount=0;

    $uploadQuery="INSERT INTO utposts (userid,title,utdescription,starcount,category) 
                VALUES('$userid','$title','$description','$starcount','$category')";
    $runQuery=mysqli_query($con,$uploadQuery);
    if($runQuery){
        echo true;
    }else{
        echo false;
    }

?>