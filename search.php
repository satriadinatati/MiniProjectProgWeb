<?php 
require_once('admin/config.php');
$key = $_GET['key'];

// get all
$sql = "SELECT * FROM olahraga ".
		"INNER JOIN tipe ON tipe.id_tipe = olahraga.id_tipe ".
		"INNER JOIN instruktur ON instruktur.id_instruktur = olahraga.id_instruktur ".
		"WHERE nama_olahraga LIKE '%".$key."%' OR  nama_tipe LIKE '%".$key."%' OR level LIKE '%".$key."%';";
$all = mysqli_query($conn, $sql);
print_r($all==null);
// die();

?>
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
		<div class="search">
			<!-- <img src="assets/search.png"> -->
			<form method="get" action="search.php">
				<input type="text" name="key" placeholder="search" >
				<button type="submit" style="display: none;" ><img src="assets/search.png"></button>
			</form>
		</div>
	</div>
</header>
<!-- Header end -->

<!-- Main Start -->

<main style="min-height: 500px;" >
	<h2 id="courses" class="title" >Hasil Pencarian '<?php echo $_GET['key'] ?>'</h2>
	<div class="posts" style="margin: auto; width: 40%;" >
		<?php if (mysqli_num_rows($all)==0) :?>

			<h2 id="courses" class="title" >Uupss... None</h2>

		<?php else :?>
		<?php while( $row = mysqli_fetch_assoc($all)){  ?>

		<div class="conten" style="width:100%" >
			<div class="img" style="background: url('<?php echo explode('../../', $row['thumbnail'])[1] ?>'); margin: auto;"></div>
			<div class="text">
				<h3><?php echo $row['nama_olahraga'].' - '.$row['nama_tipe']." [".$row['level']."]" ?></h3>
				<p><?php echo $row['deskripsi'] ?></p>
			<div class="action" style="margin-top:30px" >
				<a href="detail.php?id=<?php echo $row['id_olahraga'] ?>"  class="btn">Detail</a>
			</div>
			</div>
		</div>

		<?php  }?>
		<?php endif ?>

	</div>
</main>
<!-- Main end -->

<?php require_once('footer.php') ?>