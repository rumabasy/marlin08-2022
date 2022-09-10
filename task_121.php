<?php


//получить текст;
$check = $_POST['text'];

//подключиться к бд
$pdo = new PDO("mysql:dbname=marlin;host=localhost;","root", '');

//скачать все тексты из бд
$sql = "SELECT * FROM text12";
$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//сравнить 
foreach ($result as $res) {
		if ($res['text']==$check) $n = 1;
}

//передать в бд текст если такого еще не было
if($n == 1) header("Location: /task_12.php?alert=1");
else {
	$sql = "INSERT INTO text12 (text) VALUE (:text)";
	$statement = $pdo->prepare($sql);
	$statement->execute(['text' => $check]);
	// echo "Data saved";
	header("Location: /task_12.php?alert=5");
}