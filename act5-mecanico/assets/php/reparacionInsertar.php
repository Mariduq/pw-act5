<?php
    include_once('conexion.php');

    $cliente = $_POST['cliente'];
    $vehiculo = $_POST['vehiculo'];
    $mecanico = $_POST['mecanico'];
    $repuesto = $_POST['repuesto'];
    $costorep = $_POST['costorep'];
    $detalles = $_POST['detalles'];
    $costoreparacion = $_POST['costoreparacion'];
    

    if ($detalles != "" && $costoreparacion != "") {

        if(is_numeric($costoreparacion)){
            $costototal = $costorep + $costoreparacion;

            $queryRepuesto = "UPDATE mecanico_repuestos SET cantidad=cantidad-1 WHERE idmecanico_repuestos=". $repuesto;

            $rsRepuesto = mysqli_query($conec, $queryRepuesto) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

            $query = "INSERT INTO mecanico_reparaciones(detalles, fecha,costototal, mecanico_vehiculos_idmecanico_vehiculos, mecanico_clientes_cedula, mecanico_mecanicos_cedula, mecanico_repuestos_idmecanico_repuestos,estado) VALUES('$detalles',NOW(),'$costototal' ,'$vehiculo', '$cliente','$mecanico', '$repuesto', 'SI')";

            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

            if($rs){
                echo "<script>alert('Registro Agregado');</script>";
            }else{
                echo "<script>alert('Error: No se agrego el registro');</script>";
            }
        } else {
            echo "<script>alert('El campo de costo de reparación solo puede tener números');</script>";
        }
    } else {
        echo "<script>alert('Debe ingresar los detalles y el costo de reparacion');</script>";
    }

?>