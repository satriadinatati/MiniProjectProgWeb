<?php 
require_once("../config.php");
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}
if (isset($_POST)) {

	$id_olahraga = $_POST['id_olahraga'];
	$id_tipe = $_POST['id_tipe'];
	$id_instruktur = $_POST['id_instruktur'];
	$nama_olahraga = $_POST['nama_olahraga'];
	$deskripsi = $_POST['deskripsi'];
	$durasi = $_POST['durasi'];
	$level = $_POST['level'];

	$splitUrl = explode(".be/", $_POST['video']); //split url jadi array
	$video = $splitUrl[1]; // ambli url belakangnya aja

	// update olahraga without thumbnail
	$sql = "UPDATE olahraga SET ".
			"id_tipe='".$id_tipe."', ".
			"id_instruktur='".$id_instruktur."', ".
			"nama_olahraga='".$nama_olahraga."', ".
			"deskripsi='".$deskripsi."', ".
			"level='".$level."', ".
			"video='".$video."' ".
			"WHERE id_olahraga=".$id_olahraga.";";
	$update = mysqli_query($conn, $sql);

	// delete all alat contain last
	$sql = "DELETE FROM detail_alat WHERE id_olahraga =".$id_olahraga.";";
	$delete = mysqli_query($conn, $sql);

	// insert alat
	$alat = $_POST['alat'];
	for ($i=0; $i < count($alat) ; $i++) { 
		$sql = "INSERT INTO detail_alat VALUES ('', ".$id_olahraga.", ".$alat[$i].");";
		$insertAlat = mysqli_query($conn, $sql);
	}
	if (!$update) {
		echo mysqli_error($conn);
		echo "EHE";
		die();
	}

	
	// thumbnail edit
	if ($_FILES['thumbnail']['name']!=null) {

		$extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION); //get extension
		$newFileName = date("ddmYHis").'.'.$extension; // make new name
		$pathUpload = "../../assets/tumb/".$newFileName; // folder upload

		$isValid=false;

	    if (($extension=='jpg' || $extension=='jpeg' || $extension=='JPG' || $extension=='JPEG') && $_FILES['thumbnail']['size']<=2000000) {
	        $isValid=true;
	    }

	    if ($isValid) {

	    	// get last thumbnail
			$sql = "SELECT thumbnail FROM olahraga WHERE id_olahraga=".$id_olahraga.";";
			$thumbnail = mysqli_query($conn, $sql);
			$thumbnailSRC = mysqli_fetch_array($thumbnail)['thumbnail'];

			unlink($thumbnailSRC); // hapus image lama

			// move thumbnail baru

	    	$move = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $pathUpload);
	    	if ($move) {
	    		$sql = "UPDATE olahraga SET ".
	    				"thumbnail='".$pathUpload."' ".
	    				"WHERE id_olahraga=".$id_olahraga.";";

	    		$updateThumbnail = mysqli_query($conn, $sql);
	    		if (!$updateThumbnail) {
	    			echo mysqli_error($conn);
	    			die();
	    		}
    		}else{
    			echo "GABISA DI PINDAH FILENYA";
    		}
	    }else{
	    	echo "File thumbnail tidak valid, gunakan format jpg atau jpeg dengan ukuran maksimal 2mb";
	    	die();
	    }
	}

	mysqli_close($conn);
	header("Location: index.php");
}
 ?>