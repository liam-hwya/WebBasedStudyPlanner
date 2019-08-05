<?php
    require_once("db_con.php");
    $getPassions="SELECT * FROM utpassions";
    $Passions=mysqli_query($con,$getPassions);
    while($row=mysqli_fetch_assoc($Passions)){
        echo "<div class='selectPassionContainer selectable'>".$row['passions']."</div>";
    }

?>