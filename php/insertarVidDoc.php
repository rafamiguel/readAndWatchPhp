<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idTema"]) && isset($_GET["tipo"]) && isset($_GET["descripcion"])&& isset($_GET["ruta"]) && isset($_GET["fechaSubida"]) && isset($_GET["idUsuario"])){
    $idTema=$_GET["idTema"];
    $tipo=$_GET["tipo"];
    $descripcion=$_GET["descripcion"];
    $ruta=$_GET["ruta"];
    $fechaSubida=$_GET["fechaSubida"];
    $idUsuario=$_GET["idUsuario"];
    if(tipo=='v'){
    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idSubtema,idReportesVidDoc) values('{$tipo}','{$descripcion}','@drawable/miniatura','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idTema},1) ";
    }else{
    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idSubtema,idReportesVidDoc) values('{$tipo}','{$descripcion}','@drawable/doc','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idTema},1) ";
    }
    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>