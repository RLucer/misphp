<?php include ("conexionBD.php") ?>

<?php include("includes/header.php") ?>


<div class="col-md-8">
    
        <table class="table table-bordered">
        <h4>Tabla de Datos ordenados por Orden de Compra</h4><br>
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
                    $query = "SELECT * FROM compras order by N_orden_compra_rlucero";
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