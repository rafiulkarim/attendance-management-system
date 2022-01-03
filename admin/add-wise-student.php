<?php
    if (isset($_GET['course-student'])){
        $id = explode("-", $_GET['course-student']);
    }
?>
<?php
    include 'inc/header.php';
?>
<div class="container">
    <div class="row" style="padding-top: 100px">
        <div class="col-md-5">
            <div style="background: #ffffff">
                <h4 style="text-align: center; line-height: 0; padding: 20px">All courses</h4>
                <?php
                $c_query = "select * from course_teacher";
                $c_data = $db->select($c_query);
                if($c_data){
                    $i=0;
                    while ($c_result = $c_data->fetch_Assoc()){
                        $i++;
                        ?>
                        <p style="padding-left: 20px;"><a href="add-wise-student.php?course-student=<?php echo $c_result['batch'].'-'.$c_result['course'].'-'.
                                $c_result['teacher_ID'].'-'.$c_result['t_name']?>">
                                <?php echo $i.'-'.$c_result['batch'].'-'.$c_result['course'].'-'.
                                    $c_result['teacher_ID'].'-'.$c_result['t_name']?>
                            </a></p>
                    <?php }}else{?>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $username = mysqli_real_escape_string($db->link, $_POST['username']);
                $student_id = mysqli_real_escape_string($db->link, $_POST['student_id']);

                $query = "INSERT INTO course_student(username, student_id, teacher_id, batch, course)
                            VALUES('$username', '$student_id', '$id[2]', '$id[0]', '$id[1]')";
                $result = $db->insert($query);

                if ($result){
                    echo "<div class='alert alert-success text-center' role='alert'>
                                              Course student added Successfully !
                                        </div>";
                }else{
                    echo "<div class='alert alert-danger text-center' role='alert'>
                                              Something went wrong !
                                        </div>";
                }
            }
            ?>
            <div style="background: #ffffff">
                <form style="padding: 15px" method="post" action="">
                    <div class="form-group">
                        <label for="username">Student Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" value="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
