<?php
require_once("conexion.php");


if (isset($_GET['modulo'])) {
  $contenido = $_GET['modulo'];
} else {
  $contenido = "registro";
}



$modulos = [
  // ------------persona-------------
  "registro" => [
    "diseño" => "sistema",
    "archivo" => "registros/registro_formulario.php"
  ],

  "cargar-registro" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/cargar_registro.php"
  ],

  "registrar-datos" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/registrar_datos.php"
  ],

  "eliminar-datos" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/eliminar_datos.php"
  ],

  "consulta-datos" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/consultar_datos.php"
  ],

  "actualizar-datos" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/actualizar_datos.php"
  ],

  "subir" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/subir.php"
  ],
  "eliminar-todo" => [
    "diseño" => "diseno_libre",
    "archivo" => "registros/eliminar_todo.php"
  ],

];

if (isset($modulos[$contenido])) {
  $diseno = $modulos[$contenido]["diseño"];
  $archivo = $modulos[$contenido]["archivo"];
} else {
}


/*

*/
