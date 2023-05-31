<?php
include "./PhpConnect/connect.php";

include ("./PhpTemplate/authdate.php");
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
    <header>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
              </a>
              <img class="imgLogo" src="../Images/logo.png" alt="">
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/indexAdmin.php" class="nav-link px-2 link-secondary">О нас</a></li>
                <li><a href="../Pages/CatalogAdmin.php" class="nav-link px-2 link-dark">Каталог</a></li>
                <li><a href="../Pages/FindUsAdmin.php" class="nav-link px-2 link-dark">Где нас найти?</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                
              <a href="/index.php" class="btn btn-primary" tabindex="-1" role="button" id="logout-button" aria-disabled="true">Выход</a>
              </div>
            </header>
          </div>
    </header>
    <script>
document.getElementById('logout-button').addEventListener('click', function() {
  // Выполняете выход из профиля или разлогин пользователя

  // Удаляете все данные сеанса, включая ID
  fetch('../logout.php') // Путь к файлу, который содержит обработчик выхода (logout.php)
    .then(function(response) {
      // Перенаправляете пользователя на страницу, например, на страницу входа или главную страницу
      window.location.href = '../index.php';
    })
    .catch(function(error) {
      console.log('Ошибка при выполнении выхода:', error);
    });
});
</script>
</body>
</html>
