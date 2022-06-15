<?php
require_once('admin/config.php');

// get semua tipe yang ada di olahraga
$sql = "SELECT id_tipe FROM olahraga ".
		"GROUP BY id_tipe";
$tipeOlahraga = mysqli_query($conn, $sql);