
<body>
<script type="text/javascript">
           
            function showHide(element_id) {
                
                if (document.getElementById(element_id)) { 
                    
                    var obj = document.getElementById(element_id); 
                    if (obj.style.display != "block") { 
                        obj.style.display = "block"; 
                    }
                    else obj.style.display = "none"; 
                }
                
                else alert("Элемент с id: " + element_id + " не найден!"); 
            }   
        </script>
 

        <a href="javascript:void(0)" onclick="showHide('block_id')">Показать/Скрыть Комментарии</a><br/><br/>
   
<a href="add.php">Добавить сообщение</a>

<?php


include_once("db.php");


$num = 1;
$page = $_GET['page'];
$result00 = mysqli_query($connection, "SELECT COUNT(*) FROM news");
$temp = mysqli_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;

		
$result = mysqli_query($connection, "SELECT * FROM news ORDER BY id LIMIT $start, $num");

while($row = mysqli_fetch_assoc($result))
{?>
<?php $a = $row['id']?>
<h1><?php echo $row['title']?></h1>
<p><?php echo $row['content']?></p>
<p><?php echo $row['text']?></p>

<p>Автор : <?php echo $row['author']?></p>
<a href="edit.php?id=<?php echo $row['id']?>">Редактировать сообщение</a><br />
<a href="delete.php?id=<?php echo $row['id']?>">Удалить сообщение</a>
<form name="comment" action="comment.php" method="post">
  <p>
    <label>Имя:</label>
    <input type="text" name="name" />
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="text_comment" cols="30" rows="5"></textarea>
  </p>
  <p>
 <input id="pageinput" type="hidden" name="page_id" value = "" />
    <input type="submit" value="Отправить" />
  </p>
</form>
<hr />
<?php }?>
<?

if ($page != 1) $pervpage = '<a href=index.php?page=1>Первая</a> | <a href=index.php?page='. ($page - 1) .'>Предыдущая</a> | ';

if ($page != $total) $nextpage = ' | <a href=index.php?page='. ($page + 1) .'>Следующая</a> | <a href=index.php?page=' .$total. '>Последняя</a>';


if($page - 5 > 0) $page5left = ' <a href=index.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=index.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=index.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=index.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=index.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=index.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';



if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
 echo "Комментарии: <br />";
}
?>
<div id="block_id" style="display: none;">
<?php
    include_once("db.php");
   $result_set = mysqli_query($connection, "SELECT * FROM `comments` WHERE `page_id`='$a'"); 
  while ($row = $result_set->fetch_assoc()) {
    
   echo ($row["text_comment"]); 
    
    echo "<br />";
  }
?>
</div>
<script type="text/javascript">
    var x = '<?php echo $a;?>';
   window.onload = function(){
  document.getElementById('pageinput').value = x;
}
    
    
    
    </script>
</body>