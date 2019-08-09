<?php

    require_once("auth.php");
    require_once("db_con.php");
    require_once("../model/getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $UTuserid=userData($UTuser,'id');
    
    if(isset($_POST['categories'])){
        $categories=$_POST['categories'];
    }else{
        $categories="";
    }

    if($categories==""){
        $getQuery="SELECT * FROM utposts ORDER BY id DESC";
    }else{
        $categs=array();
        foreach($categories as $category){
            $cat="'".$category."'";
            array_push($categs,$cat);
        }
        
        $getQuery="SELECT * FROM utposts WHERE category IN (" . implode(',', $categs) . ") ORDER BY id DESC";
    }
    
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
            if(strlen($descrip)>200){
                $shortDescrip=substr($description, 0, 200);
                $description="<p class='thisPostShortDescription'>".$shortDescrip." <span class='readMorethisPost' data-postid='".$thisPostid."'>Read More...</span></p>";
            }else{
                $description="<p>".$descrip."</p>";
            }

            
            //getstar
            $starQuery="SELECT * FROM utstar WHERE postid='$thisPostid'";
            $getStar=mysqli_query($con,$starQuery);
            $starCount=mysqli_num_rows($getStar);
            if($starCount>1){
                $thisStarcount=$starCount." Stars";
            }else{
                $thisStarcount=$starCount." Star";
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
                    <div class='thisArticleContainer'>

                        <div class='thisArticleMenu'><img src='assets/icons/dotmenu2.png'></div>
                        <div class='thisArticleMainBody'>
                            <div class='thisArticleHeader'>
                                <div class='thisArticleTitle'>".$title."</div>
                                <div class='thisArticleUserInfo'>
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
                                    <div class='thisArticleComment'><img src='assets/icons/message.png'>23Comments</div>
                                </div>
                            </div>

                        </div>


                    </div>
                ";
                }
            }

           
        }
    }
?>


<!--  -->