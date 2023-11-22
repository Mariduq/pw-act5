<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    if(is_numeric($cedula)){
        // Validamos que no exista ya un cliente con la misma cedula
        $queryCheck = "SELECT * FROM mecanico_clientes WHERE cedula= '$cedula'";
        $rsCheck = mysqli_query($conec, $queryCheck) or die('Error: ' . mysqli_error($conec)); 
        $num_rows = mysqli_num_rows($rsCheck);

        if ($num_rows == 0) {

            $query = "INSERT INTO mecanico_clientes(cedula, nombre, direccion, estado) VALUES('$cedula', '$nombre', '$direccion', 'SI')";

            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

            if($rs){
                echo "<script>alert('Registro Agregado');</script>";
            }else{
                echo "<script>alert('Error: No se agrego el registro');</script>";
            }
        } else {
            echo "<script>alert('Ya existe un cliente con esta cédula');</script>";
        }
    } else {
        echo "<script>alert('El campo de cédula solo puede tener números');</script>";
    }
?>