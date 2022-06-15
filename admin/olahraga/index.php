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
session_start();
if ($_SESSION==null) {
    header("location: ../auth/login.php");
}
?>

<?php 
// get data from table
$sql = "SELECT * FROM olahraga ";
$query = mysqli_query($conn, $sql);

// function untuk get alat olahraga
function get_alat($id_olahraga, $conn){
    $sql = "SELECT * FROM detail_alat 
    INNER JOIN alat ON alat.id_alat = detail_alat.id_alat
    WHERE id_olahraga=".$id_olahraga.";";

    $get = mysqli_query($conn, $sql);
    $i = 0; //untuk sparasi koma
    while ($row = mysqli_fetch_assoc($get)) {
        if ($i==0) {
            echo $row['nama_alat'];
        }else{
            echo ", ".$row['nama_alat'];
        }
        $i++;
    }
}

 ?>
<body>
    <div class="header">
        <div class="left">
            <a href="../tipe">Tipe Olahraga</a>
            <a href="../alat">Alat Olahraga</a>
            <a href="../instruktur">Instruktur Olahraga</a>
            <a href="index.php">Post Olahraga</a>
        </div>
        <div class="right">
            <a href="">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="card card-80 card-mid">
            <div class="card-title">Data Post Olahraga</div>
            <div class="card-body">
                <a href="add.php" class="btn btn-primary">Add Data</a>
                <table class="table" >
                    <thead>
                        <th>No</th>
                        <th>Nama Olahraga</th>
                        <th>Level</th>
                        <th>Deskripsi</th>
                        <th>Alat</th>
                        <th>Instruktur</th>
                        <th>Durasi</th>
                        <th>Thumbnail</th>
                        <th>Video</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no=1; while ($row = mysqli_fetch_assoc($query)){ ?>
                        <tr>
                            <td><?php echo $no  ?></td>
                            <td><?php echo $row['nama_olahraga'] ?></td>
                            <td><?php echo $row['level'] ?></td>
                            <td><?php echo $row['deskripsi'] ?></td>
                            <td><?php get_alat($row['id_olahraga'], $conn) ?></td>
                            <td><?php echo $row['id_instruktur'] ?></td>
                            <td><?php echo $row['durasi'] ?> Menit</td>
                            <td>
                                <img width="100" src="<?php echo $row['thumbnail'] ?>">                            
                            </td>
                            <td>
                                <iframe src="https://www.youtube.com/embed/<?php echo $row['video'] ?> " title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id_olahraga'] ?>"  class="btn btn-primary">Edit</a>
                                <a onclick="hapus(<?php echo $row['id_olahraga']; ?>)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php 
mysqli_close($conn);
 ?>
<script>
    function hapus(id){
        confirm = window.confirm("Sure ?");
        if (confirm) {
            window.location.href = 'delete.php?id='+id;
        }
    }
</script>
</html>