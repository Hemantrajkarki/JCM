<?php
require_once 'connection.php';
require_once 'function.php';
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./backend/style.css">
</head>

<body>

    <div class="container-profile">
        <br><br>
        <h1>Applications</h1>

        <?php $applications = get_applications_profile();

        if ($applications) :
        ?>
            <br><br>
            <table class="table" border="1" cellspacing="0" cellpadding="10" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Application id</th>
                        <th>Fullname</th>
                        <th>Sex</th>
                        <th>Expected salary</th>
                        <th>Email</th>
                        <th>Job Position</th>
                        <th>Job Post Title</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $app) : ?>

                        <tr>
                            <td><?php echo $app['id']; ?></td>
                            <td><?php echo $app['fullname']; ?></td>
                            <td><?php echo $app['sex']; ?></td>
                            <td><?php echo $app['expected_salary']; ?></td>
                            <td><?php echo $app['email']; ?></td>
                            <td><?php echo $app['job_position']; ?></td>
                            <td><?php echo get_job_title_by_id($app['job_id']); ?></td>
                            <td><?php echo $app['status']; ?></td>
                            <td><?php echo $app['date']; ?></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>


<?php include_once 'footer.php'; ?>