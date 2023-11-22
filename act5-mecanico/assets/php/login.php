<?php
    include_once("conexion.php");
    session_start();

    if (!empty($_POST["btnLogin"])) {
        // Comprobamos si los campos del login estan vacios
        if (empty($_POST["txtUser"]) || empty($_POST["txtClave"])) {
            echo "<div class='alert alert-danger'>No pueden haber campos vacios</div>";
        } else {
            // Tomamos los valores username y clave de los campos
            $user = $_POST["txtUser"];
            $clave = $_POST["txtClave"];

            // Comprobamos si el usuario se encuentra en la bdd
            $sql = $conec->query("SELECT * FROM mecanico_usuarios WHERE username='$user' AND clave='$clave'");
            if ($datos=$sql->fetch_object()) {
                $_SESSION["username"] = $user;
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'>Acceso denegado</div>";
            }
            
        }
        
    }
?>