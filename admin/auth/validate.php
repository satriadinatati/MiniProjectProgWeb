<?php
require_once('../config.php');
session_start();

$sql = "SELECT * FROM user WHERE username='".$_POST['username']."';";
$get = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($get);
$a = password_verify($_POST['password'], $result['password']);
echo $a;
if ($result) { // cek apakah username ada di db
	if (password_verify($_POST['password'], $result['password'])) { // cek apakah password sama
		$_SESSION['username'] = $_POST['username'];
		header('Location: ../index.php');
		die();
	}else{
		$_SESSION['err'] = "Password Salah";
	}
}else{
	$_SESSION['err'] = "Username Salah";
}
header("Location: login.php");