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
    if($tipo=='v'){
    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idSubtema,eliminado) values('{$tipo}','{$descripcion}','@drawable/miniatura','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idTema},'N') ";
    }else{
    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idSubtema,eliminado) values('{$tipo}','{$descripcion}','@drawable/doc','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idTema},'N') ";
    }
    $resultado=mysqli_query($conexion, $sentencia);

    $sentencia = "select idVidDoc from viddoc";
    $resultado=mysqli_query($conexion, $sentencia);

    $id = 0;
    while($registro=mysqli_fetch_array($resultado)){
        $id = $registro['idVidDoc']; 
    }
    $json['vidDoc']['idVidDoc'] = $id; 
    echo json_encode($json);
}
mysqli_close($conexion);
?>