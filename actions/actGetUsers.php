<?php
$dataDase->connect();

$sql = "SELECT users.*, work_centers.name AS work_center_name 
        FROM users 
        INNER JOIN work_centers ON users.work_center_id = work_centers.id
        ORDER BY users.id";

$users = $dataDase->runQuery($sql);

if (!$users) {
  echo 'Failure to obtain users';
}