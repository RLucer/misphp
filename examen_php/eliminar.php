<?php
include("conexionBD.php");
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM compras WHERE id = $id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Ejecución Fallida");
  }
  $_SESSION['message'] = 'Información Eliminada Exitosamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}
?>