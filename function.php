<?php
require_once 'connection.php';

function login()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
