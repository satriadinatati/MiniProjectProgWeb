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
    require_once("../config.php");
 ?>

<?php
// session_start();
// if ($_SESSION==null) {
//     header("location: auth/login.php");
// }
?>

<?php 
// get data from table
$query = "SELECT * FROM alat";
$get = mysqli_query($conn, $query);

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
            <div class="card-title">Data Alat</div>
            <div class="card-body">
                <a href="add.php" class="btn btn-primary">Add Data</a>
                <table class="table" >
                    <thead>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no=1; while ($row = mysqli_fetch_assoc($get)){ ?>
                        <tr>
                            <td><?php echo $no  ?></td>
                            <td><?php echo $row['nama_alat'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id_alat'] ?>"  class="btn btn-primary">Edit</a>
                                <a href="href="delete.php?id=<?php echo $row['id_alat'] ?>"" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>