<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["idTema"]) && isset($_GET["nombre"])){
    $idTema=$_GET["idTema"];
    $nombre=$_GET["nombre"];
   
    $sentencia="update tema set
    nombre='{$nombre}' where idTema = {$idTema}";
     
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