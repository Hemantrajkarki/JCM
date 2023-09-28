<?php
require_once 'connection.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['apply_job'])) {
        $full_name = $_POST['full_name'];
        $sex = $_POST['sex'];
        $expected_salary = $_POST['expected_salary'];
        $job_position = $_POST['job_position'];
        $email = $_POST['email'];
        $job_id = $_POST['job_id'];

        $stmt = $con->prepare("INSERT INTO applications(user_id, fullname, sex, expected_salary, job_position, email, job_id) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('isssssi', $_SESSION['user_id'], $full_name, $sex, $expected_salary, $job_position, $email, $job_id);
        if ($stmt->execute()) {
            echo "<script>alert('your application submited successfully')</script>";
        } else {
            echo "<script>alert('There is an error while submiting')</script>";
        }
    }
}
?>

<?php
require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['job_title']; ?></title>
    <link rel="stylesheet" href="./backend/style.css" />
</head>

<body>
    <div class="single-content">
        <img src="<?php echo $data['job_image']; ?>" />
        <h1>
            <?php echo $data['job_title']; ?>
        </h1>
        <p>
            <?php echo $data['job_description']; ?>
        </p>

        <?php if (login()) : ?>
            <br>
            <br>
            <h2>Apply form</h2>
            <br>
            <form class="form" method="POST">
                <label>Applicant name <br> <input type="text" name="full_name" placeholder="Applicant full name" required></label>
                <br>
                <br>
                <div class="form-group">
                    <label><input type="radio" name="sex" value="male" required> male</label>
                    <label><input type="radio" name="sex" value="female" required> female</label>
                </div>
                <br>
                <label>Expected salary <br><input type="number" name="expected_salary" required></label>
                <br>
                <br>
                <label>Job position <br><input type="text" name="job_position" required></label>
                <br>
                <br>
                <label>Emaiil <br><input type="email" name="email" required></label>
                <br>
                <br>
                <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                <button type="submit" name="apply_job">Apply</button>

            </form>
        <?php endif; ?>
    </div>
</body>

</html>
<?php require_once 'footer.php'; ?>