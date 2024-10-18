<?php
include "conexion.php";
$conexion = conexion();

// Recuperamos los datos del formulario
$Codigo = $_POST["codigo"];

// Verificar si ya existe un registro con el mismo código
$consulta = "SELECT * FROM equipos WHERE codigo = '$Codigo'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    echo "<p>Ya existe un equipo con el mismo código. No se puede agregar duplicado.</p>";
} else {
    $tipoEquipo = $_POST["tipoEquipo"];
    $idmarca = $_POST["idmarca"];
    $idsala = $_POST["idsala"];
    $estado = isset($_POST['estado']) ? 1 : 0;
    $ingreso = $_POST["ingresoEquipo"];

    // Componemos la sentencia SQL
    $ssql = "INSERT INTO equipos (tipo, id_marca, id_sala, fecha_ingreso, Estado, codigo) VALUES ('$tipoEquipo', '$idmarca', '$idsala', '$ingreso','$estado','$Codigo')";

    // Ejecutamos la sentencia y comprobamos si ha ido bien
    if($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al ejecutar inserción: {$conexion->error}</p>";
    }
}

$conexion->close();
?>
