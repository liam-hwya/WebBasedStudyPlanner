<?php

    require_once("auth.php");
    require_once("db_con.php");
    require_once("../model/getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $UTuserid=userData($UTuser,'id');
    
    $postid=$_POST['postid'];
    $curpos=$_POST['curpos'];
    
    $getQuery="SELECT * FROM utposts WHERE id='$postid'";    
    $runQuery=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($runQuery)>0){
        while($utpost=mysqli_fetch_assoc($runQuery)){
            $title=$utpost['title'];
            $description=$utpost['utdescription'];
            $id=$utpost['userid'];
            $starcount=$utpost['starcount'];
            $category=$utpost['category'];
            $descrip=$utpost['utdescription'];
            $thisPostid=$utpost['id'];
            $description="<p class='thisPostShortDescription'>".$descrip."</p>";
            

            
            //getstar
            $starQuery="SELECT * FROM utstar WHERE postid='$thisPostid'";
            $getStar=mysqli_query($con,$starQuery);
            $starCount=mysqli_num_rows($getStar);
            if($starCount>1){
                $thisStarcount=$starCount." Stars";
            }else{
                $thisStarcount=$starCount." Star";
            }

            //getcommentcount
            $mentQuery="SELECT * FROM utcomment WHERE postid='$thisPostid'";
            $getments=mysqli_query($con,$mentQuery);
            $mentCount=mysqli_num_rows($getments);
            if($mentCount>1){
                $thisMentCount=$mentCount." Comments";
            }else{
                $thisMentCount=$mentCount." Comment";
            }

            //stared  or not
            $getmyStar="SELECT * FROM utstar WHERE postId='$thisPostid' AND userid='$UTuserid'";
            $mystarforthispost=mysqli_query($con,$getmyStar);
            if(mysqli_num_rows($mystarforthispost)<1){
                $starStatus="beforestar";
            }else{
                $starStatus="afterstar";
            }
            //get user Datas
            $getquery="SELECT * FROM utusers WHERE id='$id'";
            $userDatas=mysqli_query($con,$getquery);
            if(mysqli_num_rows($userDatas)>0){
                while($userData=mysqli_fetch_assoc($userDatas)){
                    $firstName=$userData['firstName'];
                    $lastName=$userData['lastName'];
                    $userName=$firstName." ".$lastName;
                    $userPP=$userData['profilePicture'];
                    echo "
                    <div data-curpos='".$curpos."' class='backFromPostDetail'><img src='assets/icons/back.png'><span>Back</span></div>
                    <div class='thisArticleContainer'>

                        <div class='thisArticleMenu'><img src='assets/icons/dotmenu2.png' class='articleMenu' data-uid='".$id."' data-postid='".$thisPostid."'></div>
                        <div class='thisArticleMainBody'>
                            <div class='thisArticleHeader'>
                                <div class='thisArticleTitle'>".$title."</div>
                                <div class='thisArticleUserInfo'>
                                    <div class='thisArticleMenuInSmall'><img src='assets/icons/dotmenu2.png' class='articleMenu' data-uid='".$id."' data-postid='".$thisPostid."'></div>
                                    <div class='thisArticleUserName'>".$userName."</div>
                                    <div class='thisArticleUserProfilePicture'><img src='assets/images/".$userPP."'></div>
                                </div>
                            </div>

                            <div class='thisArticleBody'>".$description."</div>

                            <div class='thisArticleFooter'>
                                <div class='thisArticleCatTime'>
                                    <div class='thisArticleCategory'>".$category."</div>
                                    <div class='thisArticleTime'>2019-8-7</div>
                                </div>
                                <div class='thisArticleControls'>
                                    <div data-postId='".$thisPostid."' class='thisArticleStars ".$starStatus."'><img src='assets/icons/star.png'>".$thisStarcount."</div>
                                    <div class='thisArticleComment'><img src='assets/icons/message.png'>".$thisMentCount."</div>
                                </div>
                            </div>
                            <div class='thisArticleCommentContainer'>
                                <div class='addCommentContainer'>
                                    <textarea class='addCommentInputBox'></textarea><div data-postid='".$thisPostid."' class='addCommentBtn'>Comment</div>
                                </div>
                                <div class='articleDetailAllComentContainer'>";

                                $thisMentQuery="SELECT * FROM utcomment WHERE postid='$thisPostid'";
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

                               echo" </div>
                            </div>
                        </div>
                    </div>";
                }
            }

           
        }
    }
?>


<!--  -->