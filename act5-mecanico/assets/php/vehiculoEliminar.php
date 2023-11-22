<?php
    include_once('conexion.php');

    $ID = $_POST["id"];
    $query = "UPDATE mecanico_vehiculos SET estado = 'NO' WHERE idmecanico_vehiculos='$ID'";
    $rs    = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));

    if($rs){
        echo "<script>alert('Registro Eliminado');</script>";
    }else{
        echo "<script>alert('Error: No se eliminó el registro');</script>";
    }

?>