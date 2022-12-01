<?php
$name = $_POST["name"];
$surname = $_POST["surname"];
$middlename = $_POST["middlename"];

if((isset($_POST["name"]) || isset($_POST["surname"]) || isset($_POST["middlename"]) ) && (!empty($_POST["name"]) || !empty($_POST["surname"]) || !empty($_POST["middlename"]) )){
    $searchWorkersCon = mysqli_query($link, "select * from `people_table` where name='$name' or surname='$surname' or middlename='$middlename'");

    while($searchWorkers = mysqli_fetch_array($searchWorkersCon))
    {
        $show_img = base64_encode($searchWorkers['image']);
    
        ?>
         <a href="worker.php?id=<?=$searchWorkers["id"]?>"  style="text-decoration: none">
    
         <div class="block-worker" >
            <div class="image-worker"><?php if($searchWorkers["image"]== null){ echo"<br><br><br>No photo"; } else{?> <img class="photo_worker" src="data:image/jpeg;base64,<?=$show_img?>" alt=""> <?php }?></div>
           <div class="fio"> <h3>Фамилия Имя Отчество</h3> <?=$searchWorkers["name"]?> <?=$searchWorkers["surname"]?> <?=$searchWorkers["middlename"]?> </div><br> 
           <div class="post-desc"> <h3>Должность</h3> <?=$searchWorkers["post"]?> </div><br>
           <div class="type-desc"><h3>Состояние</h3> <?=$searchWorkers["type"]?></div>
        </div>
         </a>
         <?php
    }
    
        
}
else{
    echo "Переменная не инициализированна";
}
?>