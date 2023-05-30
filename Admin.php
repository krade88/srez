<?php
include "./PhpConnect/connect.php";
include "./PhpTemplate/authdate.php";
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
          <form action= "../addItem.php" method = "POST">
          <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите путь изображения</label>
                    <input type="text" class="form-control" id="" name="image">
          </div>
          <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите имя</label>
                    <input type="text" class="form-control" id="" name="name">
          </div>
          <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите цену</label>
                    <input type="text" class="form-control" id="" name="price"  >
          </div>
          <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите описание</label>
                    <input type="text" class="form-control" id="" name="description"  >
         </div>
         <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите страну</label>
                    <input type="text" class="form-control" id="" name="country"  >
         </div>
         <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите модель</label>
                    <input type="text" class="form-control" id="" name="model"  >
         </div>
         <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите год</label>
                    <input type="text" class="form-control" id="" name="year"  >
         </div>
         <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите количество</label>
                    <input type="text" class="form-control" id="" name="count"  >
         </div>
         
        
         
         <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
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
        echo '<form method="POST">';
        echo '<input type="hidden" name="delete_product" value="' . $row['Id'] . '">';
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
<form action= "../addCategory.php" method = "POST">
<div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите имя</label>
                    <input type="text" class="form-control" id="" name="nameCat">
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>
</form>
<?php
if (isset($_POST['delete_category'])) {
    $Id = $_POST['delete_category'];
    $query = "DELETE FROM Category WHERE Id = $Id";
    $result = $connect->query($query);
    if ($result) {
        echo "Категория удалена.";
    } else {
        echo "Ошибка при удалении товара: " . $connect->error;
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