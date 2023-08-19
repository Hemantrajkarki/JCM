<?php
require_once 'backend/connection.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Looks Like the page you are looking for is not found.";
    die();
}

$job_id = $_GET['id'];

$stmt = $con->prepare("SELECT * FROM jobs WHERE job_id = ?");
$stmt->bind_param('i', $job_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo 'No data found';
    die();
}

$data = $result->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['job_title']; ?></title>
</head>

<body>
    <img class="featured-image" src="<?php echo $data['job_image']; ?>" />
    <h1>
        <?php echo $data['job_title']; ?>
    </h1>
    <p>
        <?php echo $data['job_description']; ?>
    </p>
</body>

</html>