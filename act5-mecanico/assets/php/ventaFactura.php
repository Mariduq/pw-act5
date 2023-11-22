<?php
require('fpdf/fpdf.php');
require('phpqrcode/qrlib.php');

include_once('conexion.php');

// Recuperar datos de la venta
$idventa = $_POST['idventa'];

$query_venta = "SELECT * FROM mecanico_ventas WHERE idmecanico_ventas = $idventa";
$resultado_venta = $conec->query($query_venta);

if ($resultado_venta->num_rows > 0) {
    $venta = $resultado_venta->fetch_assoc();

    // Recuperar datos del cliente
    $cedulacliente = $venta['mecanico_clientes_cedula'];
    $query_cliente = "SELECT * FROM mecanico_clientes WHERE cedula = $cedulacliente";
    $resultado_cliente = $conec->query($query_cliente);

    if ($resultado_cliente->num_rows > 0) {
        $cliente = $resultado_cliente->fetch_assoc();

        // Recuperar datos del vehiculo
        $idvehiculo = $venta['mecanico_vehiculos_idmecanico_vehiculos'];
        $query_vehiculo = "SELECT * FROM mecanico_vehiculos WHERE idmecanico_vehiculos = $idvehiculo";
        $resultado_vehiculo = $conec->query($query_vehiculo);

        if ($resultado_vehiculo->num_rows > 0) {
            $vehiculo = $resultado_vehiculo->fetch_assoc();

            // Crear PDF
            $pdf = new FPDF();
            $pdf->AddPage();

            // Encabezado
            $pdf->SetFont('Arial', 'B', 24);
            $pdf->Cell(0, 10, 'Factura de Venta', 0, 1, 'C');

            // Informacion de la venta
            $pdf->SetFont('Arial', '', 17);
            $pdf->Cell(0, 10, 'iCar Plus', 0, 1,'C');
            $pdf->Cell(0, 10, '', 0, 1);
            $pdf->Cell(0, 10, utf8_decode('ID de Venta: ') . $venta['idmecanico_ventas'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Fecha y Hora: ') . $venta['fecha'], 0, 1);

            // Informacion del cliente
            $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 17);
            $pdf->Cell(0, 10, utf8_decode('Cliente'), 0, 1, 'C');
            $pdf->SetFont('Arial', '', 17);
            $pdf->Cell(0, 10, utf8_decode('Cédula: ') . $cliente['cedula'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Nombre: ') . $cliente['nombre'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Dirección: ') . $cliente['direccion'], 0, 1);


            // Informacion del vehiculo
            $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 17);
            $pdf->Cell(0, 10, utf8_decode('Vehiculo'), 0, 1,'C');
            $pdf->SetFont('Arial', '', 17);
            $pdf->Cell(0, 10, utf8_decode('Matrícula: ') . $venta['matricula'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('ID del vehículo: ') . $vehiculo['idmecanico_vehiculos'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Marca: ') . $vehiculo['marca'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Modelo: ') . $vehiculo['modelo'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Descripción: ') . $vehiculo['descripcion'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Tipo: ') . $vehiculo['tipo'], 0, 1);
            $pdf->Cell(0, 10, utf8_decode('Año: ') . $vehiculo['ano'], 0, 1);
            $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->Cell(0, 10, utf8_decode('Costo final: $') . $vehiculo['costo'], 0, 1);




            // Agregar QR al final de la factura
            $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 17);
            $pdf->Cell(0, 10, utf8_decode('Visita nuestro sitio web'), 0, 1, 'C');
            $pdf->SetFont('Arial', '', 17);
            $qrCodeData = "https://www.virtudvirtual.site/act5-mecanico";
            $qrCodeFile = 'qrcode.png'; // Nombre del archivo QR

            QRcode::png($qrCodeData, $qrCodeFile, QR_ECLEVEL_L, 4);

            // Insertar QR en el PDF
            $pdf->Image($qrCodeFile, 80, $pdf->GetY() + 0, 50, 50);

            // Output 
            ob_start(); 
            $pdf->Output(); 
            $pdfData = ob_get_clean(); 
            // Enviar el PDF como respuesta 
            echo base64_encode($pdfData);

            // Eliminar el archivo QR después de usarlo
            unlink($qrCodeFile);
        } else {
            echo "No se encontró el vehiculo con ID: $idvehiculo";
        }
    } else {
        echo "No se encontró el cliente con ID: $cedulacliente";
    }
} else {
    echo "No se encontró la venta con ID: $idventa";
}

$conec->close();
?>