<?php
require_once 'connection.php';
require_once 'header.php';

$stmt = $con->prepare("SELECT * FROM jobs");
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo 'No data found';
    die();
}

$data = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Jobs</title>
</head>

<body>
    <!-- </div> -->
    </header>
    <section class="feature">
        <div class="container-new">

            <?php if ($data) : ?>
                <div class="feature-container">
                    <?php foreach ($data as $job) :
                        $id = $job['job_id'];
                        $permalink = 'single.php?id=' . urlencode($id);
                        $title = $job['job_title'];
                        $image_path = $job['job_image'];
                    ?>
                        <div class="feature-card-holder">
                            <div class="featured-card feature-card-new">
                                <img class="featured-image" src="<?php echo $image_path; ?>" />
                                <p><?php echo $title; ?></p>
                                <a href="<?php echo $permalink; ?>" class="featured-button">More</a>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php include_once 'footer.php'; ?>