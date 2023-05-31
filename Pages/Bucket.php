<?php
include "../PhpConnect/connect.php";

include ("../PhpTemplate/authdate.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> MusicHouse</title>
        <link href="/Style/style.css" rel="stylesheet">
        <link href="/Bootstrap/bootstrap-5.0.2-dist/css/bootstrap.css" rel="stylesheet">
        
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/bootstrap.min.js.map"></script>
        <script src="/JS/bootstrap.bundle.js"></script>
        <script src="/JS/bootstrap.bundle.js.map"></script>
        
       
      
    </head>
    <body>
         <!--Шапка сайта-->
         <?php
    include ("../PhpTemplate/headerProfile.php");
    ?>
         <!--Основная информация в корзине товаров-->
        <main>
          <div>
            <h1>Корзина</h1>
            <div class="row">
              <div class="card" style="width: 18rem;">
                          <img src="/Images/6ad71b6c71d1212f3222acbf9a42177a.jpeg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Струнный инструмент</h5>
                            <p class="card-text">Описание товара</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Цена: 100000 рублей</li>
                          </ul>
                          <div class="card-body">
                            <a class="card-link">-   1   +</a>
                          </div>
              </div>

              <div class="card" style="width: 18rem;">
                          <img src="/Images/6b8ff4aa5dbb588a6060bdd0aa681d06.jpeg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Струнный инструмент</h5>
                            <p class="card-text">Описание товара</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Цена: 100000 рублей</li>
                          </ul>
                          <div class="card-body">
                            <a class="card-link">-   4   +</a>
                          </div>
              </div>
              <hr>
            </div>
            <h1>Итого: 500000 рублей</h1><a href="../Pages/AccessOrder.php" class="btn btn-primary btn-lg">Оформить заказ</a>

          </div>
          <br>
          <a href="/Pages/Order.php">Мои заказы</a>

          <?php
    include ("../PhpTemplate/footer.php");
    ?>
        </main>
       
        <script src="JS/bootstrap.min.js"></script>
        <script src="/JS/bootstrap.min.js.map"></script>
</html>