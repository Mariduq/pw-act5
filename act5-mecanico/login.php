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
        </div>
    </nav>

    <div class="login-content fondo-icar">
		<div class="form-format rounded shadow-sm bg-white">
            <h3><b>Iniciar Sesión</b></h3><br>
            <form action="" method="post">
                <?php include("assets/php/login.php"); ?>
                
                <input  name="txtUser" id="idUser" class="form-control" type="text" placeholder="Nombre de usuario" aria-label="default input example" required><br>
                
                <input  name="txtClave" id="idClave" class="form-control" type="password" placeholder="Contraseña" aria-label="default input example" required><br>

                <div class="d-grid gap-2">
                    <input type="submit" value="Ingresar" name="btnLogin" class="btn btn-danger btn-lg">
                </div>
            </form>
        </div>
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

    <!-- JavaScript (Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>