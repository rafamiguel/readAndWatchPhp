<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["tipo"]) && isset($_GET["descripcion"])&& isset($_GET["ruta"]) && isset($_GET["fechaSubida"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $tipo=$_GET["tipo"];
    $descripcion=$_GET["descripcion"];
    $ruta=$_GET["ruta"];
    $fechaSubida=$_GET["fechaSubida"];
    $idUsuario=$_GET["idUsuario"];
    if(tipo=='v'){
    $sentencia="update viddoc where idVidDoc={$idVidDoc} set
    tipo='{$tipo}',descripcion='{$descripcion}',rutaImagen='@drawable/miniatura',ruta='{$ruta}',fechaSubida='{$fechaSubida}',visitas=0,idUsuario={$idUsuario},idSubtema={$idTema},idReporte=1";
    }else{
    $sentencia="update viddoc where idVidDoc={$idVidDoc} set
    tipo='{$tipo}',descripcion='{$descripcion}',rutaImagen='@drawable/miniatura',ruta='{$ruta}',fechaSubida='{$fechaSubida}',visitas=0,idUsuario={$idUsuario},idSubtema={$idTema},idReporte=1";
    }
    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>