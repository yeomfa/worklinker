<?php 
include '../database.php';

if (isset($_GET['id'])) {
	$dataDase = new Database();
	$dataDase->connect();

  $id = $_GET['id'];
	$sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";

	$result = $dataDase->runQuery($sql);

	if ($result) {
		echo json_encode($result);
	} else {
		return 'El usuario no existe!';
	}
}