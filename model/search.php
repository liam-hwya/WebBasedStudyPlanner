<?php

    require_once("auth.php");
    require_once("db_con.php");
    require_once("../model/getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $UTuserCats=userData($UTuser,'passions');
    $userselected=unserialize($UTuserCats);

    $keyword=$_POST['keyword'];
    $searchKeyword=preg_replace("#[^0-9a-z]#i", "", $keyword);
    $searchQuery="SELECT * FROM utpassions WHERE passions LIKE '%$searchKeyword%'";
    $search=mysqli_query($con,$searchQuery);
    if(mysqli_num_rows($search)>0){
        while($result=mysqli_fetch_array($search)){
            $category=$result['passions'];
            $id=$result['id'];
            if(in_array($category,$userselected)){
                echo "<div data-id='".$id."' data-todo='remove' class='changeThisCategory'>".$category."<img src='assets/icons/removecat.png'></div>";
            }else{
                echo "<div data-id='".$id."' data-todo='add' class='changeThisCategory'>".$category."<img src='assets/icons/addcat.png'></div>";
            }
        }
    }else{
        echo "<div class='changeThisCategory'>No Result!</div>";
    }



    // $keyword=$_GET['keyword'];
	// include("u_config/connection.php");
	// $searchq=$keyword;
	// $searchq=preg_replace("#[^0-9a-z]#i", "", $searchq);
	// $get_post=mysql_query("SELECT * FROM pagodas WHERE pgname LIKE '%$searchq%'") or die("could not search");
	// $count=mysql_num_rows($get_post);
	// if($count==0){
	// 	echo "<br>no result !<br><br>";
	// }else if($keyword==""){
	// 	echo "";
	// }else{
	// 	while($row=mysql_fetch_array($get_post)){
	// 		$pgname=$row['pgname'];
	// 		$pgid=$row['id'];
	// 		echo "<br><a href='pagodas.php?id=$pgid'>".$pgname."</a><br><br>";
	// 	}
	// }

?>