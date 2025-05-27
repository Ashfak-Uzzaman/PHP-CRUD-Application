<?php $page = 'home'; ?>
<?php include('header.php'); ?>

<?php include('dbcon.php'); ?>
<?php include('regx.php'); ?>
<?php session_start() ?>

<?php
if (isset($_SESSION['id'])) {
    ?>
    <?php include('navbar.php'); ?>
    <div class="box1">
        <h2>Student Information</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
            Student</button>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th class="border border-dark">ID</th>
                <th class="border border-dark">First Name</th>
                <th class="border border-dark">Last Name</th>
                <th class="border border-dark">Email</th>
                <th class="border border-dark">Date of Birth</th>
                <th class="border border-dark">Department</th>
                <th class="border border-dark">Batch</th>
                <th class="border border-dark">CGPA</th>
                <th class="border border-dark">Update</th>
                <th class="border border-dark">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "SELECT * FROM `student` WHERE `id` != '0'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query Failed" . mysqli_error($connection));
            } else {
                // mysqli_fetch_assoc function fetch data each timme from a row and store in result
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td class="border border-dark"><?php echo $row['id']; ?></td>
                        <td class="border border-dark"><?php echo $row['first_name']; ?></td>
                        <td class="border border-dark"><?php echo $row['last_name']; ?></td>
                        <td class="border border-dark"><?php echo $row['email']; ?></td>
                        <td class="border border-dark"><?php echo $row['date_of_birth']; ?></td>
                        <td class="border border-dark"><?php echo $row['department']; ?></td>
                        <td class="border border-dark"><?php echo $row['batch']; ?></td>

                        <td class="border border-dark"><a href="result_page.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-outline-secondary"><?php echo $row['cgpa']; ?></a></td>

                        <td class="border border-dark"><a href="update_page.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-success">Update</a></td>
                        <td class="border border-dark"><a href="delete_page.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-danger">Delete</a></td>
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

    <?php if (isset($_GET['delete_msg'])): ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <?php echo $_GET['delete_msg']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>






    <!-- Modal -->
    <form action="insert_data.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="form-group">
                                <label for="f_name"><b>First Name</b></label>
                                <input type="text" name="f_name" pattern="<?php echo NAME_REGX_HTML; ?>" class="form-control border border-dark" required >
                            </div><br>

                            <div class="form-group">
                                <label for="l_name"><b>Last Name</b></label>
                                <input type="text" name="l_name" pattern="<?php echo NAME_REGX_HTML; ?>" class="form-control border border-dark" required >
                            </div><br>

                            <div class="form-group">
                                <label for="email"><b>Email</b></label>
                                <input type="text" name="email" pattern="<?php echo EMAIL_REGX_HTML; ?>" class="form-control border border-dark" required >
                            </div><br>

                            <div class="form-group">
                                <label for="date_of_birth"><b>Date of Birth</b></label>
                                <input type="text" name="date_of_birth" pattern="<?php echo DATE_OF_BIRTH_REGX_HTML; ?>" class="form-control border border-dark" required >
                            </div><br>

                            <div class="form-group">
                                <label for="department"><b>Department</b></label>
                                <input type="text" name="department" pattern="<?php echo DEPARTMENT_REGX_HTML; ?>" class="form-control border border-dark" required >
                            </div><br>

                            <div class="form-group">
                                <label for="batch"><b>Batch</b></label>
                                <input type="text" name="batch" pattern="<?php echo BATCH_REGX_HTML; ?>" class="form-control border border-dark" required>
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
<?php } else {
    header('location:index.php?message=You need to login');
}
include('footer.php'); ?>