<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE MANTENIMIENTO</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <?php
        //Conexion con la base
        include 'conexion.php';
        $conexion = conexion();
        
        // Recuperamos el id del cliente del enlace con elmetodo GET
        $idMantenimiento = $_GET["idMantenimiento"];
        // Componemos la sentencia SQL
        $ssql = "select * from mantenimientos where id=".$idMantenimiento;

        // Ejecutamos la sentencia SQL
        $result = $conexion->query($ssql);
        $row = $result->fetch_array();
        ?>
    <div class="contenedorFormulario">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a class="boton botonAzul" href="listaMantenimientos.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>UPDATE MANTENIMIENTO</h1>
        <form method="post"action="c_updateMantenimiento.php">
        <div class="contenedorInput trans">
                <label for="">EQUIPO</label>
                <input type="hidden" name="id" value="<?php echo $idMantenimiento;?>" readonly>
                <select required name="idequipo">
                    <option value="" disabled selected>Elige equipo</option>
                    <?php
                        $sql_equipos = "select * from equipos";
                        $eje_equipos = $conexion->query($sql_equipos);
                            while($reg_equipos = $eje_equipos->fetch_array()){
                                $selected = ($reg_equipos["id"] == $row["id_equipo"]) ? 'selected' : '';
                                echo "<option $selected value='" . $reg_equipos["id"] . "'>" . $reg_equipos["codigo"] . "</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">TIPO DE MANTENIMIENTO</label>
                <select required name="tipoMantenimiento">
                    <option value="<?php echo $row["tipo_mantenimiento"];?>"><?php echo $row["tipo_mantenimiento"];?></option>
                    <option value="Preventivo">Preventivo</option>
                    <option value="Correctivo">Correctivo</option>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">PROBLEMA</label>
                <textarea required name="problema"><?php echo $row["problema"];?></textarea>
            </div>
            <div class="contenedorInput trans">
                <label for="">FECHA INICIO</label>
                <input required class="trans"name="fechaInicio"type="date"value="<?php echo $row["fecha_inicio"];?>">
            </div>
            <div class="contenedorInput trans">
                <label for="">MONITOR</label>
                <select required name="monitor">
                    <option value="" disabled selected>Elige monitor encargado</option>
                    <?php
                        $sql_monitores = "select * from monitores";
                        $eje_monitores = $conexion->query($sql_monitores);
                            while($reg_monitores = $eje_monitores->fetch_array()){
                                $selected = ($reg_monitores["id"] == $row["id_monitor"]) ? 'selected' : '';
                                echo "<option $selected value='" . $reg_monitores["id"] . "'>" . $reg_monitores["nombre"] . "</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">FECHA FIN</label>
                <input class="trans"name="fechaFin"type="date">
            </div>
            <div class="contenedorInput trans">
                <label for="">DESCRIPCION</label>
                <textarea name="descripcion"></textarea>
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>