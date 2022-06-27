<?php
require_once "db.php";

$id = $_POST["id"];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$role = $_POST['role'];

if (empty($first_name))
	$error = 'Введите имя';
else if (empty($last_name))
	$error = 'Введите фамилию';
if ($error != '') {
	echo $error;
	exit();
}

mysqli_query($connect, "UPDATE users SET first_name = '$first_name', last_name = '$last_name', role = '$role' WHERE id = '$id'");
