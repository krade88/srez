<?php
include ("../PhpConnect/connect.php")
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
    include ("../PhpTemplate/header.php");
    ?>
    
    <main>
        <div class = "container">
    <?php
// Подключение к базе данных и другие необходимые настройки
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    
    // Здесь вы можете выполнить запрос к базе данных, чтобы получить данные о товаре по его id
    
    // Пример запроса
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
    }
}
?>
</div>
</main>
    <?php
    include ("../PhpTemplate/footer.php");
    ?>

</body>
</html>