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
$sql = "SELECT * FROM tipe ";
$query = mysqli_query($conn, $sql);
mysqli_close($conn);

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
            <div class="card-title">Data Tipe</div>
            <div class="card-body">
                <a href="add.php" class="btn btn-primary">Add Data</a>
                <table class="table" >
                    <thead>
                        <th>No</th>
                        <th>Nama Tipe</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no=1; while ($row = mysqli_fetch_assoc($query)){ ?>
                        <tr>
                            <td><?php echo $no  ?></td>
                            <td><?php echo $row['nama_tipe'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id_tipe'] ?>"  class="btn btn-primary">Edit</a>
                                <a onclick="hapus(<?php echo $row['id_tipe']; ?>)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function hapus(id){
        confirm = window.confirm("Sure ?");
        if (confirm) {
            window.location.href = 'delete.php?id='+id;
        }
    }
</script>
</html>