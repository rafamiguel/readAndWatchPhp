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
		$expire_dt = new DateTime($expire);
		$expire_dt->modify('+1 week');
    	$today_dt = new DateTime($fechaActual);
	
		if ($expire_dt < $today_dt) { 
			$sentencia = "delete from pregunta where idPregunta=".$r["idPregunta"];
			mysqli_query($conexion, $sentencia);
		 }else{
        $json['usuario'][] = $r;

        } 
    }
    echo json_encode($json);
    mysqli_close($conexion);


}
?>