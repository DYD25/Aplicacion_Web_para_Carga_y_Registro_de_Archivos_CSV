<div id="tabla">

    <div id="contenido-tabla" class="conte">

    </div>

    <div id="clientediv">
        <form id="clienteform" method="post">
            <input type="hidden" id="idper" name="idper" />
            <div class="grousp">
                <div class="input-group">
                    <input type="text" id="iden" name="iden" class="input" required>
                    <label class="label">Identificador</label>
                </div>
                <div class="input-group">
                    <input type="text" id="nom" name="nom" class="input" required>
                    <label class="label">Nombre</label>
                </div>
                <div class="input-group">
                    <input type="text" id="ope" name="ope" class="input" required>
                    <label class="label">Operacion</label>
                </div>

            </div>


        </form>
    </div>
</div>

<!-- ----------------script------------ -->

<script type="text/javascript">
    $("#estoy").html('<form id="fordoc" method="post" enctype="multipart/form-data"> <input type="file" accept=".csv" name="incliente" id="incliente" enty class="incliente  clipro" > </form> <p class="pcli col"><i class="bi bi-file-earmark-arrow-up-fill"></i> SUBIR REGRISTRO  </p>');
    $("#nuevo").html("<a href='#' id='nue_clie'> <i class='bi bi-file-earmark-plus-fill'></i>  NUEVO REGISTRO</a>");

    var pagina = 1;

    $(document).ready(function() {
        cargar_datos();
        $("#clienteform").hide();
    });

    function cargar_datos() {
        $("#contenido-tabla").load("?modulo=cargar-registro&pagina=" + pagina + "&x=" + " ");
    }

    function ide(){
        $("#contenido-tabla").load("?modulo=cargar-registro&pagina=" + pagina + "&x=" + "Identificador");
        
    }

    function nom() {
      
        $("#contenido-tabla").load("?modulo=cargar-registro&pagina=" + pagina + "&x=" + "Nombre");
    }

    function ope() {
     
        $("#contenido-tabla").load("?modulo=cargar-registro&pagina=" + pagina + "&x=" + "Operacion");
    }

    $('#nue_clie').click(function() {
        $("#contenido-tabla").hide();
        $("#nue_clie").hide();
        $("#estoy").html("<a href=''> <i class='bi bi-arrow-left-square-fill'></i></a> <span>REGISTRAR</span>");
        $("#acciones").html('<a href="" class="cancelar"> Cancelar </a> <button type="button" onclick="registrar()" class="guardar" id="gua_cli"> Guardar </button>');

        $("#clienteform").show();

    });

    function registrar() {
        var parametros = $("#clienteform").serialize();

        $.post("?modulo=registrar-datos", parametros, function(respuesta) {
            var guardar_respuesta = jQuery.parseJSON(respuesta);

            if (guardar_respuesta.error == false) {
                $("#estoy").html('<form id="fordoc" method="post" enctype="multipart/form-data"> <input type="file" accept=".csv" name="incliente" id="incliente" enty class="incliente  clipro" > </form> <p class="pcli col"><i class="bi bi-file-earmark-arrow-up-fill"></i> SUBIR REGISTRO  </p>');

                $("#clienteform").hide();
                $("#contenido-tabla").show();
                $("#nue_clie").show();
                cargar_datos();
                texto = "Se ha registrado con exito ";
                exito(texto);
                $("#clienteform").get(0).reset(); //Limpiar el formulario
                $("#acciones").html("");

            } else if (guardar_respuesta.error2 == true) {
                texto = "Este registo " + guardar_respuesta.nom + " ya se encuentra registrada";
                event.preventDefault();
                alerta(texto);
            } else if (guardar_respuesta.error3 == true) {
                texto = "Verifique por favor que todos los campos estén diligenciados";
                event.preventDefault();
                alerta(texto);
            } else {
                texto = "No se ha podido completar la solicitud de <br>registro , por un error inesperado... <br> Por favor consulte con el administrador ";
                event.preventDefault();
                error(texto);
            }
        });

    }

    function modificar(id) {
        $("#estoy").html("<a href=''><i  class='fa-solid fa-arrow-left'></i> <i class='fa-solid fa-user-pen'></i></a> <span>ACTUALIZAR</span>");
        $("#acciones").html('<a href="" class="cancelar"> Cancelar </a> <button type="button" onclick="actualizar()" class="guardar" "> Actualizar </button>');
        $("#contenido-tabla").hide();
        $("#clienteform").show();
        $("#nue_clie").hide();

        var parametros = "id=" + id;
        $.get("?modulo=consulta-datos", parametros, function(respuesta) {
            var guarda = jQuery.parseJSON(respuesta);

            $("#idper").val(guarda.Id);
            $("#iden").val(guarda.Identificador);
            $("#nom").val(guarda.Nombre);
            $("#ope").val(guarda.Operacion);

        });
    }

    function actualizar() {

        if (confirm("¿Realmente desea actualizar el registro seleccionado?") == true) {
            var parametros = $("#clienteform").serialize();

            $.post("?modulo=actualizar-datos", parametros, function(respuesta) {
                var guardar_respuesta = jQuery.parseJSON(respuesta);

                if (guardar_respuesta.error == false) {

                    $("#estoy").html('<form id="fordoc" method="post" enctype="multipart/form-data"> <input type="file" accept=".csv" name="incliente" id="incliente" enty class="incliente  clipro" > </form> <p class="pcli col"><i class="bi bi-file-earmark-arrow-up-fill"></i> SUBIR REGRISTRO  </p>');

                    $("#clienteform").hide();
                    $("#contenido-tabla").show();
                    $("#nue_clie").show();
                    cargar_datos();
                    texto = "Se ha actualizado con exito ";
                    exito(texto);
                    $("#clienteform").get(0).reset(); //Limpiar el formulario
                    $("#acciones").html("");

                } else if (guardar_respuesta.error2 == true) {
                    texto = "El registro " + guardar_respuesta.nom + " ya se encuentra registrada <br y no ha realizado ningun cambio";
                    event.preventDefault();
                    alerta(texto);
                } else if (guardar_respuesta.error3 == true) {
                    texto = "Verifique por favor que todos los campos estén diligenciados";
                    event.preventDefault();
                    alerta(texto);
                } else {
                    texto = "No se ha podido completar la actualización del <br>registro , por un error inesperado... <br> Por favor consulte con el administrador ";
                    error(texto);

                }
            });

        }

    }


    $("body").on('change', '#incliente', function() {
        var formData = new FormData($("#fordoc")[0]);

        if ($('#incliente').val()) {
            $.ajax({
                url: "?modulo=subir",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(respuesta) {
                    var guardar_respuesta = jQuery.parseJSON(respuesta);
                    if (guardar_respuesta.error) {
                        alert(guardar_respuesta.mensaje); // Mostrar mensaje de error
                    } else {
                        cargar_datos();
                        texto = "Archivo procesado exitosamente";
                        exito(texto);
                    }
                },
                error: function(xhr, status, error) {
                    alert("Error al procesar el archivo: " + error); // Mostrar mensaje de error de AJAX
                }
            });
        } else {
            alert("No se seleccionó ningún archivo");
        }
    });

    function eliminar(id) {
        if (confirm("Desea eliminar el registro seleccionado?") == true) {
            var parametros = "id=" + id;

            $.post("?modulo=eliminar-datos", parametros, function(respuesta) {
                var guardar_resp = jQuery.parseJSON(respuesta);
                if (guardar_resp.error == false) {
                    texto = "ha registro ha siod eliminado con un exito";
                    exito(texto);
                    cargar_datos();
                } else {
                    texto = "No se ha podido completar la eliminacion del <br>registro , por un error inesperado... <br> Por favor consulte con el administrador ";
                    error(texto);
                }
            });
        }
    }


    function eliminartodo() {

        if (confirm("Desea eliminar todos los registros?") == true) {
            var parametros = 1;
            $.post("?modulo=eliminar-todo", parametros, function(respuesta) {
                var guardar_resp = jQuery.parseJSON(respuesta);
                if (guardar_resp.error == false) {
                    texto = "ha registro ha siod eliminado con un exito";
                    exito(texto);
                    cargar_datos();
                } else {
                    texto = "No se ha podido completar la eliminacion del <br>registro , por un error inesperado... <br> Por favor consulte con el administrador ";
                    error(texto);
                }
            });
        }

    }

    function ir_a_pagina(p) {
        pagina = p;
        cargar_datos();
    }
</script>