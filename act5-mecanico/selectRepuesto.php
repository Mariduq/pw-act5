<?php
    // Base de datos
    include_once('assets/php/conexion.php');

    $query = "SELECT * FROM mecanico_repuestos WHERE estado='SI'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
    $num_rows = mysqli_num_rows($rs);

    if ($num_rows != 0) {
?>
?>
<div id="tabla" class="fondo-color">
    <br>
    <div class="rounded shadow-sm bg-white table-format">
        <h3><b>Seleccione un repuesto</b></h3>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Clasificación</th>
                        <th>Cantidad</th>
                        <th>Costo ($)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cliente = $_POST['cedulacliente']; ?>
                    <?php $vehiculo = $_POST['vehiculo']; ?>
                    <?php $mecanico = $_POST['cedulamecanico']; ?>
                    <?php while($fila = mysqli_fetch_array($rs)){  
                        $imagenruta = $fila['imagenruta'];
                        $descripcion = $fila['descripcion'];
                        ?>
                        <tr>
                            <td><?php $id = $fila['idmecanico_repuestos']; echo $id; ?></td>
                            <td><?php $codigo = $fila['codigo']; echo $codigo;?></td>
                            <td><?php $nombre = $fila['nombre']; echo $nombre;?></td>
                            <td><?php $marca = $fila['marca']; echo $marca;?></td>
                            <td><?php $modelo = $fila['modelo']; echo $modelo;?></td>
                            <td><?php $tipo = $fila['tipo']; echo $tipo;?></td>
                            <td><?php $clasificacion = $fila['clasificacion']; echo $clasificacion;?></td>
                            <td><?php $cantidad = $fila['cantidad']; echo $cantidad;?></td>
                            <td><?php $costo = $fila['costo']; echo $costo;?></td>

                            <td>
                                <a onclick='repuestoSeleccionado("<?php echo $id?>", "<?php echo $costo?>", "<?php echo $mecanico?>", "<?php echo $vehiculo?>", "<?php echo $cliente?>");',>Seleccionar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
</div>
<?php } else {
    echo "<script>alert('No hay Repuestos registrados');</script>";
    
}?>