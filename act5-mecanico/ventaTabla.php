<?php
    // Base de datos
    include_once('assets/php/conexion.php');

    $query = "SELECT * FROM mecanico_ventas WHERE estado='SI'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

?>
<div id="tabla" class="fondo-color">
    <br>
    <div class="rounded shadow-sm bg-white table-format">
        <h3><b>Registro de Ventas</b></h3>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matrícula</th>
                        <th>Cédula del cliente</th>
                        <th>ID del vehículo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_array($rs)){  ?>
                        <tr>
                            <td><?php $id = $fila['idmecanico_ventas']; echo $id; ?></td>
                            <td><?php $matricula = $fila['matricula']; echo $matricula;?></td>
                            <td><?php $cliente = $fila['mecanico_clientes_cedula']; echo $cliente;?></td>
                            <td><?php $vehiculo = $fila['mecanico_vehiculos_idmecanico_vehiculos']; echo $vehiculo;?></td>
                            <td><?php $fecha = $fila['fecha']; echo $fecha;?></td>
                            <td>
                                <a onclick='facturaVenta("<?php echo $id?>");'><i class="material-icons">picture_as_pdf</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="pdfContainer" class="rounded shadow-sm bg-white table-format"></div>
    <br><br>
</div>

