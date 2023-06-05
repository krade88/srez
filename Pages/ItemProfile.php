<?php

session_start();
include "../PhpConnect/connect.php";
include "../PhpTemplate/authdate.php";

// Проверяем, был ли отправлен запрос на добавление товара в корзину
if (isset($_POST['product_id'])) {
    // Получаем идентификатор товара из запроса
    $product_id = $_POST['product_id'];

    // Дополнительная обработка и валидация данных, если необходимо

    // Добавляем товар в корзину (например, в базу данных или в сессию)
    // Здесь вы можете выполнить нужные вам действия для добавления товара в корзину
    // Например, выполнить SQL-запрос к базе данных или добавить товар в массив в сессии

    // Пример добавления товара в сессию (предполагая, что корзина хранится в массиве $_SESSION['cart'])
    if (isset($_SESSION['cart'][$product_id])) {
    // Если товар уже существует в корзине, увеличиваем его количество на 1
    $_SESSION['cart'][$product_id] += 1;
} else {
    // Если товара нет в корзине, добавляем его с начальным значением 1
    $_SESSION['cart'][$product_id] = 1;
}

    // После добавления товара в корзину, можно выполнить редирект на страницу корзины или другую нужную страницу
    header("Location: ../Pages/Bucket.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHouse</title>
</head>
<body>
    <?php
    include "../PhpTemplate/headerProfile.php";
    ?>
    
    <main>
        <div class="container">
            <?php
            // Проверяем, был ли передан идентификатор товара в GET-параметре
            if (isset($_GET['Id'])) {
                $Id = $_GET['Id'];

                // Здесь вы можете выполнить запрос к базе данных, чтобы получить данные о товаре по его id
                $query = "SELECT * FROM product WHERE Id = $Id";
                $result = mysqli_query($connect, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    // Отображение информации о товаре
                    echo '<h1>' . $row['name'] . '</h1>';
                    echo '<img src="' . $row['image'] . '" alt="Изображение товара">';
                    echo '<p>Цена: ' . $row['price'] . '</p>';
                    echo '<p>Описание: ' . $row['description'] . '</p>';
                    echo '<p>Страна: '.$row['country'].'</p>';
                    echo '<p>Модель: '.$row['model'].'</p>';
                    echo '<p>Год: '.$row['year'].'</p>';

                    // Форма добавления товара в корзину
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="product_id" value="' . $row['Id'] . '">';
                    echo '<input type="submit" value="Добавить в корзину">';
                    echo '</form>';
                }
            }
            ?>
        </div>
    </main>

    <?php
    include "../PhpTemplate/footer.php";
    ?>

</body>
</html>
