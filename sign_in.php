<?php
require_once 'connection.php';
require_once 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize input (optional but recommended)
    // $email = mysqli_real_escape_string($con, $email);
    // $password = mysqli_real_escape_string($con, $password);

    // Check if the user exists in the database
    $query = $con->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo $user['password'] . "<br>";
        echo $password . "<br>";
        print_r($user);
        // Verify the password
        if ($password == $user['password']) {
            // Start the session and store user information
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Redirect to the home page
            header('Location: ./index.php');
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email.";
    }
}
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

    <title>Sign In</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>LOGIN</h3>
                    <p>Please enter your credentials to login.</p>
                </div>
            </div>
            <form class="login-form" method="post">
                <input name="email" type="email" placeholder="email" />
                <input name="password" type="password" placeholder="password" />
                <button>login</button>
                <p class="message">
                    Not registered? <a href="./sign_up.php">Create an account</a>
                </p>
            </form>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>