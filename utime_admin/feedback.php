<?php
    session_start();
    if(!$_SESSION['UTadmin']){
        header("location:login.php");
	}
	require_once("../model/db_con.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="css/admintheme.css">
	<link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
	<div class="top_menubar">
		<div class="page_title">Admin > Feedback</div>
		<div class="FC_logo"></div>
		<a href="logout.php"><div class="logout_btn">Logout</div></a>
	</div>
	<div class="main_container">
		<div class="left_side_bar">
            <a href="index.php"><div>Users</div></a>
            <a href="feedback.php"><div class="active_menu">Feedback</div></a>				
		</div>
		<div class="workarea">
        <?php


$getFbQuery="SELECT * FROM utfeedback";
$getFb=mysqli_query($con,$getFbQuery);
if(mysqli_num_rows($getFb)>0){
    while($feedback=mysqli_fetch_assoc($getFb)){
        $usrid=$feedback['userid'];
        $getUsersQuery="SELECT * FROM utusers WHERE id='$usrid'";
        $getUser=mysqli_query($con,$getUsersQuery);
        $star=$feedback['starcount'];
        $i=0;
        if(mysqli_num_rows($getUser)>0){
            while($user=mysqli_fetch_assoc($getUser)){
                echo "
                    <div class='eachFeedbackContainer'>
                        <div class='eachUserContainer'>
                            <div class='userPP' style='background-image:url(../assets/images/".$user['profilePicture'].")'></div>
                            <div class='userInfo'>
                                <div class='userName'>".$user['firstName']." ".$user['lastName']."</div>
                                <div class='userEmail'>".$user['Email']."</div>
                            </div>
                            <a href='mailto:hlamyomann@gmail.com'><div class='deleteUser'><img src='../assets/icons/message.png'></div></a>
                        </div>
                        <div class='feedbackSubject'>".$feedback['fbsubject']."</div>
                        <div class='feedbackMessage'>".$feedback['fbmessage']."</div>
                        <div class='feedbackStar'>";
                            while($i<$star){
                                echo "<img src='../assets/icons/star.png'>";
                                $i++;
                            }
                        echo "</div>
                    </div>
                ";
            }
        }
    }
}else{
    echo "No Feed Back";
}




?>
		</div>
	</div>


    
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/admin.js"></script>
</body>
</html>