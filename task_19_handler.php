<?php
//обработка загрузки изображения
function dump($data, $stop=1){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}
session_start();
//подключение к бд
$pdo = new PDO("mysql:dbname=marlin;host=localhost;", 'root', '');
// dump($_FILES);
//проверка существования файла
if (empty($_FILES["image"]['name'])){
	header("Location: task_19.php");
	exit;
} else saveDB($_FILES);

//присвоение уникального имени и перемещение в папку uploads и в БД
function saveDB($files){
	$extension = pathinfo($files["image"]['name'], PATHINFO_EXTENSION);
	$name = uniqid().'.'.$extension;
	move_uploaded_file($files["image"]['tmp_name'], "uploads/".$name);
	//запись файла в бд
	global $pdo;
	$sql = "INSERT INTO images (image) VALUES (:imagex)";
	$statement = $pdo->prepare($sql);
	$statement->bindparam(":imagex", $name);
	$statement->execute();
}


//чтение имен файлов из бд в массив
$sql = "SELECT `id`, `image` FROM images";
$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['img']= $statement->fetchALL(PDO::FETCH_ASSOC);

//возврат на страницу ввода
header("Location: task_19.php");
