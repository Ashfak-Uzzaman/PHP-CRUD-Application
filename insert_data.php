<?php
include 'dbcon.php';
if (isset($_POST['add_student'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];
    $cgpa=0.0;

    if ($fname == "" || empty($fname) || $lname == "" || empty($lname) || $age == "" || empty($age)) {
        header('location:index.php?message=You need to fill all of the attributes');
    } else {
        $query = "insert into `student` (`first_name`, `last_name`, `age`, `cgpa`) values ('$fname', '$lname', '$age', '$cgpa')";
        $result = mysqli_query($connection,$query);

        if (!$result) {
            die("Failed to insert". mysqli_error($connection,));
        }

        else{
            header('location:index.php?insert_msg=Added Successfully');

        }
    }


}
?>