<?php 
require_once("../config.php");
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}
if (isset($_POST)) {
	$id_tipe = $_POST['id_tipe'];
	$nama_tipe = $_POST['nama_tipe'];

	$sql = "UPDATE tipe SET nama_tipe='".$nama_tipe."' WHERE id_tipe=".$id_tipe.";";
	$query = mysqli_query($conn, $sql);
	if (!$query) {
		echo mysqli_error($conn);
		die();
	}
	mysqli_close($conn);
	header("Location: index.php");
}
 ?>