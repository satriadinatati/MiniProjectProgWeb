<?php 
require_once("../config.php");
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}
if (isset($_POST)) {
	$id_alat = $_POST['id_alat'];
	$nama_alat = $_POST['nama_alat'];

	$sql = "UPDATE alat SET nama_alat='".$nama_alat."' WHERE id_alat=".$id_alat.";";
	$query = mysqli_query($conn, $sql);
	if (!$query) {
		echo mysqli_error($conn);
		die();
	}
	mysqli_close($conn);
	header("Location: index.php");
}
 ?>