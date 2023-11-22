<?php
    // Base de datos
    include_once('assets/php/conexion.php');

    $query = "SELECT * FROM mecanico_vehiculos WHERE estado='SI'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

?>
<div id="tabla" class="fondo-color">
    <br>
    <div class="rounded shadow-sm bg-white table-format">
        <h3><b>Registro de Vehículos</b></h3>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Año</th>
                        <th>Cantidad</th>
                        <th>Costo ($)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_array($rs)){  
                        $imagenruta = $fila['imagenruta'];
                        $descripcion = $fila['descripcion'];
                        ?>
                        <tr>
                            <td><?php $id = $fila['idmecanico_vehiculos']; echo $id; ?></td>
                            <td><?php $marca = $fila['marca']; echo $marca;?></td>
                            <td><?php $modelo = $fila['modelo']; echo $modelo;?></td>
                            <td><?php $tipo = $fila['tipo']; echo $tipo;?></td>
                            <td><?php $ano = $fila['ano']; echo $ano;?></td>
                            <td><?php $cantidad = $fila['cantidad']; echo $cantidad;?></td>
                            <td><?php $costo = $fila['costo']; echo $costo;?></td>

                            <td>
                                <a onclick='abreModVehiculo("<?php echo $id?>", "<?php echo $marca?>", "<?php echo $modelo?>", "<?php echo $tipo?>", "<?php echo $ano?>", "<?php echo $cantidad?>", "<?php echo $descripcion?>", "<?php echo $imagenruta?>", "<?php echo $costo?>");'><i class="material-icons">edit</i></a>
                                <a onclick='eliminaVehiculo("<?php echo $id?>");'><i class="material-icons">delete_forever</i></a>
                                <a onclick='infoVehiculo("<?php echo $id?>", "<?php echo $marca?>", "<?php echo $modelo?>", "<?php echo $tipo?>", "<?php echo $ano?>", "<?php echo $cantidad?>", "<?php echo $descripcion?>", "<?php echo $imagenruta?>", "<?php echo $costo?>");'>Más información</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <div id="info"></div>
</div>