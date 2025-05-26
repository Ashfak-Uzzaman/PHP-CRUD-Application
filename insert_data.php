<?php
include 'dbcon.php';
if (isset($_POST['add_student'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $department = $_POST['department'];
    $batch = $_POST['batch'];
    $password = $department;
    $cgpa = 0.0;

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