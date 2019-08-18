<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
echo "<div class='savedArticlesTitle'>Saved Articles</div>";
$getSavedQuery="SELECT * FROM saved WHERE userid='$UTuserid'";
$getSaved=mysqli_query($con,$getSavedQuery);
if(mysqli_num_rows($getSaved)>0){
    while($saved=mysqli_fetch_assoc($getSaved)){
        $postid=$saved['postid'];
        $getPostQuery="SELECT * FROM utposts WHERE id='$postid'";
        $getPost=mysqli_query($con,$getPostQuery);
        if(mysqli_num_rows($getPost)>0){
            while($post=mysqli_fetch_assoc($getPost)){
                $title=$post['title'];
                $description=substr($post['utdescription'],0,100);
                echo "
                    <div class='savedPostContainer' data-postid='".$postid."'>
                        <div class='savedPostTexts'>
                            <span>".$title."</span>
                            <p>".$description."</P>
                        </div>
                        <div class='savedPostIcon'><img src='assets/icons/leftDark.png'></div>
                    </div>
                ";
            }
        }else{
            //post deleted or something
        }
        
    }
}else{
}

?>