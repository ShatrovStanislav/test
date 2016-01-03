<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить/изменить статью</title>
</head>
<body>
    <form method="post">
        <label>
            Заголовок:
            <br>
            <input type="text" size="80" name="articleTitle" autofocus value="<?php echo htmlspecialchars($values->articleTitle); ?>">
        </label>
        <br>
        <br>
        <label>
            Автор:
            <br>
            <input type="text" size="50" name="articleAuthor" value="<?php echo htmlspecialchars($values->articleAuthor); ?>">
        </label>
        <br>
        <br>
        <label>
            Описание:
            <br>
            <textarea name="articleDescription" rows="5" cols="80"><?php echo htmlspecialchars($values->articleDescription); ?></textarea>
        </label>
        <br>
        <br>
        <label>
            Текст:
            <br>
            <textarea name="articleText" rows="10" cols="80"><?php echo htmlspecialchars($values->articleText); ?></textarea>
        </label>
        <br>
        <br>
        <input type="submit" value="Добавить/изменить статью">
        <br>
        <br>
    </form>
    <hr>
</body>
</html>