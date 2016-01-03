<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="http://test/index.php?ctrl=admin&act=update&id=<?php echo $values->articleId; ?>">Изменить статью</a> |
<a href="http://test/index.php?ctrl=admin&act=delete&id=<?php echo $values->articleId; ?>">Удалить статью</a>
<h1><?php echo $values->articleTitle; ?></h1>
<span>дата: <?php echo $values->articleDate; ?> автор: <?php echo $values->articleAuthor; ?></span>
<div><?php echo $values->articleText; ?></div>
</body>
</html>