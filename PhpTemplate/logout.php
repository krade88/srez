<?php
session_start();

// Удаление переменных сессии
unset($_SESSION['user_id']);
unset($_SESSION['user_role']);

// Редирект на страницу авторизации или другую страницу по вашему выбору
header("Location: ../Pages/Auth.php");
exit();
?>
