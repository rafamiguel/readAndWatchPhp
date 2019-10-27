<?PHP
include 'conexion.php';
$json=array();


	$consulta="select ruta from viddoc WHERE tipo= 'v'";
	$resultado=mysqli_query($conexion, $consulta);

	  while($r=mysqli_fetch_array($resultado)){
                
                $json['usuario'][] = $r; 
                
            }

            mysqli_close($conexion);
            echo json_encode($json);


?>