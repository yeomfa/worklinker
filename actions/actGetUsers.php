<?php
include 'database.php';

$dataDase = new Database();
$dataDase->connect();

$sql = "SELECT * FROM `users`";

$result = $dataDase->runQuery($sql);

if (!$result) {
    echo 'Failure to obtain users';
}