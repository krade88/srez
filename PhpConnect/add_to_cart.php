<?php
session_start();
include "../PhPConnect/connect.php";

// Получение данных о товаре из запроса
$product_id = $_GET['product_id'];

// Получение идентификатора пользователя из сессии
$user_id = $_SESSION['user_id'];

// Проверка, существует ли уже запись в корзине для данного пользователя и товара
$sql = sprintf("SELECT * FROM `cart` WHERE `user_id` = %d AND `product_id` = %d", $user_id, $product_id);
$result = $connect->query($sql);

if ($result && $result->num_rows > 0) {
    // Если запись уже существует, обновляем количество товара
    $row = $result->fetch_assoc();
    $quantity = $row['quantity'] + 1;

    $update_sql = sprintf("UPDATE `cart` SET `quantity` = %d WHERE `id` = %d", $quantity, $row['id']);
    $update_result = $connect->query($update_sql);

    if (!$update_result) {
        die("Ошибка обновления записи в корзине: " . $connect->error);
    }
} else {
    // Если запись не существует, создаем новую запись в корзине
    $insert_sql = sprintf("INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) VALUES (%d, %d, 1)", $user_id, $product_id);
    $insert_result = $connect->query($insert_sql);

    if (!$insert_result) {
        die("Ошибка добавления записи в корзину: " . $connect->error);
    }
}

// Перенаправление на страницу с корзиной или другую страницу
header("Location: ../Pages/Cart.php");
exit();
?>
