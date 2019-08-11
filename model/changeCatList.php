<?php

require_once("auth.php");
require_once("db_con.php");
require_once("../model/getuserdatas.php");
$UTuser=$_SESSION['UTuser'];
$UTuserid=userData($UTuser,'id');

$catid=$_POST['catid'];
$todo=$_POST['todo'];

$getCatQuery="SELECT * FROM utpassions WHERE id='$catid'";
$getCat=mysqli_query($con,$getCatQuery);
if(mysqli_num_rows($getCat)>0){
    while($cats=mysqli_fetch_array($getCat)){
        $targetCat=$cats['passions'];
    }
}

$getmyCatQuery="SELECT * FROM utusers WHERE id='$UTuserid'";
$myData=mysqli_query($con,$getmyCatQuery);
if(mysqli_num_rows($myData)>0){
    while($mydatas=mysqli_fetch_array($myData)){
        $mycatarray=$mydatas['passions'];
        $catlist=unserialize($mycatarray);
    }
}

if($todo=="add"){
    array_push($catlist,$targetCat);
    $newLatlist=serialize($catlist);
    $updatequery="UPDATE utusers SET passions='$newLatlist' WHERE id='$UTuserid'";
    $updateCatlist=mysqli_query($con,$updatequery);
    if($updateCatlist){
        echo "added";
    }
}else{
    $key = array_search($targetCat, $catlist);
    $offset = array_search($key, array_keys($catlist));
    array_splice($catlist, $offset, 1);
    $newLatlist=serialize($catlist);
    $updatequery="UPDATE utusers SET passions='$newLatlist' WHERE id='$UTuserid'";
    $updateCatlist=mysqli_query($con,$updatequery);
    if($updateCatlist){
        echo "removed";
    }

}

?>