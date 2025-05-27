<?php $page = 'home'; ?>
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('regx.php'); ?>
<?php session_start(); ?>
<?php
if (isset($_SESSION['id'])) {
    ?>
    <?php include('navbar.php'); ?>
    <div class="box1">
        <h2>Update Student Information</h2>
    </div>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <?php echo $_GET['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php
    if (!isset($_GET['id'])) {
        die("Failed To Update");
    }
    $id = $_GET['id'];

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
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $email = $_POST['email'];
        $date_of_birth = $_POST['date_of_birth'];
        $department = $_POST['department'];
        $batch = $_POST['batch'];

        if (!preg_match(NAME_REGX, $fname)) {
            header('Location: update_page.php?message=Invalid First Name.');
            exit();

        }
        if (!preg_match(NAME_REGX, $lname)) {
            header('Location: update_page.php?message=Invalid Last Name.');
            exit();

        }



        if (!preg_match(EMAIL_REGX, $email)) {
            header('Location: update_page.php?message=Invalid Email.');
            exit();

        }

        if (!preg_match(DATE_OF_BIRTH_REGX, $date_of_birth)) {
            header('Location: update_page.php?message=Invalid Date Format.');
            exit();

        }

        if (!preg_match(DEPARTMENT_REGX, $department)) {
            header('Location: update_page.php?message=Invalid Department Name.');
            exit();

        }

        if (!preg_match(BATCH_REGX, $batch)) {
            header('Location: update_page.php?message=Invalid Batch Name or Format.');
            exit();

        }




        $query = "UPDATE `student` SET 
    `first_name` = '$fname', 
    `last_name` = '$lname', 
    `email` = '$email', 
    `date_of_birth` = '$date_of_birth', 
    `department` = '$department', 
    `batch` = '$batch' 
    WHERE `id` = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: home_admin.php?update_msg=Successfully Updated.');
            exit();
        }
    }
    ?>

    <form class="shrink_width" action="update_page.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="f_name"><b>First Name</b></label>
            <input type="text" name="f_name" class="form-control border border-dark"
                value="<?php echo $row['first_name']; ?>">
        </div><br>

        <div class="form-group">
            <label for="l_name"><b>Last Name</b></label>
            <input type="text" name="l_name" class="form-control border border-dark"
                value="<?php echo $row['last_name']; ?>">
        </div><br>

        <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" class="form-control border border-dark" value="<?php echo $row['email']; ?>">
        </div><br>

        <div class="form-group">
            <label for="date_of_birth"><b>Date of Birth</b></label>
            <input type="text" name="date_of_birth" class="form-control border border-dark"
                value="<?php echo $row['date_of_birth']; ?>">
        </div><br>

        <div class="form-group">
            <label for="department"><b>Department</b></label>
            <input type="text" name="department" class="form-control border border-dark"
                value="<?php echo $row['department']; ?>">
        </div><br>

        <div class="form-group">
            <label for="batch"><b>Batch</b></label>
            <input type="text" name="batch" class="form-control border border-dark" value="<?php echo $row['batch']; ?>">
        </div><br>

        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="update_student" value="Update Student">
        </div>
    </form>

<?php } ?>
<?php include('footer.php'); ?>