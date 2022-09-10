<?php
function dump($data, $stop){
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	if($stop==1) die;
}


session_start();

unset($_SESSION['click']) ;
// dump($_SESSION['click'],1);
header("Location: task_15.php");