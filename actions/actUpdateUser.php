<?php 
include '../database.php';
$id = $_GET['id'];

if (isset($_POST['submit'])) {
	$dataDase = new Database();
	$dataDase->connect();

	$name = $_POST['name'];
	$workCenterId = $_POST['work_center'];
	$date = $_POST['date'];

  if (empty($name)) {
      die(header("Location: ../index.php?status=failed&msg=Por favor, llene todas las entradas"));
  }

	$sql = "UPDATE `users` SET `name`='$name',`work_center_id`='$workCenterId',`entry_date`='$date' WHERE id=$id";

	$result = $dataDase->runUpdate($sql);

    if ($result) {
        header("Location: ../index.php?status=success&msg=Usuario actualizado con éxito");
    } else {
        header("Location: ../index.php?status=failed&msg=No se pudo actualizar el usuario");
    }
}