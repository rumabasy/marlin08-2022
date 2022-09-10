<?php
//Это второй вариант файла для его работы надо переименовать его в task_20_handler.php
function dump($data, $stop=1){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}
function renameFILES($file){
	$extension = pathinfo($file, PATHINFO_EXTENSION);
	return $name = uniqid().'.'.$extension;
}
function moveFILE($tmpName,$newName){
	move_uploaded_file($tmpName, "uploads/".$newName);
}
function saveFILEdb($newName){
	global $pdo;
	$sql = "INSERT INTO images (image) VALUES (:imagex)";
	$statement = $pdo->prepare($sql);
	$statement->bindparam(":imagex", $newName);
	$statement->execute();
}
session_start();
// //подключение к бд
$pdo = new PDO("mysql:dbname=marlin;host=localhost;", 'root', '');

//считаем количество загружаемых файлов и отправляем в БД по очереди
$count = count($_FILES['images']['name']);
for ($i=0; $i < $count; $i++) { 
	$file= $_FILES['images']['name'][$i];
	$newName = renameFILES($file);
	$tmpPath = $_FILES['images']['tmp_name'][$i];
	moveFILE($tmpPath, $newName);
	saveFILEdb($newName);

}
//возврат на страницу ввода
header("Location: task_20.php");







//возврат на страницу ввода
// header("Location: task_20.php");
