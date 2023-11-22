// Funciones de Mecanicos
function abreNuevoMecanico() {
    $.ajax({
        url: 'mecanicoNuevo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function insertaMecanico(){
        
    var cedula = document.getElementById("cedula").value;
    var nombre = document.getElementById("nombre").value;
    var direccion = document.getElementById("direccion").value;
    var especialidad = document.getElementById("especialidad").value;
    
    var parametros = {
        "cedula": cedula,
        "nombre": nombre,
        "direccion": direccion,
        "especialidad": especialidad,
    };

    $.ajax({
        url: "assets/php/mecanicoInsertar.php",
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

function abreTablaMecanico() {
    $.ajax({
        url: 'mecanicoTabla.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreModMecanico(cedula, nombre, direccion, especialidad) {

    var parametros = {
        "cedula": cedula,
        "nombre": nombre,
        "direccion": direccion,
        "especialidad": especialidad
    };

    confirmacion = window.confirm("¿Estás seguro que deseas modificar el mecánico seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'mecanicoMod.php',
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

function modificaMecanico(cedulavieja){
        
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
        url: "assets/php/mecanicoMod.php",
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

function eliminaMecanico(cedula) {

    var parametros = {
        "cedula": cedula,
    };

    confirmacion = window.confirm("¿Estás seguro que deseas eliminar el mecánico seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'assets/php/mecanicoEliminar.php',
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