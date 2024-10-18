<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LSTA DE SALAS</title>
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
            $idSala = $_GET["idSala"]; 
            // Componemos la sentencia SQL 
            $ssql = "delete from salas where id=".$idSala; 
            // Ejecutamos la sentencia y comprobamos si ha ido bien 
            if($conexion->query($ssql)) { 
                echo "<p>Registro borrado con éxito</p>"; 
            } else { 
                echo "<p>Error al borrar: {$conexion->error}</p>"; 
            }
        }
        // Componemos la sentencia SQL 
        $ssql = "select salas.id,salas.nombre as nombreSala , sedes.nombre as nombreSede
        from salas
        left join sedes on sedes.id=salas.id_sedes; "; 
        // Ejecutamos la sentencia SQL 
        $result = $conexion->query($ssql); 
    ?>
    <div class="contenedor">
            <div class="contenedorBoton">
                <a class="boton botonAzul" href="index.php"><</a>
                <a class="boton botonVerde" href="f_crearSalas.php">+ nuevo</a>
    </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>SEDE</th>
                        <th>FUNCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        //Mostramos los registros 
                        while ($row = $result->fetch_array()) { 
                            echo '<tr>
                            <td>' . $row["id"] . '</td>'; 
                            echo '<td>' . $row["nombreSala"] . '</td>
                            <td>' . $row["nombreSede"] . '</td>
                            <td>
                            <a class="boton botonRojo"href="listaSalas.php?borrar=si&idSala='.$row["id"].'">Borrar</a>
                            <a class="boton botonAmarillo"href="f_updateSala.php?idSala='.$row["id"].'">Editar</a>
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