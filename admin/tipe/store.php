<?php
require_once("../config.php");

if (isset($_POST)) {
	$nama_tipe = $_POST['nama_tipe'];
	$sql = "INSERT INTO tipe VALUES('','".$nama_tipe."');";
	$query = mysqli_query($conn, $sql);
	if (!$query) {
		echo mysqli_error($conn);
		die();
	}
	mysqli_close($conn);
	header("Location: index.php");

}

 ?>