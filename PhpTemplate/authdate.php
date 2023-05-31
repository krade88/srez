<?php
session_start();
//Проверка, авторизован ли пользователь
if (!isset($_SESSION["user_id"])) {
    //Если пользователь не авторизован, выполняйте перенаправление на страницу авторизации или другую страницу по вашему усмотрению
   header("Location:../Pages/Auth.php");
    exit();
}

//Проверка роли пользователя
$allowedRoles = array("admin", "client");
if (!in_array($_SESSION["user_role"], $allowedRoles)) {
    header("Location:../Pages/Auth.php");
    //Если роль пользователя не является "admin" или "client", выполняйте перенаправление на страницу с ошибкой доступа или другую страницу по вашему усмотрению
   exit();
}
?>
