<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["idMateria"])){
    $idMateria=$_GET["idMateria"];
    
    $sentencia="delete from materia where idMateria = {$idMateria}";
    
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