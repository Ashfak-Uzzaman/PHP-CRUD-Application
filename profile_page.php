<?php $page = 'profile'; ?>
<?php include('header.php'); ?>

<?php include('dbcon.php'); ?>
<?php session_start() ?>
<?php
if (isset($_SESSION['id'])) {
    ?>
    <?php include('navbar.php'); ?>
    <div class="box1">
        <h2>Profile</h2>
    </div>
    <?php

    $id = $_SESSION['id'];

    $query = "SELECT * FROM `student` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <?php
    if (isset($_POST['update_student'])) {
        $password = $_POST['password'];
        $id = $_POST['id'];



        $query = "UPDATE `student` SET  
    `password` = '$password' 
    WHERE `id` = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            if ($id == 0) {
                header('Location: home_admin.php?update_msg=Successfully Updated.');

            } else {

                header('location:home_user.php?update_msg=Not Successfully Updated.');

            }

            exit();
        }
    }
    ?>

    <form class="shrink_width" action="profile_page.php" method="post">

        <?php if ($row['id'] != 0) { ?>

            <div class="form-group">
                <label for="id"><b>Student ID</b></label>
                <input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
            </div><br>



            <div class="form-group">
                <label for="f_name"><b>First Name</b></label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" readonly>
            </div><br>

            <div class="form-group">
                <label for="l_name"><b>Last Name</b></label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" readonly>
            </div><br>

            <div class="form-group">
                <label for="date_of_birth"><b>Date of Birth</b></label>
                <input type="text" name="date_of_birth" class="form-control" value="<?php echo $row['date_of_birth']; ?>"
                    readonly>
            </div><br>

            <div class="form-group">
                <label for="department"><b>Department</b></label>
                <input type="text" name="department" class="form-control" value="<?php echo $row['department']; ?>" readonly>
            </div><br>
            <div class="form-group">
                <label for="batch"><b>Batch</b></label>
                <input type="text" name="batch" class="form-control" value="<?php echo $row['batch']; ?>" readonly>
            </div><br>
        <?php } ?>
        <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" readonly>
        </div><br>

        <div class="form-group">
            <label for="password"><b>Password</b></label>
            <input type="text" name="password" class="form-control border border-dark"
                value="<?php echo $row['password']; ?>">
        </div><br>


        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="update_student" value="Update"
                value="<?php echo $row['last_name']; ?>">
        </div>
    </form>
<?php } ?>
<?php include('footer.php'); ?>