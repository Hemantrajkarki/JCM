<?php

include('./partials/_dbconnect.php');

$hash = '$2y$10$eomHPvZ6dqQ.hwwtnnxDDuu';

$valid = password_verify('123', $hash);

echo $valid ? 'Valid' : 'Not Valid';
?>