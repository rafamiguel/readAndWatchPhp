<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idTema"]) && isset($_GET["tipo"]) && isset($_GET["descripcion"])&& isset($_GET["ruta"]) && isset($_GET["fechaSubida"])){
    $idTema=$_GET["idTema"];
    $tipo=$_GET["tipo"];
    $descripcion=$_GET["descripcion"];
    $ruta=$_GET["ruta"];
    $fechaSubida=$_GET["fechaSubida"];

    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idTema,idReportesVidDoc) values('v','Nose','@drawable/miniatura','{$ruta}',{$fechaSubida},0,1,{$idTema},1) ";
    $resultado=mysqli_query($conexion, $sentencia);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>