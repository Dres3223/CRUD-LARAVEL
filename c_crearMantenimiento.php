<?php
include "conexion.php";
$conexion = conexion();
?>

<?php
// Recuperamos los datos del formulario
$tipoMantenimiento = $_POST["tipoMantenimiento"];
$probMantenimiento = $_POST["problema"];
$fechaMantenimiento = $_POST["fechaInicio"];
$idequipo = $_POST["idequipo"];
$monitor = $_POST["monitor"];
// Componemos la sentencia SQL
$ssql = "INSERT INTO mantenimientos (tipo_mantenimiento, problema, fecha_inicio, id_equipo, id_monitor) 
VALUES ('$tipoMantenimiento', '$probMantenimiento','$fechaMantenimiento', '$idequipo', '$monitor')";

// Ejecutamos la sentencia y comprobamos si ha ido bien
if($conexion->query($ssql)) {
    // Actualizamos el estado del equipo a inactivo
    $sql_equipo = "UPDATE equipos SET Estado = 0 WHERE id = '$idequipo'";
    if($conexion->query($sql_equipo)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al actualizar el estado del equipo: {$conexion->error}</p>";
    }
} else {
    echo "<p>Error al ejecutar inserción: {$conexion->error}</p>";
}
$conexion->close();
?>
