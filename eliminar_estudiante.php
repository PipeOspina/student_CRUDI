<?php
include "conexion.php";
if(!empty($_POST)){
 $idusuario = $_POST['idusuario'];
 //$query_delete = mysqli_query($conection,"DELETE  FROM estudiantes WHERE idusuario=$idusuario");
 $query_delete = mysqli_query($conection,"UPDATE estudiantes SET estatus = 0 WHERE idusuario=$idusuario");
 if($query_delete){
    header("location:lista_estudiantes.php");
 }else{
     echo "Error al eliminar";
 }
 

}

 if(empty($_REQUEST['id']))

 {
     header("location:lista_estudiantes.php");
 }else{
     
     $idusuario = $_REQUEST['id'];
     $query = mysqli_query($conection,"SELECT * FROM estudiantes WHERE idusuario=$idusuario");
     $result=mysqli_num_rows($query);
     if($result>0){
        while($mostrar=mysqli_fetch_array($query)){
            $nombre = $mostrar['nombre'];
			$apellidos  = $mostrar['apellidos'];
			$numeroid = $mostrar['numeroid'];
        }
     }else{
        header("location:lista_estudiantes.php");
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
        <div class ="data_delete">
            <h2>¿Esta seguro que quiere eliminar el siguiente registro?</h2>
            <p> Nombre:<span><?php echo $nombre;?></span></p>
            <p> Apellidos:<span><?php echo $apellidos;?></span></p>
            <p> Identificacion:<span><?php echo $numeroid;?></span></p>

            <form method="post" action="">
            <input type="hidden" name="idusuario"value="<?php echo $idusuario;?> ">
                <a href="lista_estudiantes.php" class="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar "class="btn_ok">
            </form>

        </div>	
    
	
</body>
</html>