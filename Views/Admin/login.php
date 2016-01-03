<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Войти</title>
</head>
<body>
<?php echo $msg; ?>
<form method="post">
    <label>
        Логин:
        <br>
        <input type="text" size="30" name="userLogin" autofocus>
    </label>
    <br>
    <br>
    <label>
        Пароль:
        <br>
        <input type="password" size="30" name="userPass">
    </label>
    <br>
    <br>
    <input type="submit" value="Войти">
    <br>
    <br>
</form>
<hr>
</body>
</html>