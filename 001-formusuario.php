<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
    <body>
        <div class="container mt-5">
        <h1>Introduzca los datos del nuevo usuario</h1>
        <form action= "09_inserta.php" method = "post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type ="text" class="form-control" id="nombre" placeholder="Introduzca un nombre"/>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type ="text" class="form-control" id="email" placeholder="Introduzca una dirección de correo"/>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type ="text" class="form-control" id="telefono" placeholder="Introduzca un teléfono"/>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
            <button type ="reset" class="btn btn-primary">Restablecer</button>
        </form>
        </div>
    </body>
</html>
