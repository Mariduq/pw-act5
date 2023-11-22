<div class="fondo-color">
    <br>
    <div class="form-format rounded shadow-sm bg-white">
        <h3><b>Nueva Venta Realizada</b></h3><br>

        <div class="d-grid gap-2">
            <input type="submit" onclick="abreSelectCliente();" value="Seleccionar Cliente" name="btnSelectCliente" class="btn btn-danger btn-lg">
        </div><br>

        <?php 
        if(isset($_POST['cedulacliente'])) {?>
            <input type="hidden" name="cedulacliente" value="<?php echo $_POST['cedulacliente']; ?>">
            <h4><b>Cédula del cliente: </b><?php echo $_POST['cedulacliente']; ?></h4>
            <div class="d-grid gap-2">
                <input type="submit" onclick="abreSelectVehiculo('<?php echo $_POST['cedulacliente']; ?>');" value="Seleccionar Vehículo" name="btnSelectVehiculo" class="btn btn-danger btn-lg">
            </div><br>
        <?php 
        } ?>

        

        <?php 
        if(isset($_POST['cedulacliente']) && isset($_POST['vehiculo'])) {?>
            <input type="hidden" name="vehiculo" value="<?php echo $_POST['vehiculo']; ?>">
            <h4><b>ID del vehículo: </b><?php echo $_POST['vehiculo']; ?></h4>
            <input  name="matricula" id="matricula" class="form-control" type="text" placeholder="Matrícula" aria-label="default input example" required><br>
        <?php 
        } ?>

        
        <?php 
        if(isset($_POST['cedulacliente']) && isset($_POST['vehiculo'])) {?>
        <div class="d-grid gap-2">
            <input type="submit" onclick="insertaVenta('<?php echo $_POST['cedulacliente']?>', '<?php echo $_POST['vehiculo']?>');" value="Registrar" name="btnVenta" class="btn btn-danger btn-lg">
        </div>
        <?php 
        } ?>

    </div>
    <div id="selectdata"></div>
    <br><br>
</div>