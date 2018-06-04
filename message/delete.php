<?php

include_once("db.php");

$id = $_GET['id'];

mysqli_query($connection, " DELETE FROM news WHERE id='$id' ");

mysqli_close($connection);

echo "success!";

?>
<a href="index.php">Вернуться на страницу сообщений</a>