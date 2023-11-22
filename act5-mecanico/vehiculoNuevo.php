<div class="fondo-color">
    <br>
    <div class="form-format2 rounded shadow-sm bg-white">
        <h3><b>Nuevo Vehículo</b></h3><br>
        
        <form id="uploadForm" action="assets/php/vehiculoInsertar.php" method="post" enctype="multipart/form-data">
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
                    <input  name="ano" id="ano" class="form-control" type="text" placeholder="Año" aria-label="default input example" required><br>
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