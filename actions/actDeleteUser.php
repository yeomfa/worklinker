<?php
include '../database.php';

if (isset($_GET['id'])) {
  $database = new Database();
  $database->connect();
    
  $id = $_GET['id'];
  $sql = "DELETE FROM `users` WHERE id = $id";

  $result = $database->runUpdate($sql);

  if ($result) {
    header("Location: ../index.php?status=success&msg=Usuario eliminado con éxito");
  } else {
    header("Location: ../index.php?status=failed&msg=No se pudo eliminar el usuario");
  }
}