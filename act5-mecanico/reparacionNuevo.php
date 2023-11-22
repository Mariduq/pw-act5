<div class="fondo-color">
    <br>
    <div class="form-format rounded shadow-sm bg-white">
        <h3><b>Nueva Reparación Realizada</b></h3><br>

        <div class="d-grid gap-2">
            <input type="submit" onclick="abreSelectClienteRep();" value="Seleccionar Cliente" name="btnSelectCliente" class="btn btn-danger btn-lg">
        </div><br>

        <?php 
        if(isset($_POST['cedulacliente'])) {?>
            <input type="hidden" name="cedulacliente" value="<?php echo $_POST['cedulacliente']; ?>">

            <h4><b>Cédula del cliente: </b><?php echo $_POST['cedulacliente']; ?></h4>

            <div class="d-grid gap-2">
                <input type="submit" onclick="abreSelectVehiculoRep('<?php echo $_POST['cedulacliente']; ?>');" value="Seleccionar Vehículo" name="btnSelectVehiculo" class="btn btn-danger btn-lg">
            </div><br>
        <?php 
        } ?>

        

        <?php 
        if(isset($_POST['cedulacliente']) && isset($_POST['vehiculo'])) {?>
            <input type="hidden" name="vehiculo" value="<?php echo $_POST['vehiculo']; ?>">

            <h4><b>ID del vehículo: </b><?php echo $_POST['vehiculo']; ?></h4>

            <div class="d-grid gap-2">
                <input type="submit" onclick="abreSelectMecanico('<?php echo $_POST['cedulacliente']; ?>', '<?php echo $_POST['vehiculo']; ?>');" value="Seleccionar Mecánico" name="btnSelectMecanico" class="btn btn-danger btn-lg">
            </div><br>
        <?php 
        } ?>


        <?php 
        if(isset($_POST['cedulacliente']) && isset($_POST['vehiculo']) && isset($_POST['cedulamecanico'])) {?>
            <input type="hidden" name="cedulamecanico" value="<?php echo $_POST['cedulamecanico']; ?>">

            <h4><b>Cédula del Mecánico: </b><?php echo $_POST['cedulamecanico']; ?></h4>

            <div class="d-grid gap-2">
                <input type="submit" onclick="abreSelectRepuesto('<?php echo $_POST['cedulacliente']; ?>', '<?php echo $_POST['vehiculo']; ?>','<?php echo $_POST['cedulamecanico']; ?>', '<?php echo $_POST['cedulamecanico']; ?>');" value="Seleccionar Repuesto" name="btnSelectRepuesto" class="btn btn-danger btn-lg">
            </div><br>
        <?php 
        } ?>

        <?php 
        if(isset($_POST['cedulacliente']) && isset($_POST['vehiculo']) && isset($_POST['cedulamecanico']) && isset($_POST['repuesto'])) {?>
            <input type="hidden" name="repuesto" value="<?php echo $_POST['repuesto']; ?>">
            <input type="hidden" name="costorep" value="<?php echo $_POST['costorep']; ?>">

            <h4><b>ID del repuesto: </b><?php echo $_POST['repuesto']; ?></h4><br>
            <h4><b>Costo del repuesto: </b><?php echo $_POST['costorep']; ?></h4>

            <input  name="detalles" id="detalles" class="form-control" type="text" placeholder="Detalles" aria-label="default input example" required><br>

            <input  name="costoreparacion" id="costoreparacion" class="form-control" type="text" placeholder="Costo de la reparación ($)" aria-label="default input example" required><br>


        <?php 
        } ?>
        
        <?php 
        if(isset($_POST['cedulacliente']) && isset($_POST['vehiculo']) && isset($_POST['cedulamecanico']) && isset($_POST['repuesto'])) {?>
        <div class="d-grid gap-2">
            <input type="submit" onclick="insertaReparacion('<?php echo $_POST['cedulacliente']?>', '<?php echo $_POST['vehiculo']?>','<?php echo $_POST['cedulamecanico']?>','<?php echo $_POST['repuesto']?>', '<?php echo $_POST['costorep']?>');" value="Registrar" name="btnVenta" class="btn btn-danger btn-lg">
        </div>
        <?php 
        } ?>

    </div>
    <div id="selectdata"></div>
    <br><br>
</div>