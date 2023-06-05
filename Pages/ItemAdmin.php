<?php
include "../PhpConnect/connect.php";

if(isset($_GET['Id'])){
    $itemId = $_GET['Id'];

    // Получить информацию о товаре из базы данных
    $query = "SELECT * FROM product WHERE Id = $itemId";
    $result = $connect->query($query);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Отображение формы редактирования товара
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Редактировать товар</title>
        </head>
        <body>
            <h1>Редактировать товар</h1>
            <form action="../PhpConnect/update_item.php" method="POST">
                <input type="hidden" name="itemId" value="'.$row['Id'].'">
                <label for="name">Наименование:</label>
                <input type="text" name="name" value="'.$row['name'].'"><br>
                <label for="price">Цена:</label>
                <input type="text" name="price" value="'.$row['price'].'"><br>
                <label for="description">Описание:</label>
                <textarea name="description">'.$row['description'].'</textarea><br>
                <label for="count">Количество:</label>
                <input type="text" name="count" value="'.$row['count'].'"><br>
                <input type="submit" value="Сохранить">
            </form>
        </body>
        </html>
        ';
    } else {
        echo "Товар не найден.";
    }
} else {
    echo "Некорректный идентификатор товара.";
}
?>
