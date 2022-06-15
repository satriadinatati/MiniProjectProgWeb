<?php 
require_once("../config.php");
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}
if ($_SESSION['username']==null) {
	$id_instruktur = $_POST['id_instruktur'];
	$nama_instruktur = $_POST['nama_instruktur'];

	$sql = "UPDATE instruktur SET nama_instruktur='".$nama_instruktur."' WHERE id_instruktur=".$id_instruktur.";";
	$query = mysqli_query($conn, $sql);
	if (!$query) {
		echo mysqli_error($conn);
		die();
	}
	mysqli_close($conn);
	header("Location: index.php");
}
 ?>