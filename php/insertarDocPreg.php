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
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idPregunta,idReportesVidDoc) values('{$tipo}','{$descripcion}','@drawable/doc','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idPregunta},1) ";
    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>