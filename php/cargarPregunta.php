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
    	$expire->modify('+ 1 weeks');
    	echo "expire:".$expire;
    	echo "<br>id:".$r["idPregunta"];	$today_dt = new DateTime($fechaActual);
		$expire_dt = new DateTime($expire);
		if ($expire_dt < $today_dt) { 
			$sentencia = "delete from pregunta where idPregunta=".$r["idPregunta"];
			mysqli_query($conexion, $sentencia);
		 }else{
        $json['usuario'][] = $r;
        } 
    }

    mysqli_close($conexion);
    echo json_encode($json);

}
?>