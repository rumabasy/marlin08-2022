<?php
session_start();

// //подключаемся к бд
// $pdo = new PDO("mysql:dbname=marlin;host=localhost;", 'root', '');
// //получаем данные из бд
// $sql = "SELECT * FROM text12 ";
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);


// //находим есть ли соответствие в бд и пост
// foreach ($result as $value) {
// 	if ($value['text']==$_POST['text']) {
// 		$_SESSION['alert']='danger';
// 	} 	
// }
// //
// if ($_SESSION['alert']!='danger'){
// 	$_SESSION['alert']='success';
// 	// записываем полученный и проверенный текст в бд
// 	$data = ['textx'=> $_POST['text']];
// 	$sql = "INSERT INTO text12 (text) VALUE (:textx)";
// 	$statement=$pdo->prepare($sql);
// 	$statement->execute($data);
// }

// //переходим на страницу ввода
// header("Location: /task_12s.php");

//решение рахима
$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin", "root", "");

$sql ="SELECT * FROM text12 WHERE text=:text";//выбрать все где текст соответствует тексту
$statement = $pdo->prepare($sql);//подготовка
$statement->execute(['text' => $text]);//исполнение
$task = $statement->fetch(PDO::FETCH_ASSOC);//записываем массив, соответствующий тексту
// var_dump($task);
if(!empty($task)){
	$message ="введенная запись уже присутствует";
	$_SESSION['danger']=$message;
	header("Location: /task_12r.php");
	exit;
}


$sql = "INSERT INTO text12 (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

$message ="запись сохранена";
$_SESSION['success']=$message;
header("Location: /task_12r.php");
		
?>