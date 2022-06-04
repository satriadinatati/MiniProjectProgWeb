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
// session_start();
// if ($_SESSION==null) {
//     header("location: auth/login.php");
// }
?>
<body>
    <?php require_once("header.php") ?>
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