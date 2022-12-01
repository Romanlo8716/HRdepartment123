<?php
include 'Connect/connect.php';
$id = $_GET["id"];
if(isset($id)){
$workerCon = mysqli_query($link, "select * from `people_table` where id='$id'");
$postCon = mysqli_query($link, "select title from post JOIN post_of_the_employee ON post_of_the_employee.post_Code=post.post_code  where post_of_the_employee.table_number='$id'");
}
else{
  echo "Переменная не инициализированна";
}

while($resultWorker =  mysqli_fetch_array( $workerCon)){
  $show_img = base64_encode($resultWorker['image']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Style/StyleOneWorker.css"/>
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

<div class="middle">
<h1 class="logo_worker"> Личные данные сотрудника </h1>

<div class="passport_block"> 

<div class="photo_block">
<?php if($resultWorker["image"]== null){ echo"<br><br><br>No photo"; } else{?><img class="photo_worker" src="data:image/jpeg;base64,<?=$show_img?>" alt=""><?php }?>
</div>

<div class="fio_block">
<h3>Фамилия:__________<span class="pass_info" style="font-weight: normal"><?=$resultWorker['surname']?></span>____________________________</h3><br>
<h3>Имя:_______________<span class="pass_info" style="font-weight: normal"><?=$resultWorker['name']?></span>____________________________</h3><br>
<h3>Отчество:__________<span class="pass_info" style="font-weight: normal"><?=$resultWorker['middlename']?></span>_____________________________</h3><br>
<h3>Пол:_<span class="pass_info" style="font-weight: normal"><?=$resultWorker['gender']?></span>______ Дата рождения:___<span class="pass_info" style="font-weight: normal"><?=$resultWorker['birthday']?></span>___________________</h3><br>
<h3>Серия паспорта:_<span class="pass_info" style="font-weight: normal"><?=$resultWorker['passport_series']?></span>_____ Номер паспорта:__<span class="pass_info" style="font-weight: normal"><?=$resultWorker['passport_number']?></span>_________</h3><br>
</div>
<br>
<h3 class="adress_block">Место прописки:____<span class="pass_info" style="font-weight: normal">обл. <?=$resultWorker['region']?> &nbsp; &nbsp; &nbsp;г. <?=$resultWorker['city']?>  </span>_______________________________________________ <br><br>__________________<span class="pass_info" style="font-weight: normal">ул. <?=$resultWorker['street']?> д. <?=$resultWorker['house']?> кв. <?=$resultWorker['apartment_number']?></span>_________________________________________________ </h3>

<br><h3 class="adress_block" >Должность:____<span class="pass_info" style="font-weight: normal"><?php while($resultPost =  mysqli_fetch_array( $postCon)){ $post = $resultPost['title']; echo "$post | "; }?></span>____________________________________________________</h3>
</div>
<h1 class="logo_worker2"> Отчёты по сотруднику </h1>


<div class="med_block">
<a href="Reports/medReportWorker.php?id=<?=$id?>" class="report_item" style="text-decoration: none">
<div class="img_block">
<img class="img_report" src="image/med.png" alt="">
</div>
  <div class="desc_block">
Медицинские данные сотрудника
  </div>
  </a>
</div>



<div class="military_block">
<a href="Reports/militaryReportWorker.php?id=<?=$id?>" class="report_item" style="text-decoration: none">
<div class="img_block">
<img class="img_report" src="image/military.png" alt="">
</div>
  <div class="desc_block">
Военный билет
</div>
</a> 
</div>



<div class="work_block">
<a href="Reports/workReportWorker.php?id=<?=$id?>" class="report_item" style="text-decoration: none">
<div class="img_block">
<img class="img_report" src="image/work.png" alt="">
</div>
  <div class="desc_block">
Трудовая книга
</div>
</a> 
</div>



<div class="education_block">
<a href="Reports/educationReportWorker.php?id=<?=$id?>" class="report_item" style="text-decoration: none">
<div class="img_block">
<img class="img_report" src="image/education.png" alt="">
</div>
  <div class="desc_block">
Информация об образовании
</div>
</a> 
</div>



<div class="family_block">
<a href="Reports/familyReportWorker.php?id=<?=$id?>" class="report_item" style="text-decoration: none">
<div class="img_block">
<img class="img_report" src="image/family.png" alt="">
</div>
  <div class="desc_block">
Семейные данные
</div>
</a> 
</div>



<div class="stats_block">
<a href="Reports/statsReportWorker.php?id=<?=$id?>" class="report_item" style="text-decoration: none">
<div class="img_block">
<img class="img_report" src="image/stats.png" alt="">
</div>
  <div class="desc_block">
Информация о состоянии сотрудника
</div>
</a> 
</div>


</div>
<br><br><br>
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
<?php
      }
    ?>