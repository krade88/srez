<?php
include "../PhpConnect/connect.php";

include "../PhpTemplate/authdate.php";
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
    include ("../PhpTemplate/headerAdmin.php");
    ?>
    
    <main>
    <?php
    $query = "SELECT * FROM product";
    $result= $connect->query($query);
    echo '<div class= "row">';
    if ($result){
        while($row= $result->fetch_assoc())
    {
        echo '<div class = "col-md-4">';
        echo '<div class = "card">';

        echo '<img style="imgCat" src="'.$row['image'].'"alt="Изображение товара"';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<p>Цена:' .$row['price'].'</p>';
        echo '<p>Описание: '.$row['description'].'</p>';
        echo '<a href ="Item.php?Id= '.$row['Id'].'">Подробнее</a>';
        echo '</div>';
        echo '</div>';
    }
}
    ?>
    </main>

    <?php
    include ("../PhpTemplate/footer.php");
    ?>

</body>
</html>