<?php
    // Base de datos
    include_once('assets/php/conexion.php');

    $query = "SELECT * FROM mecanico_clientes WHERE estado='SI'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
    $num_rows = mysqli_num_rows($rs);

    if ($num_rows != 0) {
?>
<div id="tabla" class="fondo-color">
    <br>
    <div class="rounded shadow-sm bg-white table-format">
        <h3><b>Seleccione un cliente</b></h3>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre y Apellido</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_array($rs)){  ?>
                        <tr>
                            <td><?php $ced = $fila['cedula']; echo $ced; ?></td>
                            <td><?php $name = $fila['nombre']; echo $name;?></td>
                            <td><?php $direccion = $fila['direccion']; echo $direccion;?></td>
                            <td>
                                <a onclick='clienteSeleccionadoRep("<?php echo $ced?>", "<?php echo $name?>", "<?php echo $direccion?>");'>Seleccionar</a>
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
    echo "<script>alert('No hay clientes registrados');</script>";
    
}?>