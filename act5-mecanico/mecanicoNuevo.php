<div class="fondo-color">
    <br>
    <div class="form-format rounded shadow-sm bg-white">
        <h3><b>Nuevo Mecánico</b></h3><br>
        <input  name="cedula" id="cedula" class="form-control" type="text" placeholder="Cédula de Identidad" aria-label="default input example" required><br>
        
        <input  name="nombre" id="nombre" class="form-control" type="text" placeholder="Nombre y Apellido" aria-label="default input example" required><br>

        <input  name="direccion" id="direccion" class="form-control" type="text" placeholder="Dirección" aria-label="default input example" required><br>

        <input  name="especialidad" id="especialidad" class="form-control" type="text" placeholder="Especialidad" aria-label="default input example" required><br>

        <div class="d-grid gap-2">
            <input type="submit" value="Registrar" id="btnClientes" name="btnClientes" onclick="insertaMecanico();" class="btn btn-danger btn-lg">
        </div>
    </div>
    <br><br>
</div>