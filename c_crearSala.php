<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$nombre = $_POST["nombreSala"];
$idsede = $_POST["idsede"];

// Validar si el nombre de la sala ya existe en la base de datos
$sql_validar = "SELECT COUNT(*) as total FROM salas WHERE nombre = '$nombre' AND id_sedes = $idsede";
$resultado = $conexion->query($sql_validar);
$fila = $resultado->fetch_assoc();
$total = $fila['total'];

if ($total > 0) {
    echo "El nombre de la sala ya está en uso para esta sede. Por favor, elige otro nombre.";
} else {
    // Componemos la sentencia SQL
    $ssql = "INSERT INTO salas (nombre, id_sedes) VALUES ('$nombre', '$idsede')";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar inserción: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
