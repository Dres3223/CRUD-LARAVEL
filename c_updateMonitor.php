<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$CCMonitor = $_POST["CCMonitor"];
$nombre = $_POST["nombreMonitor"];

// Verificar si el número de cédula ya existe en la base de datos, excluyendo el registro que se está actualizando
$sql_validar = "SELECT COUNT(*) as total FROM monitores WHERE cc = '$CCMonitor' AND cc <> $CCMonitor";
$resultado = $conexion->query($sql_validar);
$fila = $resultado->fetch_assoc();
$total = $fila['total'];

if ($total > 0) {
    echo "Ya existe un monitor con el mismo número de cédula. Por favor, verifica la información.";
} else {
    // Componemos la sentencia SQL
    $ssql = "UPDATE monitores SET nombre='$nombre' WHERE cc='$CCMonitor'";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro actualizado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar update: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
