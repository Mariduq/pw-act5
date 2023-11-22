<div class="fondo-color">
    <br>
    <div class="form-format2 rounded shadow-sm bg-white">
        <h3><b>Nuevo Repuesto</b></h3><br>
        
        <form id="uploadForm2" action="assets/php/repuestoInsertar.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input  name="codigo" id="codigo" class="form-control" type="text" placeholder="Código" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input  name="nombre" id="nombre" class="form-control" type="text" placeholder="Nombre" aria-label="default input example" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input  name="marca" id="marca" class="form-control" type="text" placeholder="Marca" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input  name="modelo" id="modelo" class="form-control" type="text" placeholder="Modelo" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input  name="tipo" id="tipo" class="form-control" type="text" placeholder="Tipo" aria-label="default input example" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input  name="descripcion" id="descripcion" class="form-control" type="text" placeholder="Descripción" aria-label="default input example" required><br>
                </div>
            </div>
           <div class="row">
                <div class="col">
                    <input  name="clasificacion" id="clasificacion" class="form-control" type="text" placeholder="Clasificación" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input  name="cantidad" id="cantidad" class="form-control" type="text" placeholder="Cantidad" aria-label="default input example" required><br>
                </div>
                <div class="col">
                    <input  name="costo" id="costo" class="form-control" type="text" placeholder="Costo ($)" aria-label="default input example" required><br>
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <input class="center" type="file" name="image" accept="image/*" onchange="previewImage(event)"><br>
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <img class="center" id="imagePreview" style="max-width: 300px; max-height: 300px;"><br>
                </div>
           </div>
           <div class="row">
                <!-- div para mostrar preview de imagen -->
                <div id="message"></div><br>
           </div>

            <div class="d-grid gap-2">
                <input type="submit" value="Registrar" id="btnClientes" name="btnClientes" class="btn btn-danger btn-lg">
            </div>
       </form>
    </div>
    <br><br>
</div>