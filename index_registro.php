<!DOCTYPE html>
<html lang="en">

<head>
	<title>APLICACION</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/scrip.js"></script>
</head>

<body>

	<div class="container">
		<div class="esnu">
			<div>
				<div class="alert success" id="bien">

				</div>
				<div class="alert danger" id="mal">

				</div>
				<div class="alert warning" id="adve">

				</div>
			</div>
		</div>
		<div class="cuerpo">
			<div class="nues">
				<div class="estoy" id="estoy">

				</div>
				<div class="nuevo" id="nuevo"></div>

			</div>
			<?php // Contenido del cuerpo 
			require_once($archivo);
			?>

			<div class="acciones" id="acciones">

			</div>
		</div>

	</div>
	</div>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</body>

</html>

<script>
	

	// $("#incliente").on('change', function() {

	// 	if ($('#fordoc').val()) {
	// 		var parametros = $("#incliente").serialize();
	// 		$.post("?modulo=subir", parametros, function(respuesta) {
	// 			var guardar_respuesta = jQuery.parseJSON(respuesta);
	// 			if (guardar_respuesta.error == true) {
	// 				alerta(texto);
	// 				texto = guardar_respuesta.nom;
	// 			} else {
	// 				texto = guardar_respuesta.nom;
	// 				cargar_datos();
	// 				exito(texto);
	// 			}
	// 		});

	// 	} else {
	// 		alert("noooooo No se seleccionó ningún archivo");
	// 		alert($('#fordoc').val());
	// 	}
	// })
</script>