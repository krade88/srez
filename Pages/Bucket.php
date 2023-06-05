<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHouse - Корзина</title>
</head>
<body>
    <?php
    include "../PhpConnect/connect.php";
    include "../PhpTemplate/headerProfile.php";
    ?>

    <main>
        <div class="container">
        <?php

        session_start();

        // Проверяем, существует ли массив корзины в сессии
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Функция для добавления товара в корзину
        function addToCart($productId, $quantity, $maxCount) {
            // Проверяем, существует ли товар уже в корзине
            if (isset($_SESSION['cart'][$productId])) {
                // Увеличиваем количество товара
                if ($_SESSION['cart'][$productId] + $quantity <= $maxCount) {
                    $_SESSION['cart'][$productId] += $quantity;
                } else {
                    echo '<p>Ошибка! Достигнуто максимальное количество товара.</p>';
                }
            } else {
                // Добавляем новый товар в корзину
                $_SESSION['cart'][$productId] = $quantity;
            }
        }

        // Обработка запроса на добавление товара в корзину
        if (isset($_POST['add_to_cart'])) {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // Получаем максимальное количество товара из базы данных
            $query = "SELECT count FROM product WHERE Id = $productId";
            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $maxCount = $row['count'];

                // Добавляем товар в корзину
                addToCart($productId, $quantity, $maxCount);
            }
        }

        // Обработка запроса на увеличение количества товара
        if (isset($_POST['increase_quantity'])) {
            $productId = $_POST['product_id'];

            // Получаем максимальное количество товара из базы данных
            $query = "SELECT count FROM product WHERE Id = $productId";
            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $maxCount = $row['count'];

                // Увеличиваем количество товара на 1
                addToCart($productId, 1, $maxCount);
            }
        }

        // Обработка запроса на уменьшение количества товара
        if (isset($_POST['decrease_quantity'])) {
            $productId = $_POST['product_id'];

            // Проверяем, существует ли товар в корзине
            if (isset($_SESSION['cart'][$productId])) {
                // Уменьшаем количество товара на 1
                $_SESSION['cart'][$productId] -= 1;

                // Проверяем, если количество товара стало равным 0, удаляем товар из корзины
                if ($_SESSION['cart'][$productId] == 0) {
                    unset($_SESSION['cart'][$productId]);
                }
            }
        }

        // Проверяем, есть ли товары в корзине
        if (!empty($_SESSION['cart'])) {
            // Получаем список идентификаторов товаров из сессии
            $product_ids = $_SESSION['cart'];

            // Преобразуем список идентификаторов в строку для использования в SQL-запросе
            $product_ids_str = implode(',', $product_ids);

            // Запрос к базе данных для получения информации о товарах в корзине
            $query = "SELECT * FROM product WHERE Id IN ($product_ids_str)";
            $result = mysqli_query($connect, $query);

            // Вывод информации о товарах
            if ($result && mysqli_num_rows($result) > 0) {
                echo '<h1>Корзина</h1>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">';
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<img src="' . $row['image'] . '" alt="Изображение товара">';
                    echo '<p>Цена: ' . $row['price'] . '</p>';
                    echo '<p>Описание: ' . $row['description'] . '</p>';
                    echo '<p>Максимальное количество: ' . $row['count'] . '</p>';
                    echo '</div>';
                }
            } 
        } 

        // Отображение товаров в корзине
        if (!empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $productId => $quantity) {
              // Здесь выполняем запрос к базе данных для получения информации о товаре по его id
              $query = "SELECT * FROM product WHERE Id = $productId";
              $result = mysqli_query($connect, $query);
      
              // Проверяем, получены ли данные о товаре
              if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
      
                  echo '<div>';
                  echo '<h2>' . $row['name'] . '</h2>';
                  echo '<img src="' . $row['image'] . '" alt="Изображение товара">';
                  echo '<p>Цена: ' . $row['price'] . '</p>';
                  echo '<p>Описание: ' . $row['description'] . '</p>';
                  echo '<p>Количество: ' . $quantity . '</p>';
      
                  echo '<form method="post">';
                  echo '<input type="hidden" name="product_id" value="' . $productId . '">';
                  echo '<input type="submit" name="increase_quantity" value="+">';
                  echo '<input type="submit" name="decrease_quantity" value="-">';
                  echo '</form>';
      
                  echo '</div>';
              }
          }
      } else {
          echo '<p>Корзина пуста</p>';
      }
        ?>
        </div>
        
        <a href="../Pages/AccessOrder.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Подтвердить заказ</a>
    </main>

    <?php
    include "../PhpTemplate/footer.php";
    ?>

</body>
</html>
