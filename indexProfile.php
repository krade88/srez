<?php
include ("./PhpConnect/connect.php");

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
    include ("./PhpTemplate/headerProfile.php");
    ?>
    
    <main>
    <?php
    $query = "SELECT * FROM product ORDER BY Id DESC LIMIT 5";
    $result = mysqli_query($connect, $query);
    if ($result){
        echo '<div Id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">';
        echo ' <div class="carousel-indicators">';
        $active = 'class="active"';
    for ($i= 0; $i<mysqli_num_rows($result); $i++){
        echo '<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$i.'"'.$active.'></li>';
    }
    echo '<div class="carousel-inner">';
    $active= 'active';
    while ($row=mysqli_fetch_assoc($result)){
        echo'<div class= "carousel-item'.$active.'">';
        echo '<img src="'.$row['image'].'"alt="Изображение товара"';
        echo ' <div class="carousel-caption d-none d-md-block">';
        echo '<h3>'.$row['name'].'</h3>';
        echo '</div>';
        echo '</div>';
        $active = '';
    }
    echo '</div>';
  echo '<a class="carousel-control-prev" role="button" href="#carouselExampleCaptions" data-bs-slide="prev">';
    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Previous</span>';
    echo '</a>';
  echo'<a class="carousel-control-next" role="button" href="#carouselExampleCaptions" data-bs-slide="next">';
    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Next</span>';
  echo '</a>';
  echo '</div>';
    }
    ?>
    </main>

    <?php
    include ("./PhpTemplate/footer.php");
    ?>

</body>
</html>