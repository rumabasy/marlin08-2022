<?php
function dump($data, $stop){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}

session_start();

// dump($_POST,0);

$pdo = new PDO("mysql:host=localhost;dbname=marlin;", 'root', '');

$sql = "SELECT * FROM task13 WHERE email=:emailx ";
$statement = $pdo->prepare($sql);
$statement->execute(['emailx'=>$_POST['email']]);
$result=$statement->fetch(PDO::FETCH_ASSOC);
// dump($result,0);

if(!empty($result['email'])){
	$check= password_verify($_POST['pass'], $result['password']);
	if ($check==1) {
		$_SESSION['name']= $_POST['email'];
		$_SESSION['success']='вы авторизовались успешно';
		unset($_SESSION['alert']);
	} else{
		$_SESSION['alert']='неправильный пароль для этого логина';
	}
}else{
	$_SESSION['alert']='нет такого логина';
}
header("Location: task_16.php");