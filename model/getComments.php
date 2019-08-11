<?php
require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$thisPostid=$_POST['postid'];
$newComment=mysqli_real_escape_string($con,$_POST['comment']);
$date=date('Y-m-d');

$insertQuery="INSERT INTO utcomment (postid,userid,comment,mentDate) VALUES ('$thisPostid','$UTuserid','$newComment','$date')";
$addComment=mysqli_query($con,$insertQuery);
if($addComment){
    $thisMentQuery="SELECT * FROM utcomment WHERE postid='$thisPostid' ORDER BY mentDate DESC";
    $getThisments=mysqli_query($con,$thisMentQuery);
    if(mysqli_num_rows($getThisments)>0){
        while($comments=mysqli_fetch_assoc($getThisments)){
            $comment=$comments['comment'];
            $date=$comments['mentDate'];
            $comUserid=$comments['userid'];
            $getcomUserQuery="SELECT * FROM utusers WHERE id='$comUserid'";
            $getcomUser=mysqli_query($con,$getcomUserQuery);
            if(mysqli_num_rows($getcomUser)>0){
                while($mentUser=mysqli_fetch_assoc($getcomUser)){
                    $MUfname=$mentUser['firstName'];
                    $MUlname=$mentUser['lastName'];
                    $mentUserName=$MUfname." ".$MUlname;
                    $mentUserPP=$mentUser['profilePicture'];
                }
            }

            echo "
                    <div class='articleComment'>
                        <div class='articleCommentHeader'>
                            <div class='articleCommentPP'><img src='assets/images/".$mentUserPP."'></div>
                            <div class='articleCommentInfo'>
                                <div class='articleCommentUserName'>".$mentUserName."</div>
                                <div class='articleCommentDate'>".$date."</div>
                            </div>
                            <div class='articleCommentMenus'><img src='assets/icons/dotmenu2.png'></div>
                        </div>
                        <div class='articleCommentData'>".$comment."</div>
                    </div>
                    
                    ";

        }
    }else{
        echo "nocoment";
    }
}else{
    echo "something is wrond";
}



?>