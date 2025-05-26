<?php
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null; // Get ID, or null if not set


$home_page_url = (isset($_SESSION['id']) && $_SESSION['id'] == 0) ? 'home_admin.php' : 'home_user.php';

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <div class="container"></div>
                <a class="nav-item nav-link <?= ($page == 'home') ? 'active' : '' ?>" href="<?= $home_page_url ?>">Home</a>
                <a class="nav-item nav-link <?= ($page == 'profile') ? 'active' : '' ?>" href="profile_page.php">Profile</a>
                <a class="nav-item nav-link <?= ($page == 'logout') ? 'active' : '' ?>" href="logout_process.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container"></div>