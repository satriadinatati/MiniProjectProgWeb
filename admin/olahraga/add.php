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
require_once("../config.php");

// get data tipe
$sql = "SELECT * FROM tipe";
$tipe = mysqli_query($conn, $sql);

// get data instruktur
$sql = "SELECT * FROM instruktur";
$instruktur = mysqli_query($conn, $sql);

// get data alat
$sql = "SELECT * FROM alat";
$alat = mysqli_query($conn, $sql);

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
            <a href="../auth/logout.php">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card card-50 card-mid">
            <div class="card-title">Tambah Data Post Olahraga</div>
            <div class="card-body">
                <form id="form" onsubmit="validasicekbox(event)" class="form" method="post" action="store.php" enctype="multipart/form-data" >
                    <div class="form-input">
                        <label for="nama_olahraga">Nama Olahraga</label>
                        <input class="input" required name="nama_olahraga" id="nama_olahraga" type="text" placeholder="Nama Olahraga">
                    </div>

                    <div class="form-input">
                        <label for="id_tipe">Tipe</label>
                        <select class="input" name="id_tipe" id="id_tipe" >
                            <?php while ($row = mysqli_fetch_assoc($tipe)) { ?>

                                <option class="input" value="<?php echo $row['id_tipe'] ?>" ><?php echo $row['nama_tipe'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-input">
                        <label for="level">Level</label>
                        <select class="input" name="level" id="level" >

                                <option class="input" value="Beginner" >Beginner</option>
                                <option class="input" value="Intermediate" >Intermediate</option>
                                <option class="input" value="Advanced" >Advanced</option>
                        </select>
                    </div>

                    <div class="form-input">
                        <label for="id_instruktur">Instruktur</label>
                        <select class="input" name="id_instruktur" id="id_instruktur" >
                            <?php while ($row = mysqli_fetch_assoc($instruktur)) { ?>

                                <option class="input" value="<?php echo $row['id_instruktur'] ?>" ><?php echo $row['nama_instruktur'] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-input">
                        <label>Alat</label>
                        <div style="border:none;padding-left: 20px;">

                            <?php while ($row = mysqli_fetch_assoc($alat)) {?>

                            <div style="display: flex;" >
                                <input type="checkbox" id="<?php echo $row['id_alat'] ?>" class="checkbox" name="alat[]" value="<?php echo $row['id_alat'] ?>">
                                <label for="<?php echo $row['id_alat'] ?>" style="margin-bottom:0;" ><?php echo $row['nama_alat'] ?></label>
                            </div>

                            <?php } ?>
                        
                        </div>
                    </div>

                    <div class="form-input">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="input" placeholder="Deskripsi olahraga" ></textarea>
                    </div>

                    <div class="form-input">
                        <label for="durasi">Durasi Olahraga (Menit)</label>
                        <input class="input" required name="durasi" id="durasi" type="number" placeholder="Durasi Olahraga">
                    </div>

                    <div class="form-input">
                        <label for="video">Link Video</label>
                        <input class="input" required name="video" id="video" type="text" placeholder="Link Video">
                    </div>

                    <div class="form-input">
                        <label for="thumbnail">Thumbnail</label>
                        <input id="image-form" class="input" name="thumbnail" id="thumbnail" type="file" placeholder="Image">
                        <img id="img-show" width="200" src="">
                    </div>

                    <div class="form-input">
                        <input type="submit" value="Submit" class="btn btn-primary" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>

    var imageForm = document.getElementById('image-form');

    imageForm.onchange = () =>{
        let [file] = imageForm.files;
        document.getElementById("img-show").src = URL.createObjectURL(file);
    }


    function validasicekbox(event){
        let pass = false
        let all = document.getElementsByClassName("checkbox")
        for (elem of all){
            if (elem.checked == true) {
                pass =  true;
                break;
            }
        }
        if (!pass) {
            alert("Alat belum dipilih");
            event.preventDefault();
        }
    }
</script>
</html>