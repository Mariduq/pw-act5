<?php
    // Base de datos
    include_once('assets/php/conexion.php');

    $query = "SELECT * FROM mecanico_mecanicos WHERE estado='SI'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

?>
<div id="tabla" class="fondo-color">
    <br>
    <div class="rounded shadow-sm bg-white table-format">
        <h3><b>Registro de Mecánicos</b></h3>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre y Apellido</th>
                        <th>Dirección</th>
                        <th>Especialidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fila = mysqli_fetch_array($rs)){  ?>
                        <tr>
                            <td><?php $ced = $fila['cedula']; echo $ced; ?></td>
                            <td><?php $name = $fila['nombre']; echo $name;?></td>
                            <td><?php $direccion = $fila['direccion']; echo $direccion;?></td>
                            <td><?php $especialidad = $fila['especialidad']; echo $especialidad;?></td>
                            <td>
                                <a onclick='abreModMecanico("<?php echo $ced?>", "<?php echo $name?>", "<?php echo $direccion?>", "<?php echo $especialidad?>");'><i class="material-icons">edit</i></a>
                                <a onclick='eliminaMecanico("<?php echo $ced?>");'><i class="material-icons">delete_forever</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
</div>