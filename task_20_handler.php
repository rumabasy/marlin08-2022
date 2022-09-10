<?php
//обработка загрузки изображения
function dump($data, $stop=1){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}
// //подключение к бд
$pdo = new PDO("mysql:dbname=marlin;host=localhost;", 'root', '');

// dump($_FILES);

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

//считаем количество загружаемых файлов и отправляем в БД
$count = count($_FILES['images']['name']);
for ($i=0; $i < $count; $i++) { 
	$files["image"]['name'] = $_FILES['images']['name'][$i];
	$files["image"]['tmp_name'] = $_FILES['images']['tmp_name'][$i];
	saveDB($files);
}

//возврат на страницу ввода
header("Location: task_20.php");

