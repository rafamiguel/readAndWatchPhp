<?PHP
include 'conexion.php';
$json=array();
if(isset($_GET["idUsuario"]) && isset($_GET["tipo"])){
	$idUsuario=$_GET["idUsuario"];
	$tipo=$_GET["tipo"];
	$consulta="select idVidDoc from viddoc WHERE idSubtema is not null and tipo='".$tipo."' AND idUsuario= '".$idUsuario."' ";
	$resultado=mysqli_query($conexion, $consulta);

	  while($r=mysqli_fetch_array($resultado)){
                
                $json['usuario'][] = $r; 
                
            }

            mysqli_close($conexion);
            echo json_encode($json);
}

?>


