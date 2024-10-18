<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$idEquipo = $_POST["id"];
$Codigo = $_POST["codigo"];
$tipoEquipo = $_POST["tipoEquipo"];
$idmarca = $_POST["idmarca"];
$idsala = $_POST["idsala"];
$estado = isset($_POST['estado']) ? 1 : 0;
$ingreso = $_POST["ingresoEquipo"];
// Componemos la sentencia SQL
$ssql = "update equipos set
codigo='" . $Codigo . "',
tipo='" . $tipoEquipo . "', 
id_marca='" . $idmarca . "', 
id_sala='" . $idsala . "',
fecha_ingreso='" . $ingreso . "' ,
Estado='" . $estado . "' 
WHERE id=" . $idEquipo;

// Ejecutamos la sentencia y comprobamos si ha ido bien
if($conexion->query($ssql)) {
    echo "<p>Registro actualizado con éxito</p>";
} else {
    echo "<p>Error al ejecutar update: {$conexion->error}</p>";
}
$conexion->close();
?>