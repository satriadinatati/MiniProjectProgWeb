<?php
require_once("../config.php");
session_start();
if ($_SESSION['username']==null) {
    header("location: ../auth/login.php");
}
if (isset($_POST)) {
	// echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// echo "</pre>";

	$id_tipe = $_POST['id_tipe'];
	$id_instruktur = $_POST['id_instruktur'];
	$nama_olahraga = $_POST['nama_olahraga'];
	$deskripsi = $_POST['deskripsi'];
	$durasi = $_POST['durasi'];
	$level = $_POST['level'];
	$splitUrl = explode(".be/", $_POST['video']); //split url jadi array
	$video = $splitUrl[1]; // ambli url belakangnya aja

	// print_r($splitUrl);
	// die();

	$extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
	$newFileName = date("ddmYHis").'.'.$extension;

	$pathUpload = "../../assets/tumb/".$newFileName;

	$isValid=false;
    if (($extension=='jpg' || $extension=='jpeg') && $_FILES['thumbnail']['size']<=1000000) {
        $isValid=true;
    }
    if ($isValid) {
    	$move = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $pathUpload);
    	if ($move) {
    		$sql = "INSERT INTO olahraga VALUES('', ".$id_tipe.",".$id_instruktur.", '".$nama_olahraga."', '".$deskripsi."', ".$durasi.", '".$level."', '".$pathUpload."', '".$video."');";
    		$insert = mysqli_query($conn, $sql);
    		if (!$insert) {
    			echo mysqli_error($conn);
    			die();
    		}else{
    			$lastInsertid = mysqli_insert_id($conn);
    			$alat = $_POST['alat'];
    			for ($i=0; $i < count($alat) ; $i++) { 
    				$sql = "INSERT INTO detail_alat VALUES ('', ".$lastInsertid.", ".$alat[$i].");";
    				$insertAlat = mysqli_query($conn, $sql);
    			}
    		}
    	}
    }else{
    	echo "File thumbnail tidak valid, gunakan format jpg atau jpeg dengan ukuran maksimal 1mb";
    	die();
    }
    header("Location: index.php");

}else{
	echo "NOT FOUND";
}
mysqli_close($conn);