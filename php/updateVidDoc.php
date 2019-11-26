<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["idTema"]) && isset($_GET["tipo"]) && isset($_GET["descripcion"])&& isset($_GET["ruta"]) && isset($_GET["fechaSubida"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $idTema=$_GET["idTema"];
    $tipo=$_GET["tipo"];
    $descripcion=$_GET["descripcion"];
    $ruta=$_GET["ruta"];
    $fechaSubida=$_GET["fechaSubida"];
    $idUsuario=$_GET["idUsuario"];
    if($tipo=='v'){
    $sentencia="update viddoc set
    tipo='{$tipo}',descripcion='{$descripcion}',rutaImagen='@drawable/miniatura',ruta='{$ruta}',fechaSubida='{$fechaSubida}',visitas=0,idUsuario={$idUsuario},idSubtema={$idTema} where idVidDoc={$idVidDoc}";
    }else{
    $sentencia="update viddoc set
    tipo='{$tipo}',descripcion='{$descripcion}',rutaImagen='@drawable/doc',ruta='{$ruta}',fechaSubida='{$fechaSubida}',visitas=0,idUsuario={$idUsuario},idSubtema={$idTema} where idVidDoc={$idVidDoc}";
    }
    $resultado=mysqli_query($conexion, $sentencia);
    $json['viddoc'][]=$resultado;
    echo json_encode($json);
}
mysqli_close($conexion);
?>