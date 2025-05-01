<?php
global $conexion;

$ident = $_POST['iden'];
$nomb = $_POST['nom'];
$oper = $_POST['ope'];

$resultado = [];
if (!empty($ident) && !empty($nomb) && !empty($oper)) {

  $busqueda = "select * from registro where Identificador = '$ident'";
  $consulta = mysqli_query($conexion, $busqueda);
  $rw = mysqli_fetch_array($consulta);

  if (empty($rw)) {

    $insetar = "INSERT INTO registro (Identificador,Nombre,Operacion) 
    VALUES('$ident','$nomb','$oper')";

    $rs2 = mysqli_query($conexion, $insetar);

    if (mysqli_error($conexion) == "") {

      $resultado['error'] = false;
    } else {
      $resultado['error'] = true;
      $resultado['mensaje'] = mysqli_error($conexion);
    }
  } else {
    $resultado['error2'] = true;
    $resultado['nom'] = $nomb;
  }
} else{
  $resultado['error3'] = true;
}

echo json_encode($resultado);
