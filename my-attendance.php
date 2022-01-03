<?php
include 'inc/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="padding-top: 100px; text-align: center">
                <div style="background: #ffffff">
                    <h5>My Courses</h5>
                    <?php
                        $id = Session::get('userRoll');
                        $query = "select * from course_student where student_id = '$id'";
                        $data = $db->select($query);
                        if($data){
                            while ($result = $data->fetch_assoc()){
                    ?>
                            <a href="sub-wise-attendance.php?course-attendance=<?php echo $result['batch'].'-'.$result['course']?>">
                                <p><?php echo $result['course']?></p>
                            </a>
                    <?php } }else{?>
                            no more data
                    <?php }?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<?php
include 'inc/footer.php';
?>