<?php
include '../Connect/connect.php';

$id = $_GET["id"];
if(isset($id)){
$workerCon = mysqli_query($link, "select * from `people_table` where id='$id'");
}
else{
  echo "Переменная не инициализированна";
}

while($worker = mysqli_fetch_array($workerCon))
{
$name = $worker['name'];
$surname = $worker['surname'];
$middlename = $worker['middlename'];?>
<div class="print" style="text-align: center; font-size: 20px;; margin-top: 50px;"> <?="Вы хотите удалить работника: $name $surname $middlename?";?>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление одного работника</title>
    <link rel="stylesheet" href="../Style/StyleAdminWorkers.css"/>
</head>
<body>
<div class="button_block" style="margin-top: 50px">

<a href="deleteWorker.php?id=<?=$id?>" style="text-decoration: none">
    <div class="button"> Удалить </div>
</a>

<a href="dismissWorker.php?id=<?=$id?>" style="text-decoration: none">
    <div class="button" style="display: inline-block; margin-left: 80px"> Уволить </div>
</a>

</div>
</body>
</html>

