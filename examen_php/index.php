<?php include ("conexionBD.php") ?>

<?php include("includes/header.php") ?>

<div class="contain p-4">
<div class="row">

    <div class="col-md-4">


    <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    <?php session_unset();  } ?>

        <div class="card card-body">
            <h4>Ingrese  Datos solicitados</h4>
            <br>
           <form action="guarda.php" method="POST">   

              <div class="form-group">
              <input type="text" name="oc" class="form-control" placeholder="Numero de Orden de Compra" autofocus>
              </div>
              <div class="form-group">

              <input type="text" name="cod_art" class="form-control" placeholder="Codigo de Artículo">

              </div>  
              <div class="form-group">

              <input type="text" name="description" class="form-control" placeholder="Descripción del Artículo">

              </div>  
              <div class="form-group">

              <input type="text" name="cantidad" class="form-control" placeholder="Cantidad de Artículos">

              </div>  
              <div class="form-group">

              <input type="text" name="fecha" class="form-control" placeholder="Fecha de Compra ej: AAAAMMDD">

              </div><br>
              <input type="submit" class="btn btn-success btn-block" name="guarda" value="Guardar Información">
              </form>  
            </div>  

           <div class="card card-body">
            <h4>Ordenar datos</h4>
                <br>
                <form action="tablaordena.php">   
                <input type="submit" class="btn btn-warning btn-block"  value="Ordena por Orden de Compra">
                </form>
                <form action="tablaordenacodigo.php">   
                <input type="submit" class="btn btn-success btn-block"  value="Ordena por Codigo de Articulo ">
                </form>
                <form action="tablaordenacantidad.php">   
                <input type="submit" class="btn btn-warning btn-block"  value="Ordena Cantidad ">
                </form>
                <form action="tablaordenafecha.php">   
                <input type="submit" class="btn btn-success btn-block"  value="Ordena por Fecha ">
                </form>
            </div>        

        </div>     
        
   
      

    <div class="col-md-8">
    
        <table class="table table-bordered">
        <h4>Tabla de Datos</h4><br>
            <thead>
            <tr>
                <th>N° Orden de Compra </th>
                <th>Código Artículos</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Fecha de Compra</th>
                <th>Acciones de Edición</th>
            </tr>
            </thead>
            <tbody>
                <?php  
                    $query = "SELECT * FROM compras ";
                    $resultado = mysqli_query($con, $query);
                                               
                while($row = mysqli_fetch_array($resultado)) { ?>
                <tr> 
                    <td><?php echo $row['N_orden_compra_rlucero']?></td>
                    <td><?php echo $row['Codigo_art_rlucero']?></td>
                    <td><?php echo $row['Descripcion_art_rlucero']?></td>
                    <td><?php echo $row['Cantidad_art_rlucero']?></td>
                    <td><?php echo $row['Fecha_compra']?></td>
                    <td>
                    
                    <a href="modificar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
                     </td>
                  
                </tr>
                
                <?php } ?>  
               
            </tbody>
            </table>
        </div>
        </div> 
        </div> 


  

    <?php include("includes/footer.php") ?>


   
