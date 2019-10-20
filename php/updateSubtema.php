<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["idSubtema"]) && isset($_GET["nombre"])){
    $idSubtema=$_GET["idSubtema"];
    $nombre=$_GET["nombre"]; 
   
    $sentencia="update subtema set
    nombre='{$nombre}' where idSubtema = {$idSubtema}";
     //update materia set nombre = "Psico", rutaImagen = "ruta" where idMateria = 9;
    if(mysqli_query($conexion, $sentencia)){
    $json['usuario'][]=array("success" => 1,);

} else{
          $resulta["success"]=0;
          $json['usuario'][]=$resulta;}
    }
    //echo $sentencia;
    echo json_encode($json);
mysqli_close($conexion);
?>