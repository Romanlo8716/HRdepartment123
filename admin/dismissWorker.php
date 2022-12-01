<?php
include '../Connect/connect.php';

$id = $_GET["id"];

 $dateDismissNow = date("Y-m-d");



$result = mysqli_query($link, "CALL dismissWorker($id, '$dateDismissNow')");


if(!empty($result)){?>
    <h1 style="text-align:center; margin-top: 80px">Пользователь успешно уволен!<br> (Вы будете возвращены на страницу через 2 секунды)</h1>
    <?php
}
else 
{?>
      <h1 style="text-align:center; margin-top: 80px">Ошибка увольнения пользователя</h1>
   
   <?php
}

?>
<meta http-equiv="refresh" content="2;url=deleteAdminWorkers.php" />