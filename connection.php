<?php

$host = 'localhost';
$dbname = 'jcm';
$username = 'root';
$password = '';

$con = new mysqli($host, $username, $password, $dbname);

if ($con->connect_error) {
    die("Database connect error.");
}
session_start();
