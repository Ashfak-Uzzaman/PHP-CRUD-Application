<?php include 'dbcon.php'; ?>

<?php


$id = $_GET['id'];

$query = "delete from `student` where `id` = '$id'";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query Failed" . mysqli_error($connection));
} else {
    header('location:home_admin.php?delete_msg=Record Deleted Successfully.');
}

?>