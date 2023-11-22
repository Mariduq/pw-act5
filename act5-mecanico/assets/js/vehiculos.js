// Funciones de Vehiculos
function abreNuevoVehiculo() {
    $.ajax({
        url: 'vehiculoNuevo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreTablaVehiculo() {
    $.ajax({
        url: 'vehiculoTabla.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreModVehiculo(id, marca, modelo, tipo, ano, cantidad, descripcion, imagenruta, costo) {

    var parametros = {
        "id": id,
        "marca": marca,
        "modelo": modelo,
        "tipo": tipo,
        "ano": ano,
        "cantidad": cantidad,
        "descripcion": descripcion,
        "imagenruta": imagenruta,
        "costo": costo,
    };

    confirmacion = window.confirm("¿Estás seguro que deseas modificar la información del vehículo seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'vehiculoMod.php',
            type: 'POST',
            
            beforesend: function(){
            $('#btnresponse').html('Cargando...');
            },

            success: function(mensaje){
            $('#btnresponse').html(mensaje);
            }
        });
    }
}

function modificaVehiculo(cedulavieja){
        
    var cedula = document.getElementById("cedula").value;
    var nombre = document.getElementById("nombre").value;
    var direccion = document.getElementById("direccion").value;
    var especialidad = document.getElementById("especialidad").value;
    
    var parametros = {
        "vieja": cedulavieja,
        "cedula": cedula,
        "nombre": nombre,
        "direccion": direccion,
        "especialidad": especialidad,
    };

    $.ajax({
        url: "assets/php/vehiculoMod.php",
        type: "POST",
        data: parametros,
        beforesend: function(){
            $("#btnresponse").html("Cargando...");
        },
        success: function(mensaje) {
            $('#btnresponse').html(mensaje);
        }
    });
}

function eliminaVehiculo(id) {

    var parametros = {
        "id": id,
    };

    confirmacion = window.confirm("¿Estás seguro que deseas eliminar el vehículo seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'assets/php/vehiculoEliminar.php',
            type: 'POST',
            
            beforesend: function(){
            $('#btnresponse').html('Cargando...');
            },

            success: function(mensaje){
            $('#btnresponse').html(mensaje);
            }
        });
    }

}

function infoVehiculo(id, marca, modelo, tipo, ano, cantidad, descripcion, imagenruta, costo) {

    var parametros = {
        "id": id,
        "marca": marca,
        "modelo": modelo,
        "tipo": tipo,
        "ano": ano,
        "cantidad": cantidad,
        "descripcion": descripcion,
        "imagenruta": imagenruta,
        "costo": costo,

    };

    $.ajax({
        data: parametros,
        url: 'vehiculoInfo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#info').html('Cargando...');
        },

        success: function(mensaje){
        $('#info').html(mensaje);
        }
    });

}

function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();

    reader.onload = function () {
        var dataURL = reader.result;
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = dataURL;
    };

    reader.readAsDataURL(input.files[0]);
}

$(document).ready(function() {
    $("#uploadForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'assets/php/vehiculoInsertar.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $("#message").html(response);
            },
            error: function() {
                $("#message").html("<p>Error ajax vehiculos</p>");
            }
        });
    });
});

$(document).ready(function() {
    $("#uploadModForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'assets/php/vehiculoMod.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $("#message").html(response);
            },
            error: function() {
                $("#message").html("<p>Error en ajax vehiculos</p>");
            }
        });
    });
});