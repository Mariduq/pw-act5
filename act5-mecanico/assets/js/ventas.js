function abreNuevoVenta() {
    $.ajax({
        url: 'ventaNuevo.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function abreSelectCliente() {

    $.ajax({
        url: 'selectCliente.php',
        type: 'POST',
        
        beforesend: function(){
        $('#selectdata').html('Cargando...');
        },

        success: function(mensaje){
        $('#selectdata').html(mensaje);
        }
    });
}

function clienteSeleccionado(cedulacliente, nombre, direccion) {

    var parametros = {
        "cedulacliente": cedulacliente,
        "nombre": nombre,
        "direccion": direccion,
    };

    $.ajax({
        url: "ventaNuevo.php",
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

function abreSelectVehiculo(cedulacliente) {

    var parametros = {
        "cedulacliente": cedulacliente,
    };

    $.ajax({
        url: 'selectVehiculo.php',
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

function vehiculoSeleccionado(vehiculo, cedulacliente) {

    var parametros = {
        "vehiculo": vehiculo,
        "cedulacliente": cedulacliente,
    };

    $.ajax({
        url: "ventaNuevo.php",
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

function insertaVenta(cliente, vehiculo) {

    var matricula = document.getElementById("matricula").value;

    var parametros = {
        "cliente": cliente,
        "vehiculo": vehiculo,
        "matricula": matricula,
    };

    $.ajax({
        url: "assets/php/ventaInsertar.php",
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

function abreTablaVenta() {
    $.ajax({
        url: 'ventaTabla.php',
        type: 'POST',
        
        beforesend: function(){
        $('#btnresponse').html('Cargando...');
        },

        success: function(mensaje){
        $('#btnresponse').html(mensaje);
        }
    });
}

function facturaVenta(idventa) {

    var parametros = {
        "idventa": idventa,
    };

    $.ajax({
        url: "assets/php/ventaFactura.php",
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