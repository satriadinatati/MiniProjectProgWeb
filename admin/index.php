<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
</head>
<?php
session_start();
if ($_SESSION['username']==null) {
    header("location: auth/login.php");
}
?>
<body>
    
    <div class="header">
        <div class="left">
            <a href="tipe">Tipe Olahraga</a>
            <a href="alat">Alat Olahraga</a>
            <a href="instruktur">Instruktur Olahraga</a>
            <a href="olahraga">Post Olahraga</a>
        </div>
        <div class="right">
            <a href="">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="card card-30 card-mid">
            <div class="card-title">Home</div>
            <div class="card-body">
                Welcome Admin!
            </div>
        </div>
    </div>
</body>
</html>