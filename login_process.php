<?php include('dbcon.php'); ?>
<?php session_start(); ?>
<?php

if (isset($_POST['login'])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        header('Location: index.php?login_failed_message=Please provide email and password.');
         exit(); 
    }

    $query = "select * from `student` where `email` = '$email' and `password` = '$password'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);


            $id = (int) $row['id'];

            if ($id == 0) {
                $_SESSION['id'] = $id;
                header('location:home_admin.php');

            } else {
                $_SESSION['id'] = $id;
                header('location:home_user.php');

            }

        } else {
            header('location:index.php?login_failed_message=Email or password are invalid');
        }
    }
}