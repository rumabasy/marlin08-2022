<?php
session_start();
function dump($data, $stop){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}

// dump($_POST, 0);

//зашифровать пароль
//получить данные  в переменную
$pass= password_hash($_POST['password'], PASSWORD_DEFAULT);
$data = ['email' => $_POST['email'],'password'=> $pass];
// dump($data, 0);
//соединиться с бд
$pdo = new PDO("mysql:dbname=marlin;host=localhost", 'root', '');
//--------------------------------------------------------------------------------
// //получить данные из бд
// $sql = "SELECT email FROM task13";
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $emails = $statement->fetchAll(PDO::FETCH_ASSOC);
// // dump($emails, 0);
// //сравнить имэйлы //если надо вернуть на страницу формы
// foreach ($emails as $ema) {
// 	if($ema['email']==$data['email']) $_SESSION['alert']='danger';
// }

// if( $_SESSION['alert']=='danger'){
// 	header("Location: task_13.php");
// } else {
// 	$sql = "INSERT INTO task13 (email,password) VALUE(:email, :password)";
// 	$statement=$pdo->prepare($sql);
// 	$statement->execute($data);
// 	$_SESSION['alert']='success';
// 	header("Location: task_13.php");
// }
//---------------------------------------------------------------------------------
$email=$_POST['email'];

$sql = "SELECT * FROM task13 WHERE email=:email";
$statement= $pdo->prepare($sql);
$statement->execute(['email'=>$email]);
$result=$statement->fetch(PDO::FETCH_ASSOC);
// dump($result,1);
if(!empty($result)) {
	$_SESSION['danger']='Этот эл адрес уже занят другим пользователем';
	header("Location: task_13.php");
	// exit;
} else{
	$_SESSION['success']='Этот эл адрес успешно записан в БД';
	$sql = "INSERT INTO task13 (email, password) VALUE(:email, :password)";
	$statement = $pdo->prepare($sql);
	$statement->execute(['email' => $email,'password'=> $pass]);
	header("Location: task_13.php");
}