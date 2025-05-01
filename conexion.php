<?php
session_start();
	$conexion=mysqli_connect("localhost","root","","aplicacion") or die('error en la conexion a la Base de Datos');
	$conexion -> set_charset("utf8");
	
