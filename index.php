<?php


require_once("configuracion.php");

 if ($diseno == "sistema") {
    require_once("index_registro.php");
} else if ($diseno == "diseno_libre") {
    require_once("diseno_libre.php");
}
