<?php
    include ("..\PhpConnect\connect.php");    

//Добавляет категорию в бд
    $sql = sprintf("INSERT INTO `category` VALUES (NULL, '%s');",
      $_POST["nameCat"]);


    if (!$connect->query($sql)){
      return die("Ошибка". $connect->error);}

  return header ("Location:..\Pages\Admin.php?message=Товар добавлен");

?>