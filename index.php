<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EzFit</title>
	<link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<?php

require_once('admin/config.php');

// get semua tipe yang ada di olahraga
$sql = "SELECT id_tipe FROM olahraga ".
		"GROUP BY id_tipe";
$tipeOlahraga = mysqli_query($conn, $sql);

?>
<body>
	<!-- Header start -->
	<header>
		<div class="right">
			<img src="assets/logo.png">
		</div>
		<div class="center">
			<ul>
				<li>
					<a href="">Home</a>
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
			<div class="search">
				<!-- <img src="assets/search.png"> -->
				<input type="search" name="search" placeholder="search" >
				<a href=""><img src="assets/search.png"></a>
			</div>
		</div>
	</header>
	<div class="banner">
	</div>
	<div class="banner-text">
		An Instant Tutorial for <br>
		Getting Your Body Keep in Fit Condition <br><br>
		<a href="#courses" class="btn">Show Courses</a>
	</div>

	<!-- Header end -->

	<!-- Main start -->
	<main>
		<div class="why">
			<h2 class="title" >Why Choose Us?</h2>

			<dd>Menjaga kesehatan terutama di masa pandemi ini sangatlah penting. Untuk itu kami mendirikan sebuat website bernama EzFit untuk membantu anda mewujudkan hidup sehat. Dengan courses yang kamu sediakan, anda bisa memilih salah satu atau semua course yang tersedia. EzFit menyediakan informasi olahraga yang anda butuhkan untuk workout. Terdapat Zumba, Yoga, dan Bodypump bagi anda yang ingin hidup sehat dengan olahraga.</dd><br>
			<dd>Silahkan lihat website ini jika anda ingin hidup sehat. Selamat berolahraga dan salam sehat dari EzFit!!!</dd>
		</div>		
		<h2 id="courses" class="title" >Our Courses</h2>

		<?php while ($tipe = mysqli_fetch_assoc($tipeOlahraga)) { ?>
		<div class="posts">
			<?php 
				// get olahraga sesuai tipe
				$sql = "SELECT * FROM olahraga ".
						"INNER JOIN tipe ON tipe.id_tipe = olahraga.id_tipe ".
						"WHERE olahraga.id_tipe = ".$tipe['id_tipe'].";";
				$olahraga = mysqli_query($conn, $sql);
			 ?>

			<?php while( $row = mysqli_fetch_assoc($olahraga)){  ?>

			<div class="conten">
				<div class="img" style="background: url('<?php echo explode('../../', $row['thumbnail'])[1] ?>');"></div>
				<div class="text">
					<h3><?php echo $row['nama_olahraga'].' - '.$row['level'] ?></h3>
					<p><?php echo $row['deskripsi'] ?></p>
				<div class="action">
					<a href="detail.php/?id=<?php echo $row['id_olahraga'] ?>"  class="btn">Detail</a>
				</div>
				</div>
			</div>

			<?php  }?>

		</div>
		<?php } ?>

	</main>
	<!-- Main end -->

	<!-- Footer start -->
	<footer>
		<h4>Follow Us On</h4>
		<div class="social">
			<div class="med">
				<img src="assets/facebook.png">
				<a target="_blank" href="https://facebook.com">Facebook</a>
			</div>

			<div class="med">
				<img src="assets/instagram.png">
				<a target="_blank" href="https://instagram.com">Instagram</a>
			</div>

			<div class="med">
				<img src="assets/twitter.png">
				<a target="_blank" href="https://twitter.com">Twitter</a>
			</div>
		</div>
		<br>
		<br>

	<div class="copy">Copyright &copy EzFit 2022, All Rights Reserved</div>
	</footer>
	<!-- Footer end -->
</body>
</html>