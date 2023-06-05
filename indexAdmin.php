<?php
include ("./PhpConnect/connect.php");

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
    <?php
    include ("./PhpTemplate/headerAdmin.php");
    ?>
    <h1 style="margin-left: 20%">Музыкальный дом - это место, после которого хочется петь</h1>
    <main>
         <div class= "container">
            <div class= "row">     
         <?php

            $query = "SELECT * FROM product ORDER BY Id DESC LIMIT 5";
            $result = mysqli_query($connect, $query);

            if ($result) {
            echo '<div Id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">';
            
            echo '<div class="carousel-inner">';

            $active = 'active';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="carousel-item ' . $active . '">';
                echo '<img src="' . $row['image'] . '" alt="Изображение товара">';
                echo '<h3 style="color: black;">' . $row['name'] . '</h3>';
                echo '<p style="color: black;">Описание: ' . $row['description'] . '</p>';
                
                echo '<div class="carousel-caption d-none d-md-block">';
            
                echo '</div>';
                echo '</div>';
                $active = '';
            }
            echo '</div>';
            echo '<a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" type="button" data-bs-slide="prev">';
            echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Previous</span>';
            echo '</a>';
            echo '<a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" type="button" data-bs-slide="next">';
            echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Next</span>';
            echo '</a>';
            echo '</div>';
            
            echo'</div>';
            }
        ?>
</div>
</div>
    </main>

    <?php
    include ("./PhpTemplate/footer.php");
    ?>

</body>
</html>