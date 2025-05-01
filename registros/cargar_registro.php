<?php
$pagina_actual = $_GET['pagina'];
$ordenar = $_GET['x'];
$ordenar ="Identificador"; 
$NUM_REGISTROS_PAGINA = 16;
$salto = ($pagina_actual - 1) * $NUM_REGISTROS_PAGINA;
$limite = $NUM_REGISTROS_PAGINA;

$busqueda = "SELECT *
FROM registro
ORDER BY $ordenar
LIMIT $limite OFFSET $salto";

$busqueda_cantidad = "SELECT COUNT(*) as cantidad FROM registro";
$consultar_cantidad = mysqli_query($conexion, $busqueda_cantidad);
if ($guardar_cantidad = mysqli_fetch_assoc($consultar_cantidad)) {
  $cantidad = $guardar_cantidad['cantidad'];
  $num_paginas = ceil($cantidad / $NUM_REGISTROS_PAGINA);
}else{
  echo "Cantidad";
}

$consulta = mysqli_query($conexion, $busqueda);
$num = $salto + 1;

?>
<table class="table" id="customers">

  <tr class="tr">
    <th>No.</th>
    <th> <i onclick="ide()" class="bi bi-arrow-down-up"></i> Identificador</th>
    <th> <i onclick="nom()" class="bi bi-arrow-down-up"></i> Nombre</th>
    <th> <i onclick="ope()" class="bi bi-arrow-down-up"></i> Operacion</th>

    <th> <i class='bi bi-pencil-square'></i> <i class='bi bi-trash-fill' onclick='eliminartodo()'></i></th>

  </tr>

  <tr class="tr">
    <?php
    while ($guarda = mysqli_fetch_assoc($consulta)) {
      echo "<td>$num</td>";
      echo "<td>$guarda[Identificador]</td>";
      echo "<td>$guarda[Nombre] </td>";
      echo "<td>$guarda[Operacion]</td>";

      echo "
     <td>  
      <a href='#' class='modificar' onclick='modificar($guarda[Id])'> <i class='bi bi-pencil-square'></i> </a> 
      <a href='#' class='eliminar' onclick='eliminar($guarda[Id])'> <i class='bi bi-trash-fill'></i> </a>
     </td>";

      echo "</tr>";

      $num = $num + 1;
    }
    ?>
  </table>
<?php include_once("paginacion.php"); ?>