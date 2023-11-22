<?php
    // Inicio de sesion
    session_start();
    $usuario = $_SESSION["username"];

    // Si no se ha iniciado sesion se redirecciona a login
    if(!isset($usuario)){
    header("location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCar Plus</title>

    <!--Material Icons (Google Icon Font)-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS (Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

    <!-- Navegador -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <!-- Empresa Thomsom -->
            <a class="navbar-brand" href="#">
            <i id="logonav" class="material-icons">directions_car</i>
            iCar Plus</a>
            <form class="d-flex">
                <a class="btn btn-outline-danger" href="assets/php/salir.php">Salir</a>
            </form>
        </div>
    </nav>

    <div id="container">
        <!-- Inicio -->
        <div class="fondo-icar">
            <br><br>
            <div class="container px-4 py-4 rounded shadow-sm bg-white inicio-format">
                <h2 class="pb-2 border-bottom">Actividad 5</h2>
    
                <div class="row row-cols-1 row-cols-md-4 align-items-md-center g-5 py-4">
                    <!-- Enunciado actividad -->
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <h2 class="fw-bold text-body-emphasis">Concesionario iCar Plus</h2>
                        <p class="text-body-secondary">El concesionario iCar Plus, necesita de una aplicación web para el control del inventario de los vehiculos y repuestos que tienen en existencia, clientes y mecánicos, los registros deben de tener una descripción, imagen, marca, modelo del vehículo, tipo, año, clasificación, repuesto asignado o cambiado, entre otros datos importantes.</p>
                    </div>


                    <!-- Reparaciones y Ventas -->
                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-12 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Reparaciones</h4>
                                <p class="text-body-secondary">Mira el registro de las reparaciones realizadas o ingresa una nueva reparación en el sistema.</p>
                                <div class="col">
                                    <input type="submit" value="Registro" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreTablaReparacion();">
                                    <input type="submit" value="Nuevo" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreNuevoReparacion();">
                                </div>
                            </div>
                            <br>
                            <div class="col d-flex flex-column gap-2">
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Ventas</h4>
                                <p class="text-body-secondary">Mira el registro de ventas o ingresa una nueva venta en el sistema.</p>
                                <div class="col">
                                    <input type="submit" value="Registro" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreTablaVenta();">
                                    <input type="submit" value="Nuevo" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreNuevoVenta();">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Vehiculos y Repuestos -->
                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-12 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Vehículos</h4>
                                <p class="text-body-secondary">Mira los vehículos registrados o ingresa un nuevo vehículo en el sistema.</p>
                                <div class="col">
                                    <input type="submit" value="Registro" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreTablaVehiculo();">
                                    <input type="submit" value="Nuevo" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreNuevoVehiculo();">
                                </div>
                            </div>


                            <div class="col d-flex flex-column gap-2">
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Repuestos</h4>
                                <p class="text-body-secondary">Mira los repuestos registrados o ingresa un nuevo repuesto en el sistema.</p>
                                <div class="col">
                                    <input type="submit" value="Registro" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreTablaRepuesto();">
                                    <input type="submit" value="Nuevo" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreNuevoRepuesto();">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- clientes y mecanicos -->
                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-12 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Clientes</h4>
                                <p class="text-body-secondary">Mira los clientes registrados o ingresa un nuevo cliente en el sistema.</p>
                                <div class="col">
                                    <input type="submit" value="Registro" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreTablaCliente();">
                                    <input type="submit" value="Nuevo" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreNuevoCliente();">
                                </div>
                            </div>


                            <div class="col d-flex flex-column gap-2">
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Mecánicos</h4>
                                <p class="text-body-secondary">Mira los mecánicos registrados o ingresa un nuevo mecánico en el sistema.</p>
                                <div class="col">
                                    <input type="submit" value="Registro" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreTablaMecanico();">
                                    <input type="submit" value="Nuevo" name="btnLogin" class="btn btn-danger col-sm-5" onclick="abreNuevoMecanico();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
        
        <!-- Aquí se mostrará el contenido obtenido con AJAX -->
        <div id="btnresponse"></div>
        
    </div>

    <!-- Footer -->
    <footer>
        <br>
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="http://virtudvirtual.site" class="nav-link px-2 text-muted">Pagina Principal</a></li>
            <li class="nav-item"><a href="https://github.com/Mariduq/pw-act5.git" class="nav-link px-2 text-muted">Github</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Todos los derechos reservados. Maracaibo - Zulia. Venezuela</p>
        <br>
    </footer>

    <!-- JavaScript (AJAX) -->
    <script src="assets/js/clientes.js"></script>
    <script src="assets/js/mecanicos.js"></script>
    <script src="assets/js/vehiculos.js"></script>
    <script src="assets/js/repuestos.js"></script>
    <script src="assets/js/reparaciones.js"></script>
    <script src="assets/js/ventas.js"></script>

    <!-- JavaScript (Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>