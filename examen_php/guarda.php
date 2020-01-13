<?php include("includes/header.php") ?>
<?php
    include("conexionBD.php");

   $oc = $_POST['oc'];
   $cod_art = $_POST['cod_art'];
   $description = $_POST['description'];
   $cantidad = $_POST['cantidad'];
   $fecha = $_POST['fecha'];



   if($oc == 0 || $cod_art == 0 || $description =="" || $cantidad == 0 || $fecha == "" ){
    echo "";
?>
<div class="alert alert-danger" role="alert">
¡Ingrese un valor correcto y verifique no tener campos vacios!! <a href="index.php" class="alert-link">Vuelve al inicio</a>. Gracias
</div>
<?php
}else{
    $query = "INSERT INTO compras(N_orden_compra_rlucero,Codigo_art_rlucero,Descripcion_art_rlucero,Cantidad_art_rlucero,Fecha_compra) VALUES ('$oc', '$cod_art','$description','$cantidad','$fecha')";
    
    $result = mysqli_query($con,$query);
    if(!$result){
        die("Inserción Fallida");
    }
    $_SESSION['message'] = 'Compra Guardada Correctamente';
    $_SESSION['message_type']='success';

    Header("Location: index.php");
}
?>
  <?php include("includes/footer.php") ?>