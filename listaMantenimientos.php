<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LISTA DE MANTENIMIENTOS</title>
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
            $idMantenimiento = $_GET["idMantenimiento"]; 
            // Componemos la sentencia SQL 
            $ssql = "delete from mantenimientos where id=".$idMantenimiento; 
            // Ejecutamos la sentencia y comprobamos si ha ido bien 
            if($conexion->query($ssql)) { 
                echo "<p>Registro borrado con éxito</p>"; 
            } else { 
                echo "<p>Error al borrar: {$conexion->error}</p>"; 
            }
        }
        // Componemos la sentencia SQL 
        $ssql = "SELECT 
        m.id AS 'id',
        m.fecha_inicio AS 'Inicio',
        e.codigo AS 'Equipo', 
        m.problema AS 'Problema',
        mon.nombre AS 'Monitor',  
        IFNULL(m.fecha_fin, 'Aún no asignada') AS 'Fecha_Fin'
        FROM 
        mantenimientos m
        JOIN 
        equipos e ON m.id_equipo = e.id
        LEFT JOIN 
        monitores mon ON m.id_monitor = mon.id;"; 
        // Ejecutamos la sentencia SQL 
        $result = $conexion->query($ssql); 
        ?>
        <div class="contenedor">
            <div class="contenedorBoton">
                <a class="boton botonAzul" href="index.php"><</a>
                <a class="boton botonVerde" href="f_crearMantenimiento.php">+ nuevo</a>
    </div>
            <table>
                <thead>
                    <tr>
                        <th>INICIO</th>
                        <th>EQUIPO</th>
                        <th>PROBLEMA</th>
                        <th>MONITOR</th>
                        <th>FECHA FIN</th>
                        <th>FUNCIONES</th>
                </thead>
                <tbody>
                <?php 
                //Mostramos los registros 
                while ($row = $result->fetch_array()) { 
                    echo '<tr>
                    <td>' . $row["Inicio"] . '</td>'; 
                    echo '<td>' . $row["Equipo"] . '</td>
                    <td>' . $row["Problema"] . '</td>
                    <td>' . $row["Monitor"] . '</td>
                    <td>' . $row["Fecha_Fin"] . '</td>
                    <td>
                    <a class="boton botonRojo"href="listaMantenimientos.php?borrar=si&idMantenimiento='.$row["id"].'">B</a>
                    <a class="boton botonAmarillo"href="f_updateMantenimiento.php?idMantenimiento='.$row["id"].'">E</a>
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