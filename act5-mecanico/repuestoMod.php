<div class="fondo-color">
    <br>
    <div class="form-format2 rounded shadow-sm bg-white">
        <h3><b>Modificar Repuesto</b></h3><br>
        
        <form id="uploadModForm2" action="assets/php/repuestoMod.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input value="<?php echo $_POST['codigo']; ?>" name="codigo" id="codigo" class="form-control" type="text" placeholder="Código" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input value="<?php echo $_POST['nombre']; ?>" name="nombre" id="nombre" class="form-control" type="text" placeholder="Nombre" aria-label="default input example" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input value="<?php echo $_POST['marca']; ?>" name="marca" id="marca" class="form-control" type="text" placeholder="Marca" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input value="<?php echo $_POST['modelo']; ?>" name="modelo" id="modelo" class="form-control" type="text" placeholder="Modelo" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input value="<?php echo $_POST['tipo']; ?>" name="tipo" id="tipo" class="form-control" type="text" placeholder="Tipo" aria-label="default input example" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input value="<?php echo $_POST['descripcion']; ?>" name="descripcion" id="descripcion" class="form-control" type="text" placeholder="Descripción" aria-label="default input example" required><br>
                </div>
            </div>
           <div class="row">
                <div class="col">
                    <input value="<?php echo $_POST['clasificacion']; ?>" name="clasificacion" id="clasificacion" class="form-control" type="text" placeholder="Clasificación" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input value="<?php echo $_POST['cantidad']; ?>" name="cantidad" id="cantidad" class="form-control" type="text" placeholder="Cantidad" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input value="<?php echo $_POST['costo']; ?>" name="costo" id="costo" class="form-control" type="text" placeholder="Costo ($)" aria-label="default input example" required><br>
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                </div>
                <div class="col">
                <input type="hidden" name="imagenruta" value="<?php echo $_POST['imagenruta']; ?>">
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <input class="center" type="file" name="image" accept="image/*" onchange="previewImage(event)"><br>
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <img src="assets/php/<?php echo $_POST['imagenruta']; ?>" class="center" id="imagePreview" style="max-width: 300px; max-height: 300px;"><br>
                </div>
           </div>
           <div class="row">
                <!-- div para mostrar preview de imagen -->
                <div id="message"></div><br>
           </div>

            <div class="d-grid gap-2">
                <input type="submit" value="Modificar" id="btnClientes" name="btnClientes" class="btn btn-danger btn-lg">
            </div>
       </form>
    </div>
    <br><br>
</div>