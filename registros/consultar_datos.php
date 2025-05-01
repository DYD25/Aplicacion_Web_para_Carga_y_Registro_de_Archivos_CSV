<?php

$id = $_GET['id'];


$busqueda = "SELECT * FROM registro
 WHERE Id='$id'";

$guarda = mysqli_query($conexion, $busqueda);
echo mysqli_error($conexion);
$respuesta = mysqli_fetch_assoc($guarda);



echo json_encode($respuesta);
