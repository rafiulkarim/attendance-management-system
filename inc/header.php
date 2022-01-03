<?php
    include "lib/Session.php";
    Session::checkSession();
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
        <a class="navbar-brand" href="dashboard.php" style="color: white">
            Attendance System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a style="color: white" class="nav-link" href="my-attendance.php"><i aria-hidden="true"></i>
                        My Attendance
                    </a>
                </li>

                <li class="nav-item ">
                    <a style="color: white" class="nav-link" href="dashboard.php"><i aria-hidden="true"></i>
                        <?php echo Session::get('username'); ?>
                    </a>
                </li>
                <?php
                if(isset($_GET['action']) && $_GET['action']=="logout"){
                    Session::destroy();
                    header("Location: login.php");
                }
                ?>
                <li style="color: white" class="nav-item">
                    <a style="color: white" class="nav-link" href="?action=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<body style="background: #C0C0C0">

