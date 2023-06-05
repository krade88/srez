<?php
include "../PhpConnect/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemId = $_POST['itemId'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $count = $_POST['count'];

    // Обновление информации о товаре в базе данных
    $query = "UPDATE product SET name = '$name', price = '$price', description = '$description', count = '$count' WHERE Id = $itemId";
    $result = $connect->query($query);

    if ($result) {
        header("Location:/Admin.php");
    } else {
        echo "Ошибка при обновлении товара: " . $connect->error;
    }
} else {
    echo "Некорректный метод запроса.";
}
?>
