<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idTema"]) && isset($_GET["tipo"]) && isset($_GET["eliminado"]) && isset($_GET["descripcion"])&& isset($_GET["ruta"]) && isset($_GET["fechaSubida"]) && isset($_GET["idUsuario"])){
    $idTema=$_GET["idTema"];
    $tipo=$_GET["tipo"];
    $descripcion=$_GET["descripcion"];
    $ruta=$_GET["ruta"];
    $fechaSubida=$_GET["fechaSubida"];
    $idUsuario=$_GET["idUsuario"];
    $eliminado=$_GET["eliminado"];
    if($tipo=='v'){
    $sentencia="insert into viddoc 
    (tipo,eliminado,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idSubtema,eliminado) values('{$tipo}', '{$eliminado}' ,'{$descripcion}','@drawable/miniatura','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idTema},'N') ";
    }else{
    $sentencia="insert into viddoc 
    (tipo,descripcion,rutaImagen,ruta,fechaSubida,visitas,idUsuario,idSubtema,eliminado) values('{$tipo}','{$descripcion}','@drawable/doc','{$ruta}','{$fechaSubida}',0,{$idUsuario},{$idTema},'N') ";
    }
    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);

    $sentencia = "select idVidDoc from viddoc";
    $resultado=$conexion->query($consulta);
    $id=0;
    while($row = $resultado->fetch_array(MYSQLI_NUM)){
        $id = $row[0];
    }
    $json['idVidDoc'][]=array("idVidDoc" => $id,);
    echo json_encode($json);
}
mysqli_close($conexion);
?>