<?php $page = 'home'; ?>
<?php include('header.php'); ?>

<?php include('dbcon.php'); ?>

<?php session_start() ?>

<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    ?>
    <?php include('navbar.php'); ?>

    <table class="table table-hover table-bordered table-striped shrink_width">
        <tbody>
            <?php
            $query = "SELECT * FROM `student` WHERE `id` = '$id'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query Failed" . mysqli_error($connection));
            } else {
                // mysqli_fetch_assoc function fetch data each timme from a row and store in result
                $row = mysqli_fetch_assoc($result);
                ?>
               
                <h3 class="box1">Result</h3>
                <h6 class="box1"><?php echo 'Name: '.$row['first_name'].' '.$row['last_name']; ?></h6>
                <h6 class="box1"><?php echo 'Student ID: '.$row['id']; ?></h6><br>
               
                <h6 class="box1"><b><?php echo 'Total CGPA: '.$row['cgpa']; ?></b></h6>
                <tr>
                    <td><b>First Semester</b></td>
                    <td><?php echo $row['first']; ?></td>
                </tr>
                <tr>
                    <td><b>Second Semester</b></td>
                    <td><?php echo $row['second']; ?></td>
                </tr>
                <tr>
                    <td><b>Third Semester</b></td>
                    <td><?php echo $row['third']; ?></td>
                </tr>
                <tr>
                    <td><b>Fourth Semester</b></td>
                    <td><?php echo $row['fourth']; ?></td>
                </tr>
                <tr>
                    <td><b>Fifth Semester</b></td>
                    <td><?php echo $row['fifth']; ?></td>
                </tr>
                <tr>
                    <td><b>Sixth Semester</b></td>
                    <td><?php echo $row['sixth']; ?></td>
                </tr>
                <tr>
                    <td><b>Seventh Semester</b></td>
                    <td><?php echo $row['seventh']; ?></td>
                </tr>
                <tr>
                    <td><b>Eighth Semester</b></td>
                    <td><?php echo $row['eighth']; ?></td>
                </tr>

                <?php

            }

            ?>
        </tbody>
    </table>



<?php } else {
    header('location:index.php?message=You need to login');
}
include('footer.php'); ?>