<?php
    
    require_once("auth.php");
    require_once("getuserdatas.php");
    $UTuser=$_SESSION['UTuser'];
    $firstName=userData($UTuser,'firstName');
    $lastName=userData($UTuser,'lastName');
    $name=$firstName." ".$lastName;
    $pp=userData($UTuser,'profilePicture');
    

?>

<input type="file" class='newPPselector'>
<div class="profilePPcontainer" style="background-image: url('assets/images/<?php echo $pp; ?>');"></div>
<div class='profileUserName'><?php echo $name; ?></div>
<a href="model/logout.php">Logout</a>
