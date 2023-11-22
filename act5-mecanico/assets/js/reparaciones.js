function abreNuevoReparacion() {
    $.ajax({
        url: 'reparacionNuevo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreSelectClienteRep() {

    $.ajax({
        url: 'selectClienteRep.php',
        type: 'POST',
        
        beforesend: function(){
        $('#selectdata').html('Cargando...');
        },

        success: function(mensaje){
        $('#selectdata').html(mensaje);
        }
    });
}

function clienteSeleccionadoRep(cedulacliente, nombre, direccion) {

    var parametros = {
        "cedulacliente": cedulacliente,
        "nombre": nombre,
        "direccion": direccion,
    };

    $.ajax({
        url: "reparacionNuevo.php",
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

function abreSelectVehiculoRep(cedulacliente) {

    var parametros = {
        "cedulacliente": cedulacliente,
    };

    $.ajax({
        url: 'selectVehiculoRep.php',
        type: 'POST',
        data: parametros,
        
        beforesend: function(){
        $('#selectdata').html('Cargando...');
        },

        success: function(mensaje){
        $('#selectdata').html(mensaje);
        }
    });
}

function vehiculoSeleccionadoRep(vehiculo, cedulacliente) {

    var parametros = {
        "vehiculo": vehiculo,
        "cedulacliente": cedulacliente,
    };

    $.ajax({
        url: "reparacionNuevo.php",
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

function abreSelectMecanico(cedulacliente, vehiculo) {

    var parametros = {
        "cedulacliente": cedulacliente,
        "vehiculo": vehiculo,
    };

    $.ajax({
        url: 'selectMecanico.php',
        type: 'POST',
        data: parametros,
        
        beforesend: function(){
        $('#selectdata').html('Cargando...');
        },

        success: function(mensaje){
        $('#selectdata').html(mensaje);
        }
    });
}

function mecanicoSeleccionado(cedulamecanico, vehiculo, cedulacliente) {

    var parametros = {
        "cedulamecanico": cedulamecanico,
        "vehiculo": vehiculo,
        "cedulacliente": cedulacliente,
    };

    $.ajax({
        url: "reparacionNuevo.php",
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

function abreSelectRepuesto(cedulacliente, vehiculo, cedulamecanico) {

    var parametros = {
        "cedulacliente": cedulacliente,
        "vehiculo": vehiculo,
        "cedulamecanico": cedulamecanico,
    };

    $.ajax({
        url: 'selectRepuesto.php',
        type: 'POST',
        data: parametros,
        
        beforesend: function(){
        $('#selectdata').html('Cargando...');
        },

        success: function(mensaje){
        $('#selectdata').html(mensaje);
        }
    });
}

function repuestoSeleccionado(repuesto, costorep, cedulamecanico, vehiculo, cedulacliente) {

    var parametros = {
        "repuesto": repuesto,
        "costorep": costorep,
        "cedulamecanico": cedulamecanico,
        "vehiculo": vehiculo,
        "cedulacliente": cedulacliente,
    };

    $.ajax({
        url: "reparacionNuevo.php",
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
















function insertaReparacion(cliente, vehiculo, mecanico, repuesto, costorep) {

    var detalles = document.getElementById("detalles").value;
    var costoreparacion = document.getElementById("costoreparacion").value;

    var parametros = {
        "cliente": cliente,
        "vehiculo": vehiculo,
        "mecanico": mecanico,
        "repuesto": repuesto,
        "costorep": costorep,
        "detalles": detalles,
        "costoreparacion": costoreparacion,
    };

    $.ajax({
        url: "assets/php/reparacionInsertar.php",
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

function abreTablaReparacion() {
    $.ajax({
        url: 'reparacionTabla.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function facturaReparacion(idreparacion) {

    var parametros = {
        "idreparacion": idreparacion,
    };

    $.ajax({
        url: "assets/php/reparacionFactura.php",
        type: "POST",
        data: parametros,
        beforesend: function(){
            $("#pdfContainer").html("Cargando...");
        },
        success: function(data) {
            // Muestra el PDF en un contenedor 
            $('#pdfContainer').html('<embed src="data:application/pdf;base64,' + data + '" type="application/pdf" width="100%" height="600px" />');
        }
    });
}