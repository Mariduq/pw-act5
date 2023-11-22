<div class="fondo-color">
    <br>
    <div class="form-format rounded shadow-sm bg-white">
        <!-- el php inserta los datos del mecanico en el formulario -->
        <h3><b>Modificar Datos del Mecánico</b></h3><br>

        <!-- Guardamos la cedula vieja en caso de que se quiera actualizar -->
        <?php $cedVieja = $_POST['cedula']; ?>
        
        <input  name="cedula" id="cedula" value="<?php echo $_POST['cedula']; ?>" class="form-control" type="text" placeholder="Cédula de Identidad" aria-label="default input example" required><br>
        
        <input  name="nombre" id="nombre" value="<?php echo $_POST['nombre']; ?>" class="form-control" type="text" placeholder="Nombre y Apellido" aria-label="default input example" required><br>

        <input  name="direccion" id="direccion" value="<?php echo $_POST['direccion']; ?>" class="form-control" type="text" placeholder="Dirección" aria-label="default input example" required><br>

        <input  name="especialidad" id="especialidad" value="<?php echo $_POST['especialidad']; ?>" class="form-control" type="text" placeholder="Especialidad" aria-label="default input example" required><br>

        <div class="d-grid gap-2">
            <input type="submit" value="Modificar" onclick='modificaMecanico("<?php echo $cedVieja?>");' name="btnClientes" class="btn btn-danger btn-lg">
        </div>

    </div>
    <br><br>
</div>