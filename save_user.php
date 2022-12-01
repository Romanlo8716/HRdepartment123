<?php
include 'Connect/connect.php';

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['name'])){
$login = $_POST['login']; 
$pas = $_POST['password']; 
$name = $_POST['name'];
}



    if (empty($login) || empty($pas) || empty($name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    else{
        $name = stripslashes($name);
        $name = htmlspecialchars($name);
        $pas = stripslashes($pas);
        $pas = htmlspecialchars($pas);
        $login = stripslashes($login);
        $login = htmlspecialchars($login);

        $login = trim($login);
        $name = trim($name);
        $pas = trim($pas);
        
        
            $sql = mysqli_query($link, "INSERT INTO employee_hr_department (login, name, password) VALUES ('$login', '$name', '$pas')");
        
            if ($sql=='true')
        {
            $new_url = 'enterAdmin.php';
            header('Location: '.$new_url);
        }
        else {
            echo "Ошибка: " . $link->error;
        }
    }

$link->close();


?>