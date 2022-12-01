<?php
include '../Connect/connect.php';

$id = $_GET["id"];

$result = mysqli_query($link, "CALL deleteDepartment($id)");

if(!empty($result)){?>
    <h1 style="text-align:center; margin-top: 80px">Отдел успешно удален!<br> (Вы будете возвращены на страницу через 2 секунды)</h1>
    <?php
}
else 
{?>
      <h1 style="text-align:center; margin-top: 80px">Ошибка удаления отдела</h1>
   
   <?php
}

?>
<meta http-equiv="refresh" content="2;url=deleteAdminDepartments.php" />