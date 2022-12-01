<?php
include 'Connect/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отделы</title>
    <link rel="stylesheet" href="/Style/StyleDepartments.css"/>
</head>
<body>
    
<div class="header">
<div class="logo-block">
    HR<br>
    Department
</div>


<div class="menu-block">
<nav class="menu" >
                <a href="../index.php" class="menu_item" style="text-decoration: none">Главная страница</a>
                <a href="../workers.php" class="menu_item" style="text-decoration: none">Сотрудники</a>
                <a href="../departments.php" class="menu_item" style="text-decoration: none">Отделы</a>
                <a href="../Reports/reports.php" class="menu_item" style="text-decoration: none">Отчёты</a>
                   
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

<h1 class="logo_department"> Все отделы компании </h1>

<div class="block-departments">
<?php

    while($departments = mysqli_fetch_array($connectionDepartments)) { 
      $id = $departments["number_department"];
      $numberDepartment = mysqli_query($link, "select count(*) as `count` from departments_of_the_employee where department_id = '$id'");
      $adressDepartmentCon = mysqli_query($link, "select * from department join department_adress on department.adress_id = department_adress.adress_id where department.number_department = '$id'");
      ?>
    
       

         <a href="department.php?id=<?=$departments["number_department"]?>"  style="text-decoration: none">
         
         <div class="block-department">
          <h4 class="name_department">Название отдела: <span style="font-weight: normal;"><?=$departments["title"]?></span> </h4><br>
          <h3 class="about_department">Количество сотрудников: <span style="font-weight: normal;"><?=numberEmployeesForDepartment($numberDepartment)?></span>  </h3><br>
          <?php while($adressDepartment = mysqli_fetch_array($adressDepartmentCon)) { ?>
          <h4 class="about_department">Адрес отдела: <span style="font-weight: normal;">Город: <?=$adressDepartment["city"]?>,</span> <span style="font-weight: normal;">Улица: <?=$adressDepartment["street"]?>,</span> <span style="font-weight: normal;"> Дом: <?=$adressDepartment["house"]?>.</span> </h4><br>
          <?php } ?>
          <h3 class="about_department">Рабочий телефон: <span style="font-weight: normal;"><?=$departments["telephone"]?></span></h3>
        </div>
         </a>
         
    
    <?php } ?>
  

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