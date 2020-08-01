<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('Location: ../index.php');
}

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$pass_str = $_POST['pass'];
$pass_hash = password_hash($pass_str, PASSWORD_DEFAULT);
date_default_timezone_set("Asia/Dhaka");
$creation_date = new DateTime('now');
$creation_date = $creation_date->format('Y-m-d H:i:s');

$reg = $con->prepare("INSERT INTO `users`(`username`, `email`, `pass_hash`, `pass_str`, `create_at`, `activation`) VALUES (?, ?, ?, ?, ?, ?)");
$req->execute([$name, $email, $pass_hash, $pass_str, $creation_date, '0']);
$reg->

?>