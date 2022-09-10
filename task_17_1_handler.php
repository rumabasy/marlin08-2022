<?php
session_start();

unset($_SESSION['alert']);
unset($_SESSION['success']);
unset($_SESSION['name']);

header("Location: task_17_0.php");