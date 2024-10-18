<?php
function conexion() {
    $mysqli_conexion = new mysqli("localhost", "root","", "parcial2_mantenimientos");
        if ($mysqli_conexion->connect_errno) {
            echo "Error de conexión: " . $mysqli_conexion->connect_errno;
            exit;
        }
        return $mysqli_conexion;
}
?>