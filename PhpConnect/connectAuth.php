<?php
session_start();
// Авторизация
include "../PhPConnect/connect.php";


$login = $_POST["login"];
$password = $_POST["password"];

// Подготовка и выполнение запроса на получение данных пользователя по логину
$sql = sprintf("SELECT * FROM `user` WHERE `login`='%s'", $login);
$result = $connect->query($sql);

if (!$result) {
    return die("Ошибка получения данных: " . $connect->error);
}

if ($result) {
    $user = $result->fetch_assoc();
    $hashedPassword = $user["password"];

    // Проверка правильности введенного пароля
    if (password_verify($password, $hashedPassword)) {
        // Авторизация успешна
        
        $_SESSION["user_id"] = $user["Id"];

        if ($user["role"] == "admin") {
            $_SESSION["user_role"] = "admin";
            header("Location: ../Admin.php ");
            exit();
        } else {
            $_SESSION["user_role"] = "client";
            header("Location:../Pages/CatalogProfile.php");
            exit();
        }
    }
}

// Неверные данные аутентификации
header("Location:../Pages/Auth.php?message=Неверные данные");
exit();
?>
