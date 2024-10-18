<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UPDATE EQUIPO</title>
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
        $idEquipo = $_GET["idEquipo"];
        // Componemos la sentencia SQL
        $ssql = "select * from equipos where id=".$idEquipo;

        // Ejecutamos la sentencia SQL
        $result = $conexion->query($ssql);
        $row = $result->fetch_array();
        ?>
    <div class="contenedorFormulario">
        <br>
        <br>
        <br>
        <br>
        <a class="boton botonAzul" href="listaEquipos.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>UPDATE EQUIPO</h1>
        <form method="post"action="c_updateEquipo.php">
            <div class="contenedorInput">
                <input type="hidden" name="id" value="<?php echo $idEquipo;?>" readonly>
                <label for="">CODIGO</label>
                <input class="trans" required type="text" name="codigo"value="<?php echo $row["id"];?>">
            </div>
            <div class="contenedorInput trans">
                <label for="">TIPO</label>
                <select required name="tipoEquipo">
                    <option value="<?php echo $row["tipo"];?>"><?php echo $row["tipo"];?></option>
                    <option value="Pc">Pc</option>
                    <option value="Portatil">Portatil</option>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">MARCA</label>
                <select required name="idmarca">
                    <option value="" disabled selected>Elige marca del equipo</option>
                    <?php
                        $sql_marcas = "select * from marcas";
                        $eje_marcas = $conexion->query($sql_marcas);
                            while($reg_marcas = $eje_marcas->fetch_array()){
                                $selected = ($reg_marcas["id"] == $row["id_marca"]) ? 'selected' : '';
                                echo "<option $selected value='" . $reg_marcas["id"] . "'>" . $reg_marcas["nombre"] . "</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">SALA</label>
                <select required name="idsala">
                    <option value="" disabled selected>Elige la sala a la que corresponde el equipo</option>
                    <?php
                        $sql_salas = "select * from salas";
                        $eje_salas = $conexion->query($sql_salas);
                            while($reg_salas = $eje_salas->fetch_array()){
                                $selected = ($reg_salas["id"] == $row["id_sala"]) ? 'selected' : '';
                                echo "<option $selected value='" . $reg_salas["id"] . "'>" . $reg_salas["nombre"] . "</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">ESTADO</label>
                <input name="estado"type="checkbox"<?php echo ($row["Estado"] == 1) ? 'checked' : ''; ?>>
            </div><br>
            <div class="contenedorInput">
                <label for="">INGRESO</label>
                <input class="trans"type="date" name="ingresoEquipo"value="<?php echo $row["fecha_ingreso"];?>">
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>