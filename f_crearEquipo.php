<!DOCTYPE html>
<?php
    include "conexion.php";
    $conexion = conexion();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CREAR EQUIPO</title>
</head>
<body>
<?php
        include 'barraMenu.php';
    ?>
    <div class="contenedorFormulario">
    <br>
        <br>
        <br>
        <br>
        <a class="boton botonAzul" href="listaEquipos.php"><</a>
        <a class="boton botonAzul" href="index.php">MENU</a>
        <h1>CREAR EQUIPO</h1>
        <form method="post"action="c_crearEquipo.php">
            <div class="contenedorInput">
                <label for="">CODIGO</label>
                <input class="trans" required type="text" name="codigo">
            </div>
            <div class="contenedorInput trans">
                <label for="">TIPO</label>
                <select required name="tipoEquipo">
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
                                echo "<option value='".$reg_marcas["id"]."'>".$reg_marcas["nombre"]."</option>";
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
                                echo "<option value='".$reg_salas["id"]."'>".$reg_salas["nombre"]."</option>";
                            }
                        ?>
                </select>
            </div>
            <div class="contenedorInput trans">
                <label for="">ESTADO</label>
                <input name="estado"type="checkbox">
            </div><br>
            <div class="contenedorInput">
                <label for="">INGRESO</label>
                <input required value="1"class="trans"type="date" name="ingresoEquipo">
            </div>
            <div class="contenedorInput">
                <input class="boton botonVerde" type="submit" >
            </div>
        </form>
    </div>
</body>
</html>