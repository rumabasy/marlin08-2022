<?php

function dump($data, $stop=1){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}
session_start();
//check existing file name
if ($_FILES['image']['tmp_name']=="") {
	$_SESSION['note'] = 1;
	header("Location: task_18.php");
	exit;
}
// dump($_FILES);
//извлекаем расширение
$extens = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
//присваиваем уникальное имя
$filename = uniqid().'.'.$extens;
//сохраняем полученный файл в папку uploads
move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$filename);
//подключаемся к бд
$pdo = new PDO('mysql:host=localhost;dbname=marlin;','root','');
//записываем название файла в бд
$sql = "INSERT INTO images (image) VALUES (:image)";
$statement = $pdo->prepare($sql);
$statement->bindparam(":image", $filename );
$statement->execute();
//скачиваем названия из бд в виде массива
$sql = "SELECT `image` FROM images";
$statement = $pdo->prepare($sql);
$statement->execute();
$images = $statement->fetchAll(PDO::FETCH_ASSOC);
//записываем массив в сессию, чтобы его можно было увидеть с другой страницы
$_SESSION['images']=$images;
// dump($_SESSION['images']);
//move to upload page
header('Location: task_18.php');