<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$idSede = $_POST["id"];
$nombre = $_POST["nombre"];

// Validar si el nombre ya existe en la base de datos
$sql_validar = "SELECT COUNT(*) as total FROM sedes WHERE nombre = '$nombre' AND id <> $idSede";
$resultado = $conexion->query($sql_validar);
$fila = $resultado->fetch_assoc();
$total = $fila['total'];

if ($total > 0) {
    echo "El nombre ya está en uso. Por favor, elige otro nombre.";
} else {
    // Componemos la sentencia SQL
    $ssql = "UPDATE sedes SET nombre='$nombre' WHERE id=$idSede";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro actualizado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar update: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
