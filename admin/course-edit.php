<?php
if(isset($_GET['course-id'])){
    $id = $_GET['course-id'];
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
                $query = "update course set course='$course', code='$code' where id='$id'";
                $result = $db->insert($query);

                if ($result){
                    echo "<div class='alert alert-success text-center' role='alert'>
                                              Course edited Successfully !
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
                $u_query = "select * from course where id = '$id'";
                $u_data = $db->select($u_query);
                while ($u_result = $u_data->fetch_assoc()){
                    ?>
                    <form style="padding: 15px" method="post" action="">
                        <div class="form-group">
                            <label for="username">Course Title</label>
                            <input type="text" class="form-control" id="course" name="course" placeholder="Enter course title"
                                   value="<?php echo $u_result['course']?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Course Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter course code"
                                   value="<?php echo $u_result['code']?>">
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
