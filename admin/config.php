<?php 

$hostname = "localhost";
$db = "efit_database";
$username = "root";
$password = "";

$conn = mysqli_connect($hostname, $username, $password, $db);
if (!$conn) {
	mysqli_error($conn);
}
 ?>