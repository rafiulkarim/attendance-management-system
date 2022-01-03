<?php
    if (isset($_GET['teacher-id'])){
        $id = $_GET['teacher-id'];
    }
?>
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
                    $username = mysqli_real_escape_string($db->link, $_POST['username']);
                    $email = mysqli_real_escape_string($db->link, $_POST['email']);

                    $update_query = "update teacher set teacher_ID='$teacher_ID', username='$username', email='$email'
                                    where id='$id'";
                    $update_data = $db->update($update_query);

                    if ($update_data){
                        echo "<div class='alert alert-success text-center' role='alert'>
                                              Teacher Details Edited Successfully !
                                        </div>";
                    }else{
                        echo "<div class='alert alert-danger text-center' role='alert'>
                                              Something went wrong !
                                        </div>";
                    }

                }
                ?>
                <h4 style="background: #ffffff; padding: 15px; text-align: center">Edit Teacher Details</h4>
                <div style="background: #ffffff">
                    <?php
                        $u_query = "select * from teacher where id = '$id'";
                        $u_data = $db->select($u_query);
                        while ($result = $u_data->fetch_assoc()){
                    ?>
                    <form style="padding: 15px" method="post" action="">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $result['username']?>" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $result['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="teacher_ID">Teacher ID</label>
                            <input type="text" class="form-control" id="teacher_ID" placeholder="Enter Teacher Id" name="teacher_ID" value="<?php echo $result['teacher_ID']?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" value="submit">Submit</button>
                    </form>
                            <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
<?php
include 'inc/footer.php';
?>