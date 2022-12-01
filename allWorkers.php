<?php
include 'Connect/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="live_search.js"></script>
    <link rel="stylesheet" href="/Style/StyleWorkers.css"/>
</head>
<body>
<?php


    while($workers = mysqli_fetch_array($connectionWorkers))
    {
        $show_img = base64_encode($workers['image']);
    
        ?>
         <a href="worker.php?id=<?=$workers["id"]?>"  style="text-decoration: none">
    
         <div class="block-worker" >
            <div class="image-worker"><?php if($workers["image"]== null){ echo"<br><br><br>No photo"; } else{?> <img class="photo_worker" src="data:image/jpeg;base64,<?=$show_img?>" alt=""> <?php }?></div>
           <div class="fio"> <h3>Фамилия Имя Отчество</h3> <?=$workers["name"]?> <?=$workers["surname"]?> <?=$workers["middlename"]?> </div><br> 
          
           <div class="type-desc"><h3>Состояние</h3> <?=$workers["type"]?></div><br>
           <div class="type-desc"><h3>Отдел</h3> <?=$workers["type"]?></div><br>
        </div>
         </a>
         <?php
    }

?>
</body>
</html>