<?php 
require_once("../config.php");
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // get data untuk hapus gambar thumbnail
    $sql = "SELECT thumbnail FROM olahraga WHERE id_olahraga=".$id.";";
    $result = mysqli_query($conn, $sql);
    $img = mysqli_fetch_array($result)['thumbnail'];
    // die();
    unlink($img); // hapus image
    $sql = "DELETE FROM olahraga WHERE id_olahraga=".$id.";";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
    	echo mysqli_error($conn);
    	die();
    }
    mysqli_close($conn);
    header("Location: index.php");
}
 ?>