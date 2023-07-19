<?php
$dataDase->connect();

$sql = "SELECT * FROM `work_centers`";

$work_centers = $dataDase->runQuery($sql);

if (!$work_centers) {
  echo 'Failure to obtain work centers';
}