<?php
require_once 'db.php';

$get_users = mysqli_query($connect, "SELECT * FROM users");
$get_users = mysqli_fetch_all($get_users);


