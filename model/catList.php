
<div class="showCommunitySideBarBtn"><img src="assets/icons/menu.png"></div>
<?php
require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');
$getPassions="SELECT * FROM utusers WHERE id='$UTuserid'";
$Passions=mysqli_query($con,$getPassions);
while($row=mysqli_fetch_assoc($Passions)){
    $categories=unserialize($row['passions']);
    foreach($categories as $category){
        echo "<div class='categorytoSelectInCommunity'>".$category."</div>";
    }
    
}

?>
<div class='showAllCategoriesInCommunity showingAllCats'>All</div>