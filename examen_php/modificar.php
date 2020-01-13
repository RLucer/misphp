<?php
include("conexionBD.php");
$oc = 0;
$cod_art = 0;
$description = "";
$cantidad = 0;
$fecha = 0000-00-00;

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM compras WHERE id=$id";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) ==1) {
    $row = mysqli_fetch_array($result);
    $oc = $row['N_orden_compra_rlucero'];
    $cod_art = $row['Codigo_art_rlucero'];
    $description = $row['Descripcion_art_rlucero'];
    $cantidad = $row['Cantidad_art_rlucero'];
    $fecha = $row['Fecha_compra'];
   
  }
}
if (isset($_POST['update'])) {

  $id = $_GET['id'];
  $oc = $_POST['oc'];
  $cod_art = $_POST['cod_art'];
  $description = $_POST['description'];
  $cantidad = $_POST['cantidad'];
  $fecha = $_POST['fecha'];
  $query = "UPDATE compras set N_orden_compra_rlucero= '$oc', Codigo_art_rlucero = '$cod_art',Descripcion_art_rlucero='$description',Cantidad_art_rlucero='$cod_art',Fecha_compra='$fecha' WHERE id=$id";
  mysqli_query($con, $query);
  $_SESSION['message'] = 'Modificación de Datos Exitosa';
  $_SESSION['message_type'] = 'warning';
 header('Location: index.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="modificar.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">

<input type="text" name="oc" value="<?php echo $oc;?>" class="form-control" placeholder="Actualiza el Numero de Orden de Compra" autofocus>

</div>
<div class="form-group">

<input type="text" name="cod_art" value="<?php echo $cod_art;?>"class="form-control" placeholder="Actualiza el Codigo de Artículo">

</div>  
<div class="form-group">

<input type="text" name="description" value="<?php echo $description;?>"class="form-control" placeholder="Actualiza la Descripción del Artículo">

</div>  
<div class="form-group">

<input type="text" name="cantidad" value="<?php echo $cantidad;?>"class="form-control" placeholder="Actualiza la Cantidad de Artículos">

</div>  
<div class="form-group">

<input type="text" name="fecha" value="<?php echo $fecha;?>" class="form-control" placeholder="Actualiza la Fecha de Compra">

        <button class="btn-success" name="update">
         Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>