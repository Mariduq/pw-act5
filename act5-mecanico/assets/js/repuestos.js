// Funciones de Repuestos
function abreNuevoRepuesto() {
    $.ajax({
        url: 'repuestoNuevo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreTablaRepuesto() {
    $.ajax({
        url: 'repuestoTabla.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreModRepuesto(id, codigo, nombre, marca, modelo, tipo, clasificacion, cantidad, descripcion, imagenruta, costo) {

    var parametros = {
        "id": id,
        "codigo": codigo,
        "nombre": nombre,
        "marca": marca,
        "modelo": modelo,
        "tipo": tipo,
        "clasificacion": clasificacion,
        "cantidad": cantidad,
        "descripcion": descripcion,
        "imagenruta": imagenruta,
        "costo": costo,
    };

    confirmacion = window.confirm("¿Estás seguro que deseas modificar la información del repuesto seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'repuestoMod.php',
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

function modificaRepuesto(cedulavieja){
        
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
        url: "assets/php/repuestoMod.php",
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

function eliminaRepuesto(id) {

    var parametros = {
        "id": id,
    };

    confirmacion = window.confirm("¿Estás seguro que deseas eliminar el repuesto seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'assets/php/repuestoEliminar.php',
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

function infoRepuesto(id, codigo, nombre, marca, modelo, tipo, clasificacion, cantidad, descripcion, imagenruta, costo) {

    var parametros = {
        "id": id,
        "codigo": codigo,
        "nombre": nombre,
        "marca": marca,
        "modelo": modelo,
        "tipo": tipo,
        "clasificacion": clasificacion,
        "cantidad": cantidad,
        "descripcion": descripcion,
        "imagenruta": imagenruta,
        "costo": costo,

    };

    $.ajax({
        data: parametros,
        url: 'repuestoInfo.php',
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
    $("#uploadForm2").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'assets/php/repuestoInsertar.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $("#message").html(response);
            },
            error: function() {
                $("#message").html("<p>Error ajax repuestos</p>");
            }
        });
    });
});

$(document).ready(function() {
    $("#uploadModForm2").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'assets/php/repuestoMod.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                $("#message").html(response);
            },
            error: function() {
                $("#message").html("<p>Error en ajax repuestos</p>");
            }
        });
    });
});