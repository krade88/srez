<?php
    include ("..\PhpConnect\connect.php");    

//Добавляет категорию в бд
    $sql = sprintf("INSERT INTO `category` VALUES (NULL, '%s');",
      $_POST["name"]);


    if (!$connect->query($sql)){
      return die("Ошибка". $connect->error);}

  return header ("Location:/Admin.php?message=Категория добавлена");

?>