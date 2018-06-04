<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Редактирование сообщения</title>
</head>

<body>
<a href="index.php">Вернуться на страницу сообщений</a>

<?php

include_once("db.php");

$id = $_GET['id'];

$result = mysqli_query($connection, "  SELECT title,text, author FROM news
                         WHERE id='$id'   
");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['save']))
{
   $title = mysqli_real_escape_string($connection, $_POST['title']);
    $text = mysqli_real_escape_string($connection, $_POST['text']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    
    mysqli_query($connection, " UPDATE news SET title='$title', text='$text', author='$author' WHERE id='$id' ");
    
    mysqli_close($connection);
}

?>

<form method="post" action="edit.php?id=<?php echo $id; ?>">

Заголовок<br />
<input type="text" name="title" value="<?php echo $row['title']; ?>" /><br />

Полное содержание <br />
<textarea cols="40" rows="10" name="text"><?php echo $row['text']; ?></textarea><br />

Автор<br />
<input type="text" name="author" value="<?php echo $row['author']; ?>" /><br /><br />

<input type="submit" name="save" value="Сохранить" />

</form>


</body>
</html>