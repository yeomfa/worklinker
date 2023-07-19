<?php 
include '../db_conn.php';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$work_center = $_POST['work_center'];
	$date = $_POST['date'];

	$sql = "INSERT INTO `users`(`id`, `name`, `work_center_id`, `entry_date`) VALUES (NULL,'$name','$work_center','$date')";

	$result = mysqli_query($conn, $sql);

	if ($result) {
		header("Location: ../index.php?msg=New record created succesfully");
	} else {
		echo "Failed: " . mysqli_error($conn);
	}

}