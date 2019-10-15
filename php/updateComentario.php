<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["idComentario"]) && isset($_GET["comentario"])){
    $idComentario=$_GET["idComentario"];
    $comentario=$_GET["comentario"];
   
    $sentencia="update comentario set
    texto='{$comentario}' where idComentario = {$idComentario}";
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