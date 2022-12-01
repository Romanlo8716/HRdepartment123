<?php
include '../Connect/connect.php';

$id = $_GET["id"];
if(isset($id)){
$departmentCon = mysqli_query($link, "select * from `department` where number_department='$id'");
}
else{
  echo "Переменная не инициализированна";
}

while($department = mysqli_fetch_array($departmentCon))
{
$name = $department['title'];
?>
<div class="print" style="text-align: center; font-size: 20px;; margin-top: 50px;"> <?="Вы хотите удалить отдел: $name?";?>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление отдела</title>
    <link rel="stylesheet" href="../Style/StyleAdminWorkers.css"/>
</head>
<body>
<div class="button_block" style="margin-top: 50px">

<a href="deleteDepartment.php?id=<?=$id?>" style="text-decoration: none">
    <div class="button"> Удалить </div>
</a>

</div>
</body>
</html>

