<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'work_centers';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn) {
    die('Error in database connection ' . mysqli_connect_error());
}

// echo 'Connect successfully';