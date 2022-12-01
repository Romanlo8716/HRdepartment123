<?php
include '../Connect/connect.php';
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление сотрудников</title>
    <link rel="stylesheet" href="../Style/StyleWorkers.css"/>
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
                <a href="../reports.php" class="menu_item" style="text-decoration: none">Отчёты</a>
                   
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




<div class="block-workersDelete" id="display">
<?php

    while($workers = mysqli_fetch_array($connectionWorkers))
    {
        $id = $workers["id"];
        $show_img = base64_encode($workers['image']);
        $departmentCon = mysqli_query($link, "select title from department JOIN departments_of_the_employee ON departments_of_the_employee.department_id=department.number_department where departments_of_the_employee.employee_id = '$id'");
        $vacationCon = mysqli_query($link, "select * from vacation_order where employees_report_card = '$id' order by order_number_vacation desc limit 1");
       
        $dateNow = date("Y-m-d");

    
        ?>
         <a href="deleteAdminOneWorker.php?id=<?=$workers["id"]?>"  style="text-decoration: none">
    
         <div class="block-worker" >
            <div class="image-worker"><?php if($workers["image"]== null){ echo"<br><br><br>No photo"; } else{?> <img class="photo_worker" src="data:image/jpeg;base64,<?=$show_img?>" alt=""> <?php }?></div>
           <div class="fio"> <h3>Фамилия Имя Отчество</h3> <?=$workers["name"]?> <?=$workers["surname"]?> <?=$workers["middlename"]?> </div><br> 
           
          
           
            <div class="type-desc"><h3>Отдел</h3><?php while($departmentWorkers =  mysqli_fetch_array( $departmentCon)){ $department = $departmentWorkers['title']; echo "$department | "; }?> </div><br>
         

            <?php  while($vacationWorkers = mysqli_fetch_array($vacationCon)){ 
                    $dateEnd = $vacationWorkers['vacation_end_date'];
                   
                ?>
           
           <div class="type-desc"><h3>Состояние</h3> <?if($workers['dismiss']==0){if ($dateEnd > $dateNow){ echo $vacationWorkers['type_of_vacation'];} else {echo "Работает";}} else{?> <div style="color:red;">Уволен </div> <?php } ?></div><br>
           <?php
             }
            ?>

           
        </div>
         </a>
         <?php
    
    }
   ?>

</div>


</div>

<div class="foother">
fgbgfb
</div>
</body>
</html>