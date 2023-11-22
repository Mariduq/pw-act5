<?php
    include_once('conexion.php');

    $cliente = $_POST['cliente'];
    $vehiculo = $_POST['vehiculo'];
    $matricula = $_POST['matricula'];

    if ($matricula != "") {
        $queryVehiculo = "UPDATE mecanico_vehiculos SET cantidad=cantidad-1 WHERE idmecanico_vehiculos=". $vehiculo;

        $rsvehiculo = mysqli_query($conec, $queryVehiculo) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

        $query = "INSERT INTO mecanico_ventas(matricula, fecha, mecanico_vehiculos_idmecanico_vehiculos, mecanico_clientes_cedula, estado) VALUES('$matricula',NOW() ,'$vehiculo', '$cliente', 'SI')";

        $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

        if($rs){
            echo "<script>alert('Registro Agregado');</script>";
        }else{
            echo "<script>alert('Error: No se agrego el registro');</script>";
        }
    } else {
        echo "<script>alert('Debe ingresar la matrícula');</script>";
    }

?>