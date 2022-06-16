<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EzFit</title>
	<link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="assets/css/detail.css">
</head>
<body>
<!-- Header start -->
<header>
	<div class="right">
		<img src="assets/logo.png">
	</div>
	<div class="center">
		<ul>
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="">About</a>
			</li>
			<li>
				<a href="">Contact</a>
			</li>
		</ul>
	</div>
	<div class="left">
		<form method="get" action="search.php">
			<input type="text" name="key" placeholder="search" >
			<button type="submit" style="display: none;" ><img src="assets/search.png"></button>
		</form>
	</div>
</header>
<!-- Header end -->

<!-- Main Start -->
<?php 
require_once('admin/config.php');
// get data olahraga
$sql = "SELECT * FROM olahraga ".
		"INNER JOIN instruktur ON instruktur.id_instruktur = olahraga.id_instruktur ".
		"INNER JOIN tipe ON tipe.id_tipe = olahraga.id_tipe ".
		"WHERE id_olahraga = ".$_GET['id'].";";
$get = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($get);

// get alat
$sql = "SELECT * FROM detail_alat ".
		"INNER JOIN alat ON alat.id_alat = detail_alat.id_alat ".
		"WHERE id_olahraga = ".$_GET['id'].";";
$alat = mysqli_query($conn, $sql);
?>

<main>
	<h2 id="courses" class="title" ><?php echo $result['nama_olahraga']." - ".$result['level'] ?></h2>
	<div class="posts">
		<iframe width="852" height="480" src="https://www.youtube.com/embed/<?php echo $result['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

	</div>
	<div class="why">
		<div class="data">
			<div class="conten">
				<h2>Nama Instruktur</h2>
				<p><?php echo $result['nama_instruktur'] ?></p>
			</div>

			<div class="conten">
				<h2>Durasi Olahraga</h2>
				<p><?php echo $result['durasi'] ?> Menit</p>
			</div>

			<div class="conten">
				<h2>Tipe Olahraga</h2>
				<p><?php echo $result['nama_tipe'] ?></p>
			</div>

			<div class="conten">
				<h2>Level Kesulitan</h2>
				<p><?php echo $result['level'] ?></p>
			</div>

			<div class="conten">
				<h2>Peralatan Olahraga</h2>
				<p>
					<?php $a=0; while ($row = mysqli_fetch_assoc($alat)) {
						if ($a>0) {
							echo ', '.$row['nama_alat'];
						}else{
							echo $row['nama_alat'];
						}
						$a++;
					} ?>
				</p>
			</div>
		</div>
		<h2 class="title" >Description</h2>

		<p><?php echo $result['deskripsi'] ?></p><br>
		<a href="index.php" class="btn">Back</a>
	</div>		
</main>
<!-- Main end -->

<?php require_once('footer.php') ?>