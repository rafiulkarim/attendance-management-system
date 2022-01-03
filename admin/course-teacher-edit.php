<?php
if(isset($_GET['course-teacher-id'])){
    $id = $_GET['course-teacher-id'];
}
?>

<?php
include 'inc/header.php';
?>
<div class="container">
    <div class="row" style="padding-top: 100px">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $course = mysqli_real_escape_string($db->link, $_POST['course']);
                $code = mysqli_real_escape_string($db->link, $_POST['code']);
                $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
                $t_name = mysqli_real_escape_string($db->link, $_POST['t_name']);
                $teacher_ID = mysqli_real_escape_string($db->link, $_POST['teacher_ID']);
                $query = "update course_teacher set batch='$batch', t_name='$t_name', teacher_ID='$teacher_ID', 
                          course='$course', code='$code' where id='$id'";
                $result = $db->update($query);

                if ($result){
                    echo "<div class='alert alert-success text-center' role='alert'>
                                              Course Teacher edited Successfully !
                                        </div>";
                }else{
                    echo "<div class='alert alert-danger text-center' role='alert'>
                                              Something went wrong !
                                        </div>";
                }
            }
            ?>
            <div style="background: #ffffff">
                <?php
                $u_query = "select * from course_teacher where id='$id'";
                $u_data = $db->select($u_query);
                while ($u_result = $u_data->fetch_assoc()){
                    ?>
                    <form style="padding: 15px" method="post" action="">
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <input type="text" class="form-control" id="batch" name="batch" placeholder="Enter batch"
                                   value="<?php echo $u_result['batch']?>">
                        </div>
                        <div class="form-group">
                            <label for="course">Course Title</label>
                            <input type="text" class="form-control" id="course" name="course" placeholder="Enter course title"
                                   value="<?php echo $u_result['course']?>">
                        </div>
                        <div class="form-group">
                            <label for="code">Course Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter course code"
                                   value="<?php echo $u_result['code']?>">
                        </div>
                        <div class="form-group">
                            <label for="t_name">Teacher Name</label>
                            <input type="text" class="form-control" id="t_name" name="t_name" placeholder="Enter course Teacher Name"
                                   value="<?php echo $u_result['t_name']?>">
                        </div>
                        <div class="form-group">
                            <label for="teacher_ID">Teacher Name</label>
                            <input type="text" class="form-control" id="teacher_ID" name="teacher_ID" placeholder="Enter course Teacher Id"
                                   value="<?php echo $u_result['teacher_ID']?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" value="submit">Submit</button>
                    </form>
                <?php }?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
