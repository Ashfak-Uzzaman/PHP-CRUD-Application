<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>Student Information</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
        Student</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>CGPA</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "select * from `student`";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("query Failed" . mysqli_error($connection));
        } else {
            // mysqli_fetch_assoc function fetch data each timme from a row and store in result
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['cgpa']; ?></td>
                    

                    <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

                <?php
            }
        }

        ?>
    </tbody>
</table>

<?php if (isset($_GET['message'])): ?>
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <?php echo $_GET['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (isset($_GET['insert_msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <?php echo $_GET['insert_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php if (isset($_GET['update_msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <?php echo $_GET['update_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>






<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control">
                    </div><br>

                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control">
                    </div><br>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control">
                    </div><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" name="add_student" value="Add Student">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php'); ?>