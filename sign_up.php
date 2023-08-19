<?php
require_once 'connection.php';
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = $con->prepare("INSERT INTO users(email, phone, password)VALUES(?,?,?)");
    $sql->bind_param('sis', $email, $phone, $password);
    if ($sql->execute()) {
        echo 'successful account creation';
        header('Location: ./sign_in.php');
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
    <title>Create New Account</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <div class="login">
                <div class="login-header">
                    <h3>Sign Up</h3>
                </div>
            </div>
            <form class="login-form" method='post'>
                <input name="email" type="email" placeholder="email" />
                <input name="phone" type="phone number" placeholder="phone number" />
                <input name="password" type="password" placeholder="password" />
                <button>Sign Up</button>
                <p class="message">
                    Already have an account? <a href="./sign_in.php">Login</a>
                </p>
            </form>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>