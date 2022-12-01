<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="/Style/StyleIndex.css"/>
</head>
<body>

<div class="header">
<div class="logo-block">
    HR<br>
    Department
</div>


<div class="menu-block">
<nav class="menu" >
                <a href="index.php" class="menu_item" style="text-decoration: none">Главная страница</a>
                <a href="workers.php" class="menu_item" style="text-decoration: none">Сотрудники</a>
                <a href="departments.php" class="menu_item" style="text-decoration: none">Отделы</a>
                <a href="reports.php" class="menu_item" style="text-decoration: none">Отчёты</a>
                   
</nav>
</div>

<div class="panel-admin">
    <?php if(isset($_COOKIE['cokkie'])) { ?>
Добро пожаловать, <?= $_COOKIE['cokkie']?>. <a href="../admin/Admin.php" class="open-admin" style="text-decoration: none" href>(Изменение данных)</a>
<?php } else {?>
    Для сотрудников отдела кадров, <a href="enterAdmin.php" class="open-admin" style="text-decoration: none" href>войти</a>
    <?php }?>
</div>

</div>

<div class="middle">
    <h1 class="logo">Вход</h1>

    <div class="WindowPass">
        <br>
        <div class="textWindow">
<form action="entrance.php" method="POST">
    
<p>Введите номер: &nbsp <input type="text" name="number"/><p><br>
Введите пароль: <input type="password" name="password"><p><br>
<input class="button" type="submit" value="Войти">



</form>
<br>
Не удаётся войти?(<a class="reg" href="Registration.php">Регистрация</a>)
</div>
    </div>
</div>

<div class="foother">

</div>

</body>
</html>