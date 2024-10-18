<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$idSala = $_POST["id"];
$nombre = $_POST["nombreSala"];
$idsede = $_POST["idsede"];
// Componemos la sentencia SQL
$ssql = "update salas set
nombre='" . $nombre . "', 
id_sedes='" . $idsede . "' 
WHERE id=" . $idSala;

// Ejecutamos la sentencia y comprobamos si ha ido bien
if($conexion->query($ssql)) {
    echo "<p>Registro actualizado con éxito</p>";
} else {
    echo "<p>Error al ejecutar update: {$conexion->error}</p>";
}
$conexion->close();
?>
