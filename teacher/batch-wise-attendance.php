<?php
    if(isset($_GET['batch-attendance'])){
        $str = explode("-", $_GET['batch-attendance']);
    }
?>
<?php
include 'inc/header.php';
?>
<div class="container">
    <div class="pt-5 text-center">
        <h3 style="background: white; padding: 15px">
            <?php
            echo 'Batch:'.$str[0].' - Course: '.$str[1].' - Course Code:'.$str[2];
            ?>
        </h3>
    </div>
    <div class="row">
        <div class="col-md-5" style="padding-top: 25px; text-align: center">

            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $data = $_POST;
                $date = $_POST['date'];
                $u_id = Session::get('teacherID');
                $submitval = count($_POST['student_id']);
                for ($i=0;$i<$submitval; $i++){
                    $query = "INSERT INTO attendance(username, student_id, attendance, batch, course, teacher_ID, date)
                                    VALUES('{$_POST['username'][$i]}','{$_POST['student_id'][$i]}',
                                           '{$_POST['attendance'][$i]}','{$_POST['batch'][$i]}','{$_POST['course'][$i]}',
                                           '$u_id', '$date')";
                    $result = $db->insert($query);
                }
                echo "<div class='alert alert-success text-center' role='alert'>
                                      Attendance completed !
                                </div>";
            }
            ?>
            <div class="bg-white">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Attendance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($_GET['delete-student'])){
                            $id = $_GET['delete-student'];
                            $d_query = "delete from course_student where id='$id'";
                            $d_data = $db->delete($d_query);
                            if($d_data){
                                header("Location: all-student.php");
                            }
                        }
                        ?>
                        <?php
                        $id = Session::get('userId');
                        $query = "select * from course_student where batch='$str[0]' and course='$str[1]' and teacher_id='$str[3]' ";
                        $data = $db->select($query);
                        if($data){
                            $i = 0;
                            while ($result = $data->fetch_assoc()){
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $result['username']?></td>
                                    <input type="hidden" name="username[]" value="<?php echo $result['username']?>">
                                    <td><?php echo $result['student_id']?></td>
                                    <input type="hidden" name="student_id[]" value="<?php echo $result['student_id']?>">
                                    <td>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="attendance[]" value="present">Present
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="attendance[]" value="absent">Absent
                                        </label>
                                    </td>
                                    <input type="hidden" name="batch[]" value="<?php echo $result['batch']?>">
                                    <input type="hidden" name="course[]" value="<?php echo $result['course']?>">
                                </tr>
                            <?php }} else{ ?>
                            <p>No more data</p>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div style="padding-bottom: 5px">
                        <input type="text" class="text-center" name="date" placeholder="Enter Today Date" required>
                    </div>
                    <div style="padding-bottom:  10px">
                        <button class="btn btn-primary" value="submit" type="submit" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7" style="padding-top: 25px; text-align: center">
            <div class="bg-white">
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $attendance_id = $_POST['attendance_id'];
                        $attendance = $_POST['attendance'];

                        $u_query = "update attendance set attendance='$attendance' where id='$attendance_id'";
                        $u_data = $db->update($u_query);
                    }
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Attendance</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $a_query = "select * from attendance where batch='$str[0]' and course='$str[1]' and teacher_id='$str[3]' order by date desc ";
                    $data = $db->select($a_query);
                    if($data){
                        $i = 0;
                        while ($a_result = $data->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $a_result['username'] ?></td>
                        <td><?php echo $a_result['student_id'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="attendance_id" value="<?php echo $a_result['id'] ?>">
                                <select name="attendance">
                                    <option value="<?php echo $a_result['attendance']?>" selected><?php echo $a_result['attendance']?></option>
                                    <option>--Select One --</option>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                </select>
                                <button class="btn btn-primary" value="submit" type="submit">submit</button>
                            </form>
                        </td>
                        <td><?php echo $a_result['date'] ?></td>
                    </tr>
                    <?php }}else{ ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
