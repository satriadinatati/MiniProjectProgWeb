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
// session_start();
// if ($_SESSION==null) {
//     header("location: auth/login.php");
// }
?>
<body>
    <?php require_once("../header.php") ?>
    <div class="container">
        <div class="card card-50 card-mid">
            <div class="card-title">Data Alat</div>
            <div class="card-body">
                <table class="table" >
                    <thead>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Karpet</td>
                            <td>
                                <a class="btn btn-primary">Edit</a>
                                <a class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>