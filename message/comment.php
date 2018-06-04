
<a href="index.php">Вернуться на страницу сообщений</a>

<?php
include_once("db.php");
   $name =mysqli_real_escape_string($connection, $_POST['name']);
  $page_id = mysqli_real_escape_string($connection, $_POST['page_id']);
  $text_comment = mysqli_real_escape_string($connection, $_POST['text_comment']);
   mysqli_query($connection, "INSERT INTO `comments` (`name`, `page_id`, `text_comment`) VALUES ('$name', '$page_id', '$text_comment')");
  
?>