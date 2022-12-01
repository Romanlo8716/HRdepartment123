<?php
include 'Connect/connect.php';

if(isset($_POST['number'])){
    $name = $_POST['number']; 
    }
    
    if(isset($_POST['password'])){
        $pas = $_POST['password']; 
        }
    
        if (empty($name) || empty($pas)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }
        else{
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            $pas = stripslashes($pas);
            $pas = htmlspecialchars($pas);
            
            $name = trim($name);
            $pas = trim($pas);
            
            
                $sql = mysqli_query($link, "select * from employee_hr_department where login='$name' and password = '$pas'");
                while($resultWorker =  mysqli_fetch_array( $sql)){
                    $nameBase = $resultWorker['name'];
                }
                if ($sql != null)
            {
                setcookie("cokkie", $nameBase, time()+3600);
                $new_url = 'index.php';
                header('Location: '.$new_url);
            }
            else {
                echo "Ошибка, такого пользователя не существует";
            }
        }
    
    $link->close();
?>