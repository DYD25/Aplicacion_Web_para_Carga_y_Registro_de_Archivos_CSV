<?php
  require __DIR__ . '/../vendor/autoload.php';
global $conexion;

$resultado = array(); 

$archivo = $_FILES['incliente']['tmp_name'];


    if (!empty($_FILES['incliente']['name'])) {

        if ($_FILES['incliente']['type'] == 'text/csv') {
            $archivo = $_FILES['incliente']['tmp_name'];
            ImportarDatos($archivo);

        } else {
            $resultado['error'] = true;
            $resultado['mensaje'] = "El tipo de archivo no es CSV";
        }
    } else {
        $resultado['error'] = true;
        $resultado['mensaje'] = 'No se seleccionó ningún archivo';
    }


function ImportarDatos($archivo)
{
    global $conexion;
  

    $documento = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivo);
    $hoja = $documento->getActiveSheet();
    $filas = $hoja->getHighestDataRow();

    for ($fi = 2; $fi <= $filas; $fi++) {
        $IDENTIFICADOR = $hoja->getCell('A' . $fi)->getValue();
        $NOMBRE = $hoja->getCell('B' . $fi)->getValue();
        $OPERACION = $hoja->getCell('C' . $fi)->getValue();

        $insertar = "INSERT INTO registro (Identificador, Nombre, Operacion) 
                     VALUES ('$IDENTIFICADOR', '$NOMBRE', '$OPERACION')";
        $rs2 = mysqli_query($conexion, $insertar);

      
    }

    if ($rs2) {
        $resultado['error'] = false;
        $resultado['mensaje'] ='se realizo el registr';

    } else {
        $resultado['error'] = true;
        $resultado['mensaje'] = 'No se seleccionó ningún archivo';
    }
}

echo json_encode($resultado);
?>
