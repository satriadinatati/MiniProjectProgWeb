<?php
require_once('../config.php');
session_start();

$sql = "SELECT * FROM user WHERE username='".$_POST['username']."';";
$get = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($get);
if ($result) {
	if (password_verify($_POST['password'], $result['password'])) {
		$_SESSION['username'] = $_POST['username'];
		header('Location: index.php');
	}else{
		$_SESSION['err'] = "Password Salah";
	}
}else{
	$_SESSION['err'] = "Username Salah";
}
header("Location: login.php");