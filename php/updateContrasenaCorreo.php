<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["correo"]) && isset($_GET["contrasena"])){
    $contrasena=$_GET["contrasena"];
    $correo=$_GET["correo"];
   
    $sentencia="update usuario set
     contrasena ='{$contrasena}' where correo = '{$correo}'";
     //update materia set nombre = "Psico", rutaImagen = "ruta" where idMateria = 9;
    if(mysqli_query($conexion, $sentencia)){
    $json['usuario'][]=array("success" => 1,);
 
} else{
        $json['usuario'][]=array("success" => 0,);
          
        }
    }
    else{
      
    }
    //echo $sentencia;
    echo json_encode($json);
mysqli_close($conexion);
?>