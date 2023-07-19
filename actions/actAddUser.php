<?php 
include '../database.php';

if (isset($_POST['submit'])) {
	$dataDase = new Database();
	$dataDase->connect();

	$name = $_POST['name'];
	$workCenterId = $_POST['work_center'];
	$date = $_POST['date'];

	$sql = "INSERT INTO `users`(`id`, `name`, `work_center_id`, `entry_date`) VALUES (NULL,'$name','$workCenterId','$date')";

	$result = $dataDase->runUpdate($sql);

	if ($result) {
		header("Location: ../index.php?status=success&msg=New user successfully added");
	} else {
		header("Location: ../index.php?status=failed&msg=Could not add user");
	}
}