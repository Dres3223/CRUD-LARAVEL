<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$idMarca = $_POST["id"];
$nombre = $_POST["nombreMarca"];

// Verificar si el nombre de la marca ya existe en la base de datos, excluyendo el registro que se está actualizando
$sql_validar = "SELECT COUNT(*) as total FROM marcas WHERE nombre = '$nombre' AND id <> $idMarca";
$resultado = $conexion->query($sql_validar);
$fila = $resultado->fetch_assoc();
$total = $fila['total'];

if ($total > 0) {
    echo "Ya existe una marca con el mismo nombre . Por favor, verifica la información.";
} else {
    // Componemos la sentencia SQL
    $ssql = "UPDATE marcas SET nombre='$nombre' WHERE id=$idMarca";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro actualizado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar update: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
