<?php 
require_once("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo $id;
    $sql = "DELETE FROM alat WHERE id_alat=".$id.";";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
    	echo mysqli_error($conn);
    	die();
    }
    mysqli_close($conn);
    header("Location: index.php");
}
 ?>