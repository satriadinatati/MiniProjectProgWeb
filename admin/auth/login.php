<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<?php session_start(); ?>
<body>
    <div class="container">

        <div class="card card-30 card-mid">
            <div class="card-title">Login</div>
            <form class="form" action="validate.php" method="post" >
                <div class="form-input">
                    <label for="username">Username</label>
                    <input class="input" name="username" id="username" type="text" placeholder="Username">
                </div>

                <div class="form-input">
                    <label for="password">Password</label>
                    <input class="input" name="password" id="password" type="password" placeholder="Password">
                </div>

                <div class="form-input">
                    <input type="submit" value="Login" class="btn btn-primary" >
                </div>

                <div class="form-input" style="color: red;">
                    <?php if (isset($_SESSION['err'])) {
                        echo $_SESSION['err'];
                    } ?>
                </div>

            </form>
        </div>
        
    </div>

</body>
</html>