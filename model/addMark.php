<?php

require_once("auth.php");
require_once("db_con.php");

$mark=$_POST['submark'];
$subid=$_POST['subid'];

echo $subid." mark is ".$mark;

?>