<?PHP
include 'conexion.php';
$json=array();
if(isset($_GET["idUsuario"])){
	$idUsuario=$_GET["idUsuario"];
	$tipo=$_GET["tipo"];
	$consulta="select idComentario from comentario WHERE idUsuario={$idUsuario}";
	$resultado=mysqli_query($conexion, $consulta);
  	while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
  	}

	$consulta="select idVidDoc from viddoc WHERE idUsuario={$idUsuario} and idPregunta IS NOT NULL";
	$resultado=mysqli_query($conexion, $consulta);
  	while($r=mysqli_fetch_array($resultado)){
        $json['videosUsuario'][] = $r; 
  	}
    mysqli_close($conexion);
    echo json_encode($json);
}

?>