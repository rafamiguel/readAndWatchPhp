<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idMateria"]) && isset($_GET["nombre"]) && isset($_GET["rutaImagen"])){
    $idMateria=$_GET["idMateria"];
    $nombre=$_GET["nombre"];
    $rutaImagen=$_GET["rutaImagen"];
   
   
    $sentencia="update materia set
    nombre='$nombre.',rutaImagen='$rutaImagen' where idMateria =$idMateria";
     //update materia set nombre = "Psico", rutaImagen = "ruta" where idMateria = 9;
    }


    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>