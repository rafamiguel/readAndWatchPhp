<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idPregunta"]) && isset($_GET["tipo"]) && isset($_GET["descripcion"])&& isset($_GET["ruta"]) && isset($_GET["fechaSubida"]) && isset($_GET["idUsuario"])){
    $idPregunta=$_GET["idPregunta"];
    $tipo=$_GET["tipo"];
    $descripcion=$_GET["descripcion"];
    $ruta=$_GET["ruta"];
    $fechaSubida=$_GET["fechaSubida"];
    $idUsuario=$_GET["idUsuario"];

    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idPregunta,eliminado) values('{$tipo}','{$descripcion}','@drawable/doc','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idPregunta},'N') ";
    $resultado=mysqli_query($conexion, $sentencia);
    $resulta["exito"]=1;
    $json['usuario'][]=$resulta;
    echo json_encode($json);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>