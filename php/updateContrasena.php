<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["nueva"]) && isset($_GET["idUsuario"])){
    $contrasena=$_GET["nueva"];
    $idUsuario=$_GET["idUsuario"];
   
    $sentencia="update usuario set
     contrasena ='{$contrasena}' where idUsuario = {$idUsuario}";
     //update materia set nombre = "Psico", rutaImagen = "ruta" where idMateria = 9;
    if(mysqli_query($conexion, $sentencia)){
    $json['usuario'][]=array("success" => 1,);
    echo $sentencia;

} else{
          $resulta["success"]=0;
          $json['usuario'][]=$resulta;
          echo "error";
        }
    }
    //echo $sentencia;
    echo json_encode($json);
mysqli_close($conexion);
?>