<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <!-- front -->
    <!-- icons  -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet" />

    <title>JOB CENTER MERO</title>
    <title>Home</title>
</head>

<body>
    <!-- header -->
    <section class="banner">
        <div class="banner-container">
            <div class="banner-content">
                <h1 class="banner-title">
                    FIND YOUR <br />
                    SUITABLE JOB <br />
                    EASILY
                </h1>
            </div>
            <!-- <div class="banner-img">
                <img src="./images/Interview-banner.jpg" alt="Interview Image">
            </div> -->
        </div>
    </section>

    <!-- search -->
    <section class="search-wrapper">
        <div class="container">
            <form action="search.php" method="get" class="search-box">
                <!-- <label for="title" >Search Jobs</label> -->
                <input class="search-input" type="text" name="search" placeholder="Job title or keywords" />
                <button class="search-button">Search</button>
            </form>
        </div>
    </section>

    </section>
    <?php include_once 'footer.php'; ?>