<?php
include "./PhpConnect/connect.php";

?>
<?php
session_start();

// Проверка роли пользователя
if ($_SESSION['user_role'] !== 'admin') {
  // Если роль не соответствует требуемой, перенаправляем пользователя на другую страницу или выводим сообщение об ошибке.
  header('Location: ../Pages/Auth.php?message=Вы не админ');
  exit;
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
    include ("./PhpTemplate/headerAdmin.php");
    ?>
<main>
          <div>
            <h1>Заказы пользователей</h1>
            <div class="row">
              <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Заказ №2</h5>                        
                            <p>Статус заказа: На рассмотрении</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Цена: 500000 рублей</li>
                            <p class="card-text">Количество товаров: 3</p>
                          </ul>
                          <div class="card-body">
                            <a class="card-link">Одобрить заказ</a>
                            <a class="card-link">Отклонить заказ</a>
                          </div>
              </div>

              <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Заказ №1</h5>
                            <p>Статус заказа: Отклонён</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Цена: 100000 рублей</li>
                            <p class="card-text">Количество: 1</p>
                          </ul>
                          <div class="card-body">
                            <a class="card-link">Удалить заказ</a>
                          </div>
              </div>
            </div>
          </div>
          <h1>Добавить товар</h1>
          <?php

// Проверка, есть ли категории в базе данных
$result = $connect->query("SELECT Id, name FROM Category");

// Проверка, есть ли категории в базе данных
if ($result !== false && $connect->affected_rows > 0) {
    // Формирование выпадающего списка
    echo '<form action="../PhpConnect/addItem.php" method="POST">';
    echo 'Выберите категорию: ';
    echo '<select name="IdCategory">';
    
    while ($row = $result->fetch_assoc()) {
        $IdCategory = $row['Id'];
        $categoryName = $row['name'];
        echo "<option value='$IdCategory'>$categoryName</option>";
    }
    
    echo '</select>';
    
    // Другие поля для ввода информации о товаре
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите путь изображения</label>';
    echo '<input type="text" class="form-control" id="" name="image">';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите имя</label>';
    echo '<input type="text" class="form-control" id="" name="name">';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите цену</label>';
    echo '<input type="text" class="form-control" id="" name="price"  >';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите описание</label>';
    echo '<input type="text" class="form-control" id="" name="description"  >';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите страну</label>';
    echo '<input type="text" class="form-control" id="" name="country"  >';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите модель</label>';
    echo '<input type="text" class="form-control" id="" name="model"  >';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите год</label>';
    echo '<input type="text" class="form-control" id="" name="year"  >';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<label for="exampleInputEmail1" class="form-label">Введите количество</label>';
    echo '<input type="text" class="form-control" id="" name="count"  >';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary">Добавить</button>';
    echo '</form>';
} else {
    echo "Нет доступных категорий.";
}
          
          ?>
          
          <div class="container">
            
<h1>Удалить товар</h1>
          <?php
if (isset($_POST['delete_product'])) {
    $Id = $_POST['delete_product'];
    $query = "DELETE FROM product WHERE Id = $Id";
    $result = $connect->query($query);
    if ($result) {
        echo "Товар удален.";
    } else {
        echo "Ошибка при удалении товара: " . $connect->error;
    }
}

$query = "SELECT * FROM product";
$result = $connect->query($query);

echo '<div class="container">';
echo '<div class="row">';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<img src="' . $row['image'] . '" alt="Изображение товара">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>Цена: ' . $row['price'] . '</p>';
        echo '<p>Описание: ' . $row['description'] . '</p>';
        
        echo '<p>Количество: ' . $row['count'] . '</p>';
        echo '<form class="formPosition" method="POST">';
        echo '<input type="hidden" name="delete_product" value="' . $row['Id'] . '">';
        echo '<a class="btn btn-primary" href ="../Pages/ItemAdmin.php?Id= '.$row['Id'].'">Редактировать</a>';
        echo '<button type="submit" class="btnDel">Удалить</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        
    }
}

echo '</div>';
echo '</div>';
?>
</div>
<h1>Добавить категорию</h1>
<form action= "../PhpConnect/addCategory.php" method = "POST">
<div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите имя</label>
                    <input type="text" class="form-control" id="" name="name">
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<h1>Удалить категорию</h1>
<?php
if (isset($_POST['delete_category'])) {
  $categoryId = $_POST['delete_category'];
  
  // Удаление товаров, связанных с категорией
  $deleteProductsQuery = "DELETE FROM product WHERE IdCategory = $categoryId";
  $deleteProductsResult = $connect->query($deleteProductsQuery);
  
  if ($deleteProductsResult) {
      // Удаление категории
      $deleteCategoryQuery = "DELETE FROM Category WHERE Id = $categoryId";
      $deleteCategoryResult = $connect->query($deleteCategoryQuery);
      
      if ($deleteCategoryResult) {
          echo "Категория удалена успешно.";
      } else {
          echo "Ошибка при удалении категории: " . $connect->error;
      }
  } else {
      echo "Ошибка при удалении товаров: " . $connect->error;
  }
}

$query = "SELECT * FROM category";
$result = $connect->query($query);

echo '<div class="row">';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<form method="POST">';
        echo '<input type="hidden" name="delete_category" value="' . $row['Id'] . '">';
        echo '<button type="submit" class="btnDel">Удалить</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
}
echo '</div>';
?>
        </main>
        <?php
    include ("./PhpTemplate/footer.php");
    ?>
</body>
</html>