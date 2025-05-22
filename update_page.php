<?php include('header.php'); ?> 
<?php include('dbcon.php'); ?> 
 
<?php 
if (!isset($_GET['id'])) { 
    die("ID not provided in URL."); 
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
    $age = $_POST['age']; 
    $cgpa = $_POST['cgpa']; 
 
    $query = "UPDATE `student` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age', `cgpa` = '$cgpa' WHERE `id` = '$id'"; 
    $result = mysqli_query($connection, $query); 
 
    if (!$result) { 
        die("Query Failed: " . mysqli_error($connection)); 
    } else { 
        header('Location: index.php?update_msg=Successfully Updated.'); 
        exit();
    } 
} 
?> 
 
<form action="update_page.php?id=<?php echo $id; ?>" method="post"> 
    <div class="form-group"> 
        <label for="f_name">First Name</label> 
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>"> 
    </div><br> 
 
    <div class="form-group"> 
        <label for="l_name">Last Name</label> 
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>"> 
    </div><br> 
 
    <div class="form-group"> 
        <label for="age">Age</label> 
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>"> 
    </div><br> 
 
    <div class="form-group"> 
        <label for="cgpa">CGPA</label> 
        <input type="text" name="cgpa" class="form-control" value="<?php echo $row['cgpa']; ?>"> 
    </div><br> 
    <div class="modal-footer"> 
        <input type="submit" class="btn btn-success" name="update_student" value="Update Student"> 
    </div> 
</form> 
 
<?php include('footer.php'); ?> 
