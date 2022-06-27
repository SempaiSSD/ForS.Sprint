<?php
require_once 'db.php';
$id = $_GET['id'];

$remove = mysqli_query($connect, "DELETE FROM users WHERE id = '$id'");
if (!$remove) {
	die("Delete error");
}
header('Location: /');
