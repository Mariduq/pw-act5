<?php
    // Base de datos
    include_once('assets/php/conexion.php');

    $query = "SELECT * FROM mecanico_reparaciones WHERE estado='SI'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

?>
<div id="tabla" class="fondo-color">
    <br>
    <div class="rounded shadow-sm bg-white table-format">
        <h3><b>Registro de Reparaciones</b></h3>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Detalles</th>
                        <th>Cédula del cliente</th>
                        <th>Cédula del mecánico</th>
                        <th>ID del repuesto</th>
                        <th>ID del vehículo</th>
                        <th>Costo total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_array($rs)){  ?>
                        <tr>
                            <td><?php $id = $fila['idmecanico_reparaciones']; echo $id; ?></td>
                            <td><?php $detalles = $fila['detalles']; echo $detalles;?></td>
                            <td><?php $cliente = $fila['mecanico_clientes_cedula']; echo $cliente;?></td>
                            <td><?php $mecanico = $fila['mecanico_mecanicos_cedula']; echo $mecanico;?></td>
                            <td><?php $repuesto = $fila['mecanico_repuestos_idmecanico_repuestos']; echo $repuesto;?></td>
                            <td><?php $vehiculo = $fila['mecanico_vehiculos_idmecanico_vehiculos']; echo $vehiculo;?></td>
                            <td><?php $costototal = $fila['costototal']; echo $costototal;?></td>
                            <td>
                                <a onclick='facturaReparacion("<?php echo $id?>");'><i class="material-icons">picture_as_pdf</i></a>
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