<?php
include "../PhpConnect/connect.php";

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
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Отфильтровать по:
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="?category=8">Струнные</a></li>
    <li><a class="dropdown-item" href="?category=9">Клавишные</a></li>
    <li><a class="dropdown-item" href="?category=4">Смычковые</a></li>
  </ul>
</div>
<br>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Упорядочить по:
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Цена</a></li>
    <li><a class="dropdown-item" href="#">Наименование: от А до Я</a></li>
    <li><a class="dropdown-item" href="#">Наименование: от Я до А</a></li>
    <li><a class="dropdown-item" href="#">Год производства</a></li>
  </ul>
</div>

<br>
    <?php
    if (isset($_GET['category'])) {
      $categoryId = $_GET['category'];
      
      // SQL-запрос с фильтрацией по выбранной категории
      $query = "SELECT * FROM product WHERE IdCategory = $categoryId";
  } else {
      // Запрос без фильтрации, если категория не была выбрана
      $query = "SELECT * FROM product";
  }
    $result= $connect->query($query);
    echo '<div class= "row">';
    if ($result){
        while($row= $result->fetch_assoc())
    {
      if ($row['count'] >= 1) {
        echo '<div class = "col-md-4">';
        echo '<div class = "contImg">';
        echo '<div class = "card">';
        echo '<img style="imgCat" src="'.$row['image'].'"alt="Изображение товара"';
        
        echo '<h3>'.$row['name'].'</h3>';
        echo '<p>Цена:' .$row['price'].'</p>';
        echo '<p>Описание: '.$row['description'].'</p>';
        
        echo '<p>Количество: '.$row['count'].'</p>';
        echo '<a href ="Item.php?Id= '.$row['Id'].'">Подробнее</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
  }
    echo '</div>';
}
    ?>
    </main>

    <?php
    include ("../PhpTemplate/footer.php");
    ?>

</body>
</html>