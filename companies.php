<?php require_once 'header.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>Companies</title>
</head>

<body>
    <!--featured company-->
    <section class="featured" id="companies">
        <h1 class="section-title">Features Company</h1>
        <p>
            Lorem ipsum dolor sit amet consector adipising elit. Nobis eum
            perferends, nemo distinctio reiciends eveniet.
        </p>
        <div class="featured-wrapper">
            <div class="featured-card">
                <img class="featured-company-image" src="images/youtube.png" />
                <p>youtube</p>
                <button class="featured-button">View 1 jobs</button>
            </div>

            <div class="featured-card">
                <img class="featured-company-image" src="images/google.com.png" />
                <p>Google</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img class="featured-company-image" src="images/facebook.png" />
                <p>facebook</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
        </div>

        <button class="job-more">More List</button>
    </section>


    <?php include_once 'footer.php' ?>