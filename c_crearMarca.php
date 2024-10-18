<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$nombre = $_POST["nombreMarca"];

// Verificar si la marca ya existe en la base de datos
$sql_validar = "SELECT COUNT(*) as total FROM marcas WHERE nombre = '$nombre'";
$resultado = $conexion->query($sql_validar);
$fila = $resultado->fetch_assoc();
$total = $fila['total'];

if ($total > 0) {
    echo "La marca ya existe . Por favor, verifica la información.";
} else {
    // Componemos la sentencia SQL
    $ssql = "INSERT INTO marcas (nombre) VALUES ('$nombre')";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar inserción: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
