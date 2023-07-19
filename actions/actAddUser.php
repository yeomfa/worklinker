<?php 
include '../database.php';

if (isset($_POST['submit'])) {
	$dataDase = new Database();
	$dataDase->connect();

	$name = $_POST['name'];
	$workCenterId = $_POST['work_center'];
	$date = $_POST['date'];

  if (empty($name)) {
    die(header("Location: ../index.php?status=failed&msg=Por favor, llene todas las entradas"));
  }

	$sql = "INSERT INTO `users`(`id`, `name`, `work_center_id`, `entry_date`) VALUES (NULL,'$name','$workCenterId','$date')";

	$result = $dataDase->runUpdate($sql);

	if ($result) {
		header("Location: ../index.php?status=success&msg=Usuario agregado con éxito");
	} else {
		header("Location: ../index.php?status=failed&msg=No se pudo agregar el usuario");
	}
}