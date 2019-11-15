<?PHP
include 'conexion.php';
$json=array();
/*Cargar Preguntas de Temas Libres*/
if(isset($_GET["fechaActual"])){ 
	$fechaActual = $_GET["fechaActual"];
    $consulta="select * from pregunta";
    $resultado=mysqli_query($conexion, $consulta);
    while($r=$resultado->fetch_assoc()){
		$expire = $r["fechaSubida"];
		echo $expire."<br>";
		$expire_dt = new DateTime($expire);
		$expire_dt=strtotime("+1 weeks", $expire);
    	echo $expire."<br>";
    	$today_dt = new DateTime($fechaActual);
    	echo $today_dt."<br>";
	
		echo $expire_dt."<br>";
		if ($expire_dt < $today_dt) { 
			echo "hola";
			$sentencia = "delete from pregunta where idPregunta=".$r["idPregunta"];
			mysqli_query($conexion, $sentencia);
		 }else{
		 	echo "adios";
        $json['usuario'][] = $r;

        } 
    }
    echo json_encode($json);
    mysqli_close($conexion);


}
?>