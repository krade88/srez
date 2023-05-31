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
        $_SESSION["user_role"] = $user["role"];

        if ($user["role"] == "client") {
            header("Location: ../Pages/Success.php ");
            exit();
        }
    }
}

// Неверные данные аутентификации
header("Location:../Pages/Auth.php?message=Неверные данные");
exit();

?>
