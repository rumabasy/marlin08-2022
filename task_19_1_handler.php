<?php
//обработка удаления изображения
function dump($data, $stop=1){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}
session_start();

// dump($_GET);
$id=$_GET['id'];
// dump($id);
//подключаемся к бд
$pdo = new PDO("mysql:host=localhost;dbname=marlin", 'root', '');
//получаем название файла из бд с нужным id
$sql = "SELECT image FROM images WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindparam(":id", $id);
$statement->execute();
$image = $statement->fetch(PDO::FETCH_ASSOC);
// dump($image['image']);

//удаляем из бд запись с этим id
$sql = "DELETE FROM images WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindparam(":id", $id);
$statement->execute();

//перезаписываем сессию с новыми данными бд
$sql = "SELECT `id`, `image` FROM images";
$statement = $pdo->prepare($sql);
$statement->execute();
$_SESSION['img']= $statement->fetchALL(PDO::FETCH_ASSOC);
//удаляем сохраненный файл из uploads
unlink('uploads/'.$image['image']);

header("Location: task_19.php");