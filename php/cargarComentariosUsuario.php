<?PHP
include 'conexion.php';
$json=array();
if(isset($_GET["idUsuario"])){
	$idUsuario=$_GET["idUsuario"];
	$tipo=$_GET["tipo"];
	$consulta="select idComentario from comentario WHERE idUsuario={$idUsuario}";
 	echo $consulta;
	$resultado=mysqli_query($conexion, $consulta);
	echo "<br>".$resultado;
  	while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
  	}

	$consulta="select idVidDoc from viddoc WHERE idUsuario={$idUsuario} and idPregunta IS NOT NULL";
	echo "<br".$consulta."<br>";
	$resultado=mysqli_query($conexion, $consulta);
	echo "<br>".$resultado;
  	while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
  	}

    mysqli_close($conexion);
    echo json_encode($json);
}

?>