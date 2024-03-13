<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del préstamo</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
    <body>
        <div class="container mt-5">
        <h1>Introduzca los datos del préstamo</h1>
        <form action= "001-insertar.php" method = "post">
            <div class="form-group">
                <?php
                    $host = "localhost";
                    $user = "phpmyadmin";
                    $pass = "root";
                    $database = "biblioteca";
            
                    //Conectando
                    $con = new mysqli($host, $user, $pass, $database);
                    //Selecciono la base de datos
                    mysqli_select_db($con, "biblioteca");
                    //Creo la sentencia
                    $consultar="SELECT titulo FROM libros";
                    //Ejecuto la sentencia
                    $registros=mysqli_query($con,$consultar);	
                    echo "<label for='seleccionar'>Elige un título:</label>";
                    echo "<select name='seleccionar' id='seleccionar' class='form-control'>";
                    while($registro=mysqli_fetch_row($registros)){
                        
                        echo "<option value='$registro[0]'>".$registro[0] ."</option>";
                        
                    }
                    echo "</select>";
                ?>
            </div>
            <div class="form-group">
                <?php
                    $host = "localhost";
                    $user = "phpmyadmin";
                    $pass = "root";
                    $database = "biblioteca";
            
                    //Conectando
                    $con = new mysqli($host, $user, $pass, $database);
                    //Selecciono la base de datos
                    mysqli_select_db($con, "biblioteca");
                    //Creo la sentencia
                    $consultar2="SELECT nombre FROM usuarios";
                    //Ejecuto la sentencia
                    $registros2=mysqli_query($con,$consultar2);	
                    echo "<label for='seleccionar2'>Elige un nombre de usuario:</label>";
                    echo "<select name='seleccionar2' id='seleccionar2' class='form-control'>";
                    while($registro2=mysqli_fetch_row($registros2)){
                        
                        echo "<option value='$registro2[0]'>".$registro2[0] ."</option>";
                        
                    }
                    echo "</select>";
                ?>
            </div>
            <div class="form-group">
                <label for="fechainicio">Elige una fecha de inicio:</label>
                <input type ="date" class="form-control" id="fechainicio" />
            </div>
            <div class="form-group">
                <label for="fechafin">Elige una fecha de finalización del préstamo:</label>
                <input type ="date" class="form-control" id="fechafin" />
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
            <button type ="reset" class="btn btn-primary">Restablecer</button>
        </form>
        </div>
    </body>
</html>