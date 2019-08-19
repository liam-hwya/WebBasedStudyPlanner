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
	<title>Admin > users</title>
	<link rel="stylesheet" type="text/css" href="css/admintheme.css">
	<link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
	<div class="top_menubar">
		<div class="page_title">Admin > Users</div>
		<div class="FC_logo"></div>
		<a href="logout.php"><div class="logout_btn">Logout</div></a>
	</div>
	<div class="main_container">
		<div class="left_side_bar">
			<a href="index.php"><div class="active_menu">Users</div></a>	
            <a href="feedback.php"><div>Feedback</div></a>			
		</div>
		<div class="workarea">

			<?php

				$getUsersQuery="SELECT * FROM utusers";
				$getUser=mysqli_query($con,$getUsersQuery);
				if(mysqli_num_rows($getUser)>0){
					while($user=mysqli_fetch_assoc($getUser)){
						echo "
							<div class='eachUserContainer'>
								<div class='userPP' style='background-image:url(../assets/images/".$user['profilePicture'].")'></div>
								<div class='userInfo'>
									<div class='userName'>".$user['firstName']." ".$user['lastName']."</div>
									<div class='userEmail'>".$user['Email']."</div>
								</div>
								<a href='deleteuser.php?id=".$user['id']."'><div class='deleteUser'><img src='../assets/icons/cancel.png'></div></a>
							</div>
						";
					}
				}

			?>


		</div>
	</div>


    
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/admin.js"></script>
</body>
</html>