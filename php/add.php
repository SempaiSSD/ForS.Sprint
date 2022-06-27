<?php
require_once "db.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$role = $_POST['role'];
$error = '';

if (empty($first_name))
	$error = 'Введите имя';
else if (empty($last_name))
	$error = 'Введите фамилию';

if ($error != '') {
	echo $error;
	exit();
}


$add_user = "INSERT INTO users (first_name, last_name, role)
VALUES ('$first_name', '$last_name','$role')";

mysqli_query($connect, $add_user);

echo 'Готово';

