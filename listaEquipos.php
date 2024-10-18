<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LISTA DE EQUIPOS</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
<?php 
        //Conexion con la base 
        include 'conexion.php'; 
        $conexion = conexion(); 

        if(isset($_GET["borrar"]) && $_GET["borrar"]=="si"){
            $idEquipo = $_GET["idEquipo"]; 
            // Componemos la sentencia SQL 
            $ssql = "delete from equipos where id=".$idEquipo; 
            // Ejecutamos la sentencia y comprobamos si ha ido bien 
            if($conexion->query($ssql)) { 
                echo "<p>Registro borrado con éxito</p>"; 
            } else { 
                echo "<p>Error al borrar: {$conexion->error}</p>"; 
            }
        }
        // Componemos la sentencia SQL 
        $ssql = "SELECT 
        equipos.id as id,
        equipos.tipo as tipo,
        marcas.nombre AS marca,
        salas.nombre AS sala,
        equipos.codigo as codigo,
        equipos.fecha_ingreso as ingreso,
        COALESCE(MAX(mantenimientos.fecha_inicio), 'Sin mantenimientos') AS ultimo_mantenimiento,
        DATE_ADD(
            IFNULL(MAX(mantenimientos.fecha_inicio), equipos.fecha_ingreso), 
            INTERVAL 6 MONTH
        ) AS proximo_mantenimiento,
        equipos.Estado as estado
    FROM equipos
    LEFT JOIN mantenimientos ON equipos.id = mantenimientos.id_equipo
    LEFT JOIN marcas ON equipos.id_marca = marcas.id
    LEFT JOIN salas ON equipos.id_sala = salas.id
    GROUP BY equipos.id"; 
        // Ejecutamos la sentencia SQL 
        $result = $conexion->query($ssql); 
        ?>
        <div class="contenedor">
            <div class="contenedorBoton">
                <a class="boton botonAzul" href="index.php"><</a>
                <a class="boton botonVerde" href="f_crearEquipo.php">+ nuevo</a>
    </div>
            <table class="textopequeño">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIPO</th>
                        <th>MARCA</th>
                        <th>SALA</th>
                        <th>CODIGO</th>
                        <th>FECHA INGRESO</th>
                        <th>ULTIMO MANTENIMIENTO</th>
                        <th>PROXIMO MANTENIMIENTO</th>
                        <th>ESTADO</th>
                        <th>FUNCIONES</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                //Mostramos los registros 
                while ($row = $result->fetch_array()) { 
                    echo '<tr>
                    <td>' . $row["id"] . '</td>'; 
                    echo '<td>' . $row["tipo"] . '</td>
                    <td>' . $row["marca"] . '</td>
                    <td>' . $row["sala"] . '</td>
                    <td>' . $row["codigo"] . '</td>
                    <td>' . $row["ingreso"] . '</td>
                    <td>' . $row["ultimo_mantenimiento"] . '</td>
                    <td>' . $row["proximo_mantenimiento"] . '</td>
                    <td>';
                    // Verificar el estado y mostrar la imagen correspondiente
                    if ($row["estado"] == 1) {
                        echo '<img src="imagenes/Activo.png" alt="Activo">';
                    } else {
                        echo '<img src="imagenes/inactivo.png" alt="Inactivo">';
                    }

                    echo '</td>
                    <td>
                    <a class="boton botonRojo"href="listaEquipos.php?borrar=si&idEquipo='.$row["id"].'">B</a>
                    <a class="boton botonAmarillo"href="f_updateEquipo.php?idEquipo='.$row["id"].'">E</a>
                    <a class="boton botonAzul"href="listaMantenimientosXEquipos.php?idEquipo='.$row["id"].'">MANTENIMIENTOS</a>
                    </td>
                    </tr>'; 
                    } 

                    $result->free_result(); 
                    $conexion->close(); 
                    ?> 
                </tbody>
            </table>
        </div>
</body>
</html>