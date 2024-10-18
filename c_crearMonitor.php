
<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$CCMonitor = $_POST["CCMonitor"];
$nombre = $_POST["nombreMonitor"];

// Verificar si el número de cédula ya existe en la base de datos
$sql_validar = "SELECT COUNT(*) as total FROM monitores WHERE cc = '$CCMonitor'";
$resultado = $conexion->query($sql_validar);
$fila = $resultado->fetch_assoc();
$total = $fila['total'];

if ($total > 0) {
    echo "Ya existe un monitor con el mismo número de identificacion. Por favor, verifica la información.";
} else {
    // Componemos la sentencia SQL
    $ssql = "INSERT INTO monitores (cc, nombre) VALUES ('$CCMonitor', '$nombre')";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar inserción: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
