<?php
    // Chequea si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once('conexion.php');

        // Chequeamos si se ha seleccionado un nuevo archivo
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

            // obtenemos ultimo autoincrement
            $sqlid = "SELECT MAX(idmecanico_repuestos) AS lastid FROM mecanico_repuestos WHERE 1;";

            $rsid = mysqli_query($conec, $sqlid) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)

            // Obtener el resultado como un arreglo asociativo 
            $fila = $rsid->fetch_assoc(); 

            // Almacenar el id en una variable
            $indice = $fila['lastid'] + 1;

            // Creamos carpeta uploads si esta no existe
            if(!file_exists("uploads")) {
                mkdir("uploads");
            }

            // Procesa la imagen para subirla al servidor
            $uploadOk = 1;
            $targetDir = "uploads/";

            $oldImageName = basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($oldImageName, PATHINFO_EXTENSION));
            $targetFile = $targetDir . "repuesto". $indice. ".". pathinfo($oldImageName, PATHINFO_EXTENSION);

            // Chequea si la imagen es una imagen valida
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Chequea si el archivo ya existe
            if (file_exists($targetFile)) {
                echo "<script>alert('Lo sentimos, este archivo ya existe.');</script>";
                $uploadOk = 0;
            }

            // Chequea que la imagen no sea demaciado grande
            if ($_FILES["image"]["size"] > 5000000) {
                echo "<script>alert('Lo sentimos, la imagen es demasiado grande.');</script>";
                $uploadOk = 0;
            }

            // Permite solo algunos formatos de imagen
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "<script>alert('Lo sentimos, solo archivos JPG, PNG & GIF son permitidos.');</script>";
                $uploadOk = 0;
            }

            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            $clasificacion = $_POST['clasificacion'];
            $cantidad = $_POST['cantidad'];
            $costo = $_POST['costo'];

            // Check if $uploadOk es 0 debido a un error
            if ($uploadOk == 0) {
                echo "<script>alert('Lo sentimos, no se ha podido cargar la imagen.');</script>";
            } else {
                // Chequea si los campos numericos tienen numeros
                if(is_numeric($cantidad) && is_numeric($costo)){

                    // si todo esta bien guarda la imagen en el servidor
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        echo "<script>alert('Imagen subida exitosamente.');</script>";

                        // Inserta la informacion en la bdd
                        $imageRoute = $targetFile;
                        $query = "INSERT INTO mecanico_repuestos(codigo, nombre, marca, modelo, descripcion, tipo, clasificacion, cantidad, imagenruta, costo, estado) VALUES('$codigo', '$nombre', '$marca', '$modelo', '$descripcion', '$tipo', '$clasificacion', '$cantidad', '$imageRoute', '$costo', 'SI')";

                        $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); //recordset ($rs)
        
                        if($rs){
                            echo "<script>alert('Registro Agregado');</script>";
                        }else{
                            echo "<script>alert('Error: No se agrego el registro');</script>";
                        }
                    } else {
                        echo "<script>alert('Lo sentimos, se ha presentado un error al cargar la imagen');</script>";
                    }

                } else {
                    echo "<script>alert('Los campos de cantidad y costo solo pueden tener números');</script>";
                }
            }
        } else {
            echo "<script>alert('Debe seleccionar una imagen');</script>";
        }
        // cambio de pagina asi porque header hace que los alerts dejen de funcionar
        echo "<script>window.location.replace('../../index.php'); </script>";
        // header("Location: ../../index.php");

    }
?>
