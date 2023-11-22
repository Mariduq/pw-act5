// Funciones de Clientes
function abreNuevoCliente() {
    $.ajax({
        url: 'clienteNuevo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function insertaCliente(){
        
    var cedula = document.getElementById("cedula").value;
    var nombre = document.getElementById("nombre").value;
    var direccion = document.getElementById("direccion").value;
    
    var parametros = {
        "cedula": cedula,
        "nombre": nombre,
        "direccion": direccion,
    };

    $.ajax({
        url: "assets/php/clienteInsertar.php",
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

function abreTablaCliente() {
    $.ajax({
        url: 'clienteTabla.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreModCliente(cedula, nombre, direccion) {

    var parametros = {
        "cedula": cedula,
        "nombre": nombre,
        "direccion": direccion
    };

    confirmacion = window.confirm("¿Estás seguro que deseas modificar el cliente seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'clienteMod.php',
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

function modificaCliente(cedulavieja){
        
    var cedula = document.getElementById("cedula").value;
    var nombre = document.getElementById("nombre").value;
    var direccion = document.getElementById("direccion").value;
    
    var parametros = {
        "vieja": cedulavieja,
        "cedula": cedula,
        "nombre": nombre,
        "direccion": direccion,
    };

    $.ajax({
        url: "assets/php/clienteMod.php",
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

function eliminaCliente(cedula) {

    var parametros = {
        "cedula": cedula,
    };

    confirmacion = window.confirm("¿Estás seguro que deseas eliminar el cliente seleccionado?");
    
    if (confirmacion == true) {
        $.ajax({
            data: parametros,
            url: 'assets/php/clienteEliminar.php',
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