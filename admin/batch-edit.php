<?php
    if (isset($_GET['batch-id'])){
        $id = $_GET['batch-id'];
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
                $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
                $query = "update batch set batch = '$batch' where id='$id'";
                $result = $db->update($query);

                if ($result){
                    echo "<div class='alert alert-success text-center' role='alert'>
                                              Batch Edited Successfully !
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
                    $u_query = "select * from batch where id='$id'";
                    $u_data = $db->select($u_query);
                    while ($u_result = $u_data->fetch_assoc()){
                ?>
                <form style="padding: 15px" method="post" action="">
                    <div class="form-group">
                        <label for="batch">Batch</label>
                        <input type="text" class="form-control" id="batch" name="batch" value="<?php echo $u_result['batch']?>" placeholder="Enter batch">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" value="submit">Submit</button>
                </form>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
