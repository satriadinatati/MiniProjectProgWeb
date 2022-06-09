<?php
require_once("../config.php");

if (isset($_POST)) {
	$nama_instruktur = $_POST['nama_instruktur'];
	$sql = "INSERT INTO instruktur VALUES('','".$nama_instruktur."')";
	$query = mysqli_query($conn, $sql);
	if (!$query) {
		echo mysqli_error($conn);
		die();
	}
	mysqli_close($conn);
	header("Location: index.php");

}

 ?>