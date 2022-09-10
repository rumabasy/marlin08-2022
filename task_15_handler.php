<?php
function dump($data, $stop){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}


session_start();

$_SESSION['click'] +=1;

// dump($_SESSION['click'],1);
header("Location: task_15.php");