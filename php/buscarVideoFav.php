<?PHP
include 'conexion.php';
$json=array();
if(isset($_GET["idUsuario"])){
	$idUsuario=$_GET["idUsuario"];
	$consulta="select idVidDoc from favorito WHERE idUsuario= {$idUsuario} ";
	$resultado=mysqli_query($conexion, $consulta);

	  while($r=mysqli_fetch_array($resultado)){
                
                $json['usuario'][] = $r; 
                
            }

            mysqli_close($conexion);
            echo json_encode($json);
}

?>