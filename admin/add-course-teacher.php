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
                    $batch = $_POST['batch'];
                    $title_code = explode("-",$_POST['title_code']);
                    $teacher_roll = explode("-", $_POST['teacher_roll']);

                    $ct_query = "INSERT INTO course_teacher(batch, course, code, t_name, teacher_ID)
                                VALUES('$batch', '$title_code[0]', '$title_code[1]', '$teacher_roll[0]', '$teacher_roll[1]')";
                    $result = $db->insert($ct_query);
                    if ($result){
                        echo "<div class='alert alert-success text-center' role='alert'>
                                                  Course Teacher added Successfully !
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
                        <label for="batch">Select Batch</label>
                        <select class="form-control" id="batch" name="batch">
                            <option>-- Select One --</option>
                            <?php
                                $b_query = "select * from batch";
                                $b_data = $db->select($b_query);
                                if($b_data){
                                while ($b_result = $b_data->fetch_assoc()){
                            ?>
                            <option value="<?php echo $b_result['batch']?>"><?php echo $b_result['batch']?></option>
                            <?php }}else{ ?>
                                <p>no more data</p>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title_code">Course Title and Course Code</label>
                        <select class="form-control" id="title_code" name="title_code">
                            <option>-- Select One --</option>
                            <?php
                            $b_query = "select * from course";
                            $b_data = $db->select($b_query);
                            if($b_data){
                                while ($b_result = $b_data->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $b_result['course'].'-'.$b_result['code']?>">
                                        <?php echo $b_result['course'].' - '.$b_result['code']?>
                                    </option>
                                <?php }}else{ ?>
                                <p>no more data</p>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="teacher_roll">Teacher Name and Teacher ID</label>
                        <select class="form-control" id="teacher_roll" name="teacher_roll">
                            <option>-- Select One --</option>
                            <?php
                            $b_query = "select * from teacher";
                            $b_data = $db->select($b_query);
                            if($b_data){
                                while ($b_result = $b_data->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $b_result['username'].'-'.$b_result['teacher_ID']?>">
                                        <?php echo $b_result['username'].' - '.$b_result['teacher_ID']?>
                                    </option>
                                <?php }}else{ ?>
                                <p>no more data</p>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" value="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
