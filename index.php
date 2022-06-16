<?php require_once('header.php') ?>

<!-- Main start -->
<?php

require_once('admin/config.php');

// get semua tipe yang ada di olahraga
$sql = "SELECT id_tipe FROM olahraga ".
		"GROUP BY id_tipe";
$tipeOlahraga = mysqli_query($conn, $sql);

?>
<div class="banner">
	</div>
	<div class="banner-text">
		An Instant Tutorial for <br>
		Getting Your Body Keep in Fit Condition <br><br>
		<a href="#courses" class="btn">Show Courses</a>
	</div>
<main style="min-height: 500px;" >
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
				<h3><?php echo $row['nama_olahraga'].' - '.$row['nama_tipe']." [".$row['level']."]" ?></h3>
				<p><?php echo substr($row['deskripsi'],0,150); ?>...</p>
			<div class="action">
				<a href="detail.php?id=<?php echo $row['id_olahraga'] ?>"  class="btn">Detail</a>
			</div>
			</div>
		</div>

		<?php  }?>

	</div>
	<?php } ?>

</main>
	<!-- Main end -->

<?php require_once('footer.php') ?>