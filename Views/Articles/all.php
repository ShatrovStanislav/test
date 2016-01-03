<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (empty(\App\Models\Users::checkSess()) == true) : ?>
    <a href='http://test/index.php?ctrl=users&act=login'>Войти</a> |
<?php endif; ?>
<?php if (empty(\App\Models\Users::checkSess()) == false) : ?>
    <a href='http://test/index.php?ctrl=users&act=logout'>Выйти</a> |
<?php endif; ?>
<a href='http://test/index.php?ctrl=admin&act=insert'>Добавить статью</a>
<br>
<br>
<?php foreach ($values as $item) : ?>
    <a href='http://test/index.php?ctrl=articles&act=one&id=<?php echo $item->articleId; ?>'><?php echo $item->articleTitle; ?></a>
    <br>
    <span>дата: <?php echo $item->articleDate; ?> автор: <?php echo $item->articleAuthor; ?></span>
    <div><?php echo $item->articleDescription; ?></div>
    <hr>
<?php endforeach; ?>
</body>
</html>