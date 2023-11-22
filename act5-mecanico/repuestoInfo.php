<div class="desc-format rounded shadow-sm bg-white">
    <!-- Descripcion del repuesto -->
    <h3><b>Más información sobre el repuesto</b></h3>

    <img class="center" style='height: 70%; width: 70%; object-fit: contain' src="assets/php/<?php echo $_POST['imagenruta']; ?>" alt="Imagen no disponible"><br>
    <div class="row">
        <div class="col">
            <h5><b>Código</b></h5>
            <p><?php echo $_POST['codigo']; ?></p>
        </div>
        <div class="col">
            <h5><b>Nombre</b></h5>
            <p><?php echo $_POST['nombre']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5><b>ID</b></h5>
            <p><?php echo $_POST['id']; ?></p>
        </div>
        <div class="col">
            <h5><b>Marca</b></h5>
            <p><?php echo $_POST['marca']; ?></p>
        </div>
        <div class="col">
            <h5><b>Modelo</b></h5>
            <p><?php echo $_POST['modelo']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5><b>Tipo</b></h5>
            <p><?php echo $_POST['tipo']; ?></p>
        </div>
        <div class="col">
            <h5><b>Clasificación</b></h5>
            <p><?php echo $_POST['clasificacion']; ?></p>
        </div>
        <div class="col">
            <h5><b>Cantidad</b></h5>
            <p><?php echo $_POST['cantidad']; ?></p>
        </div>
        <div class="col">
            <h5><b>Costo ($)</b></h5>
            <p><?php echo $_POST['costo']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5><b>Descripción</b></h5>
            <p><?php echo $_POST['descripcion']; ?></p>
        </div>
    </div>

</div>
<br><br>