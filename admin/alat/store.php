<?php
require_once("../config.php");

if (isset($_POST)) {
	$nama_alat = $_POST['nama_alat'];
	$sql = "INSERT INTO alat VALUES('','".$nama_alat."')";
	$query = mysqli_query($conn, $sql);
	if (!$query) {
		echo mysqli_error($conn);
		die();
	}
	mysqli_close($conn);
	header("Location: index.php");

}

 ?>