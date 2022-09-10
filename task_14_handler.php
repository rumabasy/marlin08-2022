<?php
function dump($data, $stop){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}


session_start();



$_SESSION['message']=$_POST['text'];
// dump($_SESSION,1);
header('Location: task_14.php');

