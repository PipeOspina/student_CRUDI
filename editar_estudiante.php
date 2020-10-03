<?php 
	
	
	include "conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['edad']) || empty($_POST['Ti']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
            $idUsuario = $_POST['idUsuario'];
			$nombre = $_POST['nombre'];
			$apellidos  = $_POST['apellidos'];
			$edad   = $_POST['edad'];
			$Ti  = $_POST['Ti'];
			

				$alert='<p class="msg_error">La identidicacion ya existe.</p>';
			
                $query_update = mysqli_query($conection,"UPDATE estudiantes SET nombre='$nombre',apellidos='$apellidos',edad='$edad' WHERE idusuario=$idUsuario");

				
				if($query_update){
					$alert='<p class="msg_save">Persona Actualizada correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al Actualizar Persona.</p>';
				}

			


		}

    }
    
    if(empty($_GET['id']))
    {
        header('Location:lista_estudiante.php');
    }

    $iduser =$_GET['id'];
    $sql="SELECT * FROM estudiantes WHERE idusuario=$iduser";
    $result=mysqli_query($conection,$sql);

    if($result==""){
        header('Location:lista_estudiante.php');
    }else{
        while($mostrar=mysqli_fetch_array($result)){
            $nombre = $mostrar['nombre'];
			$apellidos  = $mostrar['apellidos'];
			$edad   = $mostrar['edad'];
			$Ti  = $mostrar['Ti'];
			$numeroid = $mostrar['numeroid'];
        }
    }
    

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/styleRegistros.css">
	<title>Actualizar</title>
</head>
<body>
		<section id="container">
		

		<div class="form_register">
			<h1>Actualizar Persona</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
                <input type="hidden" name="idUsuario" value="<?php echo $iduser?>">
				<label for="nombre">Nombre(s)</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingresa Nombres" value="<?php echo $nombre?>">
				<label for="Apellidos">Apellido(s)</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Ingresa Apellido(s)" value="<?php echo $apellidos?>">
				<label for="usuario">Edad</label>
				<input type="number" name="edad" id="edad" placeholder="Edad" value="<?php echo $edad;?>">
				<label for="id">Tipo de Identidicación</label>


				<select name="Ti" id="Ti">
				   <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
				   <option value="Cedula Extrangeria">Cedula Extrangeria</option>
				   <option value="Targeta de Identidad">Targeta de Identidad</option>
				   <option value="Registro Civil">Registro Civil</option>
				</select>  
				
				


                <input type="submit" value="ACTUALIZAR PERSONA" class="btn_save">
                <input type="submit" name="cancelar" value="CANCELAR" class="btn_save">
				<?php
                $cancelar="";
                
                if(isset($_POST['cancelar']))$cancelar=$_POST['cancelar'];
                
                if($cancelar){
                    header("location: lista_estudiantes.php");
                }
                    
                
                ?>

			</form>


		</div>


	</section>
	
</body>
</html>