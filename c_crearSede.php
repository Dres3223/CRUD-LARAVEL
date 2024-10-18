<?php
include "conexion.php";
$conexion = conexion();

// Verificar si se ha enviado el formulario y el campo nombreSede está definido
if(isset($_POST["nombreSede"])) {
    // Recuperar el nombre de la sede del formulario
    $nombre = $_POST["nombreSede"];

    // Consultar si la sede ya existe en la base de datos
    $consulta = "SELECT COUNT(*) as total FROM sedes WHERE nombre = '$nombre'";
    $resultado = $conexion->query($consulta);

    if($resultado) {
        // Obtener el número de filas encontradas
        $row = $resultado->fetch_assoc();
        $total = $row['total'];

        // Si el total es mayor que cero, la sede ya existe
        if($total > 0) {
            echo "<p>La sede '$nombre' ya existe en la base de datos.</p>";
        } else {
            // La sede no existe, realizar la inserción en la base de datos
            $ssql = "INSERT INTO sedes (nombre) VALUES ('$nombre')";

            if($conexion->query($ssql)) {
                echo "<p>Registro insertado con éxito</p>";
            } else {
                echo "<p>Error al ejecutar inserción: {$conexion->error}</p>";
            }
        }
    } else {
        echo "<p>Error al consultar la base de datos</p>";
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "<p>Error: nombreSede no está definido en \$_POST</p>";
}
?>
