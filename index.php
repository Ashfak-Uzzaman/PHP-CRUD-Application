<?php
session_start();
if (isset($_SESSION['id'])) {

  if ($_SESSION['id'] == 0) {
    header('Location: home_admin.php');

  } else {
    header('Location: home_user.php');
  }
  exit();
}

?>
<?php include('header.php'); ?>
<?php include('regx.php'); ?>

<div class="container">
  <div class="login_form">
    <form class="form" action="login_process.php" method="post">
      <div class="form-group">
        <label for="email"><b>Email</b></label>
        <input type="text" name="email" pattern="<?php echo EMAIL_LOGIN_REGX_HTML; ?>" class="form-control border border-dark" required >
      </div>
      <div class="container"></div>
      <div class="form-group">
        <label for="password"><b>Password</b></label>
        <input type="password" name="password" pattern="<?php echo PASSWORD_REGX_HTML; ?>" class="form-control border border-dark" required >
      </div>
      <div class="container"></div>
      <div class="form-group text-center">
        <input type="submit" name="login" value="Login" class="btn btn-success login_button">
      </div>
    </form>
  </div>
</div>

<?php if (isset($_GET['login_failed_message'])): ?>
  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <?php echo $_GET['login_failed_message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<?php if (isset($_GET['message'])): ?>
  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <?php echo $_GET['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<?php include('footer.php'); ?>