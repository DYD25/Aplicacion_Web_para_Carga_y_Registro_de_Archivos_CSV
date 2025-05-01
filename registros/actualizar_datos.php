<?php
global $conexion;

$perId = $_POST['idper'];

$ident = $_POST['iden'];
$nomb = $_POST['nom'];
$oper = $_POST['ope'];

$resultado = [];
if (!empty($ident) && !empty($nomb) && !empty($oper) ) {

	$busqueda = "select * from registro where Id  = '$perId'";
	$consulta = mysqli_query($conexion, $busqueda);
	$rw = mysqli_fetch_array($consulta);

	$busqueda2 = "select * from registro where Identificador  = '$ident'";
	$consulta2 = mysqli_query($conexion, $busqueda2);
	$rw2 = mysqli_fetch_array($consulta2);

	#if ($rw2 == "") {

	if ($ident != $rw['Identificador'] || $rw['Nombre'] != $nomb || $rw['Operacion'] != $oper) {

		$actualizar = "UPDATE registro SET  
			Identificador ='$ident',Nombre ='$nomb',Operacion = '$oper'
			WHERE Id = '$perId'";

		mysqli_query($conexion, $actualizar);

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
	
} else {
	$resultado['error3'] = true;
}

echo json_encode($resultado);
