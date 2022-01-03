<?php
include 'inc/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="padding-top: 100px; text-align: center">
                <div style="background: #ffffff">
                    <h3>My Courses</h3>
                    <?php
                        $id = Session::get('teacherID');
                        $query = "select * from course_teacher where teacher_ID='$id'";
                        $data = $db->select($query);
                        while ($result = $data->fetch_assoc()){
                    ?>
                        <a href="batch-wise-attendance.php?batch-attendance=<?php echo $result['batch'].'-'.$result['course'].'-'.$result['code'].'-'.$id ?>">
                            <p ><?php echo $result['batch'].'-'.$result['course'].'-'.$result['code'] ?></p>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<?php
include 'inc/footer.php';
?>