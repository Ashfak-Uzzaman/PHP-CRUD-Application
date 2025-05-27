<?php $page = 'home'; ?>
<?php include('header.php'); ?>

<?php include('dbcon.php'); ?>
<?php session_start() ?>
<?php
if (isset($_SESSION['id'])) {
    ?>
    <?php include('navbar.php'); ?>
    <?php
    if (!isset($_GET['id'])) {
        die("ID not provided in URL.");
    }
    $id = $_GET['id'];
    echo '
<div class="box1 text-center">
    <h2>Result</h2>
    <h4>Student ID: 0' . $id . '</h4>
</div>
';
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
        $subject_keys = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth'];
        $cgpas = [];
        $total = 0.0;

        $non_zero = 0;
        foreach ($subject_keys as $key) {
            if (isset($_POST[$key]) && is_numeric($_POST[$key])) {
                $cgpas[$key] = (float) $_POST[$key];
            } else {
                // If the input is missing or not numeric, set it to 0
                $cgpas[$key] = 0;
            }
            $total += $cgpas[$key];
            $non_zero += ($cgpas[$key] != 0);
        }

        $average_cgpa = $total / $non_zero;


        $query = "UPDATE `student` SET 
    `first` = '{$cgpas['first']}',
    `second` = '{$cgpas['second']}',
    `third` = '{$cgpas['third']}',
    `fourth` = '{$cgpas['fourth']}',
    `fifth` = '{$cgpas['fifth']}',
    `sixth` = '{$cgpas['sixth']}',
    `seventh` = '{$cgpas['seventh']}',
    `eighth` = '{$cgpas['eighth']}',
    `cgpa` = '$average_cgpa'
    WHERE `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: home_admin.php?update_msg=Result Successfully Updated.');
            exit();
        }
    }
    ?>

    <form class="shrink_width" action="result_page.php?id=<?php echo $id; ?>" method="post">
        <?php
        $semesters = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth'];
        foreach ($semesters as $semester) {
            $value = isset($row[$semester]) ? $row[$semester] : '';
            echo ' 
<div class="form-group">  
    <label for="' . $semester . '"><b>' . ucfirst($semester) . ' Semester</b></label>  
    <input type="number" step="0.01" min="0" max="4" name="' . $semester . '" class="form-control border border-dark" value="' . $value . '" required>  
</div><br>';

        }
        ?>


        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="update_student" value="Update Result">
        </div>
    </form>

<?php } else {
    echo 'Failed';
}
?>
<?php include('footer.php'); ?>