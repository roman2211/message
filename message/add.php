<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление сообщения</title>
</head>

<body>
<a href="index.php">Вернуться на страницу сообщений</a>

<form method="post" action="add.php">

Заголовок<br />
<input type="text" name="title" /><br />

Автор<br />
<input type="text" name="author" /><br /><br />

Краткое содержание<br />
<input type="text" name="content" /><br />
Полное содержанание <br />

<textarea cols="40" rows="10" name="text"></textarea><br />





<input type="submit" name="add" value="Добавить" />

</form>

<?php

include_once("db.php");


if(isset($_POST['add']))
{
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $text = mysqli_real_escape_string($connection, $_POST['text']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);
//    = mysqli_real_escape_string($connection, $title);
    
    mysqli_query($connection, " 
                    INSERT INTO news(title, text, author,content)
                    VALUES ('$title', '$text',  '$author', '$content') 
    ");
    
    mysqli_close($connection);
    
    echo "Сообщение  добавлено!";
}



?>


</body>
</html>