<?php
//Подключение к бд
$connect= new mysqli("localhost","root","","MusicHouse");
$connect->set_charset("utf8");

	if($connect->connect_error)
		die("Ошибка подключения: ". $connect->connect_error);
?>