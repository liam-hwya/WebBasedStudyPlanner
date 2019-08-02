<?php
    $passionArray=array("Physic","Programming","artificial intelligence","Space","Football");
    foreach($passionArray as $passion){
        echo "
            <div class='selectPassionContainer selectable'>".$passion."</div>
        ";
    }
?>