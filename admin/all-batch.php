<?php
include 'inc/header.php';
?>
<div class="container">
    <div class="row" style="padding-top: 100px">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="bg-white p-4" ">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Batch</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_GET['batch-id'])){
                    $id = $_GET['batch-id'];
                    $d_query = "delete from batch where id='$id'";
                    $d_data = $db->delete($d_query);
                }
                ?>
                <?php
                $query = "select * from batch";
                $data = $db->select($query);
                if ($data){
                    $i = 0;
                    while ($result = $data->fetch_assoc()){
                        $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $result['batch'] ?></td>
                            <td class="text-center">
                                <a href="batch-edit.php?batch-id=<?php echo $result['id'] ?>" class="btn btn-outline-success">Edit</a>
                                <a href="?batch-id=<?php echo $result['id'] ?>" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }}else{?>
                    <p>no more data available</p>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<?php
include 'inc/footer.php';
?>
