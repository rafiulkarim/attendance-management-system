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
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teacher ID</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($_GET['teacher-id'])){
                    $id = $_GET['teacher-id'];
                    $d_query = "delete from teacher where id='$id'";
                    $d_data = $db->delete($d_query);
                }
                ?>
                <?php
                $query = "select * from teacher";
                $data = $db->select($query);
                if ($data){
                    $i = 0;
                    while ($result = $data->fetch_assoc()){
                        $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $result['username'] ?></td>
                            <td><?php echo $result['email'] ?></td>
                            <td><?php echo $result['teacher_ID'] ?></td>
                            <td class="text-center">
                                <a href="teacher-edit.php?teacher-id=<?php echo $result['id'] ?>" class="btn btn-outline-success">Edit</a>
                                <a href="?teacher-id=<?php echo $result['id'] ?>" class="btn btn-outline-danger">Delete</a>
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
