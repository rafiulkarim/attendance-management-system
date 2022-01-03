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

                $query = "INSERT INTO course(course, code)
                            VALUES('$course', '$code')";
                $result = $db->insert($query);

                if ($result){
                    echo "<div class='alert alert-success text-center' role='alert'>
                                              Course added Successfully !
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
                        <label for="username">Course Title</label>
                        <input type="text" class="form-control" id="course" name="course" placeholder="Enter course title">
                    </div>
                    <div class="form-group">
                        <label for="username">Course Code</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Enter course code">
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
