<?php
include 'inc/header.php';
?>
    <div class="container">
        <div class="row" style="padding-top: 100px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $teacher_ID = mysqli_real_escape_string($db->link, $_POST['teacher_ID']);
                    $check_user = "select * from teacher where teacher_ID='$teacher_ID'";
                    $check_data = $db->select($check_user);
                    if($check_data){
                        echo "<div class='alert alert-danger text-center' role='alert'>
                                          Already exists !
                                    </div>";
                    }else{
                        $username = mysqli_real_escape_string($db->link, $_POST['username']);
                        $email = mysqli_real_escape_string($db->link, $_POST['email']);
                        $password = mysqli_real_escape_string($db->link, $_POST['password']);

                        $query = "INSERT INTO teacher(username, email, teacher_ID, password)
                        VALUES('$username', '$email', '$teacher_ID', '$password')";
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
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="teacher_ID">Teacher ID</label>
                            <input type="text" class="form-control" id="teacher_ID" placeholder="Enter Teacher Id" name="teacher_ID">
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
<?php
include 'inc/footer.php';
?>