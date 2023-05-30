<?php
include ("../PhpConnect/connect.php");

// Проверка на уникальность логина
$login = $_POST["login"];
$checkQuery = "SELECT * FROM `user` WHERE login = '$login'";
$checkResult = $connect->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Логин уже занят, выполнение редиректа или вывод сообщения об ошибке
    return header("Location:../Pages/Reg.php?message=Логин уже занят");
}

// Защита пароля с использованием хеширования
$password = $_POST["password"];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Регистрация пользователя
$sql = sprintf("INSERT INTO `user` VALUES (NULL, '%s','%s','%s','%s','%s','%s','%s','%s');",
    $_POST["name"], $_POST["surname"], $_POST["patronymic"], $_POST["login"], $_POST["email"], $hashedPassword, $_POST["rpassword"], "client");

if (!$connect->query($sql)) {
    return die("Ошибка" . $connect->error);
}

return header("Location:../Pages/Auth.php?message=Регистрация успешна");
?>
