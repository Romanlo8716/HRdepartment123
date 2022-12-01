<?php
include '../Connect/connect.php';
$id = $_GET["id"];

if(isset($id)){
    $workerCon = mysqli_query($link, "select * from `people_table` where id='$id'");
    $laborCon = mysqli_query($link, "select * from labor_book join people_table on labor_book.employees_code = people_table.id where labor_book.employees_code ='$id' order by record_id desc");
    $laborConLast = mysqli_query($link, "select * from labor_book join people_table on labor_book.employees_code = people_table.id where labor_book.employees_code ='$id' order by record_id desc limit 1");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Трудовая книга</title>
    <link rel="stylesheet" href="/Style/StyleReportWorker.css"/>
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

<h1 class="logo_med">Личная карточка сотрудника </h1>

<div class="person_block">

<?php while($workers = mysqli_fetch_array( $workerCon)){
    $show_img = base64_encode($workers['image']);?>
 <div class="image-worker"><?php if($workers["image"]== null){ echo"<br><br><br>No photo"; } else{?> <img class="photo_worker" src="data:image/jpeg;base64,<?=$show_img?>" alt=""> <?php }?></div>
 <div class="fio_block">
<h3>Фамилия:__________<span class="pass_info" style="font-weight: normal"><?=$workers['surname']?></span>_____________________________</h3><br>
<h3>Имя:_______________<span class="pass_info" style="font-weight: normal"><?=$workers['name']?></span>_____________________________</h3><br>
<h3>Отчество:__________<span class="pass_info" style="font-weight: normal"><?=$workers['middlename']?></span>______________________________</h3><br>
<?php while($resultLaborLast = mysqli_fetch_array( $laborConLast)){ ?>
<h3>Номер трудовой книги:__________<span class="pass_info" style="font-weight: normal"><?=$resultLaborLast['number_labor_book']?></span>__________________<br></h3><br>
</div>

<div class="lastMed">
    

    <h3>Дата:__<span class="pass_infoLast" style="font-weight: normal;"><?=$resultLaborLast['date_information']?></span>_____________ Стаж:_____<span class="pass_infoLast" style="font-weight: normal;"><?= ($resultLaborLast['experience'])?> лет</span>________________________________ </h3><br>
    <h3>Последнее сведение:____<span class="pass_infoLast" style="font-weight: normal;"><?=convertWordWrap($resultLaborLast['information_work'])?></span>__________________________________________<br><br>_________________________________________________________________</h3><br>
<?php }} ?>
</div>
</div>
<h1 class="logo_med">Сведения о работе</h1>

<div class="medData_block">
<?php while($resultLabor = mysqli_fetch_array($laborCon)){?>

    
         <div class="block-worker" >
            <h4>Дата: _____________<span class="med_info" style="font-weight: normal"> <?=$resultLabor['date_information']?></span>__________________ Стаж:___________<span class="med_info" style="font-weight: normal"> <?=$resultLabor['experience']?> лет</span>__________________</h4><br>
            <h4>Сведения: _____<span class="med_info" style="font-weight: normal"> <?=convertWordWrap($resultLabor['information_work'])?></span>__________________________________________________________<br><br>_________________________________________________________________________</h4><br>
            <h4>Наименование документа: _<span class="med_info" style="font-weight: normal"> <?=$resultLabor['title_document']?></span>_______ &nbsp Номер: _<span class="med_info" style="font-weight: normal"> <?=$resultLabor['number_document']?></span>___ &nbsp Дата документа: _<span class="med_info" style="font-weight: normal"> <?=$resultLabor['date_document']?></span>__________ </h4><br>
        </div>
      
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