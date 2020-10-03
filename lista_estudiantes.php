<?php 
include "conexion.php";

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
        
        <h1>Lista de Personas del Instituto Javier Silva</h1>
        <a class="btn_new" href="registro_estudiante.php">Registrar Persona</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Tipo de Identificación</th>
                <th>Número de Identificación</th>
                <th>Nombre(s)</th>
                <th>Apelido(s)</th>
                <th>Edad</th>  
                <th>Acciones</th>          
                
            </tr>

            <?php 
            $sql="SELECT * FROM estudiantes WHERE estatus =1";
            $result=mysqli_query($conection,$sql);
            while($mostrar=mysqli_fetch_array($result)){

            ?>
            <tr>
                <td><?php echo $mostrar['idusuario']?></td>
                <td><?php echo $mostrar['Ti']?></td>
                <td><?php echo $mostrar['numeroid']?></td>
                <td><?php echo $mostrar['nombre']?></td>
                <td><?php echo $mostrar['apellidos']?></td>
                <td><?php echo $mostrar['edad']?></td>
                <td>
                    <a class="link_edit" href="editar_estudiante.php?id=<?php echo $mostrar['idusuario'];?>" >Editar</a>
                    
                    <a class="link_delete" href="eliminar_estudiante.php?id=<?php echo $mostrar['idusuario'];?>">Eliminar</a>
                </td>
 
             
            </tr>
            <?php 
            }
            ?>

        </table>


		

	</section>
	
</body>
</html>