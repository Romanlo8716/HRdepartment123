<?php
include 'Connect/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/Style/StyleRegistration.css"/>
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
                <a href="Reports/reports.php" class="menu_item" style="text-decoration: none">Отчёты</a>
                   
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

<middle>
  
<h1 class="logo_reg"> Регистрация пользователя</h1>

<div class="WindowPass">
        <br>
        <div class="textWindow">
<form action="save_user.php" method="POST">
    
<p>Введите логин: &nbsp <input type="text" name="login"/><p><br>
Введите имя: &nbsp <input type="text" name="name"/><p><br>
Введите пароль: <input type="password" name="password"><p><br>
<input class="button" type="submit" value="Регистрация">



</form>



<br>
Уже зарегистрированы?(<a class="reg" href="enterAdmin.php">Войти</a>)
</div>
    </div>
</middle>

<footer class="footer">

    <div class="block3"></div>

    <div class="we">

      <div class="updates">
        
        <div class="updates_name">Работа с программой:</div>
        <div class="desc_updates">
            <br><br> В случае сбоев работы с программой<br>
            обращайтесь к администратору
        </div>
        <nav class="menu_updates" >
            <a href="suggestions.html" class="menu_updates_item" style="text-decoration: none">Наши предложения</a>
            <a href="news.html" class="menu_updates_item" style="text-decoration: none">Новости</a>
            <a href="#images" class="menu_updates_item" style="text-decoration: none">Фотогалерея</a>
            <a href="#contacts" class="menu_updates_item" style="text-decoration: none">Контакты</a>     
        </nav>
   
      </div>


      <div class="contact">
          <div class="contact_name">Центральный офис:</div>
        <div class="adress">
           <br> Москва, ленинграский проспект,<br>
           д. 16, корп. В, офис 305<br><br>
           +7 (495) 987-65-43<br>
           <br><u>info@companyname.com</u>
        </div>
        <h1><div class="img_logocontact"> Insurance Company </div></h1>
          </div>
      </div>
    </div>
</footer>


</body>
</html>