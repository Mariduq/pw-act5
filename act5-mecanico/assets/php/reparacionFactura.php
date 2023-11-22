<?php
require('fpdf/fpdf.php');
require('phpqrcode/qrlib.php');

include_once('conexion.php');

// Recuperar datos de la reparacion
$idreparacion = $_POST['idreparacion'];

$query_reparacion = "SELECT * FROM mecanico_reparaciones WHERE idmecanico_reparaciones = $idreparacion";
$resultado_reparacion = $conec->query($query_reparacion);

if ($resultado_reparacion->num_rows > 0) {
    $reparacion = $resultado_reparacion->fetch_assoc();

    // Recuperar datos del cliente
    $cedulacliente = $reparacion['mecanico_clientes_cedula'];
    $query_cliente = "SELECT * FROM mecanico_clientes WHERE cedula = $cedulacliente";
    $resultado_cliente = $conec->query($query_cliente);

    if ($resultado_cliente->num_rows > 0) {
        $cliente = $resultado_cliente->fetch_assoc();

        // Recuperar datos del vehiculo
        $idvehiculo = $reparacion['mecanico_vehiculos_idmecanico_vehiculos'];
        $query_vehiculo = "SELECT * FROM mecanico_vehiculos WHERE idmecanico_vehiculos = $idvehiculo";
        $resultado_vehiculo = $conec->query($query_vehiculo);

        if ($resultado_vehiculo->num_rows > 0) {
            $vehiculo = $resultado_vehiculo->fetch_assoc();

            // Recuperar datos del mecanico
            $idmecanico = $reparacion['mecanico_mecanicos_cedula'];
            $query_mecanico = "SELECT * FROM mecanico_mecanicos WHERE cedula = $idmecanico";
            $resultado_mecanico = $conec->query($query_mecanico);

            if ($resultado_mecanico->num_rows > 0) {
                $mecanico = $resultado_mecanico->fetch_assoc();

                // Recuperar datos del repuesto
                $idrepuesto = $reparacion['mecanico_repuestos_idmecanico_repuestos'];
                $query_repuesto = "SELECT * FROM mecanico_repuestos WHERE idmecanico_repuestos = $idrepuesto";
                $resultado_repuesto = $conec->query($query_repuesto);

                if ($resultado_repuesto->num_rows > 0) {
                    $repuesto = $resultado_repuesto->fetch_assoc();

                    // Crear PDF
                    $pdf = new FPDF();
                    $pdf->AddPage();

                    // Encabezado
                    $pdf->SetFont('Arial', 'B', 18);
                    $pdf->Cell(0, 10, utf8_decode('Factura de Reparación'), 0, 1, 'C');

                    // Informacion de la general
                    $pdf->SetFont('Arial', '', 14);
                    $pdf->Cell(0, 10, 'iCar Plus', 0, 1,'C');
                    $pdf->Cell(0, 10, utf8_decode('ID de reparacion: ') . $reparacion['idmecanico_reparaciones'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Fecha y Hora: ') . $reparacion['fecha'], 0, 1);

                    // Informacion del cliente
                    $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Cell(0, 10, utf8_decode('Cliente'), 0, 1, 'C');
                    $pdf->SetFont('Arial', '', 14);
                    $pdf->Cell(0, 10, utf8_decode('Cédula: ') . $cliente['cedula'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Nombre: ') . $cliente['nombre'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Dirección: ') . $cliente['direccion'], 0, 1);


                    // Informacion del vehiculo
                    $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Cell(0, 10, utf8_decode('Vehiculo'), 0, 1,'C');
                    $pdf->SetFont('Arial', '', 14);
                    $pdf->Cell(0, 10, utf8_decode('Marca: ') . $vehiculo['marca'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Modelo: ') . $vehiculo['modelo'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Año: ') . $vehiculo['ano'], 0, 1);


                    // Informacion de la reparacion
                    $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Cell(0, 10, utf8_decode('Información sobre la reparación'), 0, 1,'C');
                    $pdf->SetFont('Arial', '', 14);
                    $pdf->Cell(0, 10, utf8_decode('Detalles: ') . $reparacion['detalles'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Mecánico: ') . $mecanico['nombre'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Repuesto: ') . $repuesto['nombre'], 0, 1);
                    $pdf->Cell(0, 10, utf8_decode('Costo del repuesto: ') . $repuesto['costo'], 0, 1);


                    $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->Cell(0, 10, utf8_decode('Costo final: $') . $vehiculo['costo'], 0, 1);




                    // Agregar QR al final de la factura
                    $pdf->Cell(0, 10, '-----------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Cell(0, 10, utf8_decode('Visita nuestro sitio web'), 0, 1, 'C');
                    $pdf->SetFont('Arial', '', 14);
                    $qrCodeData = "https://www.virtudvirtual.site/act5-mecanico";
                    $qrCodeFile = 'qrcode.png'; // Nombre del archivo QR

                    QRcode::png($qrCodeData, $qrCodeFile, QR_ECLEVEL_L, 4);

                    // Insertar QR en el PDF
                    $pdf->Image($qrCodeFile, 85, $pdf->GetY() + 0, 40, 40);

                    // Output 
                    ob_start(); 
                    $pdf->Output(); 
                    $pdfData = ob_get_clean(); 
                    // Enviar el PDF como respuesta 
                    echo base64_encode($pdfData);

                    // Eliminar el archivo QR después de usarlo
                    unlink($qrCodeFile);
                } else {
                    echo "No se encontró el repuesto con ID: $idrepuesto";
                }
            } else {
                echo "No se encontró el mecánico con la cedula: $idmecanico";
            }
        } else {
            echo "No se encontró el vehiculo con ID: $idvehiculo";
        }
    } else {
        echo "No se encontró el cliente con ID: $cedulacliente";
    }
} else {
    echo "No se encontró la reparación con ID: $idreparacion";
}

$conec->close();
?>