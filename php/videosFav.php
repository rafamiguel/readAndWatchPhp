<?PHP

include 'conexion.php';
$json=array();
if(isset($_GET["idUsuario"])){
	$idUsuario=$_GET["idUsuario"];
	$consulta="SELECT viddoc.idUsuario, viddoc.descripcion, viddoc.rutaImagen, favorito.idVidDoc FROM viddoc INNER JOIN favorito ON favorito.idVidDoc = viddoc.idVidDoc WHERE favorito.idUsuario = {$idUsuario} and viddoc.tipo='v'";
	$resultado=mysqli_query($conexion, $consulta);

	  while($r=mysqli_fetch_array($resultado)){
                
                $json['usuario'][] = $r; 
                
            }

            mysqli_close($conexion);
            echo json_encode($json);
}

?>