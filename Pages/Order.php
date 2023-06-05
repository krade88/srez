<?php
include "../PhpConnect/connect.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Дом музыки</title>
        <link href="/Style/style.css" rel="stylesheet">
        <link href="/Bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <script src="JS/bootstrap.min.js"></script>
        <script src="JS/bootstrap.min.js.map"></script>
        <script src="/JS/bootstrap.bundle.js"></script>
        <script src="/JS/bootstrap.bundle.js.map"></script>
        
       
      
    </head>
    <body>
         <!--Шапка сайта-->
        <?php
        include ("../PhpTemplate/headerProfile.php")
        ?>
         <!--Основное тело с заказами-->
        <main>
          <div>
            <h1>Ваши заказы</h1>
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
                            <a class="card-link">Удалить заказ</a>
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
        </main>
        <?php
        include("../PhpTemplate/footer.php")
        ?>
         <!--Подвал сайта-->
        <script src="JS/bootstrap.min.js"></script>
        <script src="/JS/bootstrap.min.js.map"></script>
</html>