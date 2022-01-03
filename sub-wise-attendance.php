<?php
    if (isset($_GET['course-attendance'])){
        $str = explode("-", $_GET['course-attendance']);
    }
?>

<?php
include 'inc/header.php';
?>
<div class="container">
    <div class="pt-5 text-center">
        <h3 style="background: white; padding: 15px">
            <?php
            echo 'Course: '.$str[1];
            ?>
        </h3>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="padding-top: 25px; text-align: center">
            <div style="background: #ffffff">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">attendance</th>
                        <th scope="col">date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = Session::get('userRoll');
                        $query = "select * from attendance where batch='$str[0]' and course='$str[1]' and student_id='$id' 
                                    order by date desc";
                        $data = $db->select($query);
                        if($data){
                            $i = 0;
                            while ($result = $data->fetch_assoc()){
                                $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i?></th>
                        <td><?php echo $result['attendance']?></td>
                        <td><?php echo $result['date']?></td>
                    </tr>
                    <?php }}else{?>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>
