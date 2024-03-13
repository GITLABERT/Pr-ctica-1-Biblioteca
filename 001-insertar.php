<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<?php
			//Recojo todas las variables de todos los formularios
			$titulo = $_POST['titulo'];
			$autor = $_POST['autor'];
			$genero = $_POST['genero'];
			$editorial = $_POST['editorial'];
			$isbn = $_POST['isbn'];
			$cantidad = $_POST['cantidad'];
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];
			$pres_titulo = $_POST['seleccionar'];
			$pres_nombre = $_POST['seleccionar2'];
			$fechainicio = $_POST['fechainicio'];
			$fechafin = $_POST['fechafin'];

			//Me conecto
			$host = "localhost";
			$user = "phpmyadmin";
			$pass = "root";
			$database = "biblioteca";

			//Conectando
			$con = new mysqli($host, $user, $pass, $database);

			//Selecciono la base de datos
			mysqli_select_db($con, "biblioteca");

			//Verifico que se ha rellenado el formulario de libros

			if ($titulo) {
				// Inserto los datos en BBDD
				$insert_libro = "INSERT INTO libros 
				(titulo, autor, genero, editorial, isbn, cantidad)
				VALUES('$titulo', '$autor', '$genero', '$editorial', $isbn, $cantidad);";

				if ($result = mysqli_query($con, $insert_libro)) {
				echo "<h3 class='center'>Libro " . $titulo ." insertado correctamente."."<br/>"."</h3>";
						
				} else {
				echo ("No ha sido posible registrar el libro -> ". mysqli_error($con))."<br/>"."<br/>";
				}
			}

			//Verifico que se ha rellenado el formulario de usuarios
			if ($nombre) {
				// Inserto los datos en BBDD
				$insert_usu = "INSERT INTO usuarios 
				(nombre, email, telefono)
				VALUES('$nombre', '$email', $telefono);";

				if ($result = mysqli_query($con, $insert_usu)) {
				echo "<h3 class='center'>Usuario " . $nombre ." insertado correctamente."."<br/>"."</h3>";
						
				} else {
				echo ("No ha sido posible registrar el usuario -> ". mysqli_error($con))."<br/>"."<br/>";
				}
			}

			//Verifico que se ha rellenado el formulario de préstamos

			if ($pres_titulo) {
				//Preparo las consultas para obtener los id de usuario y libro
				$consulibro = "SELECT id FROM libros WHERE titulo = '$pres_titulo'";
				$consusuario = "SELECT id FROM usuarios WHERE nombre = '$pres_nombre'";

				//Consulto y recojo el valor del array de consulta, en una variable
				$libros = mysqli_query($con, $consulibro);
				if (!$libros) {
					die("Error al ejecutar la consulta de libros: " . mysqli_error($con));
				}
				while ($id_libro = mysqli_fetch_row($libros)) {
					$libro_id = $id_libro[0];
				}

				$usuarios = mysqli_query($con, $consusuario);
				if (!$usuarios) {
					die("Error al ejecutar la consulta de usuarios: " . mysqli_error($con));
				}
				while ($id_usuario = mysqli_fetch_row($usuarios)) {
					$usuario_id = $id_usuario[0];
				}
				
				//Preparo las variables de fecha para que tengan el formato adecuado
				$fechainicio = date('Y-m-d', strtotime($fechainicio));
				$fechafin = date('Y-m-d', strtotime($fechafin));

				//Inserto en la base de datos
				$insert_pres = "INSERT INTO prestamos 
								(id_libro, id_usuario, fecha_prestamo, fecha_devolucion)
								VALUES($libro_id, $usuario_id, '$fechainicio', '$fechafin');";

				//Verifico
				if ($result = mysqli_query($con, $insert_pres)) {
					echo "<h3 class='center'>Préstamo de " . $pres_titulo ." insertado correctamente."."<br/>"."</h3>";
							
				} else {
					echo ("No ha sido posible registrar el préstamo -> ". mysqli_error($con))."<br/>"."<br/>";
				}
			}

		?>
	</body>
</html>
