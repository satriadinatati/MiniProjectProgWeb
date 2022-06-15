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
<?php 
require_once("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo $id;
    $sql = "SELECT * FROM tipe WHERE id_tipe=".$id.";";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    mysqli_close($conn);
}


 ?>
<body>
    <div class="header">
        <div class="left">
            <a href="index.php">Tipe Olahraga</a>
            <a href="../alat">Alat Olahraga</a>
            <a href="../instruktur">Instruktur Olahraga</a>
            <a href="../olahraga">Post Olahraga</a>
        </div>
        <div class="right">
            <a href="">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card card-50 card-mid">
            <div class="card-title">Edit Data Tipe Olahraga</div>
            <div class="card-body">
                <form class="form" method="post" action="update.php" >
                    <input type="hidden" name="id_tipe" value="<?php echo $result['id_tipe'] ?>">
                    <div class="form-input">
                        <label for="nama_tipe">Nama Tipe</label>
                        <input class="input" name="nama_tipe" id="nama_tipe" type="text" value="<?php echo $result['nama_tipe'] ?>" placeholder="Nama Tipe">
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