<?php
include "../PhpConnect/connect.php";

include ("../PhpTemplate/authdate.php");

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
    <form class="formRegAuth" method="POST" action="../PhpConnect/connectAuth.php">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите логин</label>
    <input type="text" class="form-control" name="login" required id="" aria-describedby="">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите пароль</label>
    <input type="password" class="form-control" name="password" required id="" aria-describedby="">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
    
    </form>
    
    </main>

    <?php
    include ("../PhpTemplate/footer.php");
    ?>

</body>
</html>