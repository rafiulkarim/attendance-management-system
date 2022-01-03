<?php
    include "lib/Session.php";
    Session::checklogin();
?>
<?php
    include "config/config.php";
    include "lib/Database.php";
    include "helpers/format.php";
?>
<?php
    $db = new Database();
    $fm = new Format();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-primary">
        <a class="navbar-brand" href="index.php" style="color: white">
            Attendance System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a style="color: white" class="nav-link" href="signup.php"><i aria-hidden="true"></i>Sign up</a>
                </li>
                <li style="color: white" class="nav-item">
                    <a style="color: white" class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6" style="padding-top: 100px">
            <img src="images/b1.jpg" height="450px" style="object-fit: cover" width="100%" alt="">
        </div>
        <div class="col-md-6" style="padding-top: 100px">
            <h1 style="padding-top: 100px" class="align-middle text-center">Attendance Management System</h1>
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>