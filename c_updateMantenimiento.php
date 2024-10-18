<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$idMantenimiento = $_POST["id"];
$tipoMantenimiento = $_POST["tipoMantenimiento"];
$problema = $_POST["problema"];
$descripcion = $_POST["descripcion"];
$fechaInicio = $_POST["fechaInicio"];
$fechaFin = $_POST["fechaFin"];
$idequipo = $_POST["idequipo"];
$monitor = $_POST["monitor"];

// Componemos la sentencia SQL
$ssql = "UPDATE mantenimientos SET
tipo_mantenimiento='$tipoMantenimiento', 
problema='$problema', 
descripcion='$descripcion', 
fecha_inicio='$fechaInicio', 
id_equipo='$idequipo', 
id_monitor='$monitor' ";

// Si se proporciona una fecha de fin en el formulario, actualizamos la fecha de fin
if (!empty($fechaFin)) {
    $ssql .= ", fecha_fin='$fechaFin' ";
} else {
    // Si no se proporciona una fecha de fin en el formulario, dejamos la fecha_fin sin actualizar
    $ssql .= ", fecha_fin=NULL ";
}

$ssql .= " WHERE id='$idMantenimiento'";

// Ejecutamos la sentencia y comprobamos si ha ido bien
if($conexion->query($ssql)) {
    // Si se proporciona una fecha de fin en el formulario, actualizamos el estado del equipo a activo
    if (!empty($fechaFin)) {
        $sql_equipo = "UPDATE equipos SET estado = 1 WHERE id = '$idequipo'";
        $conexion->query($sql_equipo);
    }
    echo "<p>Registro actualizado con éxito</p>";
} else {
    echo "<p>Error al ejecutar update: {$conexion->error}</p>";
}
$conexion->close();
?>
