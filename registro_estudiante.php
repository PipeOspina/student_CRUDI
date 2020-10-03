<?php 
	
	
	include "conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['edad']) || empty($_POST['Ti']) || empty($_POST['numeroid']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$nombre = $_POST['nombre'];
			$apellidos  = $_POST['apellidos'];
			$edad   = $_POST['edad'];
			$Ti  = $_POST['Ti'];
			$numeroid = $_POST['numeroid'];


			$query = mysqli_query($conection,"SELECT * FROM estudiantes WHERE nombre = '$nombre' OR numeroid = '$numeroid' ");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">La identidicacion ya existe.</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO estudiantes(nombre,apellidos,edad,Ti,numeroid)
				                                         VALUES('$nombre','$apellidos','$edad','$Ti','$numeroid')");
				if($query_insert){
					$alert='<p class="msg_save">Estudiante Registrado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al Registrar el Estudiante.</p>';
				}

			}


		}

	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/styleRegistros.css">
	<title>Registro</title>
</head>
<body>
		<section id="container">
		

		<div class="form_register">
			<h1>Registro Persona</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">Nombre(s)</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingresa Nombres">
				<label for="Apellidos">Apellido(s)</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Ingresa Apellido(s)">
				<label for="usuario">Edad</label>
				<input type="number" name="edad" id="edad" placeholder="Edad">
				<label for="id">Tipo de Identidicación</label>


				<select name="Ti" id="Ti">
				   <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
				   <option value="Cedula Extrangeria">Cedula Extrangeria</option>
				   <option value="Targeta de Identidad">Targeta de Identidad</option>
				   <option value="Registro Civil">Registro Civil</option>
				</select>  
				<label for="id">Número de Identificación</label>
				<input type="text" name="numeroid" id="numeroid" placeholder="Identificacion"> 


				<input type="submit" value="GUARDAR" class="btn_save">
				<input type="submit" name="lista" value="VER LISTA" class="btn_save">
				
				
				<?php
                $lista="";
                
                if(isset($_POST['lista']))$lista=$_POST['lista'];
                
                if($lista){
                    header("location: lista_estudiantes.php");
                }
                    
                
                ?>

			</form>


		</div>


	</section>
	
</body>
</html>