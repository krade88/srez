<?php
    include ("..\PhpConnect\connect.php");    
//Добавляет товар в бд
$query = "SELECT * FROM category";
$result = mysqli_query($connect, $query);
if (!$result) {
    die("Ошибка при выполнении запроса: " . mysqli_error($connect));
}
    $sql = sprintf("INSERT INTO `product` VALUES (NULL, '%s', '%s','%s','%s','%s','%s','%s','%s');",
      $_POST["image"],$_POST["name"],$_POST["price"], $_POST["description"],$_POST["country"],$_POST["model"],$_POST["year"],$_POST["count"]);
      


    if (!$connect->query($sql)){
      return die("Ошибка". $connect->error);}

  return header ("Location:..\Pages\Admin.php?message=Товар добавлен");

?>