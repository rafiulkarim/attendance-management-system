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
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-primary">
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
<body style="background: #C0C0C0">
<div class="container">
    <div class="row" style="padding-top: 100px">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $roll = mysqli_real_escape_string($db->link, $_POST['roll']);
                $query = "select * from student where roll='$roll'";
                $data = $db->select($query);
                if($data){
                    echo "<div class='alert alert-danger text-center' role='alert'>
                                          Already exists!
                                    </div>";
                }else{
                    $username = mysqli_real_escape_string($db->link, $_POST['username']);
                    $password = mysqli_real_escape_string($db->link, $_POST['password']);

                    $query = "INSERT INTO student(username, roll, password)
                        VALUES('$username', '$roll', '$password')";
                    $result = $db->insert($query);

                    if ($result){
                        echo "<div class='alert alert-success text-center' role='alert'>
                                          Successfully Registered !
                                    </div>";
                    }else{
                        echo "<div class='alert alert-danger text-center' role='alert'>
                                          Something went wrong !
                                    </div>";
                    }
                }

            }
            ?>
            <div style="background: #ffffff">
                <form style="padding: 15px" method="post" action="">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="roll">Student ID</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Student ID" name="roll">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" value="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>