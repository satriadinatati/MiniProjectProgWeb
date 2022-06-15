<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
</head>
<?php
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}
?>
<body>
    <div class="header">
        <div class="left">
            <a href="../tipe">Tipe Olahraga</a>
            <a href="index.php">Alat Olahraga</a>
            <a href="../instruktur">Instruktur Olahraga</a>
            <a href="../olahraga">Post Olahraga</a>
        </div>
        <div class="right">
            <a href="">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card card-50 card-mid">
            <div class="card-title">Tambah Data Alat</div>
            <div class="card-body">
                <form class="form" method="post" action="store.php" >
                    <div class="form-input">
                        <label for="nama_alat">Nama Alat</label>
                        <input class="input" required name="nama_alat" id="nama_alat" type="text" placeholder="Nama Alat">
                    </div>

                    <div class="form-input">
                        <input type="submit" value="Submit" class="btn btn-primary" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>