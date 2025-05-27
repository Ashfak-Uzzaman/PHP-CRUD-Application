<?php
include 'dbcon.php';
include 'regx.php';
if (isset($_POST['add_student'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $department = $_POST['department'];
    $batch = $_POST['batch'];
    $password = $department;
    $cgpa = 0.0;


     if (!preg_match(NAME_REGX, $fname)) {
            header('Location: home_admin.php?message=Failed To Insert. Invalid First Name.');
            exit();

        }
        if (!preg_match(NAME_REGX, $lname)) {
            header('Location: home_admin.php?message=Failed To Insert. Invalid Last Name.');
            exit();

        }



        if (!preg_match(EMAIL_REGX, $email)) {
            header('Location: home_admin.php?message=Failed To Insert. Invalid Email.');
            exit();

        }

        if (!preg_match(DATE_OF_BIRTH_REGX, $date_of_birth)) {
            header('Location: home_admin.php?message=Failed To Insert. Invalid Date Format.');
            exit();

        }

        if (!preg_match(DEPARTMENT_REGX, $department)) {
            header('Location: home_admin.php?message=Failed To Insert. Invalid Department Name.');
            exit();

        }

        if (!preg_match(BATCH_REGX, $batch)) {
            header('Location: update_page.php?message=Failed To Insert. Invalid Batch Name or Format.');
            exit();

        }

    if ($fname == "" || empty($fname) || $lname == "" || empty($lname) || $date_of_birth == "" || empty($date_of_birth) || $email == "" || empty($email)) {
        header('location:home_admin.php?message=You need to fill all of the attributes');
    } else {
        $query = "INSERT INTO `student` (`first_name`, `last_name`, `email`, `password`, `date_of_birth`, `department`, `batch`, `cgpa`, `first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seventh`, `eighth`) VALUES ('$fname', '$lname', '$email', '$password', '$date_of_birth', '$department', '$batch', '$cgpa', '$cgpa','$cgpa','$cgpa','$cgpa','$cgpa','$cgpa','$cgpa','$cgpa')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Failed to insert" . mysqli_error($connection, ));
        } else {
            header('location:home_admin.php?insert_msg=Added Successfully');

        }
    }


}
?>