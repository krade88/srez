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
    include ("../PhpTemplate/headerProfile.php");
    ?>
    
    <main>
        <div class="container">
            <h1>Заказ успешно создан</h1>
            
            <a href="../Pages/Order.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Посмотреть мои заказы</a>
        </div>
    </main>

    <?php
    include ("../PhpTemplate/footer.php");
    ?>

</body>
</html>