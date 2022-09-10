<?php
// это называется файл- обработчик

//мой вариант
								// $data =['text'=>$_POST['text']];
        //                 $connect = new PDO("mysql:host=localhost;dbname=marlin", 'root', ''); 
        //                 $sql="INSERT INTO text11 (text) VALUES (:text)";
        //                 $statement=$connect->prepare($sql);
        //                 $result = $statement->execute($data);
        //                 // if ($result == 1) echo "добавлен текст: ".$_GET['text'];
        //                 header('Location: task_11.php');
//вариант рахима

$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=marlin;",'root','');
$sql = "INSERT INTO text11 (text) VALUES (:text)";//напрямую в валюес паредавать $text нельзяб чтобы обезопасить себя от иньекций
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text] );//execute принимает только ассоциативный массив
header("Location: /task_11.php");



?>