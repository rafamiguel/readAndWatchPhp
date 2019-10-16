<?PHP
include 'conexion.php';
$json=array();
if(isset($_GET["idUsuario"])){
	$idUsuario=$_GET["idUsuario"];
	$tipo=$_GET["tipo"];
	$consulta="select idComentario from comentario WHERE idUsuario={$idUsuario}";
 	echo $consulta;
	$resultado=mysqli_query($conexion, $consulta);
	echo "<br>"."Hola";
  	while($r=mysqli_fetch_array($resultado)){
  			echo "<br>"."Ciclo";
        $json['usuario'][] = $r; 
  	}

	$consulta="select idVidDoc from viddoc WHERE idUsuario={$idUsuario} and idPregunta IS NOT NULL";
	echo "<br>".$consulta."<br>";
    echo "<br>"."Hola";
	$resultado=mysqli_query($conexion, $consulta);
	echo "<br>".$resultado;
  	while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
  	}
	echo "<br>"."Hola";
    mysqli_close($conexion);
    echo json_encode($json);
}

?>