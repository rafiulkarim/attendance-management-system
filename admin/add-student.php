<?php
include 'inc/header.php';
?>
<div class="container">
    <div class="row" style="padding-top: 100px">
        <div class="col-md-2">
            <div style="background: #ffffff">

            </div>
        </div>
        <div class="col-md-8">
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
        <div class="col-md-2">

        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
