<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "comment_bd");
mysqli_query($connection, " SET NAMES 'utf8' "); 

if(!$connection || !$db)
{
    exit(mysql_error());
}

?>