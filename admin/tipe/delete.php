<?php 
require_once("../config.php");
session_start();
if ($_SESSION['username']==null) {
    header("location: ../auth/login.php");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo $id;
    $sql = "DELETE FROM tipe WHERE id_tipe=".$id.";";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
    	echo mysqli_error($conn);
    	die();
    }
    mysqli_close($conn);
    header("Location: index.php");
}
 ?>