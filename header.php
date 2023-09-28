<?php
require_once 'function.php';
?>

<!-- navbar -->
<header class="site-header">
    <!-- <div class="container"> -->
    <div class="banner-container">
        <nav class="navbar">
            <h2 class="navbar-logo">
                <a href="./index.php">JOB CENTER MERO</a>
            </h2>
            <div class="navbar-menu">
                <a href="./index.php">Home</a>
                <a href="./jobs.php">Jobs</a>
                <?php
                if (admin()) { ?>
                    <a href="./backend/admin.php">Dashboard</a>
                <?php }
                if (login() && !admin()) { ?>
                    <a href="./profile.php">Profile</a>
                <?php } ?>
                <?php
                if (login()) { ?>
                    <a href="./sign_out.php">Sign Out</a>
                <?php }
                if (!login()) {
                ?>
                    <a href="./sign_in.php">Sign In</a>
                <?php } ?>
            </div>
            <div class="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </div>
</header>