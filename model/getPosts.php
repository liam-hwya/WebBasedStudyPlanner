<?php

    require_once("auth.php");
    require_once("db_con.php");
    
    if(isset($_POST['categories'])){
        $categories=$_POST['categories'];
    }else{
        $categories="";
    }

    if($categories==""){
        $getQuery="SELECT * FROM utposts";
    }else{
        $categs=array();
        foreach($categories as $category){
            $cat="'".$category."'";
            array_push($categs,$cat);
        }
        
        $getQuery="SELECT * FROM utposts WHERE category IN (" . implode(',', $categs) . ")";
    }
    
    $runQuery=mysqli_query($con,$getQuery);
    if(mysqli_num_rows($runQuery)>0){
        while($utpost=mysqli_fetch_assoc($runQuery)){
            echo $utpost['title'];
        }
    }
?>