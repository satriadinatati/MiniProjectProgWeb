<?php 
require_once("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo $id;
    $sql = "DELETE FROM instruktur WHERE id_instruktur=".$id.";";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
    	echo mysqli_error($conn);
    	die();
    }
    mysqli_close($conn);
    header("Location: index.php");
}
 ?>