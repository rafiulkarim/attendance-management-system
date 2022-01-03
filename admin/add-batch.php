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
                $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
                $query = "INSERT INTO batch(batch)
                            VALUES('$batch')";
                $result = $db->insert($query);

                if ($result){
                    echo "<div class='alert alert-success text-center' role='alert'>
                                              Batch added Successfully !
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
                        <label for="batch">Batch</label>
                        <input type="text" class="form-control" id="batch" name="batch" placeholder="Enter batch">
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
